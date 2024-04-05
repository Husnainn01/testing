@extends('admin.app_admin')
@section('admin_content')
    <div class="container">
        <h2>Create a New Service</h2>

        <form method="POST" action="{{ route('services.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" required max="99999">
            </div>

            <button type="submit" class="btn btn-primary">Create Service</button>
        </form>
    </div>
@endsection
