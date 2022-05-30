<form action="/create-new-community" method="post">
    {{csrf_field()}}
<div class="form-group">
    <label for="community-name">Community Name</label>
    <input type="text" class="form-control" id="community-name" name="community_name" placeholder="Enter community name">
</div>
<div class="form-group">
    <label for="community-description">Community Description</label>
    <textarea class="form-control" id="community-description" name="community_description" rows="3"></textarea>
</div>
<button type="submit" class="btn btn-primary">Create Community</button>
</form>