<table>
    <thead>
        <tr>
            <th>post</th>
            <th>user</th>
            <th>slug</th>
            <th>flag</th>
            <th>created at</th>
            <th>updated at</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->post }}</td>
            <td>{{ $post->user->name }}</td>
            <td>{{ $post->slug }}</td>
            <td></td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->updated_at }}</td>
            <td>
                {{-- <a href="{{ route('admin.users.edit', $user->id) }}">Edit</a>--}}
                {{-- <a href="{{ route('admin.users.delete', $user->username) }}">Delete</a>  --}}
            </td>
        </tr>
        @endforeach
</table>

<style>
    table, th, td {
  border: 1px solid black;
}
</style>