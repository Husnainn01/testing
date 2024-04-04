@extends('admin.app_admin')
@section('admin_content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">Insurance</h6>
            <div class="float-right d-inline">
                <a href="{{ route('admin_insurance_create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ ADD_NEW }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Insurance Type</th>
                        <th>Price</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(sizeof($insurances) > 0)
                            @foreach($insurances as $insurance)
                            <tr>
                                <td>
                                    {{ $insurance->id }}
                                </td>
                                <td>
                                    @if($insurance->insurance_type == "whole_car")
                                        Whole Car
                                    @elseif($insurance->insurance_type == "damage")
                                        Damage
                                    @elseif($insurance->insurance_type == "container")
                                        Container
                                    @elseif($insurance->insurance_type == "ss_custom")
                                        Custom
                                    @endif
                                </td>
                                <td>{{ $insurance->price }}</td>
                                <td>{{ $insurance->start_date }}</td>
                                <td>{{ $insurance->end_date }}</td>
                                <td>
                                    <p>
                                        {{ $insurance->description }}
                                    </p>
                                </td>
                                <td>
                                    <a href="{{route('admin_insurance_edit',$insurance->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin_insurance_delete', ['id' => $insurance->id]) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ ARE_YOU_SURE }}');"><i class="fas fa-trash-alt"></i></a>
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
