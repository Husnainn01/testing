@extends('admin.app_admin')
@section('admin_content')
    <h2>List of Transmissions</h2>
    
    <div class="mb-3">
        <a href="{{ route('admin_listing_transmissions_create') }}" class="btn btn-primary">Create Transmission</a>
    </div>

    @if (count($transmissions) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transmissions as $transmission)
                    <tr>
                        <td>{{ $transmission->id }}</td>
                        <td>{{ $transmission->name }}</td>
                        <td>{{ $transmission->description }}</td>
                        <td>
                            <a href="{{ route('admin_listing_transmissions_edit', ['transmissionId' => $transmission->id]) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin_listing_transmissions_destroy', ['transmissionId' => $transmission->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No transmissions found.</p>
    @endif
@endsection
