<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\community\CommunityController;
use App\Http\Controllers\community\postsController;

// Route::view('/c','community.community');
Route::view('/{community:community_name}',[CommunityController::class,'community']);
Route::post('/create-new-community',[CommunityController::class,'createNewCommunity'])->middleware('auth');
Route::resource('community', postsController::class);
Route::get('/community',[CommunityController::class,'community'])->name('community');