@extends('front.customer-newdashboard.layouts.template')
@section('content')
    <div class="content-body mt-2">
        <div class="container-fluid">
            <div class="row">
                <h2>Shipment Request Details</h2>
                <div class="col-lg-12 col-md-12 col-sm-12 my-3">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card p-4 shadow">
                                        @php
                                            $offers = $shippingOrder->offers;
                                        @endphp
                                        @foreach ($offers as $offer)
                                            @php
                                                $car = $offer->car;
                                            @endphp
                                            <h3>Car Details</h3>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th>Title:</th>
                                                                <td class="text-end">{{ $car->listing_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Location:</th>
                                                                <td class="text-end">
                                                                    {{ $car->rListingLocation->listing_location_name }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Contact number:</th>
                                                                <td class="text-end">
                                                                    {{ $car->listing_phone }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Email:</th>
                                                                <td class="text-end">
                                                                    {{ $car->listing_email }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Price:</th>
                                                                <td class="text-end">
                                                                    {{ $car->listing_price }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Steering:</th>
                                                                <td class="text-end">
                                                                    {{ $car->steering }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Fuel Type:</th>
                                                                <td class="text-end">
                                                                    {{ $car->listing_fuel_type }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Transmission:</th>
                                                                <td class="text-end">
                                                                    {{ $car->listing_transmission }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Engine Capacity:</th>
                                                                <td class="text-end">
                                                                    {{ $car->listing_engine_capacity }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>VIN:</th>
                                                                <td class="text-end">
                                                                    {{ $car->listing_vin }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Body:</th>
                                                                <td class="text-end">
                                                                    {{ $car->listing_body }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Seats:</th>
                                                                <td class="text-end">
                                                                    {{ $car->listing_seat }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Wheel:</th>
                                                                <td class="text-end">
                                                                    {{ $car->listing_wheel }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Doors:</th>
                                                                <td class="text-end">
                                                                    {{ $car->listing_door }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Mileage:</th>
                                                                <td class="text-end">
                                                                    {{ $car->listing_mileage }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Model Year:</th>
                                                                <td class="text-end">
                                                                    {{ $car->listing_model_year }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Type:</th>
                                                                <td class="text-end">
                                                                    {{ $car->listing_type }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                                    <div class="card p-4 shadow">
                                        <h3>Shipping Order Details</h3>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Shipping Order ID:</th>
                                                    <td class="text-center">{{ $shippingOrder->shipping_id }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Service:</th>
                                                    <td class="text-center">{{ $shippingOrder->service }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Country:</th>
                                                    {{-- <td class="text-center">{{ $shippingOrder->country }}</td> --}}
                                                    <td class="text-center">
                                                        {{ $shippingOrder->country_selected->listing_location_name }}</td>
                                                </tr>
                                                {{-- <tr>
                                                    <th>City:</th>
                                                    <td class="text-center">{{ $shippingOrder->city }}</td>
                                                </tr> --}}
                                                <tr>
                                                    <th>Container Port:</th>
                                                    {{-- <td class="text-center">{{ $shippingOrder->container_port }}</td> --}}
                                                    <td class="text-center">{{ $shippingOrder->port_selected->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Consignee Name:</th>
                                                    <td class="text-center">{{ $shippingOrder->default_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Consignee Email:</th>
                                                    <td class="text-center">{{ $shippingOrder->default_email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Consignee Company:</th>
                                                    <td class="text-center">{{ $shippingOrder->default_company_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Consignee Phone Number:</th>
                                                    <td class="text-center">{{ $shippingOrder->default_phone_number }}</td>
                                                </tr>
                                                {{-- <tr>
                                                    <th>Receiver Name:</th>
                                                    <td class="text-center">{{ $shippingOrder->receiver_default_name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Receiver Email:</th>
                                                    <td class="text-center">{{ $shippingOrder->receiver_default_email }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Receiver Company:</th>
                                                    <td class="text-center">
                                                        {{ $shippingOrder->receiver_default_company_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Receiver Phone Number:</th>
                                                    <td class="text-center">
                                                        {{ $shippingOrder->receiver_default_phone_number }}</td>
                                                </tr> --}}
                                                {{-- <tr>
                                                    <th>Status:</th>
                                                    <td class="text-center">{{ $shippingOrder->status }}</td>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div id="carousel" class="carousel slide gallery background-secondary"
                                        data-ride="carousel">
                                        <div class="carousel-inner">
                                            @php $key = 0; @endphp

                                            {{-- @php $key++; @endphp --}}
                                            {{-- <div class="carousel-item {{ $key == 1 ? 'active' : '' }}"
                                                data-slide-number="1" data-toggle="lightbox" data-gallery="gallery"
                                                data-remote="https://cdn.pixabay.com/photo/2023/05/05/04/38/ai-generated-7971480_640.png">
                                                <img height="300" style="object-fit: cover;"
                                                    src="https://cdn.pixabay.com/photo/2023/05/05/04/38/ai-generated-7971480_640.png"
                                                    class="d-block w-100" alt="...">
                                            </div> --}}



                                            {{-- Use this code for images --}}
                                            @foreach ($listing_photos as $photos)
                                                @php $key++; @endphp
                                                <div class="carousel-item {{ $key == 1 ? 'active' : '' }}"
                                                    data-slide-number="{{ $key }}" data-toggle="lightbox"
                                                    data-gallery="gallery"
                                                    data-remote="{{ asset('/uploads/car_photos/' . $photos->car_photo) }}">
                                                    <img height="300" style="object-fit: cover;"
                                                        src="{{ asset('/uploads/listing_photos/' . $photos->photo) }}"
                                                        class="d-block w-100" alt="...">
                                                </div>
                                            @endforeach

                                            {{--  --}}

                                        </div>

                                        <a class="carousel-control-prev" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                        {{-- <a class="carousel-fullscreen" href="#carousel" role="button">
                                        <span class="carousel-fullscreen-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Fullscreen</span>
                                    </a>
                                    <a class="carousel-pause pause" href="#carousel" role="button">
                                        <span class="carousel-pause-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Pause</span>
                                    </a> --}}
                                    </div>
                                </div>
                                <!-- DOCUMENTS -->
                                {{-- <div class="col-lg-12 col-md-12 col-sm-12">
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
                                                            <a
                                                                href="{{ route('customer_download.shipping_documents', $etdEtaDocument->id) }}">
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
                                                            <a
                                                                href="{{ route('customer_download.shipping_documents', $polPodDocument->id) }}">
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
                                                            <a
                                                                href="{{ route('customer_download.shipping_documents', $blDocument->id) }}">
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
                                                            <a
                                                                href="{{ route('customer_download.shipping_documents', $exportDocument->id) }}">
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
                                </div> --}}
                                <!-- TT Documents -->
                                {{-- <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card shadow mb-4 p-4">
                                        <h3>Shipping TT Document</h3>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>TT Document</th>
                                                    <th>Uploaded at</th>
                                                </tr>
                                                @foreach ($shippingOrder->tt_documents as $ttDocs)
                                                    <tr>
                                                        <td>
                                                            @if ($ttDocs)
                                                                <a
                                                                    href="{{ route('customer_download.tt_doc', $ttDocs->id) }}">
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
                                </div> --}}
                                {{-- <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <form action="{{ route('customer_shipping_documents.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                                                    <h4>Upload TT Copy</h4>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="radio"
                                                            name="status" id="tt_copy" value="vessel" checked>
                                                        <label class="form-check-label" for="tt_copy">TT Copy</label>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="documents">Upload Documents *</label>
                                                        <input type="file" name="documents[]"
                                                            class="form-control-file" multiple accept=".pdf" required>
                                                    </div>
                                                </div>
                                                <input type="number" hidden name="shippment_id"
                                                    value="{{ $shippingOrder->id }}">
                                                <button type="submit" class="btn btn-success">Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize the carousel
            $("#carousel").carousel();

            // Handle custom carousel navigation buttons
            $(".carousel-control-prev").click(function() {
                fadeCarousel("prev");
            });

            $(".carousel-control-next").click(function() {
                fadeCarousel("next");
            });

            // Handle thumbnail clicks
            $("#carousel-thumbs .thumb").click(function() {
                var slideNumber = parseInt($(this).attr("data-slide-to"));
                fadeCarousel(slideNumber);
            });

            // Update thumbnail selection on slide change
            $("#carousel").on("slide.bs.carousel", function(event) {
                var currentSlide = $(event.relatedTarget);
                var slideNumber = currentSlide.index();
                $("#carousel-thumbs .thumb").removeClass("selected");
                $("#carousel-selector-" + slideNumber).addClass("selected");
            });

            // Function to fade carousel
            function fadeCarousel(slideNumber) {
                var $carouselInner = $("#carousel .carousel-inner");
                var $slides = $carouselInner.find(".carousel-item");
                var $activeSlide = $carouselInner.find(".carousel-item.active");

                if (typeof slideNumber === 'string') {
                    slideNumber = slideNumber === "prev" ? $activeSlide.prev().index() : $activeSlide.next()
                        .index();
                }

                if (slideNumber >= $slides.length) {
                    slideNumber = 0;
                } else if (slideNumber < 0) {
                    slideNumber = $slides.length - 1;
                }

                var $nextSlide = $slides.eq(slideNumber);

                if (!$nextSlide.hasClass("active")) {
                    $activeSlide.fadeOut(400, function() {
                        $activeSlide.removeClass("active");
                        $nextSlide.fadeIn(400).addClass("active");
                    });
                }
            }
        });
    </script>
@endsection
