@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Insurance</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin_insurance_store') }}" method="post">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Insurance</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin_insurance_view') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ VIEW_ALL }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="insurance_type">Insurance Type *</label>
                    <select name="insurance_type" id="insurance_type" class="form-control">
                        <option value="whole_car" selected>Whole Car</option>
                        <option value="damage">Damage</option>
                        <option value="container">Container</option>
                        <option value="ss_custom">SS Custom</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" required value="{{ old('price') }}" max="9999999">
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date *</label>
                    <input type="date" name="start_date" class="form-control" required value="{{ old('start_date') }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" class="form-control" required value="{{ old('end_date') }}">
                </div>
                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea name="description" class="form-control" required id="description" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-success">{{ SUBMIT }}</button>
            </div>
        </div>
    </form>
@endsection
