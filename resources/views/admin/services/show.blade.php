@extends('admin.app_admin')
@section('admin_content')
    <div class="container">
        <h2>Service Details</h2>

        <p>ID: {{ $service->id }}</p>
        <p>Name: {{ $service->name }}</p>
        <p>Description: {{ $service->description }}</p>
        <p>Price: {{ $service->price }}</p>

        <a href="{{ route('services.edit', $service) }}" class="btn btn-warning btn-sm">Edit</a>
        <form method="post" action="{{ route('services.destroy', $service) }}" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this service?')">Delete</button>
        </form>
    </div>
@endsection
