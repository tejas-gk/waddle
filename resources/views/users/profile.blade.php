{{-- {{banner}} --}}
{{$user->username}}
@if(Cache::has('is_online' . $user->id))
<span class="text-success" style="color: green">Online</span>
@else
<span class="text-secondary" style="color:red">Offline</span>
@endif


{{$user->name}}<br>
reputation:{{$user->reputation}}
@if($user->bio!=null)
<p>{{$user->bio}}</p>
@else
<p>No bio</p>
@endif
joined at  {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}

@if(!Auth::guest() && Auth::user()->id == $user->id)
    <form action="/bio" method="post" class="bio">
        <label for="bio">bio</label>
        <input type="text" placeholder="bio" name="bio" class="bio">
        {{csrf_field()}}
        
        <button type="submit" class="submitBio">submit</button>
    </form>
    
    @elseif(!Auth::guest() && Auth::user()->id != $user->id)
    <form action="{{route('follow',['id'=>$user->id])}}" method="post">
        {{csrf_field()}}
        <button type="submit" class="follow color-white" name="follow">follow</button>
    </form>
    @endif

    
    <br>
    <a href="{{route('followers',$user->username)}}">followers</a>
    <a href="{{route('following',$user->username)}}">following</a>
    <hr><hr>
    <br>
    {{-- @if($user->id==$posts->user_id)
    <x-posts/>
    @endif --}}
    @foreach($posts as $post)
    <b>
        {{$post->post}}</b>|
        <br>
        {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
        @if($post->image!=null)
        <img src="{{ asset('storage/posts/'.$post->image) }}" alt="job image" title="job image" class="postImage">
        @endif
        <hr>
        @endforeach 
@if($user->profile_photo_path!=NULL)        
<img src="{{asset('/storage/'.$user->profile_photo_path)}}" width="100" height="100" style="border-radius: 50%">

@endif

<link rel="stylesheet" href="{{asset('css/profile.scss')}}">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    var routes='{{route('follow',['id'=>$user->id])}}';
    var token='{{csrf_token()}}';
    var ifClicked='button[name="follow"]';


 $(document).ready(function() {
        $('button[name="follow"]').click(function(e) {
            e.preventDefault();
         
            $.ajax({
                url:routes,
                method: 'post',
                data: {
                    _token: $('input[name="_token"]').val()
                },
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











