<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
Use Sentiment\Analyzer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\ApiPostController;
use PhpParser\Node\Identifier;

class PostController extends Controller
{

   
    public $post_type='user';
    public function post_id(){
        return $post_id=Auth::user()->id;
    }//if I return this normally it gives me error
    
    public function index()
    {   
        
        $posts=Post::orderBy('id','DESC')->where(
            'postable_type','user'

        )->paginate(5);
        $user=User::select('name')->get();
        if(url()->current()==url('/posts'))
        return view('posts.index',compact('posts','user'));
        else  if(url()->current()==url('api/posts/'))
        return response()->json(['user'=>$user,'posts'=>$posts]);
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
        $analyzer = new Analyzer(); 
        $post->post=$request->post;
        $str=Str::random(5).time();
        $post->slug=Str::slug($request->post).$str;
        $post->postable_type=$this->post_type;
        $post->postable_id=$this->post_id();
        $post->user_id=Auth::user()->id;
        if($request->hasFile('postImage')){
            $image=$request->file('postImage');
            $image_name=time().'.'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/storage/posts');
            $image->move($destinationPath,$image_name);
            $post->image=$image_name;
        }
        $output_text = $analyzer->getSentiment($post->post);
        $post->pos=$output_text['pos'];
        $post->neg=$output_text['neg'];
        $post->net=$output_text['neu'];
        if($post->post!=null ||$post->image!=null)
        $post->save();
        if(url()->current()==url('/store'))
        return redirect('/posts');
        if(url()->current()==url('api/posts/store'))
        return response()->json(['post'=>$post]);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    
    public function show(Post $post, $id)
    {
        $post=Post::find($id);
        $user=User::find($post->user_id);
        if(url()->current()==url('/posts/'.$post->id))
            return view('posts.show',compact('post','user'));
        else if(url()->current()==url('/api/posts/'.$post->id.'/edit'))
            return response()->json(['post'=>$post,'user'=>$user]);
        
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
        Post::find($id)->delete();
        return redirect('/posts');
    }
    
    public function restore($id)
    {
        Post::withTrashed()->find($id)->restore();
  
        return redirect()->back();
    }  
    public function restoreAll()
    {
        Post::onlyTrashed()->restore();
  
        return redirect()->back();
    }
    public function onlyDeleted(Request $request)
    {
        if ($request->has('trashed')) {
            $posts = Post::onlyTrashed()
                ->get();
        } else {
            $posts = Post::get();
        }

        return view('posts', compact('posts'));
    }

   
}
