@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Add Option Service</h1>
    <form action="{{ route('admin_listing_option_service_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin_listing_option_service_view') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ VIEW_ALL }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">{{ NAME }} *</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" autofocus required>
                </div>
                <div class="form-group">
                    <label for="description">{{ DESCRIPTION }} *</label>
                    <textarea name="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">{{ PRICE }} *</label>
                    <input type="number" name="price" class="form-control" required max="999999" autofocus>
                </div>
            </div>
            <div class="card-body">
                <button type="submit" class="btn btn-success">{{ SUBMIT }}</button>
            </div>
        </div>
    </form>
@endsection
