<?php
namespace App\Repositories\User;



use App\Models\Useradmin;
use App\Repositories\User\UserInterface as UserInterface;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;



class UserRepository implements UserInterface
{
    public $user;


    public function __construct(User $user)
            {
            $this->user = $user;
            }


    public function loginpost(Request $request)
            {
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


    public function registerpost(Request $request)
            {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email'=> 'required|email|unique:useradmins',
                    'password' => 'required|string|confirmed|',
                ]);

                $data = [
                    'name' => $request['name'],
                    'email' => $request['email'],
                'password'=> Hash::make($request['password']),
                'user_type' => 'user',
                ];
                $user = Useradmin::create($data);
                if(!$user){
                    return redirect(route('register'));
                }
                $data = [
                    'psw'=> $request['password'],
                ];
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



    public function store(Request $request)
            {
                $request->validate([
                    'name' => 'required',
                    'email'=> 'required|email|unique:useradmins',
                    'password'=> 'required|string',
                    'user_type'=> 'required|in:admin,user',
                ]);

                $data = [
                    'name' => $request['name'],
                    'email' => $request['email'],
                'password'=> Hash::make($request['password']),
                'user_type' => $request['user_type'],
                ];
                $newuser = Useradmin::create($data);
                if(!$newuser){
                    return redirect(route('admin.create'));
                }
                    $data = [
                        'psw'=> $request['password'],
                    ];
                    Mail::send('emails.test',$data,function($message) use($data){
                        $message->to($data['email']);
                        $message->subject('Message From Admin');
                    });
                    return redirect(route('admin.index'));

                //
            }

    public function edit(string $id)
            {
                $user = Useradmin::where('id',$id)->first();
                return view('edit',compact('user')) ;
            }


    public function update(Request $request, string $id)
            {
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|unique:useradmins,email,' . $id,
                    'user_type'=> 'required|in:admin,user',
                ]);
                $user = $request->all();

                Useradmin::find($id)->update($user);

                // $user->update();

                return redirect('/admin');
            }

    public function destroy(string $id)
            {
                $user=Useradmin::find($id);
                $user->delete();
                return redirect('/admin');
            }



}
