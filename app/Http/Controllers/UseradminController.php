<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\Useradmin;


use App\Repositories\User\UserInterface as UserInterface;


class UseradminController extends Controller
{

    private $user;
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     */

    public function login(){
        return view ('login');
    }

    public function register(){
        return view ('register');
    }

    public function loginpost(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=> 'required'
        ]);
    $credentials = $request->only('email','password');
    if(Auth::attempt($credentials)){
        if (Auth::user()->user_type == 'admin'){
            return redirect()->intended(route('admin.index'));
        }
        else{
            return redirect()->intended(route('company'));
        }
    }
    return redirect(route('login'))->with("error","Email and password Incorrect");
    }

    public function registerpost(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email'=> 'required|email|unique:useradmins',
            'password' => 'required|string|confirmed|',
        ]);

        $data['name'] = $request->name;
        $data['email'] =$request->email;
        $data['password'] = Hash::make($request->password);
        $data['user_type'] = 'user';
        $user = Useradmin::create($data);
        if(!$user){
            return redirect(route('register'));
        }
         $data['psw']=$request->password;
            Mail::send('emails.test',$data,function($message) use($data){
                $message->to($data['email']);
                $message->subject('Message From Admin');
            });
        return redirect(route('login'));
    }

     public function index()
    {
        $users = Useradmin::orderBy('id', 'DESC')->paginate(10);
        return view ('dashboard',['users'=>$users]);
    }

    public function create(Request $request)

            {
                return view('add');
            }

    public function store(Request $request)
            {
                $request->validate([
                    'name' => 'required',
                    'email'=> 'required|email|unique:useradmins',
                    'password'=> 'required|string',
                    'user_type'=> 'required|in:admin,user',
                ]);
                $data['name'] = $request->name;
                $data['email'] =$request->email;
                $data['password'] = Hash::make($request->password);
                $data['user_type'] = $request->user_type;
                $newuser = Useradmin::create($data);
                if(!$newuser){
                    return redirect(route('admin.create'));
                }
                    $data['psw']=$request->password;
                    Mail::send('emails.test',$data,function($message) use($data){
                        $message->to($data['email']);
                        $message->subject('Message From Admin');
                    });
                    return redirect(route('admin.index'));

                //
            }

            /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('add');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Useradmin::where('id',$id)->first();
        return view('edit',compact('user')) ;
   }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:useradmins,email,' . $id,
            'user_type'=> 'required|in:admin,user',
        ]);
        $user = $request->all();

        Useradmin::find($id)->update($user);

        // $user->update();

        return redirect('/admin');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=Useradmin::find($id);
        $user->delete();
        return redirect('/admin');
    }
    public function signOut(){
        Session::flush();
            Auth::logout();
            return redirect(route('login'));
        }
}
