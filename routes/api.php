<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiPostController;
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
Route::controller(ApiPostController::class)->group(function(){
    Route::get('/posts','apiindex')->name('posts.index');
    Route::post('/create','create')->name('posts.create')->middleware('only-auth');
    Route::post('/store','store')->name('posts.store')->middleware('only-auth');
    Route::get('/posts/{id}','show')->name('posts.show');
    Route::get('/posts/{id}/edit','edit')->name('posts.edit')->middleware('only-auth');
    Route::post('/posts/{id}/update','update')->name('posts.update')->middleware('only-auth');
    Route::get('/posts/{id}/delete','delete')->name('posts.delete')->middleware('only-auth');
});
