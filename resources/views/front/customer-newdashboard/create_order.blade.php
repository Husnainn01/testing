@extends('front.customer-newdashboard.layouts.template')
@section('content')
    <form action="{{ route('place_order_shipping') }}" id="msform" style="min-height: 600px;">
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
        @csrf
        <!-- progressbar -->
        <ul id="progressbar" style="margin-left: 430px !important;">
            <li class="active">Personal Details</li>
            <li>Consignee information</li>
            <li>Finish</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">Step 1</h2>
            <h3 class="fs-subtitle">Select All The Fields</h3>
            <div class="box w-100 border rounded-3">

                <div class="row">
                    <div class="col-lg-12 p-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Choose Offers *</h5>
                                <a class="btn btn-danger text-decoration-none text-white" type="button"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal" id="openpop">Select Offers</a>
                                <!-- @if (count($qoutes) > 0)
    <ul class="list-group list-group-flush">
                                                                                                                                                                                            @foreach ($qoutes as $qoute)
    <li class="list-group-item">
                                                                                                                                                                                                    <div class="form-check">
                                                                                                                                                                                                        <input class="form-check-input" type="checkbox" name="offer_ids[]" value="{{ $qoute->id }}" id="offer_{{ $qoute->id }}">
                                                                                                                                                                                                        <label class="form-check-label" for="offer_{{ $qoute->id }}" style="display: inline-block; vertical-align: start;">
                                                                                                                                                                                                            {{ $qoute->car_name }}, Offer: ({{ $qoute->offer }})
                                                                                                                                                                                                        </label>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </li>
    @endforeach
                                                                                                                                                                                        </ul>
@else
    <a class="text-decoration-underline text-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >Please send an offer first.</a>
    @endif -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" style="max-width: 60%;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cars</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div style="height: 500px;overflow-y:auto;">
                                                    @if (count($qoutes) > 0)
                                                        <table class="table text-start">
                                                            <tr>
                                                                <th></th>
                                                                <th>Photos</th>
                                                                <th>Stock ID</th>
                                                                <th>Name</th>
                                                                <th>Transmission</th>
                                                                <th>Brand</th>
                                                            </tr>
                                                            @foreach ($qoutes as $qoute)
                                                                <tr>
                                                                    <td> <input type="checkbox" name="offer_ids[]"
                                                                            value="{{ $qoute->id }}"
                                                                            id="offer_{{ $qoute->id }}"> </td>
                                                                    <td>
                                                                        <img src="{{ asset('uploads/listing_featured_photos/' . $qoute->car->listing_featured_photo) }}"
                                                                            class="mt-2 rounded-3" height="60px"
                                                                            style="object-fit: cover;" alt="as">
                                                                    </td>
                                                                    <td>{{ $qoute->car->listing_stock_id }}</td>
                                                                    <td>{{ $qoute->car->listing_name }}</td>
                                                                    <td>{{ $qoute->car->listing_transmission }}</td>
                                                                    <td>{{ $qoute->car->rListingBrand->listing_brand_name }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    @else
                                                        <a class="text-decoration-underline text-primary" type="button"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal">Please
                                                            send an offer first.</a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                    id="order-select-button">Select</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="choose-car-offers"></div>
                        </div>
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
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->listing_location_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-4 p-4">
                        <select name="city" id="city" class="form-select w-100" disabled>
                            <option disable selected>Select Port <span class="text-danger">*</span></option>
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
                    <li><a id="default-tab" class="p-2 grey-active rounded-3">Default</a></li>
                    <li><a id="add_new-tab" class="p-2 rounded-3">Add new</a></li>
                </ul>
                <div id="tabs-content border">
                    <div id="default-tab-content" class="tab-content">
                        <input type="number" hidden name="consignee_id" value="{{ Auth::user()->id }}">
                        <div class="row p-3">
                            <div class="col-lg-6 ">
                                <label for="" class="fw-medium d-block text-start mb-1">Name</label>
                                <input type="text" disabled class="form-control py-2" name="default_name"
                                    placeholder="Name" value="{{ Auth::user()->name }}" autofocus>
                            </div>

                            <div class="col-lg-6">
                                <label for="" class="fw-medium d-block text-start mb-1">Company Name</label>
                                <input type="text" disabled class="form-control py-2" name="default_company_name"
                                    placeholder="Company Name" value="{{ Auth::user()->company_name }}" autofocus>
                            </div>

                            <div class="col-lg-6">
                                <label for="" class="fw-medium d-block text-start mb-1">Email</label>
                                <input type="email" disabled class="form-control py-2" name="default_email"
                                    placeholder="email" value="{{ Auth::user()->email }}" autofocus>
                            </div>

                            <div class="col-lg-6 ">
                                <label for="" class="fw-medium d-block text-start mb-1">Phone Number</label>
                                <input type="number" disabled class="form-control py-2" name="default_phone_number"
                                    placeholder="Phone Number" value="{{ Auth::user()->phone }}" autofocus>
                            </div>
                            <div class="col-lg-6 ">
                                <label for="" class="fw-medium d-block text-start mb-1">Phone Number 2</label>
                                <input type="number" disabled class="form-control py-2" name="default_phone_2"
                                    placeholder="Phone number" value="{{ Auth::user()->phone }}" autofocus>
                            </div>
                            <div class="col-lg-6 ">
                                <label for="" class="fw-medium d-block text-start mb-1">Address</label>
                                <input type="text" disabled class="form-control py-2" name="default_address"
                                    placeholder="address" value="{{ Auth::user()->address }}" autofocus>
                            </div>
                        </div>
                    </div>
                    <div id="add_new-tab-content" class="tab-content">
                        <div class="row p-3">
                            <input type="number" hidden name="consignee_id" value="{{ Auth::user()->id }}">

                            <div class="col-lg-6 ">
                                <label for="" class="fw-medium d-block text-start mb-1">Name</label>
                                <input type="text" class="form-control py-2" name="consignee_name" placeholder="Name"
                                    autofocus>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="fw-medium d-block text-start mb-1">Company Name</label>
                                <input type="text" class="form-control py-2" name="consignee_company_name"
                                    placeholder="Company Name">
                            </div>

                            <div class="col-lg-6">
                                <label for="" class="fw-medium d-block text-start mb-1">Email</label>
                                <input type="email" class="form-control py-2" name="consignee_email"
                                    placeholder="email">
                            </div>

                            <div class="col-lg-6 ">
                                <label for="" class="fw-medium d-block text-start mb-1">Phone Number</label>
                                <input type="number" class="form-control py-2" name="phone_number"
                                    placeholder="Phone Number">
                            </div>
                            <div class="col-lg-6 ">
                                <label for="" class="fw-medium d-block text-start mb-1">Phone Number 2</label>
                                <input type="number" class="form-control py-2" name="phone_number_2"
                                    placeholder="Phone number">
                            </div>
                            <div class="col-lg-6 ">
                                <label for="" class="fw-medium d-block text-start mb-1">Address</label>
                                <input type="text" class="form-control py-2" name="address" placeholder="address">
                            </div>
                        </div>
                    </div>
                </div> <!-- END tabs-content -->
            </div> <!-- END tabs -->
            <input type="button" name="previous" class="previous action-button rounded-3" value="Previous" />
            <input type="button" name="next" class="next action-button rounded-3" value="Next" />
            <div class="tabs border" id="tabs-nav-receiver">
                <ul id="tabs-nav" class="receiver_info" hidden>
                    <li><a id="receiver_default-tab" hidden class="p-2 grey-active rounded-3">Default</a></li>
                    <li><a id="receiver_add_new-tab" hidden class="p-2 rounded-3">Add new</a></li>

                </ul> <!-- END tabs-nav -->
                <div id="tabs-content border" hidden>
                    <div id="receiver_default-tab-content" class="tab-content">
                        <div class="row p-3">
                            <div class="col-lg-6 ">
                                <input type="text" hidden name="receiver_id" value="{{ Auth::user()->id }}">
                                <label for="" class="fw-medium d-block text-start mb-1">Name</label>
                                <input type="text" disabled class="form-control py-2" name="receiver_default_name"
                                    placeholder="Name" value="{{ Auth::user()->name }}" autofocus>
                            </div>

                            <div class="col-lg-6">
                                <label for="" class="fw-medium d-block text-start mb-1">Company Name</label>
                                <input type="text" disabled class="form-control py-2"
                                    name="receiver_default_company_name" placeholder="Company Name"
                                    value="{{ Auth::user()->company_name }}" autofocus>
                            </div>

                            <div class="col-lg-6">
                                <label for="" class="fw-medium d-block text-start mb-1">Email</label>
                                <input type="email" disabled class="form-control py-2" name="receiver_default_email"
                                    placeholder="email" value="{{ Auth::user()->email }}" autofocus>
                            </div>

                            <div class="col-lg-6 ">
                                <label for="" class="fw-medium d-block text-start mb-1">Phone Number</label>
                                <input type="number" disabled class="form-control py-2"
                                    name="receiver_default_phone_number" placeholder="Phone Number"
                                    value="{{ Auth::user()->phone }}" autofocus>
                            </div>
                            <div class="col-lg-6 ">
                                <label for="" class="fw-medium d-block text-start mb-1">Phone Number 2</label>
                                <input type="number" disabled class="form-control py-2" name="receiver_default_phone_2"
                                    placeholder="Phone number" value="{{ Auth::user()->phone }}" autofocus>
                            </div>
                            <div class="col-lg-6 ">
                                <label for="" class="fw-medium d-block text-start mb-1">Address</label>
                                <input type="text" disabled class="form-control py-2" name="receiver_default_address"
                                    placeholder="address" value="{{ Auth::user()->address }}" autofocus>
                            </div>
                        </div>
                    </div>
                    <div id="receiver_add_new-tab-content" class="tab-content" hidden>
                        <div class="row p-3">
                            <input type="text" hidden name="receiver_id" value="{{ Auth::user()->id }}">
                            <div class="col-lg-6 ">
                                <label for="" class="fw-medium d-block text-start mb-1">Name</label>
                                <input type="text" class="form-control py-2" name="receiver_add_name"
                                    placeholder="Name" autofocus>
                            </div>

                            <div class="col-lg-6">
                                <label for="" class="fw-medium d-block text-start mb-1">Company Name</label>
                                <input type="text" class="form-control py-2" name="receiver_add_company_name"
                                    placeholder="Company Name" autofocus>
                            </div>

                            <div class="col-lg-6">
                                <label for="" class="fw-medium d-block text-start mb-1">Email</label>
                                <input type="email" class="form-control py-2" name="receiver_add_email"
                                    placeholder="email" autofocus>
                            </div>

                            <div class="col-lg-6 ">
                                <label for="" class="fw-medium d-block text-start mb-1">Phone Number</label>
                                <input type="number" class="form-control py-2" name="receiver_add_phone_number"
                                    placeholder="Phone Number" autofocus>
                            </div>
                            <div class="col-lg-6 ">
                                <label for="" class="fw-medium d-block text-start mb-1">Phone Number 2</label>
                                <input type="number" class="form-control py-2" name="receiver_add_phone_number_2"
                                    placeholder="Phone number" autofocus>
                            </div>
                            <div class="col-lg-6 ">
                                <label for="" class="fw-medium d-block text-start mb-1">Address</label>
                                <input type="text" class="form-control py-2" name="receiver_add_address"
                                    placeholder="address" autofocus>
                            </div>
                        </div>
                    </div>

                </div> <!-- END tabs-content -->
            </div>
        </fieldset>

        <fieldset>
            <h2 class="fs-title">Step 3</h2>
            <h3 class="fs-subtitle">Service before shipping & SS Custom Services</h3>
            <div class="container">
                <div class="row border p-5 rounded-3">
                    <div class="col-6">
                        <h5 class="text-start">Service before shipping</h5>
                        <div>
                            <div class="form-check text-start">
                                <input class="form-check-input" name="deregistration_service" type="checkbox"
                                    value="1" id="deregistration_service">
                                <label class="form-check-label" for="deregistration_service">
                                    De-registration Service ${{ $deregistration_service->price }}
                                </label>
                            </div>
                            <div class="form-check text-start">
                                <input class="form-check-input" name="english_export_service" type="checkbox"
                                    value="1" id="english_export_service">
                                <label class="form-check-label" for="english_export_service">
                                    English Export Certificate Service ${{ $english_export_service->price }}
                                </label>
                            </div>
                            <div class="form-check text-start">
                                <input class="form-check-input" name="photo_service" type="checkbox" value="1"
                                    id="photo_service">
                                <label class="form-check-label" for="photo_service">
                                    Photo Service ${{ $photo_service->price }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <h5 class="text-start">SS Custom Services</h5>
                        <div>
                            <div class="form-check text-start">
                                <input class="form-check-input" name="ss_custom_photo_service" type="checkbox"
                                    value="1" id="ss_custom_photo_service">
                                <label class="form-check-label" for="ss_custom_photo_service">
                                    SS Custom Photo Service ${{ $ss_custom_photo_service->price }}
                                </label>
                            </div>
                            <div class="form-check text-start">
                                <input class="form-check-input" name="ss_custom_inspection_service" type="checkbox"
                                    value="1" id="ss_custom_inspection_service">
                                <label class="form-check-label" for="ss_custom_inspection_service">
                                    SS Custom Inspection Service ${{ $ss_custom_inspection_service->price }}
                                </label>
                            </div>
                            <div class="form-check text-start">
                                <input class="form-check-input" name="ss_custom_cleaning_service" type="checkbox"
                                    value="1" id="ss_custom_cleaning_service">
                                <label class="form-check-label" for="ss_custom_cleaning_service">
                                    SS Custom Cleaning Service ${{ $ss_custom_cleaning_service->price }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="button" name="previous" class="previous action-button rounded-3" value="Previous" />
                <span class="btn btn-primary" id="submitForm">Submit</span>
        </fieldset>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        document.querySelectorAll('#openpop').forEach(function(btn) {
            btn.addEventListener('click', function() {
                $('.modal-backdrop').remove();
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#country').on('change', function() {
                var countryId = $(this).val();

                // Make AJAX call to get cities based on the selected country
                $.ajax({
                    url: "{{ route('get_cities_and_ports') }}", // You might want to rename this route if it only returns cities now
                    type: 'GET',
                    data: {
                        country_id: countryId
                    },
                    success: function(response) {
                        // Update cities dropdown
                        console.log(response);
                        var citiesDropdown = $('#city');
                        citiesDropdown.empty().append(
                            '<option value="" selected>Select Port</option>'
                        ); // Always allow selection
                        citiesDropdown.prop('disabled', false); // Keep enabled
                        if (response.ports && response.ports.length > 0) {
                            $.each(response.ports, function(index, city) {
                                citiesDropdown.append('<option value="' + city.id +
                                    '">' + city.name + '</option>');
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     document.getElementById('order-select-button').addEventListener('click', function() {
        //         // Get all checked checkboxes
        //         var checkboxes = document.querySelectorAll('input[name="offer_ids[]"]:checked');
        //         var selectedOffers = [];

        //         // Iterate over each checked checkbox and extract its row data
        //         checkboxes.forEach(function(checkbox) {
        //             // Get the closest row of the checkbox
        //             var row = checkbox.closest('tr');

        //             // Extract the data from the row
        //             var rowData = {
        //                 photos: row.cells[1].querySelector('img').getAttribute('src'),
        //                 stockId: row.cells[2].textContent.trim(),
        //                 name: row.cells[3].textContent.trim(),
        //                 transmission: row.cells[4].textContent.trim(),
        //                 brand: row.cells[5].textContent.trim()
        //             };

        //             selectedOffers.push(rowData);
        //         });

        //         // Display the selected offers in the "choose-car-offers" element
        //         document.getElementById('choose-car-offers').innerHTML =
        //             '<h5 class="card-title">Selected Offers *</h5><div class="row">' +
        //             selectedOffers.map(function(offer) {
        //                 return '<div class="col-md-3 mb-3" style="margin-right: 30px">' +
        //                     '<img src="' + offer.photos +
        //                     '" class="mt-2 rounded-3" height="120px" style="object-fit: cover;" alt="Car Image">' +
        //                     // '<div>Stock ID: ' + offer.stockId + '</div>' +
        //                     '<div>' + offer.name + '</div>' +
        //                     // '<div>Transmission: ' + offer.transmission + '</div>' +
        //                     // '<div>Brand: ' + offer.brand + '</div>' +
        //                     '</div>';
        //             }).join('') + '</div>';
        //     });
        // });

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('order-select-button').addEventListener('click', function() {
                // Get all checked checkboxes
                var checkboxes = document.querySelectorAll('input[name="offer_ids[]"]:checked');
                var selectedOffers = [];

                // Iterate over each checked checkbox and extract its row data
                checkboxes.forEach(function(checkbox) {
                    // Get the closest row of the checkbox
                    var row = checkbox.closest('tr');

                    // Extract the data from the row
                    var rowData = {
                        photos: row.cells[1].querySelector('img').getAttribute('src'),
                        stockId: row.cells[2].textContent.trim(),
                        name: row.cells[3].textContent.trim(),
                        transmission: row.cells[4].textContent.trim(),
                        brand: row.cells[5].textContent.trim()
                    };

                    selectedOffers.push(rowData);
                });

                // Display the selected offers in the "choose-car-offers" element
                var chooseCarOffersElement = document.getElementById('choose-car-offers');
                chooseCarOffersElement.innerHTML =
                    '<h5 class="card-title">Selected Offers *</h5><div class="row"></div>'; // Create the row div

                var rowDiv = chooseCarOffersElement.querySelector('.row'); // Get the row div

                selectedOffers.forEach(function(offer, index) {
                    var offerElement = document.createElement('div');
                    offerElement.className = 'col-md-3 mb-3';
                    offerElement.style.marginRight = '30px';

                    // Create a container for the image and cross icon
                    var imageContainer = document.createElement('div');
                    imageContainer.style.position =
                        'relative'; // Make the container position relative

                    // Create an image element for the offer
                    var imgElement = document.createElement('img');
                    imgElement.src = offer.photos;
                    imgElement.className = 'mt-2 rounded-3';
                    imgElement.height = '120';
                    imgElement.style.objectFit = 'cover';
                    imgElement.alt = 'Car Image';

                    // Create a span element for the cross icon
                    var crossIcon = document.createElement('span');
                    crossIcon.className = 'cross-icon';
                    crossIcon.textContent = '❌';
                    crossIcon.style.cursor = 'pointer';
                    crossIcon.style.position = 'absolute'; // Make the cross icon position absolute
                    crossIcon.style.top = '0'; // Position at the top
                    crossIcon.style.right = '-35px'; // Position at the right
                    // Associate the cross icon with the offer index using a data attribute
                    crossIcon.setAttribute('data-index', index);

                    // Append the image and cross icon to the container
                    imageContainer.appendChild(imgElement);
                    imageContainer.appendChild(crossIcon);

                    var nameElement = document.createElement('div');
                    nameElement.textContent = offer.name;
                    nameElement.className = 'offer-name';

                    // Append the container and name element to the offer element
                    offerElement.appendChild(imageContainer);
                    offerElement.appendChild(nameElement);

                    // Append the offer element to the "row" div
                    rowDiv.appendChild(offerElement);
                });

                chooseCarOffersElement.querySelectorAll('.cross-icon').forEach(function(crossIcon) {
                    crossIcon.addEventListener('click', function() {
                        var offerElement = crossIcon.parentNode.parentNode;
                        var indexToRemove = parseInt(crossIcon.getAttribute('data-index'));
                        selectedOffers.splice(indexToRemove, 1);
                        offerElement.parentNode.removeChild(offerElement);
                        checkboxes[indexToRemove].checked = false;
                    });
                });
            });
        });
    </script>


@endsection
