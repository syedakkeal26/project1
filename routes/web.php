<?php

use App\Http\Controllers\TodoListController;
use App\Http\Controllers\UseradminController;
use App\Http\Controllers\MemberController;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Address;
use App\Models\Newuser;
use App\Models\Role;
use App\Models\Useradmin;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// -------------- welcome index---------------------
Route::get('/', function () {
    return view('welcome',['name'=>'Syed Akkeal']);
});

//-----------------Example todolist -------------------
Route::post('/saveItem',[TodoListController::class, 'saveItem'])->name('saveItem');

Route::view('first','index');


//----------------login route--------------------

Route::get('/login',[UseradminController::class , 'login'])->name('login');
Route::post('/loginpost',[UseradminController::class , 'loginpost'])->name('loginpost');

//----------------Register route---------------------

Route::get('/register',[UseradminController::class , 'register'])->name('register');
Route::post('/register',[UseradminController::class , 'registerpost'])->name('registerpost');

//---------------------------------------------------

Route::view('contact', 'contact');

Route::view('about', 'about');

Route::view('service', 'service');

Route::view('career', 'career',['name'=> 'Syed AKkeal']);

//-------------------------------------------------------------

Route::get('data',[MemberController::class,'index']);
Route::get('data1',[MemberController::class,'data']);

Route::get('datas',[MemberController::class,'indexdata']);

//---------------------------------------------------
Route::group(['middleware'=>'auth'], function() {

//------------admin route--------------------------

    Route::group(['middleware'=>'is_admin'], function() {
// --------------------Resource route---------------

        Route::resource('admin', UseradminController::class);
    });

//-----------------user route-----------------------

    Route::group(['middleware'=>'is_user'], function() {
        Route::view('user', 'user')->name('company');
});
});
   ## logout
        Route::get('/logout', [UseradminController::class, 'signOut'])->name('signout');

