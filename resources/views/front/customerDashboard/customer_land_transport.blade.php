@extends('front.customerDashboard.customer_main')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div id="messageBox"></div>
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center mb-3">Land Transport & Shipping</h2>
                </div>
                <form action="{{ route('place_order_shipping') }}" method="post" id="myForm">
                    @csrf
                    <div class="col-12 mt-4">
                        <div class="box w-100 shadow border-1 border-danger">
                            <div class="box-header bg-primary">
                                <h2 class="text-white mx-3 py-3"><small class="fs-4">Step </small>1</h2>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 p-4">
                                    <select name="offer_id" id="offer_id" class="form-select w-50  py-3">
                                        <option disabled selected>Choose Offer</option>
                                        @foreach ($qoutes as $qoute)
                                            <option value="{{ $qoute->id }}">{{ $qoute->car_name }}, Offer:
                                                ({{ $qoute->offer }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 p-4">
                                    <select name="service" id="service" class="form-select w-50  py-3">
                                        <option disabled selected>Select a Service</option>
                                        <option value="container_plan">Container plan 30 days free</option>
                                        <option value="roro">Roro</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 p-4">
                                    <select name="country" id="country" class="form-select w-50  py-3">
                                        <option disabled selected>Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->listing_location_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-4 p-4">
                                    <select name="container_port" id="container_port" class="form-select w-50  py-3">
                                        <option disabled selected>Select a Port</option>
                                        @foreach ($ports as $port)
                                            <option value="{{ $port->id }}">{{ $port->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box w-100 shadow border-1 border-danger mt-3">
                            <div class="box-header bg-primary">
                                <h2 class="text-white mx-3 py-3"><small class="fs-4">Step </small>2</h2>
                            </div>
                            <h3 class="p-4">Consignee Information</h3>
                            <div class="box-body p-4">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="default-tab" data-bs-toggle="tab"
                                            data-bs-target="#default" type="button" role="tab" aria-controls="default"
                                            aria-selected="true">Default</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="add_new-tab" data-bs-toggle="tab"
                                            data-bs-target="#add_new" type="button" role="tab" aria-controls="add_new"
                                            aria-selected="false">Add New</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="default" role="tabpanel"
                                        aria-labelledby="default-tab">
                                        <div class="row">
                                            <input type="number" hidden name="consignee_id"
                                                value="{{ Auth::user()->id }}">
                                            <div class="col-12 p-4">
                                                <label for="consignee_name">Name <span class="text-danger">*</span></label>
                                                <input type="text" disabled class="form-control" name="default_name"
                                                    placeholder="Name" value="{{ Auth::user()->name }}">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="consignee_company_name">Company Name<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" disabled class="form-control"
                                                    name="default_company_name" placeholder="Company Name"
                                                    value="{{ Auth::user()->company_name }}">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="consignee_email">Email<span class="text-danger">*</span></label>
                                                <input type="email" disabled class="form-control" name="default_email"
                                                    placeholder="email" value="{{ Auth::user()->email }}">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="phone_number">Phone Number<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" required class="form-control"
                                                    name="default_phone_number" placeholder="Phone Number"
                                                    value="{{ Auth::user()->phone }}">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="phone_number_2">Phone Number 2</label>
                                                <input type="number" required class="form-control"
                                                    name="default_phone_2" placeholder="Phone number"
                                                    value="{{ Auth::user()->phone }}">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="address">Address <span class="text-danger">*</span></label>
                                                <input type="text" required class="form-control"
                                                    name="default_address" placeholder="address"
                                                    value="{{ Auth::user()->address }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="add_new" role="tabpanel"
                                        aria-labelledby="add_new-tab">
                                        <div class="row">
                                            <div class="col-12 p-4">
                                                <input type="number" hidden name="consignee_id"
                                                    value="{{ Auth::user()->id }}">
                                                <label for="consignee_name">Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" required class="form-control" name="consignee_name"
                                                    placeholder="Name">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="consignee_company_name">Company Name<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" required class="form-control"
                                                    name="consignee_company_name" placeholder="Company Name">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="consignee_email">Email<span
                                                        class="text-danger">*</span></label>
                                                <input type="email" required class="form-control"
                                                    name="consignee_email" placeholder="email">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="phone_number">Phone Number<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" required class="form-control" name="phone_number"
                                                    placeholder="Phone Number">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="phone_number_2">Phone Number 2</label>
                                                <input type="number" required class="form-control" name="phone_number_2"
                                                    placeholder="Phone number">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="address">Address <span class="text-danger">*</span></label>
                                                <input type="text" required class="form-control" name="address"
                                                    placeholder="address">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box w-100 shadow border-1 border-danger mt-3">
                            <div class="box-header bg-primary">
                                <h2 class="text-white mx-3 py-3"><small class="fs-4">Step </small>3</h2>
                            </div>
                            <h3 class="p-4">Receiver Information</h3>
                            <div class="box-body p-4">
                                <ul class="nav nav-tabs" id="myTab_receiver" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="receiver_default-tab" data-bs-toggle="tab"
                                            data-bs-target="#receiver_default" type="button" role="tab"
                                            aria-controls="default" aria-selected="true">Default</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="receiver_add_new-tab" data-bs-toggle="tab"
                                            data-bs-target="#receiver_add_new" type="button" role="tab"
                                            aria-controls="add_new" aria-selected="false">Add New</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTab_receiverContent">
                                    <div class="tab-pane fade show active" id="receiver_default" role="tabpanel"
                                        aria-labelledby="receiver_default-tab">
                                        <div class="row">
                                            <div class="col-12 p-4">
                                                <input type="text" hidden name="receiver_id"
                                                    value="{{ Auth::user()->id }}">
                                                <label for="receiver_default_name">Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" required class="form-control"
                                                    name="receiver_default_name" placeholder="Name"
                                                    value="{{ Auth::user()->name }}">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="receiver_default_company_name">Company Name<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" required class="form-control"
                                                    name="receiver_default_company_name" placeholder="Company Name"
                                                    value="{{ Auth::user()->company_name }}">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="receiver_default_email">Email<span
                                                        class="text-danger">*</span></label>
                                                <input type="email" required class="form-control"
                                                    name="receiver_default_email" placeholder="email"
                                                    value="{{ Auth::user()->email }}">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="receiver_default_phone_number">Phone Number<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" required class="form-control"
                                                    name="receiver_default_phone_number" placeholder="Phone Number"
                                                    value="{{ Auth::user()->phone }}">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="receiver_default_phone_number_2">Phone Number 2</label>
                                                <input type="number" required class="form-control"
                                                    name="receiver_default_phone_2" placeholder="Phone number"
                                                    value="{{ Auth::user()->phone }}">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="receiver_default_address">Address <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" required class="form-control"
                                                    name="receiver_default_address" placeholder="address"
                                                    value="{{ Auth::user()->address }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="receiver_add_new" role="receiver_tabpanel"
                                        aria-labelledby="receiver_add_new-tab">
                                        <div class="row">
                                            <div class="col-12 p-4">
                                                <input type="text" hidden name="receiver_id"
                                                    value="{{ Auth::user()->id }}">
                                                <label for="receiver_add_name">Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" required class="form-control"
                                                    name="receiver_add_name" placeholder="Name">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="receiver_add_company_name">Company Name<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" required class="form-control"
                                                    name="receiver_add_company_name" placeholder="Company Name">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="receiver_add_email">Email<span
                                                        class="text-danger">*</span></label>
                                                <input type="email" required class="form-control"
                                                    name="receiver_add_email" placeholder="email">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="receiver_add_phone_number">Phone Number<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" required class="form-control"
                                                    name="receiver_add_phone_number" placeholder="Phone Number">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="receiver_add_phone_number_2">Phone Number 2</label>
                                                <input type="number" required class="form-control"
                                                    name="receiver_add_phone_number_2" placeholder="Phone number">
                                            </div>
                                            <div class="col-12 p-4">
                                                <label for="receiver_add_address">Address <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" required class="form-control"
                                                    name="receiver_add_address" placeholder="address">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box w-100 shadow border-1 border-danger mt-3">
                            <div class="box-header bg-primary">
                                <h2 class="text-white mx-3 py-3"><small class="fs-4">Step </small>4</h2>
                            </div>
                            <h3 class="p-4">Option Services </h3>
                            <div class="box-body p-4">
                                @foreach ($option_services as $key => $option_service)
                                    <div class="form-check">
                                        <input class="form-check-input" name="service_name[{{ $key }}]"
                                            type="checkbox" value="{{ $option_service->id }}"
                                            id="service_id_{{ $option_service->id }}">
                                        <label class="form-check-label" for="service_name">
                                            {{ $option_service->name }} {{ $option_service->price }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="box w-100 shadow border-1 border-danger mt-3">
                            <div class="box-header bg-primary">
                                <h2 class="text-white mx-3 py-3"><small class="fs-4">Step </small>5</h2>
                            </div>
                            <div class="box-body p-4">
                                <h3>Service before shipping</h3>
                                <div class="form-check">
                                    <input class="form-check-input" name="deregistration_service" type="checkbox"
                                        value="1" id="deregistration_service">
                                    <label class="form-check-label" for="deregistration_service">
                                        De-registration Service
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="english_export_service" type="checkbox"
                                        value="1" id="english_export_service">
                                    <label class="form-check-label" for="english_export_service">
                                        English Export Certificate Service
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="photo_service" type="checkbox" value="1"
                                        id="photo_service">
                                    <label class="form-check-label" for="photo_service">
                                        Photo Service
                                    </label>
                                </div>
                                <h3>SS Custom Services</h3>
                                <div class="form-check">
                                    <input class="form-check-input" name="ss_custom_photo_service" type="checkbox"
                                        value="1" id="ss_custom_photo_service">
                                    <label class="form-check-label" for="ss_custom_photo_service">
                                        SS Custom Photo Service
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="ss_custom_inspection_service" type="checkbox"
                                        value="1" id="ss_custom_inspection_service">
                                    <label class="form-check-label" for="ss_custom_inspection_service">
                                        SS Custom Inspection Service
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="ss_custom_cleaning_service" type="checkbox"
                                        value="1" id="ss_custom_cleaning_service">
                                    <label class="form-check-label" for="ss_custom_cleaning_service">
                                        SS Custom Cleaning Service
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="submitForm" class="btn btn-primary float-end mt-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('submitForm').addEventListener('click', function() {
            const mandatoryFields = [
                'offer_id',
                'service',
                'country',
                'city',
                'container_port'
            ];
            const formData = {
                offer_id: parseInt(document.getElementById('offer_id').value),
                service: document.getElementById('service').value,
                country: parseInt(document.getElementById('country').value),
                city: parseInt(document.getElementById('city').value),
                container_port: parseInt(document.getElementById('container_port').value),
                consignee_tab: document.querySelector('#myTab .nav-link.active').id, // Get the active tab id
                receiver_tab: document.querySelector('#myTab_receiver .nav-link.active')
                    .id, // Get the active tab id
            };
            let isValid = true;
            for (const field of mandatoryFields) {
                if (!formData[field]) {
                    isValid = false;
                    break;
                }
            }
            if (!isValid) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please fill in all mandatory fields.',
                });
                return;
            }
            if (formData.consignee_tab === 'default-tab') {
                formData.consignee_id = parseInt({{ Auth::user()->id }});
                formData.default_name = document.querySelector('#default input[name="default_name"]').value;
                formData.default_company_name = document.querySelector(
                    '#default input[name="default_company_name"]').value;
                formData.default_email = document.querySelector('#default input[name="default_email"]').value;
                formData.default_phone_number = document.querySelector(
                    '#default input[name="default_phone_number"]').value;
                formData.default_phone_2 = document.querySelector('#default input[name="default_phone_2"]').value;
                formData.default_address = document.querySelector('#default input[name="default_address"]').value;
            } else {
                formData.consignee_id = parseInt({{ Auth::user()->id }});
                formData.default_name = document.querySelector('#add_new input[name="consignee_name"]').value;
                formData.default_company_name = document.querySelector(
                    '#add_new input[name="consignee_company_name"]').value;
                formData.default_email = document.querySelector('#add_new input[name="consignee_email"]').value;
                formData.default_phone_2 = document.querySelector('#add_new input[name="phone_number"]').value;
                formData.default_phone_2 = document.querySelector('#add_new input[name="phone_number_2"]').value;
                formData.default_address = document.querySelector('#add_new input[name="address"]').value;
            }

            if (formData.receiver_tab ===
                'receiver_default-tab') { // Use 'receiver_default' instead of 'receiver_default-tab'
                formData.receiver_id = parseInt({{ Auth::user()->id }});
                formData.receiver_default_name = document.querySelector(
                    '#receiver_default input[name="receiver_default_name"]').value;
                formData.receiver_default_company_name = document.querySelector(
                    '#receiver_default input[name="receiver_default_company_name"]').value;
                formData.receiver_default_email = document.querySelector(
                    '#receiver_default input[name="receiver_default_email"]').value;
                formData.receiver_default_phone_number = document.querySelector(
                    '#receiver_default input[name="receiver_default_phone_number"]').value;
                formData.receiver_default_phone_2 = document.querySelector(
                    '#receiver_default input[name="receiver_default_phone_2"]').value;
                formData.receiver_default_address = document.querySelector(
                    '#receiver_default input[name="receiver_default_address"]').value;
            } else {
                formData.receiver_id = parseInt({{ Auth::user()->id }});
                formData.receiver_default_name = document.querySelector(
                    '#receiver_add_new input[name="receiver_add_name"]').value;
                formData.receiver_default_company_name = document.querySelector(
                    '#receiver_add_new input[name="receiver_add_company_name"]').value;
                formData.receiver_default_email = document.querySelector(
                    '#receiver_add_new input[name="receiver_add_email"]').value;
                formData.receiver_default_phone_number = document.querySelector(
                    '#receiver_add_new input[name="receiver_add_phone_number"]').value;
                formData.receiver_default_phone_2 = document.querySelector(
                    '#receiver_add_new input[name="receiver_add_phone_number_2"]').value;
                formData.receiver_default_address = document.querySelector(
                    '#receiver_add_new input[name="receiver_add_address"]').value;
            }

            const serviceCheckboxes = document.querySelectorAll('input[name^="service_name"]');
            const selectedServiceIds = [];
            serviceCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    const matches = checkbox.name.match(/\[(\d+)\]/);
                    if (matches && matches.length > 1) {
                        selectedServiceIds.push(matches[1]);
                    }
                }
            });

            formData['service_name'] = selectedServiceIds;

            formData.deregistration_service = document.getElementById('deregistration_service').checked ? 1 : 0;
            formData.english_export_service = document.getElementById('english_export_service').checked ? 1 : 0;
            formData.photo_service = document.getElementById('photo_service').checked ? 1 : 0;
            formData.ss_custom_photo_service = document.getElementById('ss_custom_photo_service').checked ? 1 : 0;
            formData.ss_custom_inspection_service = document.getElementById('ss_custom_inspection_service')
                .checked ? 1 : 0;
            formData.ss_custom_cleaning_service = document.getElementById('ss_custom_cleaning_service').checked ?
                1 : 0;
            fetch("{{ route('place_order_shipping') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    body: JSON.stringify(formData),
                })
                .then(response => response.json())
                .then(data => {
                    if (data && data.message) {
                        if (data.shippingOrder) {
                            const shippingOrder = data.shippingOrder;
                            console.log("Shipping Order:", shippingOrder);
                        }

                        if (data.message.toLowerCase().includes("success")) {
                            // Success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: data.message,
                            });
                            location.reload();
                            window.scrollTo(0, 0);
                        } else {
                            // Error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.message,
                            });
                        }
                    } else {
                        // Handle cases where the response does not contain the expected data
                        console.error('Invalid response format:', data);
                    }
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });

        });
    </script>
@endsection
