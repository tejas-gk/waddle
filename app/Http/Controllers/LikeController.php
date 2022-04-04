<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request,$id){
        if($request->like="like"){
            $like=new Like;
            $like->user_id=Auth::user()->id;
            $like->post_id=$request->post_id;
            $like->like=1;
            $like->save();
            return redirect()->back();
        }
        else{
            $like=new Like;
            $like->user_id=Auth::user()->id;
            $like->post_id=$request->post_id;
            $like->like=0;
            $like->save();
            return redirect()->back();
        }
    }
    // public function like(Request $request)
    // {
    //     // $post_id = $request->input('post_id');
    //      $post_id = DB::select('select id from posts where id = ?', [$request->input('post_id')]);
    //     $is_like = $request->input('isLike') === 'true';
    //     $update = false;
    //     $post =Post::find($post_id);
    //     if (!$post) {
    //         return null;
    //     }
    //     $user = Auth::user();
    //     $like = $user->likes()->where('post_id', $post_id)->first();
    //     if ($like) {
    //         $already_like = $like->like;
    //         $update = true;
    //         if ($already_like == $is_like) {
    //             $like->delete();
    //             return null;
    //         }
    //     } else {
    //         $like = new Like();
    //     }
    //     $like->like = $is_like;
    //     $like->user_id = $user->id;
    //     $like->post_id = $post->id;
    //     if ($update) {
    //         $like->update();
    //     } else {
    //         $like->save();
    //     }
    //     return null;
    // }
    // public function follow(Request $request)
    // {
    //     $user_id = $request->input('user_id');
    //     $is_follow = $request->input('isFollow') === 'true';
    //     $user = Auth::user();
    //     $follow = $user->following()->where('following_id', $user_id)->first();
    //     if ($follow) {
    //         $already_follow = $follow->follow;
    //         if ($already_follow == $is_follow) {
    //             $follow->delete();
    //             return null;
    //         }
    //     } else {
    //         $follow = new Follow();
    //     }
    //     $follow->follow = $is_follow;
    //     $follow->user_id = $user->id;
    //     $follow->following_id = $user_id;
    //     $follow->save();
    //     return null;
    // }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLikeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLikeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLikeRequest  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLikeRequest $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
