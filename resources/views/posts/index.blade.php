<h1>posts</h1>
<a href="/">home</a>
@if(!Auth::guest())
<form action="/store" method="post">
    <textarea type="text" name="post" placeholder="post a post" autofocus style="resize:none;"></textarea><br>
    
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
        |<a href="{{url('/posts/'.$post->id.'/delete/')}}" >delete</a>|
        <a href="{{url('/posts/'.$post->id.'/edit/')}}">edit</a>|
        
        {{-- <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> | --}}

    @endif
    
    <br>{{$post->created_at->diffForHumans()}}</li>
    
    
</li>
    <hr>
    @endforeach
    {{ $posts->links() }}
</ul>

@can('isAdmin')
admin
@endcan

@can(['can-delete','can-force-delete'],$post)
hey
@endcan
<link rel="stylesheet" href="{{asset('css/profile.scss')}}">
@can('isPrivate')
    view
@endcan




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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    var routes='{{route('posts.show',['id'=>$post->id])}}';
    var token='{{csrf_token()}}';


 $(document).ready(function() {
     
    $('button[name="submit"]').click(function(e) {
            e.preventDefault();
            $.ajax({
                url:routes,
                method: 'get',
                datatype: 'jsonp',
                success: function(data) {
                    console.log(data.success);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    });


</script>
