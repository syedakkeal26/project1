<?php

use App\Http\Controllers\TodoListController;
use App\Http\Controllers\UseradminController;
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



// Route::get('/dashboard', [UseradminController::class, 'dashboardview']);

Route::group(['middleware'=>'auth'], function() {
    Route::group(['middleware'=>'auth'], function()
    {
        Route::get('/dashboard',[UseradminController::class,'dashboard'])->name('home');
    });

});

Route::get('/signout', [UseradminController::class, 'signOut'])->name('signout');
