<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use log;
use App\Models\Useradmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UseradminController extends Controller
{
        function login(){
            return view ('login');
        }

        function register(){
            return view ('register');
        }

        public function dashboard(){
            $users = User::paginate(2);
            // return $users;
            return view ('dashboard',['users'=>$users]);

        }

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
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            $data['user_type'] = $request->user_type;
            $user = User::create($data);
            if(!$user){
                return redirect(route('register'))->with("error","Registerfailed");
            }
            return redirect(route('login'))->with("Success","Register Successfully");


        }



}
