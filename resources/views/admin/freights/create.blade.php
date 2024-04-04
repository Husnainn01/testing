@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Freight</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin_freight_store') }}" method="post">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Freight</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin_freight_view') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ VIEW_ALL }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="company">Company*</label>
                    <input class="form-control" type="text" placeholder="Company" name="company" required value="{{ old('destination') }}">
                </div>
                <div class="form-group">
                    <label for="destination">Destination *</label>
                    <input class="form-control" type="text" placeholder="destination" name="destination" class="form-control" required value="{{ old('destination') }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" type="number" placeholder="price" name="price" class="form-control" required value="{{ old('price') }}" max="999999" >
                </div>
                <button type="submit" class="btn btn-success">{{ SUBMIT }}</button>
            </div>
        </div>
    </form>
@endsection
