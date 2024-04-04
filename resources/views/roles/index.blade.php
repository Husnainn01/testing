@extends('admin.app_admin')
@section('admin_content')
    <div class="container">
        <h2>Roles</h2>
        <a href="{{ route('roles.create') }}" class="btn btn-primary mb-2">Create Role</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning btn-sm">Edit</a>
                            @if( $role->name !== "admin" )
                                <form method="post" action="{{ route('roles.destroy', $role) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
                                </form>
                            @endif
                            <!-- <a href="{{ route('roles.permissions', $role) }}" class="btn btn-info btn-sm">Manage Permissions</a> -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
