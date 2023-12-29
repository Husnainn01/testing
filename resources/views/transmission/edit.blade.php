@extends('admin.app_admin')
@section('admin_content')
    <h2>Edit Transmission</h2>

    <form action="{{ route('admin_listing_transmissions_update', ['transmissionId' => $transmission->id]) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $transmission->name) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $transmission->description) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Transmission</button>
    </form>
@endsection
