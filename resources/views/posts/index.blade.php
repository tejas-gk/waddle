<h1>posts</h1>
<a href="/">home</a>
@if(!Auth::guest())
<form action="/store" method="post">
<input type="text" name="post" placeholder="post a post"><br>

{{csrf_field()}}
<input type="submit" name="submit" value="submit">
</form>
@endif
<ul>
   @foreach($posts as $post)
   
    <li><a href="{{route('posts.show',[
        'id'=>$post->id
    ])}}">{{$post->post}}</a>
     
        @if(Auth::id()== $post->user_id && !Auth::guest())
        |<a href="{{url('/posts/'.$post->id.'/delete/')}}">delete</a>|
        <a href="{{url('/posts/'.$post->id.'/edit/')}}">edit</a>|
        {{-- @include('layouts.timeline') --}}
        {{-- <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Lik' : 'Like'  }}</a> | --}}
    <br>{{$post->created_at->diffForHumans()}}</li>
    @else
    <br>{{$post->created_at->diffForHumans()}}</li>
    @endif
   
    <hr>
    @endforeach
    {{ $posts->links() }}
</ul>

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

</style>