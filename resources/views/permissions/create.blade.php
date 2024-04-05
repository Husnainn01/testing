@extends('admin.app_admin')
@section('admin_content')
<div class="container">
        <h2>Create Permission</h2>
        <form method="post" action="{{ route('permissions.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Permission Name</label>
                <input type="text" class="form-control" id="name" name="name" required placeholder="Enter permission name">
            </div>
            <div class="form-group">
                <label for="name">Permission Type</label>
                <input type="text" class="form-control" required id="permission_type" name="permission_type" placeholder="Enter permission type">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection