<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post,$id)
    {
        

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
        // $post=validator(
        //     $request->all(),
        //     [
        //         'title'=>'required|min:5',
        //         'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ],
        //     [
        //         'title.required'=>'Please enter title',
        //         'title.min'=>'Title must be at least 5 characters',
        //         'image.image'=>'Please enter image',
        //         'image.mimes'=>'Please enter image',
        //         'image.max'=>'Image must be less than 2MB',
        //     ]
        // );
        // if($post->fails()){
        //     return redirect()->back()->withErrors($post)->withInput();
        // }
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

    public function profile(User $user){
       
        $user=DB::table('users')->select(array('name','id'))->where('id', '=', $user->id)->first();
        // $posts=DB::table('posts')->select(array('post','id','image','slug','created_at'))->where('user_id', '=', $user->id)->get();
        $posts='hey';

        return view('users.profile', compact('user'));
    }
   
}
