@extends('admin.app_admin')
@section('admin_content')
    <div class="container">
        <h2>Permissions</h2>
        <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-2">Create Permission</a>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form method="post" action="{{ route('permissions.destroy', $permission) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this permission?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
