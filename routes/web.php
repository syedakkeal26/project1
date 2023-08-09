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

Route::get('/adduser',[UseradminController::class , 'adduser'])->name('adduser');
Route::post('/adduser',[UseradminController::class , 'adduserpost'])->name('adduserpost');

Route::view('third', 'third');
// Route::get('/dashboard',[UseradminController::class,'dashboard']);
Route::get('/dashboard',[UseradminController::class,'dashboard'])->name('home');


Route::view('contact', 'contact');

Route::view('about', 'about');

Route::view('service', 'service');

Route::view('career', 'career',['name'=> 'Syed AKkeal']);

Route::get('data',[MemberController::class,'index']);
Route::get('data1',[MemberController::class,'data']);

Route::get('datas',[MemberController::class,'indexdata']);

#many to many relationships
Route::get('/data2',function(){
    $user = Newuser::with('roles')->whereId(1)->first();
    return($user);
});
#dd method
Route::get('/data3',function(){
    $role = Role::find(1);
    $users = $role->users;
    dd($users);
});

Route::get('/data4',function(){
    $role = Role::with('users')->whereId(1)->first();
    return ($role);
});


//resources

// Route::get('/user/{id}', [UseradminController::class, 'getUser']);

Route::get('/user', [UseradminController::class, 'getUsers']);
//
// Route::get('/user/{id}', function (string $id) {
//     return new UserResource(User::findOrFail($id));
// });

Route::get('/users', function () {
    return UserResource::collection(User::all());
});

Route::get('/users', function () {
    return new UserCollection(User::all());
});

Route::get('/users', function () {
    return UserResource::collection(User::all()->keyBy->id);
});

Route::get('/user/{id}', function ($id) {
    return new UserResource(User::findOrFail($id));
});


// Route::get('/dashboard', [UseradminController::class, 'dashboardview']);
Route::group(['middleware'=>'auth'], function() {
    Route::get('/dashboard',[UseradminController::class,'dashboard'])->name('home')->middleware('is_admin');

        Route::get('/dashboard',[UseradminController::class,'dashboard'])->name('home');
        Route::get('/sendemail',function(){
        // $data['email'][0]= 'syedakkealsaj2604@gmail.com';
        $data['email']='nithusugitamil@gmail.com';
        dispatch(new App\Jobs\SendEmailJob($data));
        return view('home1');
});
Route::view('/dashboard/edit','edit');

Route::get('/dashboard/{id}', [UseradminController::class,'getUserById']);
Route::put('/dashboard/{id}', [UseradminController::class,'editid']);

## Delete
Route::get('/dashboard/delete/{id}', [UseradminController::class,'destroy'])->name('users.delete');

Route::get('/signout', [UseradminController::class, 'signOut'])->name('signout');
    });


