{{-- {{banner}} --}}

<form action="" enctype="multipart/form-data">
    <input type="file" name="" id="" alt="banner">
</form>
{{$user->name}}
<img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
@if($user->bio!=null)
    <p>{{$user->bio}}</p>
@else
    <p>No bio</p>
    @endif
    <input type="text" placeholder="bio" name="bio">
    <button type="submit">submit</button>
@if(Auth::user()->id == $user->id)
    {{-- <a href="{{route('profile.edit')}}">Edit Profile</a> --}}

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
{{-- @if(Auth::id()== $post->user_id && !Auth::guest())
|<a href="{{url('/posts/'.$post->id.'/delete/')}}" >delete</a>|
<a href="{{url('/posts/'.$post->id.'/edit/')}}">edit</a>|

{{-- <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Lik' : 'Like'  }}</a> | --}}
{{-- <a href="{{url('/like/'.$post->id)}}" name="like">like</a>
@endif --}} 

<hr>
@endforeach 