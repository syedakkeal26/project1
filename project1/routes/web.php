<?php

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

Route::view('second', 'second');
Route::view('user', 'third');
Route::view('company', 'company');
Route::view('contact', 'contact');
Route::view('about', 'about');
Route::view('service', 'service');
Route::view('career', 'career',['name'=> 'Syed AKkeal']);