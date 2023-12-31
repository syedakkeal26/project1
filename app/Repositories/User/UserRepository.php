<?php
namespace App\Repositories\User;



use App\Models\Useradmin;
use App\Repositories\User\UserInterface as UserInterface;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class UserRepository implements UserInterface
{
    public function loginpost( $request)
        {
            $request->validate([
                '*'=> 'required',
            ]);
            if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
            {
                if (Auth::guard('admin')->user()->user_type == 'admin'){
                    return 1;
                }
                else{
                    return 2;
                }
            }
         }


    public function registerpost(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email'=> 'required|email|unique:useradmins',
                'password' => [
                    'required',
                    'string',
                    // 'min:4',
                    // 'max:8',
                    // 'regex:/[a-z]/',      //  one lowercase letter
                    // 'regex:/[A-Z]/',      // one uppercase letter
                    // 'regex:/[0-9]/',      //  one digit
                    // 'regex:/[@$!%*#?&]/', //  a special character
                ],
            ]);
            $request->validate([
                '*' => 'required',
            ]);
            // foreach ($request->except('_token') as $data => $value) {
            //     $valids[$data] = "required";
            //   }

            //   $request->validate($valids);

            $data['name'] = $request->name;
            $data['email'] =$request->email;
            $data['password'] = Hash::make($request->password);
            $data['user_type'] = 'user';
            $user = Useradmin::create($data);
            if(!$user){
                return 0;
            }
            $data['psw']=$request->password;
            Mail::send('emails.test',$data,function($message) use($data)
            {
                $message->to($data['email']);
                $message->subject('Message From Admin');
            });
        }


    public function index(){
        return Useradmin::orderBy('id', 'DESC')->paginate(10);
    }

    public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email'=> 'required|email|unique:useradmins',
                'password'=> 'required|string|max:8|',
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
            Mail::send('emails.test',$data,function($message) use($data)
            {
                $message->to($data['email']);
                $message->subject('Message From Admin');
            });
            session()->flash('message', 'User Created successfully');
        }

    public function show(string $id)
        {
        return Useradmin::where('id',$id)->first();
    }


    public function update( $request, string $id)
        {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|unique:useradmins,email,' . $id,
                'user_type' => 'required|in:admin,user,etc',
            ]);

            $user = Useradmin::find($id);

            if (!$user) {
                return 0;
            }

            $user->update($validatedData);

            session()->flash('message', 'User updated successfully');
            if($user){
                return 1;
            }
        }

    public function destroy(string $id)
        {
            $user=Useradmin::find($id);
            $user->delete();
            session()->flash('message', 'User Deleted successfully');
            if($user){
                return 1;
            }
            else{
                return 0;
            }
        }
}