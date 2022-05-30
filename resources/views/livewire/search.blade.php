<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <input type="text" wire:model="searchTerm" />   
    <button wire:click="search">Search</button>
    <div>
        <ul>
            @foreach($posts as $post)
             
             <li><a href="{{route('posts.show',[
                 'id'=>$post->id
             ])}}">{{$post->post}}</a>
              
                 @if(Auth::id()== $post->user_id && !Auth::guest())
                 |<a href="{{url('/posts/'.$post->id.'/delete/')}}" >delete</a>|
                 <a href="{{url('/posts/'.$post->id.'/edit/')}}">edit</a>|
                 
                 {{-- <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> | --}}
         
             @endif
             @if($post->image!=null)
             <img src="{{ asset('storage/posts/'.$post->image) }}" alt="job image" title="job image" class="postImage">
             @endif
             <br>{{$post->created_at->diffForHumans()}}</li>
            
             
         </li>
             <hr>
             @endforeach
             {{-- {{ $posts->links() }} --}}
         </ul>
    </div>

</div>

