@extends('front.customerDashboard.customer_main')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <h2>Offers</h2>
                    <table id="offersTable" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Car Name</th>
                                <th>FOB price</th>
                                <th>Freight</th>
                                <th>Insurance</th>
                                <th>Inspection</th>
                                <th>Total Price</th>
                                <th>Offer</th>
                                <th>Agreed Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($offers as $offer)
                                <tr>
                                    <td>{{ $offer->id }}</td>
                                    <td>{{ $offer->car_name }}</td>
                                    <td>{{ $offer->fob_price }}</td>
                                    <td>{{ $offer->freight->destination }}</td>
                                    <td>{{ $offer->insurance->insurance_type }}</td>
                                    <td>{{ $offer->inspection->inspection_type }}</td>
                                    <td>{{ $offer->total_price }}</td>
                                    <td>{{ $offer->offer }}</td>
                                    <td>{{ $offer->agreed_price }}</td>
                                    <td>{{ $offer->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script>
        $(document).ready(function() {
            // Initialize DataTable with your table's id
            $('#offersTable').DataTable();
        });
    </script>
@endsection
