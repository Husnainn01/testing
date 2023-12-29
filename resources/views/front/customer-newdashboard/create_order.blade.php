@extends('front.customer-newdashboard.layouts.template')
@section('content')
<form action="{{ route('place_order_shipping') }}" id="msform">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
  @csrf
    <!-- progressbar -->
    <ul id="progressbar">
      <li class="active">Personal Details</li>
      <li>Consignee information</li>
      <li>Receiver information</li>
      <li>Optional Services</li>
      <li>Finish</li>
  </ul>
    <!-- fieldsets -->
    <fieldset>
        <h2 class="fs-title">Step 1</h2>
        <h3 class="fs-subtitle">Select All The Fields</h3>
      <div class="box w-100 border rounded-3">

        <div class="row">
            <div class="col-lg-4 p-4">
                <select name="offer_id" id="offer_id" class="form-select w-100">
                  <option disabled selected>Choose Offer <span class="text-danger">*</span></option>
                  @foreach($qoutes as $qoute)
                      <option value="{{ $qoute->id }}">{{ $qoute->car_name }}, Offer: ({{ $qoute->offer }})</option>
                  @endforeach
              </select>
            </div>
            <div class="col-lg-4 p-4">
                <select name="service" id="service" class="form-select w-100">
                    <option disabled selected>Select a Service <span class="text-danger">*</span></option>
                    <option value="container_plan">Container plan 30 days free</option>
                    <option value="roro">Roro</option>
                </select>
            </div>
            <div class="col-lg-4 p-4">
                <select name="country" id="country" class="form-select w-100">
                    <option disabled selected>Select Country <span class="text-danger">*</span></option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->listing_location_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4 p-4">
                <select name="city" id="city" class="form-select w-100">
                    <option disabled selected>Select City <span class="text-danger">*</span></option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4 p-4">
                <select name="container_port" id="container_port" class="form-select w-100">
                    <option disabled selected>Select a Port <span class="text-danger">*</span></option>
                    @foreach($ports as $port)
                        <option value="{{ $port->id }}">{{ $port->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
      <input type="button" name="next" class="next action-button rounded-3" value="Next" />
    </fieldset>
    <fieldset>
      <h2 class="fs-title">Step 2</h2>
      <h3 class="fs-subtitle">Consignee Information</h3>
      <div class="tabs border" id="tabs-nav-consignee">
        <ul id="tabs-nav" class="consignee_info">
          <li><a  id="default-tab" class="p-2 grey-active rounded-3">Default</a></li>
          <li><a  id="add_new-tab" class="p-2 rounded-3">Add new</a></li>
        </ul>
        <div id="tabs-content border">
          <div id="default-tab-content" class="tab-content">
            <input type="number" hidden name="consignee_id" value="{{ Auth::user()->id }}">
            <div class="row p-3">
                <div class="col-lg-6 ">
                    <label for="" class="fw-medium d-block text-start mb-1">Name</label>
                   <input type="text" disabled class="form-control py-2" name="default_name" placeholder="Name" value="{{ Auth::user()->name }}" autofocus>
                </div>

                <div class="col-lg-6">
                    <label for="" class="fw-medium d-block text-start mb-1">Company Name</label>
                    <input type="text" disabled  class="form-control py-2" name="default_company_name" placeholder="Company Name" value="{{ Auth::user()->company_name }}" autofocus>
                </div>

                <div class="col-lg-6">
                    <label for="" class="fw-medium d-block text-start mb-1">Email</label>
                   <input type="email" disabled class="form-control py-2" name="default_email" placeholder="email" value="{{ Auth::user()->email }}" autofocus>
                </div>

                <div class="col-lg-6 ">
                    <label for="" class="fw-medium d-block text-start mb-1">Phone Number</label>
                    <input type="number" disabled class="form-control py-2" name="default_phone_number" placeholder="Phone Number" value="{{ Auth::user()->phone }}" autofocus>
                </div>
                <div class="col-lg-6 ">
                    <label for="" class="fw-medium d-block text-start mb-1">Phone Number 2</label>
                    <input type="number" disabled class="form-control py-2" name="default_phone_2" placeholder="Phone number" value="{{ Auth::user()->phone }}" autofocus>
                </div>
                <div class="col-lg-6 ">
                    <label for="" class="fw-medium d-block text-start mb-1">Address</label>
                    <input type="text" disabled class="form-control py-2" name="default_address" placeholder="address" value="{{ Auth::user()->address }}" autofocus>
                </div>
            </div>
          </div>
          <div id="add_new-tab-content" class="tab-content">
            <div class="row p-3">
              <input type="number" hidden name="consignee_id" value="{{ Auth::user()->id }}">

                <div class="col-lg-6 ">
                    <label for="" class="fw-medium d-block text-start mb-1">Name</label>
                   <input type="text"  class="form-control py-2" name="consignee_name" placeholder="Name" autofocus>
                </div>
                <div class="col-lg-6">
                    <label for="" class="fw-medium d-block text-start mb-1">Company Name</label>
                    <input type="text"  class="form-control py-2" name="consignee_company_name" placeholder="Company Name">
                </div>

                <div class="col-lg-6">
                    <label for="" class="fw-medium d-block text-start mb-1">Email</label>
                   <input type="email"  class="form-control py-2" name="consignee_email" placeholder="email">
                </div>

                <div class="col-lg-6 ">
                    <label for="" class="fw-medium d-block text-start mb-1">Phone Number</label>
                    <input type="number"  class="form-control py-2" name="phone_number" placeholder="Phone Number">
                </div>
                <div class="col-lg-6 ">
                    <label for="" class="fw-medium d-block text-start mb-1">Phone Number 2</label>
                    <input type="number"  class="form-control py-2" name="phone_number_2" placeholder="Phone number">
                </div>
                <div class="col-lg-6 ">
                    <label for="" class="fw-medium d-block text-start mb-1">Address</label>
                    <input type="text"  class="form-control py-2" name="address" placeholder="address">
                </div>
            </div>
          </div>
        </div> <!-- END tabs-content -->
      </div> <!-- END tabs -->
      <input type="button" name="previous" class="previous action-button rounded-3" value="Previous" />
      <input type="button" name="next" class="next action-button rounded-3" value="Next" />
    </fieldset>
    <fieldset>
        <h2 class="fs-title">Step 3</h2>
        <h3 class="fs-subtitle">Receiver Information</h3>
        <div class="tabs border" id="tabs-nav-receiver">
          <ul id="tabs-nav" class="receiver_info">
            <li><a id="receiver_default-tab" class="p-2 grey-active rounded-3">Default</a></li>
            <li><a id="receiver_add_new-tab" class="p-2 rounded-3">Add new</a></li>

          </ul> <!-- END tabs-nav -->
          <div id="tabs-content border">
            <div id="receiver_default-tab-content" class="tab-content">
              <div class="row p-3">
                  <div class="col-lg-6 ">
                      <input type="text" hidden name="receiver_id" value="{{ Auth::user()->id }}">
                      <label for="" class="fw-medium d-block text-start mb-1">Name</label>
                      <input type="text" disabled class="form-control py-2" name="receiver_default_name" placeholder="Name" value="{{ Auth::user()->name }}" autofocus>
                  </div>

                  <div class="col-lg-6">
                      <label for="" class="fw-medium d-block text-start mb-1">Company Name</label>
                      <input type="text" disabled class="form-control py-2" name="receiver_default_company_name" placeholder="Company Name" value="{{ Auth::user()->company_name }}" autofocus>
                  </div>

                  <div class="col-lg-6">
                      <label for="" class="fw-medium d-block text-start mb-1">Email</label>
                     <input type="email" disabled class="form-control py-2" name="receiver_default_email" placeholder="email" value="{{ Auth::user()->email }}" autofocus>
                  </div>

                  <div class="col-lg-6 ">
                      <label for="" class="fw-medium d-block text-start mb-1">Phone Number</label>
                      <input type="number" disabled class="form-control py-2" name="receiver_default_phone_number" placeholder="Phone Number" value="{{ Auth::user()->phone }}" autofocus>
                  </div>
                  <div class="col-lg-6 ">
                      <label for="" class="fw-medium d-block text-start mb-1">Phone Number 2</label>
                      <input type="number" disabled class="form-control py-2" name="receiver_default_phone_2" placeholder="Phone number" value="{{ Auth::user()->phone }}" autofocus>
                  </div>
                  <div class="col-lg-6 ">
                      <label for="" class="fw-medium d-block text-start mb-1">Address</label>
                      <input type="text" disabled class="form-control py-2" name="receiver_default_address" placeholder="address" value="{{ Auth::user()->address }}" autofocus>
                  </div>
              </div>
            </div>
            <div id="receiver_add_new-tab-content" class="tab-content">
              <div class="row p-3">
                  <input type="text" hidden name="receiver_id" value="{{ Auth::user()->id }}">
                  <div class="col-lg-6 ">
                      <label for="" class="fw-medium d-block text-start mb-1">Name</label>
                      <input type="text" class="form-control py-2" name="receiver_add_name" placeholder="Name" autofocus>
                  </div>

                  <div class="col-lg-6">
                      <label for="" class="fw-medium d-block text-start mb-1">Company Name</label>
                      <input type="text" class="form-control py-2" name="receiver_add_company_name" placeholder="Company Name" autofocus>
                  </div>

                  <div class="col-lg-6">
                      <label for="" class="fw-medium d-block text-start mb-1">Email</label>
                      <input type="email" class="form-control py-2" name="receiver_add_email" placeholder="email" autofocus>
                  </div>

                  <div class="col-lg-6 ">
                      <label for="" class="fw-medium d-block text-start mb-1">Phone Number</label>
                      <input type="number" class="form-control py-2" name="receiver_add_phone_number" placeholder="Phone Number" autofocus>
                  </div>
                  <div class="col-lg-6 ">
                      <label for="" class="fw-medium d-block text-start mb-1">Phone Number 2</label>
                      <input type="number" class="form-control py-2" name="receiver_add_phone_number_2" placeholder="Phone number" autofocus>
                  </div>
                  <div class="col-lg-6 ">
                      <label for="" class="fw-medium d-block text-start mb-1">Address</label>
                      <input type="text" class="form-control py-2" name="receiver_add_address" placeholder="address" autofocus>
                  </div>
              </div>
            </div>

          </div> <!-- END tabs-content -->
        </div> <!-- END tabs -->
        <input type="button" name="previous" class="previous action-button rounded-3" value="Previous" />
        <input type="button" name="next" class="next action-button rounded-3" value="Next" />
      </fieldset>

    <fieldset>
      <h2 class="fs-title">Step 4</h2>
      <h3 class="fs-subtitle">Optional Services</h3>
        <div class="w-100 border p-5">
            @foreach($option_services as $key=>$option_service)
                <div class="form-check text-start">
                    <input class="form-check-input" name="service_name[{{ $key }}]" type="checkbox" value="{{ $option_service->id }}" id="service_id_{{ $option_service->id }}">
                    <label class="form-check-label" for="service_name">
                        {{ $option_service->name}} {{$option_service->price }}
                    </label>
                </div>
            @endforeach
        </div>
    <input type="button" name="previous" class="previous action-button rounded-3" value="Previous" />
    <input type="button" name="next" class="next action-button rounded-3" value="Next" />
  </fieldset>


  <fieldset>
    <h2 class="fs-title">Step 5</h2>
    <h3 class="fs-subtitle">Service before shipping & SS Custom Services</h3>
    <div class="container">
        <div class="row border p-5 rounded-3">
            <div class="col-6">
                <h5 class="text-start">Service before shipping</h5>
              <div >
              <div class="form-check text-start">
                  <input class="form-check-input" name="deregistration_service" type="checkbox" value="1" id="deregistration_service">
                  <label class="form-check-label" for="deregistration_service">
                      De-registration Service
                  </label>
              </div>
              <div class="form-check text-start">
                  <input class="form-check-input" name="english_export_service" type="checkbox" value="1" id="english_export_service">
                  <label class="form-check-label" for="english_export_service">
                      English Export Certificate Service
                  </label>
              </div>
              <div class="form-check text-start">
                  <input class="form-check-input" name="photo_service" type="checkbox" value="1" id="photo_service">
                  <label class="form-check-label" for="photo_service">
                      Photo Service
                  </label>
              </div>
                </div>
            </div>
            <div class="col-6">
                <h5 class="text-start">SS Custom Services</h5>
              <div >
              <div class="form-check text-start">
                  <input class="form-check-input" name="ss_custom_photo_service" type="checkbox" value="1" id="ss_custom_photo_service">
                  <label class="form-check-label" for="ss_custom_photo_service">
                      SS Custom Photo Service
                  </label>
              </div>
              <div class="form-check text-start">
                  <input class="form-check-input" name="ss_custom_inspection_service" type="checkbox" value="1" id="ss_custom_inspection_service">
                  <label class="form-check-label" for="ss_custom_inspection_service">
                      SS Custom Inspection Service
                  </label>
              </div>
              <div class="form-check text-start">
                  <input class="form-check-input" name="ss_custom_cleaning_service" type="checkbox" value="1" id="ss_custom_cleaning_service">
                  <label class="form-check-label" for="ss_custom_cleaning_service">
                      SS Custom Cleaning Service
                  </label>
            </div>
            </div>
        </div>
    </div>
      <input type="button" name="previous" class="previous action-button rounded-3" value="Previous" />
      <span class="btn btn-primary"  id="submitForm">Submit</span>
    </fieldset>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
