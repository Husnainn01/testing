@extends('front.layouts.app_front')
@php
    $location = \App\Models\ListingLocation::all();
    $faqs = \App\Models\Faq::all();
@endphp

@section('content')
    <section>
        <div class="container-fluid px-md-5 px-lg-5  my-5">
            <div class="row ">

                <!-- left Column -->
                <input class="hidden" id="appurl" value="{{ env('APP_URL') }}"/>

                <div class="col-md-2 order-2 order-sm-2  order-md-1 first-side">
                    @include('front.layouts.left_sidebar')
                </div>
                <div class="col-md-8 order-1 order-sm-1 order-lg-1  px-md-5 px-lg-5 px-sm-0">

                    <div class="row my-5 mob-hide">
                        <div class="col-md-12">
                            <span class="w-50 mob-100 float-left">
                                <h2>Client Reviews</h2>
                            </span>
                            <span class="w-50 "><a href="{{ route('allreviews') }}"><button
                                        class="btn btn-primary float-right px-4 py-2">View All</button></a></span>
                            @foreach ($clientreviews as $reviews)
                                @if ($reviews->listing)
                                    <div data-name="{{ $reviews->agent->name ? $reviews->agent->name : 'null' }}"
                                        data-img="{{ $reviews->listing->listing_featured_photo ? $reviews->listing->listing_featured_photo : 'null' }}"
                                        data-review="{{ $reviews->review ? $reviews->review : 'null' }}"
                                        data-car_name="{{ $reviews->listing->listing_name ? $reviews->listing->listing_name : 'null' }}"
                                        data-time="{{ $reviews->created_at ? $reviews->created_at : 'null' }}">
                                        <a type="button" class="bg-transparent border-0 m-0 p-0 w-100"
                                            style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#exampleModal1">



                                            <div class="row mt-4 client-box2 py-1">

                                                <div class="col-md-3 col-lg-3 col-sm-12"
                                                    style="background:url('{{ asset('uploads/listing_featured_photos/' . $reviews->listing->listing_featured_photo) }}');background-size:cover;padding:7% 0px;"
                                                    alt="{{ $reviews->listing->listing_name }}')">


                                                </div>
                                                <div class="col-md-9 col-sm-12 col-lg-9" style="text-align:left;">





                                                    @php
                                                        $reviewValue = $reviews->rating; // Your review value from the backend
                                                        $maxStars = 5; // Maximum number of stars

                                                        // Calculate the number of filled and empty stars
                                                        $filledStars = min($reviewValue, $maxStars);
                                                        $emptyStars = $maxStars - $filledStars;
                                                    @endphp

                                                    <!-- Display filled stars -->
                                                    @for ($i = 0; $i < $filledStars; $i++)
                                                        <i class="fas fa-star" style="color:#F9C303;"></i>
                                                    @endfor

                                                    <!-- Display empty stars -->
                                                    @for ($i = 0; $i < $emptyStars; $i++)
                                                        <i class="far fa-star" style="color: #F9C303;"></i>
                                                    @endfor
                                                    <h6 class="fw-bold" style="color:#731718;">{{ $reviews->agent->name }}
                                                    </h6>
                                                    <small class="d-block">{{ $reviews->review }}</small>
                                                </div>



                                            </div>

                                        </a>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>


                    <div class="row my-5 desktop-hide">
                        <div class="col-md-12">
                            <h2>Client Reviews</h2>
                            <a href="{{ route('allreviews') }}" class="d-block my-4"><button
                                    class="btn btn-primary  py-2">View All</button></a>


                            <div class="owl-carousel owl-theme">
                                @foreach ($clientreviews as $reviews)
                                    @if ($reviews->listing)
                                        <div class="items">
                                            <div data-name="{{ $reviews->agent->name }}"
                                                data-img="{{ $reviews->listing->listing_featured_photo }}"
                                                data-review="{{ $reviews->review }}"
                                                data-car_name="{{ $reviews->listing->listing_name }}"
                                                data-time="{{ $reviews->created_at }}">
                                                <a type="button" class="bg-transparent border-0 m-0 p-0 "
                                                    style="cursor:pointer" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal1">
                                                    <div class="row mt-4 client-box2 py-1">

                                                        <div class="col-md-3 col-lg-3 col-sm-12 px-1"
                                                            style="background: url('{{ asset('uploads/listing_featured_photos/' . $reviews->listing->listing_featured_photo) }}"
                                                            alt="{{ $reviews->listing->listing_name }}');background-size:cover;background-repeat:no-repeat;">
                                                        </div>
                                                        <div class="col-md-9 col-sm-12 col-lg-9" style="text-align:left;">

                                                            @php
                                                                $reviewValue = $reviews->rating; // Your review value from the backend
                                                                $maxStars = 5; // Maximum number of stars

                                                                // Calculate the number of filled and empty stars
                                                                $filledStars = min($reviewValue, $maxStars);
                                                                $emptyStars = $maxStars - $filledStars;
                                                            @endphp

                                                            <!-- Display filled stars -->
                                                            @for ($i = 0; $i < $filledStars; $i++)
                                                                <i class="fas fa-star" style="color:#F9C303;"></i>
                                                            @endfor

                                                            <!-- Display empty stars -->
                                                            @for ($i = 0; $i < $emptyStars; $i++)
                                                                <i class="far fa-star" style="color: #F9C303;"></i>
                                                            @endfor
                                                            <h6 class="fw-bold" style="color:#731718;">
                                                                {{ $reviews->agent->name }}</h6>
                                                            <small class="d-block">{{ $reviews->review }}</small>
                                                        </div>



                                                    </div>

                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel1">Customer Review</h1>
                                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal1" aria-label="Close"></button> --}}
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8 col-lg-8"><img class="w-100" alt="" id="review-img"></div>
                                    <div class="col-md-4 col-lg-4" style="padding-left:80px;padding-right:40;">
                                        <div class="row">
                                            <div class="col-md-12">






                                                <h6 class="mt-4 font-weight-bold" id="username"><i
                                                        class="fa-solid fa-user"></i> UserName</h6>
                                                @php
                                                    $reviewValue = $reviews->rating; // Your review value from the backend
                                                    $maxStars = 5; // Maximum number of stars

                                                    // Calculate the number of filled and empty stars
                                                    $filledStars = min($reviewValue, $maxStars);
                                                    $emptyStars = $maxStars - $filledStars;
                                                @endphp

                                                <!-- Display filled stars -->
                                                @for ($i = 0; $i < $filledStars; $i++)
                                                    <i class="fas fa-star" style="color:#F9C303;"></i>
                                                @endfor

                                                <!-- Display empty stars -->
                                                @for ($i = 0; $i < $emptyStars; $i++)
                                                    <i class="far fa-star" style="color: #F9C303;"></i>
                                                @endfor

                                            </div>



                                        </div>


                                        <h4 class="my-3">Reviews</h4>
                                        <h6 id="review-description">
                                        </h6>

                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
