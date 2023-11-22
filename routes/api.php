<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register',[ApiController::class,'register']);
Route::post('/login',[ApiController::class,'login']);

Route::middleware(['auth:api'])->group(function () {
Route::resource('users', ApiController::class);
Route::post('/users/update/{id}', [ApiController::class, 'update']);
});


// Route::middleware(['auth:api'])->group(function () {
//     Route::get('/user',[ApiController::class,'details']);
//     Route::post('/profileupdate',[ApiController::class,'profile_update']);
//     Route::post('/profile/changepassword',[ApiController::class,'changePassword']);
//     Route::prefix('articles')->group(function () {
//         Route::post('/create', [ApiController::class,'createArticle']);
//         Route::get('/show', [ApiController::class,'getAllArticles']);
//         Route::get('/show/{id}',[ApiController::class,'getArticle']);
//         Route::put('/update/{id}', [ApiController::class,'updateArticle']);
//         Route::delete('/delete{id}', [ApiController::class,'deleteArticle']);
// });
//  });