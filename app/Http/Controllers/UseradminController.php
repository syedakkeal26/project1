<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Jobs\SendEmailJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use log;
use App\Models\Useradmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

use Illuminate\Support\Facades\Validator;


class UseradminController extends Controller
{
        function login(){
            return view ('login');
        }

        function register(){
            return view ('register');
        }

        public function dashboard(){
            $users = User::orderBy('id', 'DESC')->paginate(8);
            // return $users;
            return view ('/dashboard',['users'=>$users]);
        }
       //resources
        public function getUser($id) {
            $user = User::query()->find($id);


            if (!$user) {
                return response()->json(['success' => false, 'message' => 'User does not exist']);
            }

            return response()->json(['success' => true, 'user' => new UserResource($user)]);
        }

        public function getUsers () {
            $users = User::query()->get();
            // dd($users);
            return response()->json(['success' => true, 'users' => new UserCollection($users)]);
        }
        function loginpost(Request $request){
            $request->validate([
                'email'=> 'required',
                'password'=> 'required'
            ]);
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            if (Auth::user()->user_type == 'admin'){
                return redirect()->intended(route('home'));
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

        function adduser(){
            return view('add');
        }

        public function adduserpost(Request $request){
            $request->validate([
                'name' => 'required',
                'email'=> 'required|email|unique:useradmins',
                // 'password' => 'string',
                'user_type'=> 'required|in:admin,user',

            ]);
            // $postdata['password'] = Hash::make('user');
            $postdata = $request->all();
            User::create($postdata);
            if($postdata){
             return redirect(route('home'));
            }

        }



        public function getUserById($id )
        {

            $user = User::find($id);
            // return $result;
            return view('edit', ['user' => $user]);
        }

        // update
        public function editid($id, Request $request)
        {
            // $request['id'] = $id;
            // return $request;


            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|unique:useradmins,email,' . $id,
                'user_type'=> 'required|in:admin,user',

            ]);
            $user = $request->all();

            User::find($id)->update($user);

            // $user->update();

            return redirect('/dashboard/');
        }
        // Delete
        public function destroy($id)
        {
            $user=User::find($id);
            $user->delete();

            return redirect('/dashboard/');
        }
            function signOut(){
            \Illuminate\Support\Facades\Session::flush();
                Auth::logout();
                return redirect(route('login'));
            }
    }




