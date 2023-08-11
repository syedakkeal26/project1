<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Useradmin;
class UseradminController extends Controller
{
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

    function registerpost(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email'=> 'required|email|unique:useradmins',
            'password'=> 'required|string|',
        ]);

        $data['name'] = $request->name;
        $data['email'] =$request->email;
        $data['password'] = Hash::make($request->password);
        $data['user_type'] = 'user';
        $user = User::create($data);
        if(!$user){
            return redirect(route('register'));
        }
            $data['email']=$request->email;
            dispatch(new SendEmailJob($data));
        return redirect(route('login'));
    }

     public function index()
    {
        $users = Useradmin::orderBy('id', 'DESC')->paginate(6);
        return view ('dashboard',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
      *///function adduser(){
    //         return view('add');
    //  }
    public function create(Request $request)

            {
                return view('add');
            }

            /**
             * Store a newly created resource in storage.
             */
            public function store(Request $request)
            {
                $request->validate([
                    'name' => 'required',
                    'email'=> 'required|email|unique:useradmins',
                    'user_type'=> 'required|in:admin,user',
                ]);
                // $postdata ->forceFill([
                //     'password' => Hash::make('123')
                // ]);
                $postdata = $request->all();
                Useradmin::create($postdata);
                if($postdata){
                 return redirect(route('admin.index'));
                }
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

        return redirect('/admin/');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=Useradmin::find($id);
        $user->delete();
        return redirect('/admin/');
    }
        function signOut(){
        Session::flush();
            Auth::logout();
            return redirect(route('login'));
        }
}
