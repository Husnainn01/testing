@extends('front.customer-newdashboard.layouts.template')
@section('content')
<div class="content-body mt-2">
    <div class="container-fluid">
        <div class="row">
            <h2>Shipment Request Details</h2>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card p-4 shado">
                                    <h3>Car Details</h3>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <table class="table">
                                                <tbody>
                                                    @php
                                                        $car = $shippingOrder->offer->car;
                                                    @endphp
                                                    <tr>
                                                        <th>Title:</th>
                                                        <td>{{ $car->listing_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Location:</th>
                                                        <td>
                                                            {{ $car->rListingLocation->listing_location_name }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Contact number:</th>
                                                        <td>
                                                            {{ $car->listing_phone }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email:</th>
                                                        <td>
                                                            {{ $car->listing_email }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Price:</th>
                                                        <td>
                                                            {{ $car->listing_price }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Price:</th>
                                                        <td>
                                                            {{ $car->listing_price }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Price:</th>
                                                        <td>
                                                            {{ $car->listing_price }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Steering:</th>
                                                        <td>
                                                            {{ $car->steering }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Fuel Type:</th>
                                                        <td>
                                                            {{ $car->listing_fuel_type }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Transmission:</th>
                                                        <td>
                                                            {{ $car->listing_transmission }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Engine Capacity:</th>
                                                        <td>
                                                            {{ $car->listing_engine_capacity }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>VIN:</th>
                                                        <td>
                                                            {{ $car->listing_vin }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Body:</th>
                                                        <td>
                                                            {{ $car->listing_body }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Seats:</th>
                                                        <td>
                                                            {{ $car->listing_seat }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Wheel:</th>
                                                        <td>
                                                            {{ $car->listing_wheel }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Doors:</th>
                                                        <td>
                                                            {{ $car->listing_door }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mileage:</th>
                                                        <td>
                                                            {{ $car->listing_mileage }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Model Year:</th>
                                                        <td>
                                                            {{ $car->listing_model_year }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Type:</th>
                                                        <td>
                                                            {{ $car->listing_type }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card p-4 shadow">
                                    <h3>Shipping Order Details</h3>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>Shipping Order ID:</th>
                                                <td>{{ $shippingOrder->id }}</td>
                                            </tr>
                                            <tr>
                                                <th>Offer ID:</th>
                                                <td>{{ $shippingOrder->offer_id }}</td>
                                            </tr>
                                            <tr>
                                                <th>Service:</th>
                                                <td>{{ $shippingOrder->service }}</td>
                                            </tr>
                                            <tr>
                                                <th>Country:</th>
                                                <td>{{ $shippingOrder->country }}</td>
                                            </tr>
                                            <tr>
                                                <th>City:</th>
                                                <td>{{ $shippingOrder->city }}</td>
                                            </tr>
                                            <tr>
                                                <th>Container Port:</th>
                                                <td>{{ $shippingOrder->container_port }}</td>
                                            </tr>
                                            <tr>
                                                <th>Consignee Name:</th>
                                                <td>{{ $shippingOrder->default_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Consignee Email:</th>
                                                <td>{{ $shippingOrder->default_email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Consignee Company:</th>
                                                <td>{{ $shippingOrder->default_company_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Consignee Phone Number:</th>
                                                <td>{{ $shippingOrder->default_phone_number }}</td>
                                            </tr>
                                            <tr>
                                                <th>Receiver Name:</th>
                                                <td>{{ $shippingOrder->receiver_default_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Receiver Email:</th>
                                                <td>{{ $shippingOrder->receiver_default_email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Receiver Company:</th>
                                                <td>{{ $shippingOrder->receiver_default_company_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Receiver Phone Number:</th>
                                                <td>{{ $shippingOrder->receiver_default_phone_number }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status:</th>
                                                <td>{{ $shippingOrder->status }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <!-- images -->
                                <img src="{{ asset('/uploads/listing_featured_photos/'.$car->listing_featured_photo) }}" height="400" width="400"  alt="">
                            </div>
                            <!-- DOCUMENTS -->
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card shadow mb-4 p-4">
                                    <h3>Shipping Order Documents</h3>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>
                                                    ETD/ETA Document
                                                </th>
                                                <th>
                                                    POL/POD
                                                </th>
                                                <th>
                                                    BL DOCUMENT
                                                </th>
                                                <th>
                                                    EXPORT DOCUMENT
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    @php
                                                        $etdEtaDocument = null;
                                                        foreach ($shippingOrder->documents as $doc) {
                                                            if ($doc->status == 'etd_eta') {
                                                                $etdEtaDocument = $doc;
                                                                break;
                                                            }
                                                        }
                                                    @endphp
                                                    @if ($etdEtaDocument)
                                                        <a href="{{ route('customer_download.shipping_documents', $etdEtaDocument->id) }}">
                                                            <i class="fas fa-file-pdf"></i> {{ $etdEtaDocument->name }}
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @php
                                                        $polPodDocument = null;
                                                        foreach ($shippingOrder->documents as $doc) {
                                                            if ($doc->status == 'pol_pod') {
                                                                $polPodDocument = $doc;
                                                                break;
                                                            }
                                                        }
                                                    @endphp
                                                    @if ($polPodDocument)
                                                        <a href="{{ route('customer_download.shipping_documents', $polPodDocument->id) }}">
                                                            <i class="fas fa-file-pdf"></i> {{ $polPodDocument->name }}
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @php
                                                        $blDocument = null;
                                                        foreach ($shippingOrder->documents as $doc) {
                                                            if ($doc->status == 'bl_document') {
                                                                $blDocument = $doc;
                                                                break;
                                                            }
                                                        }
                                                    @endphp
                                                    @if ($blDocument)
                                                        <a href="{{ route('customer_download.shipping_documents', $blDocument->id) }}">
                                                            <i class="fas fa-file-pdf"></i> {{ $blDocument->name }}
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @php
                                                        $exportDocument = null;
                                                        foreach ($shippingOrder->documents as $doc) {
                                                            if ($doc->status == 'export_document') {
                                                                $exportDocument = $doc;
                                                                break;
                                                            }
                                                        }
                                                    @endphp
                                                    @if ($exportDocument)
                                                        <a href="{{ route('customer_download.shipping_documents', $exportDocument->id) }}">
                                                            <i class="fas fa-file-pdf"></i> {{ $exportDocument->name }}
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- TT Documents -->
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card shadow mb-4 p-4">
                                    <h3>Shipping TT Document</h3>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>TT Document</th>
                                                <th>Uploaded at</th>
                                            </tr>
                                            @foreach($shippingOrder->tt_documents as $ttDocs)
                                            <tr>
                                                <td>
                                                    @if ($ttDocs)
                                                        <a href="{{ route('customer_download.tt_doc', $ttDocs->id) }}">
                                                            <i class="fas fa-file-pdf"></i>*
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $ttDocs->created_at }}
                                                </td>
                                            </tr>
                                            @endforeach    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <form action="{{ route('customer_shipping_documents.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                                                <h4>Upload TT Copy</h4>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" disabled type="radio" name="status" id="tt_copy" value="vessel" checked>
                                                    <label class="form-check-label" for="tt_copy">TT Copy</label>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="documents">Upload Documents *</label>
                                                    <input type="file" name="documents[]" class="form-control-file" multiple accept=".pdf" required>
                                                </div>
                                            </div>
                                            <input type="number" hidden name="shippment_id" value="{{ $shippingOrder->id }}">
                                            <button type="submit" class="btn btn-success">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
