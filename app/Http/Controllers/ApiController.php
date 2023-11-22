<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Useradmin;

use App\Repositories\User\UserInterface as UserInterface;

class ApiController extends Controller
{

    public $user;
    public function __construct(UserInterface $user)
        {
            $this->user = $user;

        }
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
        $user = Useradmin::create($data);

        // $response['token'] = $user->createToken('jhkfdg')->accessToken;
        $response['name'] = $user->name;
        return response()->json(['message'=>'Profile Registered Successfully']);
    }

    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
            $user = Auth::user();
            $response['token'] = $user->createToken('myapp')->accessToken;
        $response['name'] = $user->name;
        return response()->json($response);
        }else{
            return response()->json(['message'=>'Invalid Credentials'],401);

        }
    }


    public function index()
    {
        $users =  $this->user->index();
        return response()->json(['users' => $users]);
    }

    public function create(Request $request)
    {

    }

    public function store(Request $request)
    {
        try {
            $user = $this->user->store($request);
            if($user == '0'){
                return response()->json(['message' => 'Failed to create user'], 400);
            }
            return response()->json(['message' => 'User created successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create user', 'error' => $e->getMessage()], 500);
        }
    }

    public function show(string $id)
    {
        $user =  $this->user->show($id);
        if(!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json(['user' => $user]);
    }

    public function edit(string $id)
    {
        $user =  $this->user->show($id);
        if(!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json(['user' => $user]);
    }

    public function update(Request $request, string $id)
    {
        try {
            $user= $this->user->update($request,$id);
            if($user == '1'){
                return response()->json(['message' => 'User updated successfully']);
            }
            return response()->json(['message' => 'Failed to update user'], 400);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update user', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $user = $this->user->destroy($id);
            if($user == '1'){
                return response()->json(['message' => 'User deleted successfully']);
            }
            return response()->json(['message' => 'Failed to delete user'], 400);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete user', 'error' => $e->getMessage()], 500);
        }
    }

    public function details(){
        $user = Auth::user();
        $response['user'] = $user;
        return response()->json($response);
    }

    public function profile_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png',
            'gender' => 'nullable',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return response()->json(['message' => $error], 400);
        }

        $user = $request->user();

        $user->name = $request->input('name');
        $user->gender = $request->input('gender');

        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            $filename = time() . '_' . $profilePicture->getClientOriginalName();
            $profilePicture->storeAs('profile_pictures', $filename, 'public');
            $user->profile_picture = $filename;
        }

        $user->save();

        return response()->json(['message' => 'Updated Successfully', 'user' => $user]);
    }


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
        // $user->save();

        return response()->json(['message' => 'Password changed successfully']);
    }





}