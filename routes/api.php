<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiPostController;
use App\Http\Controllers\Auth\LoginLogoutController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::controller(ApiPostController::class)->group(function(){
//     Route::get('/posts','index')->name('posts.index');
//     Route::get('/create','create')->name('posts.create')->middleware('auth:sanctum');
//     Route::post('/store','store')->name('posts.store')->middleware('auth:sanctum');
//     Route::get('/posts/{id}','show')->name('posts.show');
//     Route::get('/posts/{id}/edit','edit')->name('posts.edit')->middleware('auth:sanctum');
//     Route::put('/posts/{id}/update','update')->name('posts.update')->middleware('auth:sanctum');
//     Route::delete('/posts/{id}/delete','destroy')->name('posts.delete')->middleware('auth:sanctum');
//     Route::post('/posts/{id}/restore','restore')->name('posts.restore')->middleware('auth:sanctum');
//     Route::post('/posts/{id}/delete-permanent','forceDelete')->name('posts.delete-permanent')->middleware('auth:sanctum');
//     Route::get('posts/only-deleted','onlyDeleted')->name('posts.only-deleted')->middleware('auth:sanctum');
//     Route::post('/posts/search/{','search')->name('posts.search')->middleware('auth:sanctum');
// });


use App\Http\Controllers\Auth\RegisterController;


Route::get('/register', [RegisterController::class, 'reg'])
->name('api-register');


Route::post('/register', [RegisterController::class, 'registerUser'])
->name('api-register-user');
Route::post('/login', [LoginLogoutController::class, 'loginUser'])
->name('api-login-user');
Route::post('/logout', [LoginLogoutController::class, 'logoutUser'])->name('api-logout')->middleware('auth:sanctum');