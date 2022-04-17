<h1>followers</h1>
{{-- {{$user->followers()->count()}} --}}
{{-- {{$getFollowerCount}} --}}
@foreach ($followers_user as $follower)
    <div class="row">
        <div class="col-md-6">
            <a href="{{route('users.show', $follower->id)}}">
                <img src="{{$follower->avatar}}" alt="{{$follower->name}}" class="img-thumbnail" style="width:100px;height:100px;">
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{route('users.show', $follower->id)}}">
                <h4>{{$follower->name}}</h4>
            </a>
        </div>
    </div>
@endforeach

