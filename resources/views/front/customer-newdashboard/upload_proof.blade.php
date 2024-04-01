@extends('front.customer-newdashboard.layouts.template')

@section('content')
    <section class="container-fluid p-3 nav-small-txt border-bottom">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item text-primary">Dashboard</li>>
            <li class="list-inline-item mx-2">All Inovices</li>

        </ul>
        <h3 class="fw-medium">Upload Proof of Payment</h3>
        <small>It contains all the quotations you have requested.</small>
    </section>

    <section class="container-fluid">
        <div class="col-12 p-4">
            <form id="search_filter" method="" action="" class="w-100">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="invoice-status" class="form-label">Select Invoice Status</label>
                        <select id="invoice-status" name="invoice-status" class="form-select">
                            <option disabled selected>Select Invoice Status</option>
                            <option value="paid" {{ request()->input('invoice-status') == 'paid' ? 'selected' : '' }}>Paid
                            </option>
                            <option value="unpaid" {{ request()->input('invoice-status') == 'unpaid' ? 'selected' : '' }}>
                                Unpaid</option>
                            <option value="paid_unpaid"
                                {{ request()->input('invoice-status') == 'paid_unpaid' ? 'selected' : '' }}>Paid + Unpaid
                            </option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="from_date" class="form-label">From Date</label>
                        <input type="date" id="from_date" name="from_date" class="form-control"
                            value="{{ request()->input('from_date') }}">
                    </div>

                    <div class="col-md-4">
                        <label for="to_date" class="form-label">To Date</label>
                        <input type="date" id="to_date" name="to_date" class="form-control"
                            value="{{ request()->input('to_date') }}">
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="button" class="btn btn-secondary" id="reset_filter">Reset</button>
                    </div>
                </div>
            </form>

        </div>

        <div class="table-container w-100 overflow-x-auto">
            <div class="table-container">
                <table class="table table-striped track-table" style="width:100%">
                    <thead>
                        <tr>
                            <th>SS No</th>
                            <th>Photo</th>
                            <th>Car Name/ Chassis No</th>
                            <th>Country</th>
                            <th>PORT</th>
                            <th>Status</th>
                            <th>Vessel Name</th>
                            <th>ETD / POL</th>
                            <th>ETA / POD</th>
                            <th>Consignee Name / Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($ShippingOrder as $invoice)
                            @if (request()->input('invoice-status') == 'paid')
                                @if ($invoice->invoice_path != '' && $invoice->paid_invoice_path != '')
                                    <tr>

                                        <td>
                                            ss-{{ $counter++ }}
                                        </td>
                                        <td>
                                            @php
                                                $photoUrl = asset(
                                                    'uploads/listing_featured_photos/' .
                                                        $invoice->offers[0]->car->listing_featured_photo,
                                                );
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
                                                            {{ $offer->car_name }} / {{ $offer->car->listing_vin }}
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
                                        <td>
                                            @if ($invoice->paid_invoice_path != '')
                                                Pending for verification
                                            @else
                                                Unpaid
                                            @endif
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
                                            {{ $invoice->default_name }} /
                                            {{ $invoice->country_selected->listing_location_name }}

                                        </td>
                                        <td>

                                            <button type="button" class="bg-transparent border-0" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $invoice->id }}">
                                                <i class="fa-solid fa-upload fs-4" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Upload Images"></i>
                                            </button>



                                            <div class="modal fade test" id="exampleModal{{ $invoice->id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Upload
                                                                Images</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form id="CuploadForm" class="CuploadForm"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="upload__box">
                                                                    <div class="upload__btn-box">
                                                                        <label class="upload__btn  m-auto d-block w-50">
                                                                            <i class="fa-solid fa-cloud-arrow-up fs-1"></i>
                                                                            <input type="hidden"
                                                                                value="{{ $invoice->id }}" name="oInvoice"
                                                                                id="oInvoice">
                                                                            <input type="hidden"
                                                                                value="{{ basename($invoice->invoice_path) }}"
                                                                                name="oname" id="oname">
                                                                            <input type="file" multiple=""
                                                                                name="paidInvoice"
                                                                                id="paidInvoice{{ $invoice->id }}"
                                                                                required data-max_length="20"
                                                                                class="upload__inputfile"
                                                                                accept=".pdf,.png,.jpg,.jpeg">
                                                                        </label>
                                                                    </div>
                                                                    <div class="upload__img-wrap"></div>
                                                                </div>
                                                                <div class="selected-files">
                                                                    <h3>Files Selected:</h3>
                                                                    <ul id="fileList{{ $invoice->id }}"></ul>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {


                                                    var pi{{ $invoice->id }} = document.getElementById('paidInvoice{{ $invoice->id }}');
                                                    if (pi{{ $invoice->id }} !== null) {
                                                        pi{{ $invoice->id }}.addEventListener('change', function() {
                                                            var fileList = pi{{ $invoice->id }}.files;
                                                            var fileDisplayList = document.getElementById('fileList{{ $invoice->id }}');

                                                            fileDisplayList.innerHTML = '';

                                                            for (var i = 0; i < fileList.length; i++) {
                                                                var fileItem = document.createElement('li');
                                                                var fileName = fileList[i].name;

                                                                // Check file extension
                                                                var ext = fileName.split('.').pop().toLowerCase();
                                                                if (['pdf', 'png', 'jpg', 'jpeg'].indexOf(ext) === -1) {
                                                                    alert('Error: Please upload only PDF, PNG, JPG, or JPEG files.');
                                                                    continue; // Skip this file
                                                                }
                                                                fileItem.textContent = fileList[i].name;

                                                                var deleteBtn = document.createElement('span');
                                                                deleteBtn.textContent = ' ❌';
                                                                deleteBtn.style.cursor = 'pointer';
                                                                deleteBtn.onclick = function() {
                                                                    fileItem.remove();
                                                                };

                                                                fileItem.appendChild(deleteBtn);
                                                                fileDisplayList.appendChild(fileItem);
                                                            }
                                                        });
                                                    }

                                                });
                                            </script>



                                        </td>
                                    </tr>
                                @endif
                            @endif


                            @if (request()->input('invoice-status') == 'unpaid')
                                @if ($invoice->invoice_path != '' && $invoice->paid_invoice_path == '')
                                    <tr>

                                        <td>
                                            ss-{{ $counter++ }}
                                        </td>
                                        <td>
                                            @php
                                                if ($invoice->offers[0]->car->listing_featured_photo) {
                                                    $photoUrl = asset(
                                                        'uploads/listing_featured_photos/' .
                                                            $invoice->offers[0]->car->listing_featured_photo,
                                                    );
                                                }
                                            @endphp
                                            @if ($photoUrl)
                                                <img src="{{ $photoUrl }}" class="w-100 mt-2" height="40px"
                                                    style="object-fit: cover; height:40px" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            <ul>

                                                @foreach ($invoice->offers as $offer)
                                                    <li>
                                                        <a class="text-primary text-decoration-underline"
                                                            href="{{ route('customer.shipment.view', ['id' => $invoice->id]) }}"
                                                            title="View Shipment">
                                                            {{ $offer->car_name }} / {{ $offer->car->listing_vin }}
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
                                        <td>
                                            @if ($invoice->paid_invoice_path != '')
                                                Pending for verification
                                            @else
                                                Unpaid
                                            @endif
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
                                            {{ $invoice->default_name }} /
                                            {{ $invoice->country_selected->listing_location_name }}

                                        </td>
                                        <td>

                                            <button type="button" class="bg-transparent border-0" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $invoice->id }}">
                                                <i class="fa-solid fa-upload fs-4" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Upload Images"></i>
                                            </button>

                                            <div class="modal fade" id="exampleModal{{ $invoice->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Upload
                                                                Images
                                                            </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form id="CuploadForm" class="CuploadForm"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="upload__box">
                                                                    <div class="upload__btn-box">
                                                                        <label class="upload__btn  m-auto d-block w-50">
                                                                            <i class="fa-solid fa-cloud-arrow-up fs-1"></i>
                                                                            <input type="hidden"
                                                                                value ="{{ $invoice->id }}"
                                                                                name="oInvoice" id="oInvoice">
                                                                            <input type="hidden"
                                                                                value ="{{ basename($invoice->invoice_path) }}"
                                                                                name="oname" id="oname">
                                                                            <input type="file" multiple=""
                                                                                name="paidInvoice"
                                                                                id="paidInvoice{{ $invoice->id }}"
                                                                                required data-max_length="20"
                                                                                class="upload__inputfile"
                                                                                accept=".pdf,.png,.jpg,.jpeg">
                                                                        </label>
                                                                    </div>
                                                                    <div class="upload__img-wrap"></div>
                                                                </div>
                                                                <div class="selected-files">
                                                                    <h3>Files Selected:</h3>
                                                                    <ul id="fileList{{ $invoice->id }}"></ul>
                                                                </div>



                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {


                                                    var pi{{ $invoice->id }} = document.getElementById('paidInvoice{{ $invoice->id }}');
                                                    if (pi{{ $invoice->id }} !== null) {
                                                        pi{{ $invoice->id }}.addEventListener('change', function() {
                                                            var fileList = pi{{ $invoice->id }}.files;
                                                            var fileDisplayList = document.getElementById('fileList{{ $invoice->id }}');

                                                            fileDisplayList.innerHTML = '';

                                                            for (var i = 0; i < fileList.length; i++) {
                                                                var fileItem = document.createElement('li');
                                                                var fileName = fileList[i].name;

                                                                // Check file extension
                                                                var ext = fileName.split('.').pop().toLowerCase();
                                                                if (['pdf', 'png', 'jpg', 'jpeg'].indexOf(ext) === -1) {
                                                                    alert('Error: Please upload only PDF, PNG, JPG, or JPEG files.');
                                                                    continue; // Skip this file
                                                                }
                                                                fileItem.textContent = fileList[i].name;

                                                                var deleteBtn = document.createElement('span');
                                                                deleteBtn.textContent = ' ❌';
                                                                deleteBtn.style.cursor = 'pointer';
                                                                deleteBtn.onclick = function() {
                                                                    fileItem.remove();
                                                                };

                                                                fileItem.appendChild(deleteBtn);
                                                                fileDisplayList.appendChild(fileItem);
                                                            }
                                                        });
                                                    }

                                                });
                                            </script>


                                        </td>
                                    </tr>
                                @endif
                            @endif

                            @if (request()->input('invoice-status') == 'paid_unpaid' || !request()->has('invoice-status'))
                                @if ($invoice->invoice_path != '')
                                    <tr>

                                        <td>
                                            ss-{{ $counter++ }}
                                        </td>
                                        <td>
                                            @php
                                                $photoUrl = asset(
                                                    'uploads/listing_featured_photos/' .
                                                        $invoice->offers[0]->car->listing_featured_photo,
                                                );
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
                                                            {{ $offer->car_name }} / {{ $offer->car->listing_vin }}
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
                                        <td>
                                            @if ($invoice->paid_invoice_path != '')
                                                Pending for verification
                                            @else
                                                Unpaid
                                            @endif
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
                                            {{ $invoice->default_name }} /
                                            {{ $invoice->country_selected->listing_location_name }}

                                        </td>
                                        <td>

                                            <button type="button" class="bg-transparent border-0" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $invoice->id }}">
                                                <i class="fa-solid fa-upload fs-4" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Upload Images"></i>
                                            </button>

                                            <div class="modal fade" id="exampleModal{{ $invoice->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Upload
                                                                Images
                                                            </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form id="CuploadForm" class="CuploadForm"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="upload__box">
                                                                    <div class="upload__btn-box">
                                                                        <label class="upload__btn  m-auto d-block w-50">
                                                                            <i class="fa-solid fa-cloud-arrow-up fs-1"></i>
                                                                            <input type="hidden"
                                                                                value ="{{ $invoice->id }}"
                                                                                name="oInvoice" id="oInvoice">
                                                                            <input type="hidden"
                                                                                value ="{{ basename($invoice->invoice_path) }}"
                                                                                name="oname" id="oname">
                                                                            <input type="file" multiple=""
                                                                                name="paidInvoice"
                                                                                id="paidInvoice{{ $invoice->id }}"
                                                                                required data-max_length="20"
                                                                                class="upload__inputfile"
                                                                                accept=".pdf,.png,.jpg,.jpeg">
                                                                        </label>
                                                                    </div>
                                                                    <div class="upload__img-wrap"></div>
                                                                </div>
                                                                <div class="selected-files">
                                                                    <h3>Files Selected:</h3>
                                                                    <ul id="fileList{{ $invoice->id }}"></ul>
                                                                </div>



                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {


                                                    var pi{{ $invoice->id }} = document.getElementById('paidInvoice{{ $invoice->id }}');
                                                    if (pi{{ $invoice->id }} !== null) {
                                                        pi{{ $invoice->id }}.addEventListener('change', function() {
                                                            var fileList = pi{{ $invoice->id }}.files;
                                                            var fileDisplayList = document.getElementById('fileList{{ $invoice->id }}');

                                                            fileDisplayList.innerHTML = '';

                                                            for (var i = 0; i < fileList.length; i++) {
                                                                var fileItem = document.createElement('li');
                                                                var fileName = fileList[i].name;

                                                                // Check file extension
                                                                var ext = fileName.split('.').pop().toLowerCase();
                                                                if (['pdf', 'png', 'jpg', 'jpeg'].indexOf(ext) === -1) {
                                                                    alert('Error: Please upload only PDF, PNG, JPG, or JPEG files.');
                                                                    continue; // Skip this file
                                                                }
                                                                fileItem.textContent = fileList[i].name;

                                                                var deleteBtn = document.createElement('span');
                                                                deleteBtn.textContent = ' ❌';
                                                                deleteBtn.style.cursor = 'pointer';
                                                                deleteBtn.onclick = function() {
                                                                    fileItem.remove();
                                                                };

                                                                fileItem.appendChild(deleteBtn);
                                                                fileDisplayList.appendChild(fileItem);
                                                            }
                                                        });
                                                    }

                                                });
                                            </script>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        {{-- <tr>
                            <td>
                                dumi
                            </td>
                            <td>
                                dumi
                            </td>
                            <td>
                                dumi
                            </td>
                            <td>
                                dumi

                            </td>
                            <td>
                                dumi
                            </td>
                            <td>

                                dumi
                            </td>

                            <td>

                                <button type="button" class="bg-transparent border-0" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-upload fs-4" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Upload Images"></i>
                                </button>

                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Images</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="upload__box">
                                                    <div class="upload__btn-box">
                                                        <label class="upload__btn  m-auto d-block w-50">
                                                            <i class="fa-solid fa-cloud-arrow-up fs-1"></i>
                                                            <input type="file" multiple="" data-max_length="20"
                                                                class="upload__inputfile">
                                                        </label>
                                                    </div>
                                                    <div class="upload__img-wrap"></div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>

                            </td>
                        </tr> --}}

                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {

        $(".CuploadForm").submit(function(e) {
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
