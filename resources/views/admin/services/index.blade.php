@extends('admin.app_admin')
@section('admin_content')
    <div class="container">
        <h2>Services</h2>
        <!-- <a href="{{ route('services.create') }}" class="btn btn-primary mb-2">Create Service</a> -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->description }}</td>
                        <td>{{ $service->price }}</td>
                        <td>
                            <a href="{{ route('services.edit', $service) }}" class="btn btn-warning btn-sm">Edit</a>
                            <!-- <form method="post" action="{{ route('services.destroy', $service) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this service?')">Delete</button>
                            </form> -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
