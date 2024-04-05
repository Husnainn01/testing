@extends('admin.app_admin')

@section('admin_content')
    <div class="container">
        <h1>Edit Admin User</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit admin user form -->
        <form method="POST" action="{{ route('admin_users.update', ['id' => $admin->id]) }}" class="form">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $admin->name }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ $admin->email }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <!-- Role selection -->
            <div class="form-group">
                <label for="role">Select Role:</label>
                <select name="role" id="role" class="form-control" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $admin->hasRole($role) ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Active" {{ $admin->status === 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $admin->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
