@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Listing Cities</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
            <div class="float-right d-inline">
                <a href="{{ route('admin_listing_city_create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ ADD_NEW }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ NAME }}</th>
                        <th>Country</th>
                        <th>{{ ACTION }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($listing_cities as $key=>$listing_city)
                            <tr>
                                <td>{{ $listing_city->id }}</td>
                                <td>{{ $listing_city->name }}</td>
                                <td>{{ $listing_city->country->listing_location_name }}</td>
                                <td>
                                    <a href="{{ route('admin_listing_city_edit',$listing_city->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin_listing_city_delete',$listing_city->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ ARE_YOU_SURE }}');"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
