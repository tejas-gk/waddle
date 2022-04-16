<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Flag;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
   public function index()
   {
         $posts = Post::all();
            $users = User::all();
            return view('admin.index',compact('posts','users'));
      
   }
   public function userposts(){
            $posts = Post::all();
            $flag=Flag::all();
            $users = User::all();
            return view('admin.userposts',compact('posts','users','flag'));
   }
   public function delete($id)
   {
         $post = Post::find($id);
         $post->delete();
         return redirect()->route('posts.index');
   }
   public function createFlag($id)
   {
       $flag=Post::find($id);
       
       return redirect()->back();
   }
   
}
