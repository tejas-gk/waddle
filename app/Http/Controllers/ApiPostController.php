<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiPostController extends Controller
{
   
       
    public function index()
    {
        $posts=Post::orderBy('id','DESC')->paginate(5);
        $user=User::select('name')->get(); 
        return response()->json(['posts'=>$posts,'user'=>$user]);
    } 
    public function create()
    {
        return response()->json(['message'=>'success']);
    }
    public function store(Request $request)
    {
        $post=new Post;
       
        $post->post=$request->post;
        $str=Str::random(10).time();
        $post->slug=Str::slug($request->post).$str;
        
        $post->user_id=Auth::user()->id;
        if($request->hasFile('image')){
            $image=$request->file('image');
            $image_name=time().'.'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/images');
            $image->move($destinationPath,$image_name);
            $post->image=$image_name;
        }

        $post->save();
        return redirect('/posts');
    }
    public function show(Post $post, $id)
    {
        

        $post=Post::find($id);
        $user=User::select(
            'name',
        )->get(); 
        return response()->json(['post'=>$post,'user'=>$user]);
    }
}
