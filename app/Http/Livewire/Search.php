<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
class Search extends Component
{
    public $searchTerm;
    public $posts;


    public function render()
    {
        $this->posts = Post::where('post', 'like', '%' . $this->searchTerm . '%')->get();
        return view('livewire.search');
    }
    
}
