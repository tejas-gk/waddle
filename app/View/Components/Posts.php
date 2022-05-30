<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Post;
use App\Models\User;
class Posts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $posts=Post::orderBy('id','DESC')->paginate(5);
        $user=User::select('name')->get(); 
        return view('components.posts',compact('posts','user'));
    }
}
