<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function status()
    {
        $users = User::all();
        return view('status', compact('users'));
    }

    //show profile
    
    public function profile(User $user){
       
        $user=DB::table('users')->select(array('name','id','bio','profile_photo_path','created_at','username','reputation'))->where('id', '=', $user->id)->first();
        
        $posts=DB::table('posts')->select(array('post','id','image','slug','created_at','user_id','updated_at'))->where('user_id', '=', $user->id)->get();
        

        return view('users.profile', compact('user','posts'));
    }
    // public function like(Post $post){
    //     $post->like()->toggle(Auth::user()->id);
    //     return back();
        
    // }
    public function AddBio(Request $request){
        $user=User::find(Auth::user()->id);
        $user->bio=$request->bio;
        $user->save();
        return redirect()->back();
    }

    
    
}
