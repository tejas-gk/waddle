<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Cache;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function status()
    {
        $users = User::all();
        return view('status', compact('users'));
    }
    //show profile
    public function profile($username)
    {
        $user = User::where('username', $username)->first();
        $posts = $user->posts()->latest()->get();
        $followers = $user->followers()->count();
        $following = $user->following()->count();
        $likes = $user->likes()->count();
        $bio = $user->bio;
        $follow = $user->followers()->where('follower_id', auth()->user()->id)->first();
        $liked = $user->likes()->where('user_id', auth()->user()->id)->first();
        return view('profile', compact('user', 'posts', 'followers', 'following', 'likes', 'bio', 'follow', 'liked'));
    }
}
