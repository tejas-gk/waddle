<h1>posts</h1>
<a href="/">home</a>
@if(!Auth::guest())
<form action="/store" method="post" enctype="multipart/form-data" wire:submit.prevent="post">
    <textarea type="text" name="post" placeholder="post a post" autofocus style="resize:none;"></textarea><br>
    <input type="file" name="postImage" id="postImage">
    {{csrf_field()}}
    <input type="submit" name="submit" value="submit">
</form>
@endif

@if($posts->count()>0)
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
    {{ $posts->links() }}
</ul>
@endif
@can('isAdmin')
admin
@endcan


@can('isPrivate')
view
@endcan



<link rel="stylesheet" href="{{asset('css/profile.scss')}}">


<style>
    ul.pagination {

list-style-type:none;

margin:0;

padding:0;

text-align:left;

}



ul.pagination li {

display:inline;

padding:2px 5px 0;

text-align:left;

}



ul.pagination li a {

padding:2px;

}

.postImage{
    width:100px;
    height:100px;
}
</style>

