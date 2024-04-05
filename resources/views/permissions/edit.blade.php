@extends('admin.app_admin')
@section('admin_content')
<div class="container">
    <h2>Edit Permission</h2>
    <form method="post" action="{{ route('permissions.update', $permission) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Permission Name</label>
            <input type="text" class="form-control" required id="name" name="name" value="{{ $permission->name }}">
        </div>
        <div class="form-group">
            <label for="name">Permission Type</label>
            <input type="text" class="form-control" required id="permission_type" name="permission_type" value="{{ $permission->permission_type }}" placeholder="Enter permission type">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection