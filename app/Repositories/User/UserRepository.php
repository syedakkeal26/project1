<?php
namespace App\Repositories\User;



use App\Models\Useradmin;
use App\Repositories\User\UserInterface as UserInterface;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;



class UserRepository implements UserInterface
{



    public function loginpost( $request)
        {
                    $request->validate([
                        'email'=> 'required',
                        'password'=> 'required'
                    ]);
                $credentials = $request->only('email','password');
                if(Auth::attempt($credentials))
                {
                    if (Auth::user()->user_type == 'admin'){
                        return 1;
                    }
                }

         }


    public function registerpost(Request $request)
        {
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
                return 0;
            }
            $data['psw']=$request->password;
                Mail::send('emails.test',$data,function($message) use($data){
                    $message->to($data['email']);
                    $message->subject('Message From Admin');
                });
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
                return 0;
            }
            $data['psw']=$request->password;
                Mail::send('emails.test',$data,function($message) use($data){
                    $message->to($data['email']);
                    $message->subject('Message From Admin');
                });
        }


    public function update( $request, string $id)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:useradmins,email,' . $id,
                'user_type'=> 'required|in:admin,user',
            ]);
            $user = $request->all();

            Useradmin::find($id)->update($user);
            if($user){
                return 1;
            }
            else{
                return 0;
            }
        }

    public function destroy(string $id)
        {
            $user=Useradmin::find($id);
            $user->delete();
            if($user){
                return 1;
            }
            else{
                return 0;
            }
        }
}
