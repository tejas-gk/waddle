<form action="/create-new-community" method="post" enctype="multipart/form-data" wire:submit.prevent="post">
<label for="name">communtiy name</label>
<input type="text" placeholder="name" name="name" class="name">
<label for="description">description</label>
<input type="text" placeholder="description" name="description" class="description">
<label for="summary">summary</label>
<input type="text" name="summary">
<label for="community_image">community image</label>
<input type="file" name="community_image">
{{csrf_field()}}
<button type="submit" class="submit" name="create-new-community">submit</button>
</form>
