<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
  
      public function follow(Request $request){
             $follow = new Follow;
             $user=new User;
             $getUserId=$user->where('id',$request->id)->first();
             $isFollowing=$follow->where('user_id',Auth::user()->id)->where('follow_id',$getUserId->id)->first(); 
            
            if($isFollowing){
              $follow->where('user_id',Auth::user()->id)->where('follow_id',$getUserId->id)->delete();
              return redirect()->back();
            }
            $follow=Follow::create(
            [
                'user_id'=>Auth::user()->id,
                'follow_id'=>$getUserId->id,
             
            ],
          );      
             $follow->save();
             return redirect()->back();
      }

      public function followers(User $user){# I clearly have a lot to learn
        $followers=$user->followers()->get();
        return view('users.followers',compact('followers','user'));
      }
      public function following(User $user){# I clearly have a lot to learn
        $following=$user->following()->get();
        return view('users.following',compact('following','user'));
      }
}
