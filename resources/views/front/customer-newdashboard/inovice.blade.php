@extends('front.customer-newdashboard.layouts.template')
@section('content')
<section class="container-fluid p-3 nav-small-txt border-bottom">
    <ul class="list-unstyled list-inline">
        <li class="list-inline-item text-primary">Dashboard</li>>
        <li class="list-inline-item mx-2">All Inovices</li>

    </ul>
    <h3 class="fw-medium">All Inovices</h3>
    <small>It contains all the quotations you have requested.</small>
</section>
<section class="container-fluid">
    <div class="table-container w-100 overflow-x-auto">
        <div class="table-container" style="width: 150%;">
          
            <table id="invoice" class="table">
                <thead>
                    <tr>
                        <th>Invoice ID</th>
                        <th>User ID</th>
                        <th>Stock Number</th>
                        <th>Car Name</th>
                        <th>Car Brand</th>
                        <th>Car Location</th>
                        <th>Car Status</th>
                        <th>Offer Price</th>
                        <th>Offer Status</th>
                        <th>Agreed Price</th>
                        <th>Remarks</th>
                        <th>Service Type</th>
                        <th>Shipping Status</th>
                        <th>Invoice Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if($invoices->isEmpty())
                        <tr>
                            <td colspan="15">No records found</td>
                        </tr>
                    @else
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->id }}</td>
                                <td>{{ $invoice->user_id }}</td>
                                <td>{{ $invoice->shipping_order_id }}</td>
                                <td>{{ $invoice->car_name }}</td>
                                <td>{{ $invoice->car_brand }}</td>
                                <td>{{ $invoice->car_location }}</td>
                                <td>{{ $invoice->car_status }}</td>
                                <td>{{ $invoice->offer_price }}</td>
                                <td>{{ $invoice->offer_status }}</td>
                                <td>{{ $invoice->agreed_price }}</td>
                                <td>{{ $invoice->remarks }}</td>
                                <td>{{ $invoice->service_type }}</td>
                                <td>{{ $invoice->shipping_status }}</td>
                                <td>{{ $invoice->payment_status }}</td>
                            </tr>
                        @endforeach
                    @endif  
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
