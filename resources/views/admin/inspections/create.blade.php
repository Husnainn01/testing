@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Inspection</h1>
    <form action="{{ route('admin_inspection_store') }}" method="post">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Inspection</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin_inspection_view') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                        {{ VIEW_ALL }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name*</label>
                    <input class="form-control" type="text" placeholder="name" name="name" required
                        value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="inspection_type">Type of Inspection *</label>
                    <select name="inspection_type" id="inspection_type" class="form-control">
                        <option value="default" selected>Default</option>
                        <option value="ss_custom">SS Custom</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" type="text" placeholder="price" name="price" class="form-control"
                        value="{{ old('price') }}" required max="999999">
                </div>
                <button type="submit" class="btn btn-success">{{ SUBMIT }}</button>
            </div>
        </div>
    </form>
@endsection
