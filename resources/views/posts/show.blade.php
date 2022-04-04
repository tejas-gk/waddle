{{$post->post}}<hr>
<a href="{{route('profile', ['user' => $post->user->username])}}">{{$post->user->name}}</a>
