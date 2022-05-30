<h1>Following</h1>
@foreach($following as $follow)
    <div class="row">
        <div class="col-md-6">
            <a href="{{route('profile',$follow->username)}}">{{ $follow->name }}</a>
        </div>
    </div>
@endforeach
