@extends('admin.app_admin')
@section('admin_content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">Freight</h6>
            <div class="float-right d-inline">
                <a href="{{ route('admin_freight_create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ ADD_NEW }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Company</th>
                        <th>Destination</th>
                        <th>Price</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(sizeof($freights) > 0)
                            @foreach($freights as $freight)
                            <tr>
                                <td>
                                    {{ $freight->id }}
                                </td>
                                <td>
                                    {{ $freight->company }}
                                </td>
                                <td>{{ $freight->destination }}</td>
                                <td>{{ $freight->price }}</td>
                                <td>{{ $freight->updated_at }}</td>
                                <td>
                                    <a href="{{route('admin_freight_edit',$freight->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin_freight_delete', ['id' => $freight->id]) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ ARE_YOU_SURE }}');"><i class="fas fa-trash-alt"></i></a>
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
