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
                <input class="hidden" id="appurl" value="{{ env('APP_URL') }}" />

                <div class="col-md-2 order-2 order-sm-2  order-md-1 first-side">
                    @include('front.layouts.left_sidebar')
                </div>
                <div class="col-md-8 order-1 order-sm-1 order-lg-1  px-md-5 px-lg-5 px-sm-0">

                    <div class=" my-5">
                        <div class="col-md-12">
                            <span class="w-50 mob-100 float-left">
                                <h2>Client Reviews</h2>
                            </span>
                            <span class="w-50 "><a href="{{ route('allreviews') }}"><button
                                        class="btn btn-primary float-right px-4 py-2">View All</button></a></span>
                        </div>
                        <div class="col-md-12 mt-5">

                            @foreach ($clientreviews as $reviews)
                                {{-- @if ($reviews->listing) --}}
                                <div>



                                    <div class="row mt-4 client-box2 py-1">

                                        <div class="col-md-3 col-lg-3 col-sm-12"
                                            style="background:url('{{ asset($reviews->img) }}');background-size:cover;padding:7% 0px;"
                                            alt="">


                                        </div>
                                        <div class="col-md-9 col-sm-12 col-lg-9" style="text-align:left;">
                                            @php
                                                $reviewValue = $reviews->rating;
                                                $maxStars = 5;
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
                                            {{-- <h6 class="fw-bold" style="color:#731718;">{{ $reviews->name }}
                                                    </h6> --}}
                                            <small class="d-block">{{ $reviews->description }}</small>
                                        </div>



                                    </div>

                                    </a>
                                </div>
                                {{-- @endif --}}
                            @endforeach

                        </div>
                    </div>



                </div>


            </div>
        </div>
    @endsection
