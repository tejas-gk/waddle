<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\community\CommunityController;
use App\Http\Controllers\community\postsController;

// Route::view('/c','community.community');
Route::view('/{community:community_name}',[CommunityController::class,'community']);
Route::view('/create-community', 'community.create-communtiy')->middleware('only-auth');
Route::post('/create-new-community',[CommunityController::class,'createNewCommunity'])->middleware('auth');
Route::resource('community', postsController::class);
Route::view('ind','community.community-posts.index');
Route::post('/store-post',[postsController::class,'store'])->middleware('auth');
Route::get('/index',[postsController::class,'index'])->middleware('auth');