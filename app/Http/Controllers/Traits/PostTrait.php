<?php
namespace App\Http\Controllers\Traits;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
Use Sentiment\Analyzer;
trait PostTrait{
    public function post_id(){
        return $post_id=Auth::user()->id;
    }//if I return this normally it gives me error
    public static function s(Post $post, $id)
    {
        $post=Post::find($id);
        $user=User::select(
            'name',
        )->get(); 
        // return response()->json(['post'=>$post,'user'=>$user]);        
    }
    public function index()
    {   
        
        $posts=Post::orderBy('id','DESC')->where(
            'postable_type','user'
    
        )->paginate(5);
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
        $analyzer = new Analyzer(); 
        $post->post=$request->post;
        $str=Str::random(5).time();
        $post->slug=Str::slug($request->post).$str;
        $post->postable_type=$this->post_type;
        $post->postable_id=$this->post_id();
        $post->save();
        return redirect('/posts');
    }
}