@extends('admin.app_admin')
@section('admin_content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">Offer Management</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Car</th>
                        <th>Customer</th>
                        <th>Fob Price</th>
                        <th>Freight</th>
                        <th>Insurance</th>
                        <th>Inspection</th>
                        <th>Offer</th>
                        <th>Total Price</th>
                        <th>Offer Status</th>
                        <th>Agreed Price</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(sizeof($offers) > 0)
                            @foreach($offers as $offer)
                            <tr>
                                <td>
                                    {{ $offer->id }}
                                </td>
                                <td>
                                    {{ $offer->car_name }}
                                </td>
                                <td>{{ $offer->name }}</td>
                                <td>{{ $offer->fob_price }}</td>
                                <td>{{ $offer->freight->destination ?? '-' }}</td>
                                <td>{{ $offer->insurance->type ?? '-' }}</td>
                                <td>{{ $offer->inspection->inspection_type ?? '-' }}</td>
                                <td>{{ $offer->offer }}</td>
                                <td>{{ $offer->total_price }}</td>
                                <td>@if($offer->status=='offered') Offered @elseif($offer->status == 'reserved') Sold @elseif($offer->status == 'sold') Sold @else In-stock @endif </td>
                                <td>{{ $offer->agreed_price }}</td>
                                <td>{{ $offer->remarks }}</td>
                                <td>
                                    <a href="{{route('admin_offer_managment_edit',$offer->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin_offer_managment_delete', ['id' => $offer->id]) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ ARE_YOU_SURE }}');"><i class="fas fa-trash-alt"></i></a>
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
