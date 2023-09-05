<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Traits\UserDashboardTrait;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\Useradmin;


use App\Repositories\User\UserInterface as UserInterface;


class UseradminController extends Controller
{
    //-------------------------------using trait ---------------------------
    use UserDashboardTrait;

    public function showProfile()
    {
        return view('userprofile');
    }

    public function editProfile($userId)
    {
        $user = $this->getUserProfile($userId);
        if (!$user) {
            return redirect()->route('user.index')->with('error', 'User not found.');
        }
        return view('edituser', compact('user'));
    }

    public function updateprofile(Request $request, $userId)
    {
        $result = $this->updateUserProfile($request, $userId);

        if ($result) {
            return redirect()->route('user.profile', $userId)->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->route('user.edit-profile', $userId)->with('error', 'Profile update failed.');
        }
    }
//-------------------------------using trait ---------------------------
    public $user;
    public function __construct(UserInterface $user)
        {
            $this->user = $user;

        }


    public function login()
        {
            return view ('login');
        }

    public function register()
        {
            return view ('register');
        }

        public function loginpost(Request $request)
        {
            //-----------------Userrepository function---------------------------------
            $user = $this->user->loginpost($request);
            if ($user) {
                if ($user == '1') {
                    return redirect()->intended(route('admin.index'));
                }
            }
            else{
                    return redirect()->intended(route('user.index'));
                    }

            return redirect(route('login'))->with("error", "Email and password Incorrect");
        }
//--------------------------------Using helpers -------------------------
        public function dash(){
             $completedTasks = 20;
             $totalTasks = 50;
             $progress = calculateProgress($completedTasks, $totalTasks);

             $amount = 1234.56;
             $formattedAmount = formatCurrency($amount);

             return view('about', compact('progress', 'formattedAmount'));
        }
//----------------------------------------------------------------------------------
    public function registerpost(Request $request)
        {
            $user = $this->user->registerpost($request);
            if($user=='0'){
                return redirect(route('register'));
            }
            return redirect(route('login'));

        }
    public function index()
        {
            $users = Useradmin::orderBy('id', 'DESC')->paginate(10);
            return view ('dashboard',['users'=>$users]);
        }

    public function create(Request $request)
        {
            return view('add');
        }

    public function store(Request $request)
        {

            $user = $this->user->store($request);
            if($user=='0'){
                return redirect(route('admin.create'));
            }
            return redirect(route('admin.index'));
        }

            /**
     * Display the specified resource.
     */
    public function show(string $id)
        {
            $user = Useradmin::where('id',$id)->first();
            return view('details',compact('user'));
        }


    public function edit(string $id)
        {
            $user = Useradmin::where('id',$id)->first();
            return view('edit',compact('user')) ;
        }

    public function update(Request $request, string $id)
        {
            $user = $this->user->update($request,$id);
            if($user=='1'){
                return redirect(route('admin.index'));
            }
        }


    public function destroy(string $id)
        {
            $user = $this->user->destroy($id);
            if($user=='1'){
                return redirect(route('admin.index'));
            }
        }



    public function signOut()
        {
            Session::flush();
            Auth::guard('admin')->logout();
            return redirect(route('login'));
        }



}
