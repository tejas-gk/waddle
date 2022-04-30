<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FollowController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoteController;
use App\Models\User;

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



Route::view('/', 'welcome');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//crud of post
Route::controller(PostController::class)->group(function(){
    Route::get('/posts','index')->name('posts.index');
    Route::post('/create','create')->name('posts.create')->middleware('only-auth');
    Route::post('/store','store')->name('posts.store')->middleware('only-auth');
    Route::get('/posts/{id}','show')->name('posts.show');
    Route::get('/posts/{id}/edit','edit')->name('posts.edit')->middleware('only-auth');
    Route::post('/posts/{id}/update','update')->name('posts.update')->middleware('only-auth');
    Route::get('/posts/{id}/delete','delete')->name('posts.delete')->middleware('only-auth');

});
/**
 * user timeline
 * 
 */
Route::controller(ProfileController::class)->group(function(){
    Route::get('/profile/{user:username}','profile')->name('profile');
    Route::get('/status','status')->name('status');
    Route::post('/like/{id}','like')->name('like')->middleware('only-auth');
    Route::post('/bio','AddBio')->name('AddBio')->middleware('only-auth');
    
});
Route::post('/follow/{id}',[FollowController::class,'follow'])->name('follow')->middleware('only-auth');
Route::get('/followers/{user:username}',[FollowController::class,'followers'])->name('followers');
Route::get('/following/{user:username}',[FollowController::class,'following'])->name('following');
Route::middleware('only-auth')->controller(VoteController::class)->group(function(){
    Route::post('/upvote/{slug:slug}','vote')->name('upvote');
    Route::post('/downvote/{slug:slug}','downvote')->name('downvote');
});


//admin routes
Route::middleware('is-admin')->prefix('admin')->group(function () {
    Route::controller(AdminController::class)->group(function(){
        Route::get('/index','index')->name('index');
        Route::delete('users/{username:username}','delete')->name('users.delete');
        Route::get('/userposts','userposts')->name('userposts');
    });

    
});

 

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

