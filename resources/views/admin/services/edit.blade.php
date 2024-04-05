@extends('admin.app_admin')
@section('admin_content')
    <div class="container">
        <h2>Edit Service</h2>

        <form method="POST" action="{{ route('services.update', $service) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input disabled type="text" class="form-control" id="name" name="name" value="{{ $service->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required>{{ $service->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $service->price }}" required max="999999">
            </div>

            <button type="submit" class="btn btn-primary">Update Service</button>
        </form>
    </div>
@endsection
