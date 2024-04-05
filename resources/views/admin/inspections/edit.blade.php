@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Inspection</h1>
    <h5>Edit</h5>
    <form action="{{ route('admin_inspection_update') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $inspection->id }}">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Inspection</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin_inspection_view') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ VIEW_ALL }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name*</label>
                    <input class="form-control" type="text" placeholder="name" name="name" required value="{{ old('name',$inspection->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="inspection_type">Type of Inspection *</label>
                    <select name="inspection_type" id="inspection_type" class="form-control">
                        <option value="default" @if($inspection->inspection_type =="default") selected @endif>Default</option>
                        <option value="ss_custom" @if($inspection->inspection_type =="ss_custom") selected @endif>SS Custom</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" type="number" placeholder="price" name="price" class="form-control" value="{{ old('price',$inspection->price) }}" required max="999999">
                </div>
                <button type="submit" class="btn btn-success">{{ SUBMIT }}</button>
            </div>
        </div>
    </form>
@endsection
