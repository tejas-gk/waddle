 @if(!Auth::guest())
 
 <form action="{{route(
        'posts.update',
        ['id'=>$post->id]
    
 )}}" method="post">
    <input type="hidden" name="id" value="{{$post->id}}">
    <input type="text" name="post" placeholder="post a message" value="{{$post->post}}">
   
    {{csrf_field()}}
    <input type="submit" name="submit" value="submit">
    </form><br>
    <hr>
    
    {{$post->post}}
    <br>

    author is <a href="#" class="">{{$user->name}} </a>
@endif 