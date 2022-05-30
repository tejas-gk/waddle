<h1>community</h1>
<a href="/">home</a>
@if(!Auth::guest())
<form action="{{route('community.store')}}" method="post" enctype="multipart/form-data" wire:submit.prevent="post">
    <textarea type="text" name="post" placeholder="post a post" autofocus style="resize:none;"></textarea><br>
    <input type="file" name="postImage" id="postImage">
    {{csrf_field()}}
    <select name="communityName" id="">
        @foreach($communities as $community)
        <option value="{{$community->id}}">{{$community->community_name}}</option>
        @endforeach
    </select>
    <input type="submit" name="submit" value="submit">
</form>
@endif
