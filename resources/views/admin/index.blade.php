<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>username</th>
            <th>phone no</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->phone_no}}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            <td>
                {{-- <a href="{{ route('admin.users.edit', $user->id) }}">Edit</a>--}}
                {{-- <a href="{{ route('admin.users.delete', $user->username) }}">Delete</a>  --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<style>
    table, th, td {
  border: 1px solid black;
}
</style>