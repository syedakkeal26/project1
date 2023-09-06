<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function register(Request $request){
            $validator = Validator::make($request->all(),
            [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        if($validator->fails()){
            $error = $validator->errors()->all();
            return response()->json(['message'=>$error],400);
        }

        $data = $request->all();
        $data['password']= bcrypt($data['password']);
        $user = User::create($data);

        $response['token'] = $user->createToken('jhkfdg')->accessToken;
        $response['name'] = $user->name;
        return response()->json($response);
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

    public function profile_update(Request $request)
        {
            $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'profile_picture' => 'required|nullable|image|mimes:jpg,jpeg,png',
                        'gender' => 'required|nullable',
                    ]);
            if ($validator->fails()) {
                        $error = $validator->errors()->all();
                        return response()->json(['message' => $error], 400);
                    }
            $user = $request->user();
            if ($request->hasFile('profile_picture')) {
                if ($user->profile_picture) {
                    $old_path = public_path('/uploads/profile_images/' . $user->profile_picture);
                    if (File::exists($old_path)) {
                        File::delete($old_path);
                    }
                }
                $image = 'profile_picture_' . time() . '.' . $request->file('profile_picture')->extension();
                $destinationPath = public_path('/uploads/profile_images');

                if (!$request->file('profile_picture')->move($destinationPath, $image)) {
                    return response()->json(['message' => 'File not moved. Check directory permissions or other issues.'], 400);
                }
            } else {
                $image = $user->profile_picture;
            }

            $user->update([
                'name' => $request->input('name'),
                'gender' => $request->input('gender'),
                'profile_picture' => $image,
            ]);

            return response()->json(['message' => 'Profile Updated Successfully']);
        }

}

