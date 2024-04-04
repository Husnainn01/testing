@extends('admin.app_admin')
@section('admin_content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">inspection</h6>
            <div class="float-right d-inline">
                <a href="{{ route('admin_inspection_create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ ADD_NEW }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type of Inspection</th>
                        <th>Price</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(sizeof($inspections) > 0)
                            @foreach($inspections as $inspection)
                            <tr>
                                <td>
                                    {{ $inspection->id }}
                                </td>
                                <td>
                                    {{ $inspection->name }}
                                </td>
                                <td>{{ $inspection->inspection_type }}</td>
                                <td>{{ $inspection->price }}</td>
                                <td>{{ $inspection->updated_at }}</td>
                                <td>
                                    <a href="{{route('admin_inspection_edit',$inspection->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin_inspection_delete', ['id' => $inspection->id]) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ ARE_YOU_SURE }}');"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">No Data Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
