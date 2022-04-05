<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
   public function index()
   {
       return view('admin.index');
   }
   public function delete($id)
   {
       $post=Post::find($id);
       $post->delete();
       return redirect()->back();
   }
   public function createFlag($id)
   {
       $flag=Post::find($id);
       
       return redirect()->back();
   }
   
}
