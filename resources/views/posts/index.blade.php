<h1>posts</h1>
@livewireScripts
@livewireStyles
<a href="/">home</a>
@if(!Auth::guest())
<form action="/store" method="post" enctype="multipart/form-data" wire:submit.prevent="post">
    <textarea type="text" name="post" placeholder="post a post" autofocus style="resize:none;"></textarea><br>
    <input type="file" name="postImage" id="postImage">
    {{csrf_field()}}
    <input type="submit" name="submit" value="submit">
</form>
@endif

@if($posts->count()>0)
<livewire:search />
{{-- <x-posts/> --}}
@endif
@can('isAdmin')
admin
@endcan


@can('isPrivate')
view
@endcan



<link rel="stylesheet" href="{{asset('css/profile.scss')}}">


<style>
    ul.pagination {

list-style-type:none;

margin:0;

padding:0;

text-align:left;

}



ul.pagination li {

display:inline;

padding:2px 5px 0;

text-align:left;

}



ul.pagination li a {

padding:2px;

}

.postImage{
    width:100px;
    height:100px;
}
</style>

