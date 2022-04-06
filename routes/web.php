<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\AdminController;
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

Route::get('/profile/{user}',[PostController::class,'profile'])->name('profile');# in this parameter is username of user
Route::post('/like',[LikeController::class,'like'])->name('like');
Route::post('/bio',[PostController::class,'AddBio'])->name('bio');
Route::get('/followers',function(){
    return view('followers');
})->name('followers');

Route::get('/admin/index',[AdminController::class,'index'])->name('admin.index');

Route::get('/status', [ProfileController::class, 'status'])->name('status');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



// later change this to a separate file called routes/admin.php

