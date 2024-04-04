@extends('front.customerDashboard.customer_main')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-3">Shipping Documents</h2>
                <div class="shadow conatiner border-1 w-75 d-block m-auto mb-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="bg-danger py-2 text-light px-2">
                                <h5 class="text-white">How to download </h5>
                            </div>
                        </div>
                        <div class="col-12">
                            <form action="{{ route('shippind_doc') }}" method="post" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="px-4 py-3 row">
                                    <div class="col-6">
                                        <label for="" class="w-100"> Service
                                            <select name="service" id="service" class="form-control">
                                                <option selected>Choose</option>
                                                <option value="roro">Roro</option>
                                                <option value="container_plan">Container Plan</option>
                                            </select>
                                        </label>
                                    </div>
                                     <div class="col-6">
                                        <label for="" class="w-100"> Status
                                            <select name="status" id="status" class="form-control">
                                                <option selected>Choose</option>
                                                <option value="pending">Pending</option>
                                                <option value="accepted">Accepted</option>
                                                <option value="cancelled">Cancelled</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="w-100"> Shippment Request Id
                                            <input type="text" name="shipping_id" class="form-control w-100">
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="w-100"> Offer Id
                                            <input type="text" name="offer_id" class="form-control w-100">
                                        </label>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>CAR NAME</th>
                                <th>OFFER ID</th>
                                <th>SHIPPING ID</th>
                                <th>ETD/ETA</th>
                                <th>POL/POD</th>
                                <th>BL DOCUMENT</th>
                                <th>EXPORT CERTIFICATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shippingOrders as $shippingOrder)
                            <tr>
                                <td>
                                    {{ $shippingOrder->offer->car_name }}
                                </td>
                                <td>
                                    {{ $shippingOrder->offer->id }}
                                </td>
                                <td>
                                    {{ $shippingOrder->shipping_id }}
                                </td>
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
                                <td>
                                    @php
                                        // Check if TT/Copy document exists and provide a download link
                                        $ttCopyDocument = null;
                                        foreach ($shippingOrder->documents as $doc) {
                                            if ($doc->status == 'tt_copy') {
                                                $ttCopyDocument = $doc;
                                                break;
                                            }
                                        }
                                    @endphp
                                </td>
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