<?php namespace App\Models;

class PostsViews extends \Eloquent {

    protected $table = 'posts_views';

    public static function createViewLog($post) {
            $postsViews= new PostsViews();
            $postsViews->id_post = $post->id;
            $postsViews->titleslug = $post->titleslug;
            $postsViews->url = \Request::url();
            $postsViews->session_id = \Request::getSession()->getId();
            $postsViews->user_id = \Auth::user()->id;
            $postsViews->ip = \Request::getClientIp();
            $postsViews->agent = \Request::header('User-Agent');
            $postsViews->save();
    }

}