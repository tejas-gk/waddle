
{{$user->name}}
@if(Auth::user()->id == $user->id && !Auth::guest())
<a href="#">edit profile</a>
@else
<a href="#">follow</a>
@endif
<br>
<a href="#">followers</a>
<a href="#">following</a>
<hr><hr>
<br>
@foreach($posts as $post)
<b>
{{$post->post}}</b>

@include('layouts.posts')
<hr>
@endforeach 