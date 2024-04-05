@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Shipment Details</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <div class="float-right d-inline">
                <a href="{{ route('view_shipment_document', $shippment_request->id  ) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View Documents</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin_shipping_documents_update', $shippment_request->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3><strong>Offer Information</strong></h3>
                                <div class="form-group">
                                    <label for="">Car Title</label>
                                    <input type="text" hidden class="form-control" name="offer_id" value="{{ $offer->id }}" autofocus>
                                    <input type="text" hidden class="form-control" name="shippment_id" value="{{ $shippment_request->id }}" autofocus>
                                    <input type="text" disabled class="form-control" value="{{ $offer->car_name }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="">Car Total Price</label>
                                    <input type="text" disabled class="form-control" value="{{ $offer->total_price }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="">Car Offer</label>
                                    <input type="text" disabled class="form-control" value="{{ $offer->offer }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="offer_agreed_price">Agreed Price *</label>
                                    <input type="text" required name="offer_agreed_price" class="form-control" value="{{ $offer->agreed_price }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="offer_agreed_status">Offer Status *</label>
                                    <select class="form-control"  name="offer_agreed_status" id="offer_agreed_status">
                                        <!-- <option value="offered" @if($offer->status === 'offered') selected @endif>Offered</option>
                                        <option value="in_stock" @if($offer->status === 'in_stock') selected @endif>InStock</option> -->
                                        <option value="sold" @if($offer->status === 'sold') selected @endif>Sold</option>
                                        <option value="reserved" @if($offer->status === 'reserved') selected @endif>Reserved</option>
                                    </select>
                                </div>
                                <h4><strong>Shipping Request Details</strong></h4>
                                <div class="form-group">
                                    <label for="">Shippment Service</label>
                                    <input type="text" disabled class="form-control" @if($shippment_request->service === 'container_plan') value="Container Plan"  @else value="RoRo"  @endif autofocus>
                                </div> 
                                <div class="form-group">
                                    <label for="">Shippment Country</label>
                                    <input type="text" disabled class="form-control" value="{{ $shippment_request->country_selected->listing_location_name }}" autofocus>
                                </div>  
                                <div class="form-group">
                                    <label for="">Shippment City</label>
                                    <input type="text" disabled class="form-control" value="{{ $shippment_request->city_selected->name }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="">Shippment Port</label>
                                    <input type="text" disabled class="form-control" value="{{ $shippment_request->port ? $shippment_request->port->name : '-' }}" autofocus>
                                </div>
                                <h4><strong>Consignee Information</strong></h4>  
                                <div class="form-group">
                                    <label for="">Consignee Name</label>
                                    <input type="text" disabled class="form-control" value="{{ $shippment_request->default_name }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="">Consignee Company Name</label>
                                    <input type="text" disabled class="form-control" value="{{ $shippment_request->default_company_name }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="">Consignee Email</label>
                                    <input type="text" disabled class="form-control" value="{{ $shippment_request->default_email }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="">Consignee Phone Number</label>
                                    <input type="text" disabled class="form-control" value="{{ $shippment_request->default_phone_number }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="">Consignee Address</label>
                                    <input type="text" disabled class="form-control" value="{{ $shippment_request->default_address }}" autofocus>
                                </div>
                                <h3><strong>Receiver Information</strong></h3>
                                <div class="form-group">
                                    <label for="">Receiver Name</label>
                                    <input type="text" disabled class="form-control" value="{{ $shippment_request->receiver_default_name }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="">Receiver Company Name</label>
                                    <input type="text" disabled class="form-control" value="{{ $shippment_request->receiver_default_company_name }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="">Receiver Email</label>
                                    <input type="text" disabled class="form-control" value="{{ $shippment_request->receiver_default_email }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="">Receiver Phone Number</label>
                                    <input type="text" disabled class="form-control" value="{{ $shippment_request->receiver_default_phone_number }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="">Receiver Address</label>
                                    <input type="text" disabled class="form-control" value="{{ $shippment_request->receiver_default_address }}" autofocus>
                                </div>
                                <h3><strong>Option Services</strong></h3>
                                <div class="form-group">
                                    @if($shippment_request->optionServices->isEmpty())
                                        <p>None selected.</p>
                                    @else
                                        @foreach($shippment_request->optionServices as $optionService)
                                            <div class="form-check">
                                                <input class="form-check-input" checked type="checkbox" id="{{ $optionService->id }}">
                                                <label class="form-check-label" for="{{ $optionService->id }}">
                                                    {{ $optionService->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <h3><strong>Other Services</strong></h3>
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" disabled name="deregistration_service" type="checkbox" @if($shippment_request->deregistration_service === 1) checked @endif id="deregistration_service">
                                      <label class="form-check-label" for="deregistration_service">
                                        Deregistration Service
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" disabled name="english_export_service"  type="checkbox" @if($shippment_request->english_export_service === 1) checked @endif id="english_export_service">
                                      <label class="form-check-label" for="english_export_service">
                                        English Export Service
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" disabled name="photo_service" type="checkbox" @if($shippment_request->photo_service === 1) checked @endif id="photo_service">
                                      <label class="form-check-label" for="photo_service">
                                        Photo Service
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" disabled name="ss_custom_photo_service" type="checkbox" @if($shippment_request->ss_custom_photo_service === 1) checked @endif id="ss_custom_photo_service">
                                      <label class="form-check-label" for="ss_custom_photo_service">
                                        SS Custom Photo Service
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" disabled name="ss_custom_inspection_service" type="checkbox" @if($shippment_request->ss_custom_inspection_service === 1) checked @endif id="ss_custom_inspection_service">
                                      <label class="form-check-label" for="ss_custom_inspection_service">
                                        SS Custom Inspection Service
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" disabled name="ss_custom_cleaning_service" type="checkbox" @if($shippment_request->ss_custom_cleaning_service === 1) checked @endif id="ss_custom_cleaning_service">
                                      <label class="form-check-label" for="ss_custom_cleaning_service">
                                        SS Custom Cleaning Service
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="offer_agreed_status">Shippment Request Status *</label>
                                    <select class="form-control"  name="shippment_request_status" id="shippment_request_status">
                                        <option value="pending" @if($shippment_request->status === 'pending') selected @endif >Pending</option>
                                        <option value="approved" @if($shippment_request->status === 'approved') selected @endif>Approved</option>
                                        <option value="cancelled" @if($shippment_request->status === 'cancelled') selected @endif>Cancelled</option>
                                    </select>
                                </div>
                                <!-- <h3><strong>Upload Documents</strong></h3>
                                <div class="form-group">
                                    <label for="document">Select All Documents *</label>
                                    <input type="file" name="documents[]" multiple accept=".pdf, .doc, .docx">
                                </div> -->
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
