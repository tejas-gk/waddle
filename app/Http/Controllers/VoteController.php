<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;


class VoteController extends Controller
{
  public function ifOtherVoteIsClicked(Request $request)
  {
    $post = Post::find($request->post_id);
    $user = Auth::user();
    $vote = Vote::where('user_id',$user->id)->where('post_id',$post->id)->first();
    if($vote)
    {
      if($vote->upvote == 1)
      {
        $vote->upvote = 0;
        $vote->save();
      }
      else if($vote->downvote == 1)
      {
        $vote->downvote = 0;
        $vote->save();
      }
    }
    else
    {
      $vote = new Vote;
      $vote->user_id = $user->id;
      $vote->post_id = $post->id;
      $vote->upvote = 1;
      $vote->save();
    }
    return redirect()->back();
  }
   
  
    
   public function vote(Request $request){
       $vote=new Vote();
       $getPosts=Post::where('slug',$request->slug)->first()->id;
       $isUpvoted=$vote->where('user_id',Auth::user()->id)->where('post_id',$getPosts)->first();
         if($isUpvoted){
              $vote->where('user_id',Auth::user()->id)->where('post_id',$getPosts)->delete();
              return redirect()->back();
         }
         
          
       $vote=Vote::create(
            [
                'user_id'=>Auth::user()->id,
                'post_id'=>$getPosts,
                'upvote'=>1

            ],
          );  
            
         $vote->save();
         return redirect()->back();
      }

      public function downvote(Request $request){
        $vote=new Vote();
        $getPosts=Post::where('slug',$request->slug)->first()->id;
        $isDownvoted=$vote->where('user_id',Auth::user()->id)->where('post_id',$getPosts)->first();
          if($isDownvoted){
               $vote->where('user_id',Auth::user()->id)->where('post_id',$getPosts)->delete();
               return redirect()->back();
          }
        $vote=Vote::create(
             [
                 'user_id'=>Auth::user()->id,
                 'post_id'=>$getPosts,
                 'downvote'=>1

             ],
           );      
          $vote->save();
          return redirect()->back();
       }
       



}


