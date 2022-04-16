{{-- {{banner}} --}}
@if(Cache::has('is_online' . $user->id))
<span class="text-success" style="color: green">Online</span>
@else
<span class="text-secondary" style="color:red">Offline</span>
@endif


{{$user->name}}
{{$user->id}}
@if($user->bio!=null)
<p>{{$user->bio}}</p>
@else
<p>No bio</p>
@endif


@if(!Auth::guest() && Auth::user()->id == $user->id)
    <form action="/bio" method="post" class="bio">
        <label for="bio">bio</label>
        <input type="text" placeholder="bio" name="bio">
        {{csrf_field()}}
        
        <button type="submit" class="submitBio">submit</button>
    </form>
    
    @elseif(!Auth::guest() && Auth::user()->id != $user->id)
    <form action="{{route('follow',['id'=>$user->id])}}" method="post">
        {{csrf_field()}}
        <button type="submit" class="follow">follow</button>
    </form>
    @endif

    
    <br>
    <a href="#">followers</a>
    <a href="#">following</a>
    <hr><hr>
    <br>
    @foreach($posts as $post)
    <b>
        {{$post->post}}</b>|
        <br>
        {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
        
        <hr>
        @endforeach 
@if($user->profile_photo_path!=NULL)        
<img src="{{asset('/storage/'.$user->profile_photo_path)}}" width="100" height="100" style="border-radius: 50%">

@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">


</script>