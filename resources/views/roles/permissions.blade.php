@extends('admin.app_admin')
@section('admin_content')
    <div class="container">
        <h2>Manage Permissions for {{ $role->name }}</h2>
        <form method="post" action="{{ route('roles.update-permissions', $role) }}">
            @csrf
            <div class="form-group">
                <label for="permissions">Assign Permissions</label>
                <select multiple class="form-control" id="permissions" name="permissions[]">
                    @foreach($permissions as $permission)
                        <option value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions) ? 'selected' : '' }}>
                            {{ $permission->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Permissions</button>
        </form>
    </div>
@endsection
