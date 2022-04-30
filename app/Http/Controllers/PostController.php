<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PostController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('view:create,App\Models\Post')->only(['create', 'store']);
    // }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        $posts=Post::orderBy('id','DESC')->paginate(5);
        $user=User::select('name')->get(); 
       
        return view('posts.index',compact('posts','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=new Post;
       
        $post->post=$request->post;
        $str=Str::random(5).time();
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    
    public function show(Post $post, $id)
    {
        // if(Gate::allows('isAdmin')){
        //     dd('post');
        // }
        // $this->authorize('isPrivate');
    //    dd('hey');
        $post=Post::find($id);
        $user=User::select(
            'name',
        )->get(); 
        return view('posts.show',compact('post','user'));
    }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post,$id)
    {
        $post= Post::find($id);
        $user=User::find(auth()->user()->id);
        if (Auth::user()->id==Post::find($id)->user->id)
            return view('posts.edit')->with(compact('post','user'));
        else 
            return redirect('/posts');
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post,$id)
    {
        $post=Post::find($id);
        $post->post=$request->post;
      
        if($request->hasFile('image')){
            $image=$request->file('image');
            $image_name=time().'.'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/images');
            $image->move($destinationPath,$image_name);
            $post->image=$image_name;
        }
        $post->user_id=Auth::user()->id;
        
        $post->save();
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::table('posts')->where('id',$id)->delete();
        return redirect('/posts');
    }
    // from here transfer to profilecontroller

   
}
