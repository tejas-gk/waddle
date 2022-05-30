<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Analytic;
use App\Models\Post;
class AnalyticsController extends Controller
{
    public function showpost($slug)
{
    $post_views = Analytic::where('slug', '=' ,$slug)->firstOrFail();

    Analytic::createViewLog($post_views);//or add `use App\Analytic;` in beginning of the file in order to use only `Analytic` here 

    return view('posts.show', compact('post_views'));
}
public function chart(){
    $post =new Post;
    $post_chart=$post->created_at;
    foreach($post_chart as $post_chart){
        $post_chart->created_at;
    }
    return view('posts.show', compact('post_chart'));
}
}
