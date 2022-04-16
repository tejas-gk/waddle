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
             $getUser=$user->where('username',$request->username)->first();
             $isFollowing=$follow->where('user_id',Auth::user()->id)->where('follow_id',$getUser)->first(); 
             $followId=User::select('id')->where('username',$request->username)->first();
            if($isFollowing){
              $follow->where('user_id',Auth::user()->id)->where('follow_id',$getUser)->delete();
              return redirect()->back();
            }
            $follow=Follow::create(
            [
                'user_id'=>Auth::user()->id,
                'follow_id'=>$followId,
            #bug:- follow id not getting inputted

            ],
          );      
             $follow->save();
             return redirect()->back();
      }
}
