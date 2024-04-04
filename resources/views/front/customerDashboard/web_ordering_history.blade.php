@extends('front.customerDashboard.customer_main')

@section('content')
<!-- Consignee Track and trace -->
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Receipt No./ID</th>
                                <th>Order Date and Time</th>
                                <th>Status</th>
                                <th>Car Name</th>
                                <th>Price</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($offers as $offer)
                            <tr>
                                <td>{{ $offer->id }}</td>
                                <td>{{ $offer->created_at }}</td>
                                <td>{{ $offer->status }}</td>
                                <td>{{ $offer->car_name }}</td>
                                <td>{{ $offer->agreed_price ?? '-' }}</td>
                                <td>{{ $offer->remarks ?? '-' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
