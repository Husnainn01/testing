@extends('admin.app_admin')
@section('admin_content')
<div class="container">
    <h2>Create Role</h2>
    <form method="post" action="{{ route('adminUsers.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Role Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter role name">
        </div>
        <div class="row">
            <div class="col-4">
                <h5>Settings</h5>
                @foreach($setting_permissions as $setting_permission)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $setting_permission->id }}" id="permission_{{ $setting_permission->id }}">
                        <label class="form-check-label" for="permission_{{ $setting_permission->id }}">
                            {{ $setting_permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="col-4">
                <h5>Insurance</h5>
                @foreach($insurance_permissions as $insurance_permission)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $insurance_permission->id }}" id="permission_{{ $insurance_permission->id }}">
                        <label class="form-check-label" for="permission_{{ $insurance_permission->id }}">
                            {{ $insurance_permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="col-4">
                <h5>Freight</h5>
                @foreach($freight_permissions as $freight_permission)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $freight_permission->id }}" id="permission_{{ $freight_permission->id }}">
                        <label class="form-check-label" for="permission_{{ $freight_permission->id }}">
                            {{ $freight_permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="col-4">
                <h5>Inspections</h5>
                @foreach($inspection_permissions as $inspection_permission)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $inspection_permission->id }}" id="permission_{{ $inspection_permission->id }}">
                        <label class="form-check-label" for="permission_{{ $inspection_permission->id }}">
                            {{ $inspection_permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="col-4">
                <h5>Offer Management</h5>
                @foreach($offer_management_permissions as $offer_management_permission)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $offer_management_permission->id }}" id="permission_{{ $offer_management_permission->id }}">
                        <label class="form-check-label" for="permission_{{ $offer_management_permission->id }}">
                            {{ $offer_management_permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
