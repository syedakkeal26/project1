<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use log;
use App\Models\Useradmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;


class UseradminController extends Controller
{
        function login(){
            return view ('login');
        }

        function register(){
            return view ('register');
        }

        public function dashboard(){
            $users = User::paginate(10);
            // return $users;
            return view ('/dashboard',['users'=>$users]);
        }

        // public function index()
        // {
        // if (auth()->user()->user_type === 'admin') {
        //     return redirect('/dashboard');
        // } else {
        //     return redirect('/login');
        // }
        // }

        function loginpost(Request $request){
            $request->validate([
                'email'=> 'required',
                'password'=> 'required'
            ]);


        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error","Email and password Incorrect");

        }


        function registerpost(Request $request){
            $request->validate([
                'name' => 'required',
                'email'=> 'required|email|unique:users',
                'password'=> 'required',
                'user_type'=> 'required'
            ]);

            $data['name'] = $request->name;
            $data['email'] =$request->email;
            $data['password'] = Hash::make($request->password);
            $data['user_type'] = $request->user_type;
            $user = User::create($data);
            if(!$user){
                return redirect(route('register'))->with("error","Registerfailed");
            }
                $data['email']=$request->email;
                // dd($data);
                dispatch(new SendEmailJob($data));
            return redirect(route('login'))->with("Success","Register Successfully");


        }

        public function getUserById($id)
        {
            $user = User::find($id);

            // return $result;
            return view('edit', ['user' => $user]);
        }

        public function editid($id, Request $request)
        {
            // $request['id'] = $id;
            // return $request;

            // find
            $user = User::find($id);

            // set data
            if (isset($request['name'])) {
                $user->name = $request['name'];
            }
            if (isset($request['email'])) {
                $user->email = $request['email'];
            }
            if (isset($request['user_type'])) {
                $user->user_type = $request['user_type'];
            }

            // update
            $user->update();

            // redirect to todo/id page
            return redirect('/dashboard/' . $id);
        }


            function signOut(){
                \Illuminate\Support\Facades\Session::flush();
                Auth::logout();
                return redirect(route('login'));
            }
    }




