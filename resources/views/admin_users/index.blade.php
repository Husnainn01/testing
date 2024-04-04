@extends('admin.app_admin')
@section('admin_content')
    <div class="container">
        <h2>Admin Users List</h2>
        <a href="{{ route('admin_users.create') }}" class="btn btn-primary mb-2">Create Admin User</a>
        
        <!-- Display the list of admin users here -->
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->status }}</td>
                        <td>
                            @foreach ($admin->roles as $role)
                                {{ $role->name }}@if (!$loop->last), @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('admin_users.show', ['id' => $admin->id]) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('admin_users.edit', ['id' => $admin->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                            @if( !$admin->hasRole('admin') )
                                <form method="POST" action="{{ route('admin_users.destroy', ['id' => $admin->id]) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this admin user?')">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
