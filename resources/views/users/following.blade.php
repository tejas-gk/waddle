<h1>Following</h1>
@foreach($following as $follow)
    <div class="row">
        <div class="col-md-6">
         {{ $follow->name }}
        </div>
    </div>
@endforeach
