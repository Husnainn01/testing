@extends('front.customerDashboard.customer_main')

@section('content')
    <style>
        .tabs {
            width: 80%;
            margin: 0 auto;
        }

        .tab-headers {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            background-color: #f0f0f0;
        }

        .tab-headers li {
            flex: 1;
            text-align: center;
        }

        .tab-headers a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .tab-headers li.active a {
            background-color: red;
            color: #fff;
        }

        .tab-content {
            display: none;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
        }

        .tab-content.active {
            display: block;
        }
    </style>
    <!--Consignee Track and trace-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="table-responsive">
                        <h3>Invoices</h3>
                        <table id="invoice" class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Invoice ID</th>
                                    <th>User ID</th>
                                    <th>Shipping Order ID</th>
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
                                @if ($invoices->isEmpty())
                                    <tr>
                                        <td colspan="15">No Records Found</td>
                                    </tr>
                                @else
                                    @foreach ($invoices as $invoice)
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
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
