<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::controller(PostController::class)->group(function(){
    Route::get('/posts','index')->name('posts.index');
    Route::post('/create','create')->name('posts.create')->middleware('only-auth');
    Route::post('/store','store')->name('posts.store')->middleware('only-auth');
    Route::get('/posts/{id}','show')->name('posts.show');
    Route::get('/posts/{id}/edit','edit')->name('posts.edit')->middleware('only-auth');
    Route::post('/posts/{id}/update','update')->name('posts.update')->middleware('only-auth');
    Route::get('/posts/{id}/delete','delete')->name('posts.delete')->middleware('only-auth');

});

Route::get('/profile/{user}',[PostController::class,'profile'])->name('profile');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
