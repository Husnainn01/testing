@extends('front.customer-newdashboard.layouts.template')
@section('content')
<section class="container-fluid p-3 nav-small-txt border-bottom">
    <ul class="list-unstyled list-inline">
        <li class="list-inline-item text-primary">Dashboard</li>>
        <li class="list-inline-item mx-2">Car Detail / {{ $detail->listing_name }}</li>
    </ul>
    <h3 class="fw-medium">{{ $detail->listing_name }} Details</h3>
</section>
<section class="container mb-3">
    <div class="row">

        <div class="col-6" >
            <div id="carousel" class="carousel slide gallery background-secondary" data-ride="carousel">
                <div class="carousel-inner">
                    @php $key = 0; @endphp
                    @foreach ($listing_photos as $photos)
                        @php $key++; @endphp
                        <div class="carousel-item {{ $key == 1 ? 'active' : '' }}" data-slide-number="{{ $key }}" data-toggle="lightbox" data-gallery="gallery" data-remote="{{ asset('/uploads/car_photos/'.$photos->car_photo) }}">
                            <img height="300" style="object-fit: cover;" src="{{ asset('/uploads/listing_photos/'.$photos->photo) }}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach
                </div>

                <a class="carousel-control-prev"  role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next"  role="button" data-slide="next">
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

            <!-- Carousel Navigatiom -->
            <div id="carousel-thumbs" class="carousel slide " data-ride="carousel">
                <div class="carousel-inner ">
                    <div class="carousel-item active" data-slide-number="0">
                        <div class="row mx-0 " style="background:#EBEBEB!important;">
                            @php $value = 0; @endphp
                    @foreach ($listing_photos as $photos)

                        <div id="carousel-selector-{{$value}}" class="thumb col-3 px-1 py-2  {{ $value == 0 ? 'selected' : '' }}" data-target="#carousel" data-slide-to="{{$value}}">
                            @php $value++; @endphp
                            <img src="{{ asset('/uploads/listing_photos/'.$photos->photo) }}" style="height: 85px;
                            width: 100%;
                            object-fit: cover;cursor:pointer;"  alt='img' class="img-fluid">
                        </div>
                    @endforeach


                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="row my-2">
                <div class="col-md-12 mb-3">
                    <h6 class="fw-bold mt-2 mb-0">Total Price: ${{ $detail->listing_price }}</h6>
                    <small class="mb-0 mt-3 d-block">Final Country : <span class="fw-bold">{{ $detail->rListingLocation->listing_location_name ?? '-' }}</span></small>
                    <small>City : <span class="fw-bold">{{ $detail->rListingLocation->cities->first()->name ?? '-' }}</span></small>
                    <h3>Specification</h3>
                </div>
                <div
                    class="col-md-2 col-sm-6 col-sm-6 col-lg-2 border-right specification border-dark text-center p-md-0 p-lg-0 p-3">
                    <p class="mb-0">{{ $user_favourite->listing_mileage ?? '-' }}</p><small class="text-center">Mileage</small>
                </div>
                <div
                    class="col-md-2 col-sm-6 col-sm-6 col-lg-2 border-right specification border-dark text-center  p-md-0 p-lg-0 p-3">
                    <p class="mb-0">{{$detail->listing_model_year ?? '-'}}</p><small class="text-center">Year</small>
                </div>
                <div
                    class="col-md-2 col-sm-6 col-sm-6 col-lg-2 border-right specification border-dark text-center  p-md-0 p-lg-0 p-3">
                    <p class="mb-0">{{$detail->listing_engine_capacity ?? '-'}}</p><small class="text-center">Engine</small>
                </div>
                <div
                    class="col-md-2 col-sm-6 col-sm-6 col-lg-2 border-right specification border-dark text-center  p-md-0 p-lg-0 p-3">
                    <p class="mb-0">{{$detail->listing_transmission ?? '-'}}</p><small class="text-center">Trans</small>
                </div>
                <div
                    class="col-md-3 col-sm-6 col-sm-6 col-lg-3 border-right specification border-dark text-center  p-md-0 p-lg-0 p-3">
                    <p class="mb-0">{{$listing_locations_car->listing_location_name ?? '-'}}</p><small class="text-center">Location</small>
                </div>


            </div>
            <div class="row my-4 pe-5">
                <table class="table-bordered w-100 text-left specification">
                    {{-- <tr >
                                <td style="background: #EBF3FF;" class="text-left pl-2"><small>Price</small></td>
                                <td class="text-left pl-2"><small>{{$detail->listing_price ?? '-'}}</small></td>
                    </tr> --}}
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Type</small></td>
                        <td class="text-center pl-2"><small>{{$detail->listing_type ?? '-'}}</small></td>
                    </tr>

                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Exterior Color</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_exterior_color ?? '-'}}</small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Interior Color</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_interior_color ?? '-'}}</small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Cylinder</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_cylinder}}</small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Steering</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_steering ?? '-'}}</small></td>
                    </tr>
                    {{-- <tr >
                                <td style="background: #EBF3FF;" class="text-left pl-2"><small>Engine Capcity</small></td>
                                <td class="text-left pl-2"><small>{{$detail->listing_engine_capacity ?? '-'}}</small></td>
                    </tr> --}}

                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Fuel Type</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_fuel_type ?? '-'}}</small></td>
                    </tr>
                    {{-- <tr >
                                <td style="background: #EBF3FF;" class="text-left pl-2"><small>Vin</small></td>
                                <td class="text-left pl-2"><small>{{$detail->listing_vin ?? '-'}}</small></td>
                    </tr> --}}
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Price</small></td>
                        <td class="text-left pl-2"><small>
                            @if(!session()->get('currency_symbol'))
                                ${{ round($detail->listing_price,2) }}
                            @else
                                {{ session()->get('currency_symbol') }}{{ round($detail->listing_price*session()->get('currency_value'),2) }}
                            @endif</small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Body</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_body ?? '-'}}</small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Seat</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_seat ?? '-'}}</small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Wheel</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_wheel ?? '-'}}</small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Doors</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_door ?? '-'}}</small></td>
                    </tr>
                    {{-- <tr>
                                <td style="background: #EBF3FF;" class="text-left pl-2"><small>Model Year</small></td>
                                <td class="text-left pl-2"><small>{{$detail->listing_model_year ?? '-'}}</small></td>
                    </tr> --}}






                </table>
            </div>
            <div class="row my-3">
                <div class=" mb-3 w-100">
                    <h3>Features</h3>
                </div>
                <div class=" d-flex flex-wrap ">
                    @foreach($listing_amenities as $row)
                        @php
                        $res = DB::table('amenities')->where('id',$row->amenity_id)->first();
                        @endphp
                        <div class="w-auto py-2 px-2 border mx-1 my-1" style="background:#F7FFF0">
                            <small>{{$res->amenity_name}}</small>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
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
      slideNumber = slideNumber === "prev" ? $activeSlide.prev().index() : $activeSlide.next().index();
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
