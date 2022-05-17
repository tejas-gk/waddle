<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\community\CommunityController;
Route::view('/c','community.community');
Route::resource('community', CommunityController::class);