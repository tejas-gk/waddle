{{$post->post}}<hr>
<a href="{{route('profile', ['user' => $post->user->username])}}">{{$post->user->name}}</a>

<form action="{{route('upvote', ['slug' => $post->slug])}}" method="post">
    @csrf
    <button type="submit" name="upvote">upvote</button>{{count(array($post->upvotes))}}
</form>
<form action="{{route('downvote', ['slug' => $post->slug])}}" method="post">
    @csrf
    <button type="submit" name="downvote">downvote</button>{{count(array($post->upvotes))}}
</form>
























<link rel="stylesheet" href="{{asset('css/profile.scss')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('button[name="upvote"]').click(function(e) {
            e.preventDefault();
         
            $.ajax({
                url:'{{route('upvote', ['slug' => $post->slug])}}',
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

        $('button[name="downvote"]').click(function(e) {
            e.preventDefault();
         
            $.ajax({
                url:'{{route('downvote', ['slug' => $post->slug])}}',
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




