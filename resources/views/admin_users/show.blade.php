@extends('admin.app_admin')

@section('admin_content')
    <div class="container">
        <h1>Admin User Details</h1>

        <!-- Display admin user details here -->
        <ul class="list-group">
            <li class="list-group-item"><strong>Name:</strong> {{ $admin->name }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $admin->email }}</li>
            <li class="list-group-item"><strong>Status:</strong> {{ $admin->status }}</li>
            <!-- Add more details as needed -->
        </ul>

        <a href="{{ route('admin_users.edit', ['id' => $admin->id]) }}" class="btn btn-warning">Edit</a>

        <form method="POST" action="{{ route('admin_users.destroy', ['id' => $admin->id]) }}" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this admin user?')">Delete</button>
        </form>
    </div>
@endsection
