<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function register(Request $request ){
            $validator = Validator::make($request->all(),
            [
            'name' => 'required',
            'email' => 'required|unique:users|email|ends_with:.com',
            'password' => 'required',
        ]);
        if($validator->fails()){
            $error = $validator->errors()->all();
            return response()->json(['message'=>$error],400);
        }

        $data = $request->all();
        $data['password']= bcrypt($data['password']);
        $user = User::create($data);

        // $response['token'] = $user->createToken('jhkfdg')->accessToken;
        $response['name'] = $user->name;
        return response()->json(['message'=>'Profile Registered Successfully',$response]);
    }

    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
            $user = Auth::user();
            $response['token'] = $user->createToken('jhkfdg')->accessToken;
        $response['name'] = $user->name;
        return response()->json($response);
        }else{
            return response()->json(['message'=>'Invalid Credentials'],401);

        }
    }

    public function details(){
        $user = Auth::user();
        $response['user'] = $user;
        return response()->json($response);
    }

    // public function profile_update(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'profile_picture' => 'required|nullable|image|mimes:jpg,jpeg,png',
    //         'gender' => 'required|nullable',
    //     ]);

    //     if ($validator->fails()) {
    //         $error = $validator->errors()->all();
    //         return response()->json(['message' => $error], 400);
    //     }

    //     $user = $request->user();


    // }

 
        public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' =>  [ 'required', 'string', 'min:4', 'max:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/','confirmed' ],
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return response()->json(['message' => $error], 400);
        }
        $user = Auth::user();

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return response()->json(['message' => 'Current password is incorrect'], 400);
        }

        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return response()->json(['message' => 'Password changed successfully']);
    }

}

