<?php

use App\Http\Controllers\TodoListController;
use App\Http\Controllers\UseradminController;
use App\Http\Controllers\MemberController;
use App\Models\Address;
use App\Models\Useradmin;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome',['name'=>'Syed Akkeal']);
});


Route::post('/saveItem',[TodoListController::class, 'saveItem'])->name('saveItem');

Route::view('first','index');

Route::get('/register',[UseradminController::class , 'register'])->name('register');
Route::post('/register',[UseradminController::class , 'registerpost'])->name('registerpost');


Route::get('/login',[UseradminController::class , 'login'])->name('login');
Route::post('/login',[UseradminController::class , 'loginpost'])->name('loginpost');

Route::view('third', 'third');
// Route::get('/dashboard',[UseradminController::class,'dashboard']);
Route::get('/dashboard',[UseradminController::class,'dashboard'])->name('home');

Route::view('company', 'company');

Route::view('contact', 'contact');

Route::view('about', 'about');

Route::view('service', 'service');

Route::view('career', 'career',['name'=> 'Syed AKkeal']);

Route::get('data',[MemberController::class,'index']);
Route::get('data1',[MemberController::class,'data']);

Route::get('datas',[MemberController::class,'indexdata']);


// Route::get('/dashboard', [UseradminController::class, 'dashboardview']);

Route::group(['middleware'=>'auth'], function() {
        Route::get('/dashboard',[UseradminController::class,'dashboard'])->name('home');
        Route::get('/sendemail',function(){
        $data['email'][0]= 'syedakkealsaj2604@gmail.com';
        $data['email'][1]='nithusugitamil@gmail.com';
        // dd($data);
        dispatch(new App\Jobs\SendEmailJob($data));
        return view('home1');
});
    });

// Route::get('/user',function(){
//    $address = Address::find(1);
//    dd($address);
// //    return view('users.index',compact('users'));
// });
// Route::get('/user',function(){
//     $user = User::find(1);
//     dd($user->address);
//  //    return view('users.index',compact('users'));
//  });

// Route::get('/dashboard/delete/{{ $user->id }}',function(){
//     return view('dashboard');
// });

Route::view('/dashboard/edit','edit');

Route::get('/dashboard/{id}', [UseradminController::class,'getUserById']);
Route::put('/dashboard/{id}', [UseradminController::class,'editid']);

Route::get('/signout', [UseradminController::class, 'signOut'])->name('signout');
