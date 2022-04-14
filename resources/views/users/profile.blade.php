{{-- {{banner}} --}}
@if(Cache::has('is_online' . $user->id))
<span class="text-success" style="color: green">Online</span>
@else
<span class="text-secondary" style="color:red">Offline</span>
@endif


{{$user->name}}

@if($user->bio!=null)
<p>{{$user->bio}}</p>
@else
<p>No bio</p>
@endif
<div class="bio">
@if(!Auth::guest() && Auth::user()->id == $user->id)
    <form action="/bio" method="post">
        <input type="text" placeholder="bio" name="bio">
        {{csrf_field()}}
        
        <button type="submit" class="submitBio">submit</button>
    </form>
    
    @elseif(!Auth::guest() && Auth::user()->id != $user->id)
    <a href="#">follow</a>
    @endif
</div>
    
    <br>
    <a href="#">followers</a>
    <a href="#">following</a>
    <hr><hr>
    <br>
    @foreach($posts as $post)
    <b>
        {{$post->post}}</b>|
        <a href="/upvote/{{$post->slug}}" class="upvote" name="upvote">upvote[+]</a>
        <br>
        {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
        
        <hr>
        @endforeach 
@if($user->profile_photo_path!=NULL)        
<img src="{{asset('/storage/'.$user->profile_photo_path)}}" width="100" height="100" style="border-radius: 50%">

@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    $('.bio').ready(function(){
        $('.submitBio').click(function(e){
            e.preventDefault();
            var bio = $('input[name=bio]').val();
            var username = $('input[name=username]').val();
            var token=$('input[name=_token]').val();
            $.ajax({
                type: 'POST',
                url: '/bio',
            
                data: {
                    '_token': token,
                    'bio': bio,
                    'username': username
                },
                success: function(data){
                   console.log(data.success);
                }
            });
        });
    });
  

</script>