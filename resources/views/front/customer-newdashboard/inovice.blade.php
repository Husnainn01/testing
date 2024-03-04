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
        <div class="mt-3 mb-3">
            {{-- <div class="table-container" style="width: 150%;">

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
                        @if ($invoices->isEmpty())
                            <tr>
                                <td colspan="15">No records found</td>
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
            </div> --}}

            <div class="row">
                {{-- <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            All Invoices
                        </div>
                        <div class="card-body">
                            <ul>

                                @foreach ($ShippingOrder as $invoice)
                                    @if ($invoice->invoice_path != '')
                                        <li style="list-style:none">
                                            <a href="{{ asset($invoice->invoice_path) }}"
                                                download="{{ basename($invoice->invoice_path) }}">
                                                <i class="fas fa-download"></i> Download
                                                {{ basename($invoice->invoice_path) }}
                                            </a>

                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Upload Paid Invoices
                        </div>
                        <div class="card-body">
                            <form id="CuploadForm" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="paidInvoice">Select Invoice</label>
                                    <select name="oInvoice" id="oInvoice" class="p-1 m-2">
                                        @foreach ($ShippingOrder as $invoice)
                                            @if ($invoice->invoice_path != '')
                                                <option value="{{ basename($invoice->invoice_path) }}">
                                                    {{ $invoice->shipping_id }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    {{-- </div>
                                <div class="form-group"> --}}
                                    <label for="paidInvoice">Upload Paid Invoice</label>
                                    <input type="file" name="paidInvoice" id="paidInvoice" class="m-2" required>
                                    {{-- </div> --}}
                                    <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                            {{-- <ul>

                                @foreach ($ShippingOrder as $invoice)
                                    @if ($invoice->paid_invoice_path != '')
                                        <li style="list-style:none">

                                            <a href="{{ asset($invoice->paid_invoice_path) }}"
                                                download="{{ basename($invoice->paid_invoice_path) }}">
                                                <i class="fas fa-download"></i> Download
                                                {{ basename($invoice->paid_invoice_path) }}
                                            </a>

                                        </li>
                                    @endif
                                @endforeach
                            </ul> --}}


                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-striped track-table" style="width:100%">
                <thead>
                    <tr>
                        <th>SS No</th>
                        <th>Photo</th>
                        <th>Car Name/ Chassis No</th>
                        <th>Country</th>
                        <th>Port</th>
                        <th>Vessel Name</th>
                        <th>ETD / POL</th>
                        <th>ETA / POD</th>
                        <th>Consignee Name / Location</th>
                        <th>Download Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ShippingOrder as $invoice)
                        {{-- @php
                            dd($invoice);
                        @endphp --}}
                        @if ($invoice->paid_invoice_path != '')
                            <tr>

                                <td>
                                    {{ $invoice->shipping_id }}
                                </td>
                                <td>
                                    @php
                                        $listingPhoto = \App\Models\ListingPhoto::where(
                                            'listing_id',
                                            $invoice->id,
                                        )->first();
                                        // dd($listingPhoto);
                                        $photoUrl = $listingPhoto
                                            ? asset('uploads/listing_photos/' . $listingPhoto->photo)
                                            : '';
                                    @endphp

                                    <img src="{{ $photoUrl }}" class="w-100 mt-2" height="40px"
                                        style="object-fit: cover; height:40px" alt="">
                                </td>
                                <td>
                                    <ul>

                                        @foreach ($invoice->offers as $offer)
                                            <li>
                                                <a class="text-primary text-decoration-underline"
                                                    href="{{ route('customer.shipment.view', ['id' => $invoice->id]) }}"
                                                    title="View Shipment">
                                                    {{ $offer->car_name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    {{ $invoice->country_selected->listing_location_name }}

                                </td>
                                <td>
                                    {{ $invoice->port_selected->name }}
                                </td>
                                @php
                                    $documents = $invoice->documents->pluck('status')->toArray();

                                @endphp
                                <td>
                                    @if (in_array('vessel', $documents))
                                        Uploaded
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if (in_array('etd_eta', $documents))
                                        Uploaded
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if (in_array('pol_pod', $documents))
                                        Uploaded
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    {{ $invoice->default_name }}
                                </td>
                                <td>
                                    <a href="{{ asset($invoice->paid_invoice_path) }}"
                                        download="{{ basename($invoice->paid_invoice_path) }}">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {

        $("#CuploadForm").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '/customer/upload-invoice',
                type: 'POST',
                data: formData,
                success: function(response) {
                    // console.log("File uploaded successfully");


                    window.location.reload();
                },
                error: function(xhr, status, error) {

                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    });
</script>
