<h1>followers</h1>
@foreach($followers as $follower)
    <div class="row">
        <div class="col-md-6">
        <a href="{{route('profile', $follower->username)}}"> {{ $follower->name }}</a>
        </div>
    </div>
@endforeach


