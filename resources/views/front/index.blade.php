@extends('front.layouts.app_front')
@php
    $slider = \App\Models\Slide::where('id', 1)->first();
    $countcars = \App\Models\Listing::all()->count();
    $test_review = \App\Models\Review::take(2)->get();
@endphp

<style>
    .border-bottom {
        border-bottom: 2px solid gray;
    }

    .border-end {
        border-bottom: 3px solid gray;
    }
</style>

@section('content')
    {{-- <div id="overlay"></div> --}}
    {{-- <div id="dialog-box"> --}}
    {{-- <div class="container"> --}}
    {{-- <div class="row"> --}}
    {{-- <div class="col-md-12 col-lg-12 col-sm-12"> --}}
    {{-- <button id="close-dialog">X</button> --}}
    {{-- <h2>Select Your Country!</h2> --}}
    {{-- <p>Select Your import country to check the inventory in stock.</p> --}}
    {{-- </div> --}}
    {{-- <div class="col-md-12 col-lg-12 col-sm-12 my-2"> --}}
    {{-- <form action="{{ route('dialogbox') }}"> --}}
    {{-- <select id="id_select2_example" name="location" style="width: 200px;"> --}}

    {{-- @foreach ($location as $locationitems) --}}
    {{-- <option value="{{ $locationitems->id }}" --}} {{--
                            data-img_src="{{ asset('uploads/listing_location_photos/' . $locationitems->listing_location_photo) }}">
                            --}}
    {{-- {{ $locationitems->listing_location_name }}</option> --}}
    {{-- @endforeach --}}
    {{-- </select> --}}
    {{-- <div class="col-md-3 col-sm-12 col-lg-3 col-12 my-3"> --}}
    {{-- <button class="btn btn-primary w-100 py-2" --}} {{-- type="submit">Submit --}}
    {{-- </button> --}}
    {{-- </div> --}}
    {{-- </form> --}}
    {{-- </div> --}}

    {{-- <div class="col-md-12 col-sm-12 col-lg-12 col-12 my-3"><a href="{{ url('/') }}"
            class="float-right"> --}}
    {{-- <p class="mt-2 btn btn-primary text-white"><i class="fas fa-globe mx-2"
            aria-hidden="true"></i>GO --}}
    {{-- TO --}}
    {{-- THE SS Japan</p> --}}
    {{-- </div> --}}
    {{-- </a> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    <div class="container-fluid p-0">
        <section class="mob-hide">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    @if ($slider->slide1 != '')
                        <li data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active"></li>
                    @endif
                    @if ($slider->slide2 != '')
                        <li data-bs-target="#carouselExampleControls" data-bs-slide-to="1"></li>
                    @endif
                    @if ($slider->slide3 != '')
                        <li data-bs-target="#carouselExampleControls" data-bs-slide-to="2"></li>
                    @endif
                    @if ($slider->slide4 != '')
                        <li data-bs-target="#carouselExampleControls" data-bs-slide-to="3"></li>
                    @endif
                    @if ($slider->slide5 != '')
                        <li data-bs-target="#carouselExampleControls" data-bs-slide-to="4"></li>
                    @endif
                </ol>
                <div class="carousel-inner">
                    @if ($slider->slide1 != '')
                        <div class="carousel-item active">
                            <img src="{{ asset('uploads/sliders/' . $slider->slide1) }}" class="d-block w-100"
                                alt="...">
                        </div>
                    @endif
                    @if ($slider->slide2 != '')
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/sliders/' . $slider->slide2) }}" class="d-block w-100"
                                alt="...">
                        </div>
                    @endif
                    @if ($slider->slide3 != '')
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/sliders/' . $slider->slide3) }}" class="d-block w-100"
                                alt="...">
                        </div>
                    @endif
                    @if ($slider->slide4 != '')
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/sliders/' . $slider->slide4) }}" class="d-block w-100"
                                alt="...">
                        </div>
                    @endif
                    @if ($slider->slide5 != '')
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/sliders/' . $slider->slide5) }}" class="d-block w-100"
                                alt="...">
                        </div>
                    @endif
                </div>
                <button class="carousel-control-prev bg-transparent border-0" type="button"
                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"></span>
                </button>
                <button class="carousel-control-next bg-transparent border-0" type="button"
                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"></span>
                </button>
            </div>

        </section>
        @if ($slider->slide1 != '')
            <img src="{{ asset('uploads/sliders/' . $slider->slide1) }}" class="d-block w-100 desktop-hide" alt="...">
        @endif

        <section>
            <div class="container-fluid">
                <div class="row ">
                    <!-- left Column -->
                    <div class="col-md-2 order-2 order-sm-2  order-md-1 mb-4 pl-0">
                        {{-- left-sidebar --}}
                        <div class="first-side pb-4" style="position: sticky;top: -1800px !important;">
                            @include('front.layouts.left_sidebar')
                        </div>
                    </div>

                    <!-- Middle Column -->

                    <div class="col-md-8 order-1 order-sm-1 order-lg-1 search-box-wrapper px-md-5 px-lg-5 px-sm-0">
                        <div class="px-3 px-sm-3 px-md-0 px-lg-0">
                            {{-- <div class="row header-search-box"> --}}
                            {{-- <div class="col-md-3"></div> --}}
                            {{-- <div class="col-md-4"></div> --}}
                            {{-- <div class="col-md-5 p-3 text-center primary" --}} {{--
                                style="color:white;border-top-left-radius:100px;"> --}}
                            {{-- <h5>{{$countcars}} Total Car </h5> --}}
                            {{-- </div> --}}

                            {{-- </div> --}}
                            <form action="{{ route('filtercar') }}" method="POST" id="form-car">
                                <div id="homefilter-body">
                                    <div class="row p-md-3 p-lg-3 pt-0 p-sm-1 p-1 search-box shadow rounded-bottom-2 bg-white"
                                        style="border-top:5px solid #731718;">
                                        <div class="col-md-12">
                                            <h4 style="color:white;"><i class="fa fa-search" aria-hidden="true"></i>
                                                Search for cars</h4>
                                        </div>
                                        @csrf
                                        <!--make-->
                                        <div class="col-md-3 col-6 col-sm-6">
                                            <label for="" class="mb-2 font-weight-bold">Make</label>
                                            <select name="brand" id="" class="w-100 form-select"
                                                onchange="brandChange()">
                                                <option value="">Select Make</option>
                                                @foreach ($brands as $brandsitems)
                                                    <option value="{{ $brandsitems->id }}">
                                                        <a>{{ $brandsitems->listing_brand_name }}</a>
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--modal-->
                                        <div class="col-md-3 col-6 col-sm-6">
                                            <label for="" class="mb-2 font-weight-bold">Model</label>

                                            <select name="model" class="w-100 form-select" id="car-models">
                                                <option value="">Select Model</option>
                                                <option value="2023">2023</option>
                                                <option value="2022">2022</option>
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                                <option value="2019">2019</option>
                                                <option value="2018">2018</option>
                                                <option value="2017">2017</option>
                                                <option value="2016">2016</option>
                                                <option value="2015">2015</option>
                                                <option value="2014">2014</option>
                                                <option value="2013">2013</option>
                                                <option value="2012">2012</option>
                                                <option value="2011">2011</option>
                                                <option value="2010">2010</option>
                                                <option value="2009">2009</option>
                                                <option value="2008">2008</option>
                                                <option value="2007">2007</option>
                                                <option value="2006">2006</option>
                                                <option value="2005">2005</option>
                                                <option value="2004">2004</option>
                                                <option value="2003">2003</option>
                                                <option value="2002">2002</option>
                                                <option value="2001">2001</option>
                                                <option value="2000">2000</option>
                                            </select>
                                        </div>
                                        <!--Year-->
                                        <div class="col-md-4 col-sm-6 col-6">
                                            <label for="" class="mb-2 font-weight-bold">
                                                Year
                                            </label>
                                            <div class="row manufacturer-row">
                                                <div class="col-md-6 col-sm-6 col-6 col-lg-6 px-1">
                                                    <select name="year_from" class="w-100 form-select" id="car-models">
                                                        <option value="">Select From</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-6 col-lg-6 px-1">
                                                    <select name="year_to" class="w-100 form-select" id="car-models">
                                                        <option value="">Select To</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--button-->
                                        <div class="col-md-2">
                                            <input type="submit" value="Search" class="btn btn-primary my-4 w-100 py-2"
                                                style="background-color: black !important;border-radius: 6px !important;margin-top: 30px !important;color:white !important;font-weight: bold;">
                                        </div>
                                        <!--steering-->
                                        <div class="col-md-3 col-6 col-sm-6">
                                            <label for="steering" class="mb-2 font-weight-bold">Steering</label>
                                            <select name="steering" id="steering" class="w-100 form-select">
                                                <option value="">Select Steering</option>
                                                <option value="left_steering">Left Steering</option>
                                                <option value="right_steering">Right Steering</option>
                                            </select>
                                        </div>
                                        <!--body type-->
                                        <div class="col-md-3 col-sm-6 col-6">
                                            <label for="" class="mb-2 font-weight-bold">Type</label>
                                            <select name="bodytype" id="" class="w-100 form-select">
                                                <option value="">Select Car Type</option>
                                                <option value="New Car">New Car</option>
                                                <option value="Used Car">Used Car</option>

                                            </select>
                                        </div>
                                        <!--Type-->
                                        {{-- <div class="col-md-4 col-sm-6 col-6"> --}}
                                        {{-- <label for="" class="mb-2 font-weight-bold">Location</label> --}}
                                        {{-- <select name="location" id="" class="w-100 form-select"> --}}
                                        {{-- <option value="">Select Location</option> --}}
                                        {{-- @foreach ($location as $locationitems) --}}
                                        {{-- <option value="{{ $locationitems->id }}"> --}}
                                        {{-- {{ $locationitems->listing_location_name }}</option> --}}
                                        {{-- @endforeach --}}

                                        {{-- </select> --}}
                                        {{-- </div> --}}
                                        <!--price-->
                                        <div class="col-md-3 col-6 col-sm-6">
                                            <label for="steering" class="mb-2 font-weight-bold">Price</label>
                                            <input class="form-select" type="number" name="price" id="pricefrom"
                                                min="0" placeholder="Price" style="border-radius: 0;">
                                        </div>
                                        <!--count-->
                                        <div class="col-md-3 col-6 col-sm-6" style="margin-bottom:20px;">
                                            <span
                                                style="color: #FFFFFF;float: right;padding-top: 35px;">{{ $countcars }}
                                                &nbsp;&nbsp;items match</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            @if (isset($carlocation))
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <h4 class="my-4 fw-bold">Most Popular Cars In
                                        {{ $carlocation->listing_location_name }}</h4>
                                </div>
                            @else
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <h4 class="my-4 fw-bold">Most Popular Cars</h4>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            @foreach ($most_popular_cars as $carsitems)
                                <div class="col-md-4 col-sm-12 mb-5 mob-hide">
                                    <a href="{{ route('front_listing_detail', ['slug' => $carsitems->listing_slug]) }}"
                                        class="text-dark box-content" style="text-decoration: none;">
                                        <div class="border rounded box box-content position-relative">
                                            <div class="badge-used-car">{{ $carsitems->listing_type }}</div>
                                            <div class="badge-photos"><i class="fa-solid fa-image"></i>
                                                {{ \App\Models\ListingPhoto::where('listing_id', $carsitems->id)->count() ?? 0 }}
                                            </div>
                                            <!-- The image of the car -->
                                            <img src="{{ asset('uploads/listing_featured_photos/' . $carsitems->listing_featured_photo) }}"
                                                class="w-100" height="130" alt="car" style="object-fit: cover;">
                                            <!-- Car details -->
                                            <div class="content">
                                                <h2>{{ $carsitems->listing_name }}</h2>
                                                <p class="location">
                                                    {{ $carsitems->rListingLocation->listing_location_name }}</p>
                                                <!-- Dynamic location if available -->
                                                <div class="text-md pl-2">
                                                    <span>{{ $carsitems->listing_model_year }} |</span>
                                                    {{--                                            <span>{{ $carsitems->listing_year }} |</span> --}}
                                                    <span>{{ $carsitems->listing_mileage }} km |</span>
                                                    <span class="fuel_Type">{{ $carsitems->listing_fuel_type }} |</span>
                                                    <span>{{ $carsitems->listing_engine_capacity }} |</span>
                                                    <span>{{ $carsitems->listing_transmission }} </span>
                                                </div>
                                                <div
                                                    class="price d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="d-flex flex-column">
                                                        <span>{{ session()->get('currency_symbol') }}
                                                            {{ $carsitems->listing_price }}</span>
                                                        <span class="update">Updated
                                                            {{ $carsitems->updated_at->diffForHumans() }}</span>
                                                    </div>

                                                </div>
                                                <button>GET A PRICE QUOTE NOW</button>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="favorite-button" style="" id="addToFavoritesBtn"
                                        data-listing-id="{{ $carsitems->id }}"
                                        onclick="addToFavorites({{ $carsitems->id }} , event)">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    </div>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                </div>
                            @endforeach

                            {{-- <div class="col-md-2 col-sm-12 col-lg-3 mb-5 mob-hide"> --}}
                            {{-- <a href="{{ route('front_listing_detail', ['slug' => $carsitems->listing_slug]) }}"
                                --}} {{-- class="text-dark box-content" style="text-decoration: none;"> --}}
                            {{-- <div class="border rounded box box-content position-relative"> --}}
                            {{-- <img
                                src="{{ asset('uploads/listing_featured_photos/' . $carsitems->listing_featured_photo) }}"
                                --}} {{-- class="w-100" height="130" alt="car"> --}}
                            {{-- @if ($carsitems->listing_stock_status == 'in_stock') --}}
                            {{-- <span class="badge position-absolute start-0 p-2 text-light primary">In --}}
                            {{-- Stock</span> --}}
                            {{-- @elseif($carsitems->listing_stock_status == 'reserved') --}}
                            {{-- <span --}} {{-- class="badge position-absolute start-0 p-2 text-light primary">
                                        Reserved</span> --}}
                            {{-- @else --}}
                            {{-- <span --}} {{--
                                            class="badge position-absolute start-0 p-2 text-light primary">
                                            SOLD</span> --}}
                            {{-- @endif --}}

                            {{-- <div class="p-2 "> --}}

                            {{-- <h6 class="my-1">{{ $carsitems->listing_name }}</h6> --}}
                            {{-- <div class="d-block"> --}}

                            {{-- <small class=" fw-bold d-block  mt-1"> --}}
                            {{-- Stock-id: <span class="text-danger ">{{
                                $carsitems->listing_stock_id }}</span> --}}
                            {{-- </small> --}}
                            {{-- <small> --}}

                            {{-- @if (Auth::check()) --}}
                            {{-- Price:<span class="text-danger fw-bold"> --}}
                            {{-- @if (!session()->get('currency_symbol')) --}}
                            {{-- ${{ round($carsitems->listing_price,2) }} --}}
                            {{-- @else --}}
                            {{-- {{ session()->get('currency_symbol') }}{{
                            round($carsitems->listing_price*session()->get('currency_value'),2)
                            }} --}}
                            {{-- @endif</span> --}}
                            {{-- @else --}}
                            {{-- Price:<span class="text-danger fw-bold">
                                <a --}} {{-- class="w-25  text-danger" --}} {{--
                                                                href="{{ route('customer_login') }}">
                                                                <u>login</u></a></span> --}}
                            {{-- @endif --}}
                            {{-- </span> --}}
                            {{-- </small> --}}
                            {{-- </div> --}}


                            {{-- <small class=" fw-bold d-block  mt-1"> --}}
                            {{-- Type: <span class="text-danger ">{{ $carsitems->listing_type }}</span> --}}
                            {{-- </small> --}}


                            {{-- <small class="fw-bold d-block  mt-1"> --}}
                            {{-- Fuel: <span --}} {{-- class="text-danger">{{ $carsitems->listing_fuel_type }}</span> --}}
                            {{-- </small> --}}


                            {{-- <small class="fw-bold d-block  mt-1"> --}}
                            {{-- Engine: <span --}} {{-- class="text-danger">{{ $carsitems->listing_engine_capacity
                                }}</span> --}}
                            {{-- </small> --}}
                            {{-- <small class="fw-bold d-block  mt-1"> --}}
                            {{-- Transmission: <span --}} {{-- class="text-danger">{{ $carsitems->listing_transmission
                                }}</span> --}}
                            {{-- </small> --}}
                            {{-- <small class="fw-bold d-block  mt-1"> --}}
                            {{-- Steering: <span --}} {{-- class="text-danger">{{ $carsitems->steering }}</span> --}}
                            {{-- </small> --}}




                            {{--
                        </div> --}}
                            {{--
                        </div> --}}
                            {{-- </a> --}}
                            {{--
                        </div> --}}

                            <div class=" desktop-hide col-12 ">

                                <div id="carouselExampleControls2" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner w-75 m-auto">
                                        @foreach ($most_popular_cars as $key => $carsitems)
                                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">

                                                <a href="{{ route('front_listing_detail', ['slug' => $carsitems->listing_slug]) }}"
                                                    class="text-dark box-content" style="text-decoration: none;">
                                                    <div class="border rounded box box-content position-relative">
                                                        <img src="{{ asset('uploads/listing_featured_photos/' . $carsitems->listing_featured_photo) }}"
                                                            height="130" class="w-100" alt="car"
                                                            style="object-fit: cover;">
                                                        @if ($carsitems->listing_stock_status == 'in_stock')
                                                            <span
                                                                class="badge position-absolute start-0 p-2 top-0 text-light primary">In
                                                                Stock</span>
                                                        @elseif($carsitems->listing_stock_status == 'reserved')
                                                            <span
                                                                class="badge position-absolute start-0 p-2 top-0 text-light primary">Reserved</span>
                                                        @else
                                                            <span
                                                                class="badge position-absolute start-0 p-2 text-light top-0 primary">SOLD</span>
                                                        @endif
                                                        <div class="p-2">

                                                            <h6 class="my-1">{{ $carsitems->listing_name }}</h6>
                                                            <div class="d-block">
                                                                <small class=" fw-bold d-block  mt-1">
                                                                    Stock-id: <span
                                                                        class="text-danger ">{{ $carsitems->listing_stock_id }}</span>
                                                                </small>
                                                                <small>

                                                                    @if (Auth::check())
                                                                        Price:<span class="text-danger fw-bold">
                                                                            @if (!session()->get('currency_symbol'))
                                                                                ${{ round($carsitems->listing_price, 2) }}
                                                                            @else
                                                                                {{ session()->get('currency_symbol') }}{{ round($carsitems->listing_price * session()->get('currency_value'), 2) }}
                                                                            @endif
                                                                        </span>
                                                                    @else
                                                                        Price:<span class="text-danger fw-bold"> <a
                                                                                class="w-25  text-danger"
                                                                                href="{{ route('customer_login') }}"><u>login</u></a></span>
                                                                    @endif
                                                                    </span>
                                                                </small>
                                                            </div>
                                                            <small class=" fw-bold d-block mt-1">
                                                                Type: <span
                                                                    class="text-danger">{{ $carsitems->listing_type }}</span>
                                                            </small>


                                                            <small class="fw-bold d-block  mt-1">
                                                                Fuel: <span
                                                                    class="text-danger">{{ $carsitems->listing_fuel_type }}</span>
                                                            </small>


                                                            <small class="fw-bold d-block  mt-1">
                                                                Engine: <span
                                                                    class="text-danger">{{ $carsitems->listing_engine_capacity }}</span>
                                                            </small>
                                                            <small class="fw-bold d-block  mt-1">
                                                                Transmission: <span
                                                                    class="text-danger">{{ $carsitems->listing_transmission }}</span>
                                                            </small>

                                                            <small class="fw-bold d-block  mt-1">
                                                                Steering: <span
                                                                    class="text-danger">{{ $carsitems->steering }}</span>
                                                            </small>


                                                        </div>
                                                    </div>
                                                </a>

                                            </div>
                                        @endforeach

                                    </div>
                                    <button class="carousel-control-prev bg-transparent border-0" type="button"
                                        data-bs-target="#carouselExampleControls2" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden"></span>
                                    </button>
                                    <button class="carousel-control-next bg-transparent border-0" type="button"
                                        data-bs-target="#carouselExampleControls2" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden"></span>
                                    </button>
                                </div>
                            </div>


                            <div class="col-12 justify-content-end">
                                <div class="mob-hide px-3 pagination d-flex justify-content-end">
                                    {{ $most_popular_cars->appends(request()->except('mpc_page'))->links() }}
                                </div>
                            </div>
                            <div class="row mt-4 px-3">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <h4 class="my-4 fw-bold">New Arrivals Cars</h4>
                                </div>

                                @foreach ($new_arrivals as $carsitems)
                                    <div class="col-md-4 col-sm-12 mb-5 mob-hide">
                                        <a href="{{ route('front_listing_detail', ['slug' => $carsitems->listing_slug]) }}"
                                            class="text-dark box-content" style="text-decoration: none;">
                                            <div class="border rounded box box-content position-relative">
                                                <div class="badge-used-car">Used Car</div>
                                                <div class="badge-photos"><i class="fa-solid fa-image"></i>
                                                    {{ \App\Models\ListingPhoto::where('listing_id', $carsitems->id)->count() ?? 0 }}
                                                </div>
                                                <!-- The image of the car -->
                                                <img src="{{ asset('uploads/listing_featured_photos/' . $carsitems->listing_featured_photo) }}"
                                                    class="w-100" height="130" alt="car"
                                                    style="object-fit: cover;">
                                                <!-- Car details -->
                                                <div class="content">
                                                    <h2>{{ $carsitems->listing_name }}</h2>
                                                    <p class="location">
                                                        {{ $carsitems->rListingLocation->listing_location_name }}</p>
                                                    <!-- Dynamic location if available -->
                                                    <div class="text-md pl-2">
                                                        <span>{{ $carsitems->listing_model_year }} |</span>
                                                        {{--                                    <span>{{ $carsitems->listing_year }} |</span> --}}
                                                        <span>{{ $carsitems->listing_mileage }} |</span>
                                                        <span class="fuel_type">{{ $carsitems->listing_fuel_type }}
                                                            |</span>
                                                        <span>{{ $carsitems->listing_engine_capacity }} |</span>
                                                        <span>{{ $carsitems->listing_transmission }}</span>
                                                    </div>

                                                    <div
                                                        class="price d-flex align-items-center justify-content-between flex-wrap">
                                                        <div class="d-flex flex-column">
                                                            <span>{{ session()->get('currency_symbol') }}
                                                                {{ $carsitems->listing_price }}</span>
                                                            <span class="update">Updated
                                                                {{ $carsitems->updated_at->diffForHumans() }}</span>
                                                        </div>

                                                    </div>
                                                    <button>GET A PRICE QUOTE NOW</button>
                                                </div>
                                            </div>
                                        </a>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <div class="favorite-button" style="" id="addToFavoritesBtn"
                                            data-listing-id="{{ $carsitems->id }}"
                                            onclick="addToFavorites({{ $carsitems->id }} , event)">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-2 col-sm-12 col-lg-3 mb-5 mob-hide"> --}}
                                    {{-- <a href="{{ route('front_listing_detail', ['slug' => $carsitems->listing_slug]) }}" --}} {{--
                        class="text-dark box-content" style="text-decoration: none;"> --}}
                                    {{-- <div class="border rounded box box-content position-relative"> --}}
                                    {{-- <img
                                        src="{{ asset('uploads/listing_featured_photos/' . $carsitems->listing_featured_photo) }}"
                                        --}} {{-- class="w-100" height="130" alt="car"> --}}
                                    {{-- @if ($carsitems->listing_stock_status == 'in_stock') --}}
                                    {{-- <span class="badge position-absolute start-0 p-2 text-light primary">In --}}
                                    {{-- Stock</span> --}}
                                    {{-- @elseif($carsitems->listing_stock_status == 'reserved') --}}
                                    {{-- <span --}} {{-- class="badge position-absolute start-0 p-2 text-light primary">
                                Reserved</span> --}}
                                    {{-- @else --}}
                                    {{-- <span --}} {{-- class="badge position-absolute start-0 p-2 text-light primary">
                                    SOLD</span> --}}
                                    {{-- @endif --}}
                                    {{-- <div class="p-2"> --}}

                                    {{-- <h6 class="my-1">{{ $carsitems->listing_name }}</h6> --}}
                                    {{-- <div class="d-block"> --}}
                                    {{-- <small class=" fw-bold d-block  mt-1"> --}}
                                    {{-- Stock-id: <span class="text-danger ">{{
                                        $carsitems->listing_stock_id }}</span> --}}
                                    {{-- </small> --}}
                                    {{-- <small> --}}

                                    {{-- @if (Auth::check()) --}}
                                    {{-- Price:<span class="text-danger fw-bold"> --}}
                                    {{-- @if (!session()->get('currency_symbol')) --}}
                                    {{-- ${{ round($carsitems->listing_price,2) }} --}}
                                    {{-- @else --}}
                                    {{-- {{ session()->get('currency_symbol') }}{{
                                    round($carsitems->listing_price*session()->get('currency_value'),2)
                                    }} --}}
                                    {{-- @endif</span> --}}
                                    {{-- @else --}}
                                    {{-- Price:<span class="text-danger fw-bold">
                                        <a --}} {{-- class="w-25  text-danger" --}} {{--
                                                        href="{{ route('customer_login') }}"><u>login</u></a></span> --}}
                                    {{-- @endif --}}
                                    {{-- </span> --}}
                                    {{-- </small> --}}
                                    {{-- </div> --}}
                                    {{-- <small class=" fw-bold d-block mt-1"> --}}
                                    {{-- Type: <span class="text-danger">{{ $carsitems->listing_type }}</span> --}}
                                    {{-- </small> --}}


                                    {{-- <small class="fw-bold d-block  mt-1"> --}}
                                    {{-- Fuel: <span --}} {{-- class="text-danger">{{ $carsitems->listing_fuel_type }}</span> --}}
                                    {{-- </small> --}}


                                    {{-- <small class="fw-bold d-block  mt-1"> --}}
                                    {{-- Engine: <span --}} {{-- class="text-danger">{{ $carsitems->listing_engine_capacity }}</span> --}}
                                    {{-- </small> --}}
                                    {{-- <small class="fw-bold d-block  mt-1"> --}}
                                    {{-- Transmission: <span --}} {{-- class="text-danger">{{ $carsitems->listing_transmission
                        }}</span> --}}
                                    {{-- </small> --}}

                                    {{-- <small class=" fw-bold d-block  mt-1"> --}}
                                    {{-- Steering: <span class="text-danger ">{{ $carsitems->steering }}</span> --}}
                                    {{-- </small> --}}



                                    {{--
                                </div> --}}
                                    {{--
                                </div> --}}
                                    {{-- </a> --}}
                                    {{--
                            </div> --}}
                                @endforeach
                                <div class="desktop-hide col-12">

                                    <div id="carouselExampleControls3" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner w-75 m-auto">
                                            @foreach ($new_arrivals as $key => $carsitems)
                                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">

                                                    <a href="{{ route('front_listing_detail', ['slug' => $carsitems->listing_slug]) }}"
                                                        class="text-dark box-content" style="text-decoration: none;">
                                                        <div class="border rounded box box-content position-relative">
                                                            <img src="{{ asset('uploads/listing_featured_photos/' . $carsitems->listing_featured_photo) }}"
                                                                height="130" class="w-100" alt="car"
                                                                style="object-fit: cover;">
                                                            @if ($carsitems->listing_stock_status == 'in_stock')
                                                                <span
                                                                    class="badge position-absolute start-0 p-2 top-0 text-light primary">In
                                                                    Stock</span>
                                                            @elseif($carsitems->listing_stock_status == 'reserved')
                                                                <span
                                                                    class="badge position-absolute start-0 p-2 top-0 text-light primary">Reserved</span>
                                                            @else
                                                                <span
                                                                    class="badge position-absolute start-0 p-2 text-light top-0 primary">SOLD</span>
                                                            @endif
                                                            <div class="p-2">

                                                                <h6 class="my-1">{{ $carsitems->listing_name }}</h6>
                                                                <div class="d-block">
                                                                    <small class=" fw-bold d-block  mt-1">
                                                                        Stock-id: <span
                                                                            class="text-danger ">{{ $carsitems->listing_stock_id }}</span>
                                                                    </small>
                                                                    <small>

                                                                        @if (Auth::check())
                                                                            Price:<span class="text-danger fw-bold">
                                                                                @if (!session()->get('currency_symbol'))
                                                                                    ${{ round($carsitems->listing_price, 2) }}
                                                                                @else
                                                                                    {{ session()->get('currency_symbol') }}{{ round($carsitems->listing_price * session()->get('currency_value'), 2) }}
                                                                                @endif
                                                                            </span>
                                                                        @else
                                                                            Price:<span class="text-danger fw-bold"> <a
                                                                                    class="w-25  text-danger"
                                                                                    href="{{ route('customer_login') }}"><u>login</u></a></span>
                                                                        @endif
                                                                        </span>
                                                                    </small>
                                                                </div>
                                                                <small class=" fw-bold d-block mt-1">
                                                                    Type: <span
                                                                        class="text-danger">{{ $carsitems->listing_type }}</span>
                                                                </small>


                                                                <small class="fw-bold d-block  mt-1">
                                                                    Fuel: <span
                                                                        class="text-danger">{{ $carsitems->listing_fuel_type }}</span>
                                                                </small>


                                                                <small class="fw-bold d-block  mt-1">
                                                                    Engine: <span
                                                                        class="text-danger">{{ $carsitems->listing_engine_capacity }}</span>
                                                                </small>
                                                                <small class="fw-bold d-block  mt-1">
                                                                    Transmission: <span
                                                                        class="text-danger">{{ $carsitems->listing_transmission }}</span>
                                                                </small>


                                                                <small class=" fw-bold d-block  mt-1">
                                                                    Steering: <span
                                                                        class="text-danger ">{{ $carsitems->steering }}</span>
                                                                </small>


                                                            </div>
                                                        </div>
                                                    </a>

                                                </div>
                                            @endforeach

                                        </div>
                                        <button class="carousel-control-prev bg-transparent border-0" type="button"
                                            data-bs-target="#carouselExampleControls3" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden"></span>
                                        </button>
                                        <button class="carousel-control-next bg-transparent border-0" type="button"
                                            data-bs-target="#carouselExampleControls3" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden"></span>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-12 justify-content-end">
                                    <div class="mob-hide px-3 pagination d-flex justify-content-end">
                                        {{ $new_arrivals->appends(request()->except('na_page'))->links() }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <h4 class="fw-bold">Best Seller By Types</h4>
                            </div>
                            <div class="row my-5 border-bottom border-1 best-seller" style="margin-top:1rem !important;">
                                <div class="col-md-4 col-lg-4 col-sm-12 my-3">
                                    <div class="row ">
                                        <div class="col-5 justify-content-end">
                                            <img src="{{ asset('images/SUV.png') }}" alt="Car" class="custom-icon">
                                            <h6 class="image-title" style="text-align: center;font-weight: bold;">
                                                SUV</h6>
                                        </div>
                                        <div class="col-7 px-0 justify-content-center">
                                            <ul class="list-unstyled ">
                                                <a href="#">
                                                    <li>1.Toyota Harrier</li>
                                                </a>
                                                <a href="#">
                                                    <li>2.Toyota Land</li>
                                                </a>
                                                <a href="#">
                                                    <li>3.Toyata Rav4</li>
                                                </a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-12 my-3">
                                    <div class="row ">
                                        <div class="col-5 justify-content-end">
                                            <img src="{{ asset('images/van.png') }}" alt="Car" class="custom-icon">
                                            <h6 class="image-title" style="text-align: center;font-weight: bold;">
                                                Van</h6>
                                        </div>
                                        <div class="col-7 px-0 justify-content-center">
                                            <ul class="list-unstyled ">
                                                <a href="#">
                                                    <li>1.Toyota Harrier</li>
                                                </a>
                                                <a href="#">
                                                    <li>2.Toyota Land</li>
                                                </a>
                                                <a href="#">
                                                    <li>3.Toyata Rav4</li>
                                                </a>


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-12 my-3">
                                    <div class="row ">
                                        <div class="col-5 justify-content-end">
                                            <img src="{{ asset('images/sedan.png') }}" alt="Car"
                                                class="custom-icon" style="height:5em;">
                                            <h6 class="image-title" style="text-align: center;font-weight: bold;">
                                                Sedan</h6>
                                        </div>
                                        <div class="col-7 px-0 justify-content-center">
                                            <ul class="list-unstyled ">
                                                <a href="#">
                                                    <li>1.Toyota Harrier</li>
                                                </a>
                                                <a href="#">
                                                    <li>2.Toyota Land</li>
                                                </a>
                                                <a href="#">
                                                    <li>3.Toyata Rav4</li>
                                                </a>


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-12 my-3">
                                    <div class="row ">
                                        <div class="col-5 justify-content-end">
                                            <img src="{{ asset('images/truck.png') }}" alt="Car"
                                                class="custom-icon">
                                            <h6 class="image-title" style="text-align: center;font-weight: bold;">
                                                Truck</h6>
                                        </div>
                                        <div class="col-7 px-0 justify-content-center">
                                            <ul class="list-unstyled ">
                                                <a href="#">
                                                    <li>1.Toyota Harrier</li>
                                                </a>
                                                <a href="#">
                                                    <li>2.Toyota Land</li>
                                                </a>
                                                <a href="#">
                                                    <li>3.Toyata Rav4</li>
                                                </a>


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-12 my-3">
                                    <div class="row ">
                                        <div class="col-5 justify-content-end">
                                            <img src="{{ asset('images/hatchback.png') }}" alt="Car"
                                                class="custom-icon">
                                            <h6 class="image-title" style="text-align: center;font-weight: bold;">
                                                Hatchback</h6>
                                        </div>
                                        <div class="col-7 px-0 justify-content-center">
                                            <ul class="list-unstyled ">
                                                <a href="#">
                                                    <li>1.Toyota Harrier</li>
                                                </a>
                                                <a href="#">
                                                    <li>2.Toyota Land</li>
                                                </a>
                                                <a href="#">
                                                    <li>3.Toyata Rav4</li>
                                                </a>


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-12 my-3">
                                    <div class="row ">
                                        <div class="col-5 justify-content-end">
                                            <img src="{{ asset('images/coupe.png') }}" alt="Car"
                                                class="custom-icon">
                                            <h6 class="image-title" style="text-align: center;font-weight: bold;">
                                                Coupe</h6>
                                        </div>
                                        <div class="col-7 px-0 justify-content-center">
                                            <ul class="list-unstyled ">
                                                <a href="#">
                                                    <li>1.Toyota Harrier</li>
                                                </a>
                                                <a href="#">
                                                    <li>2.Toyota Land</li>
                                                </a>
                                                <a href="#">
                                                    <li>3.Toyata Rav4</li>
                                                </a>


                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <span class="w-50 mob-100 float-left">
                                <h4 class="fw-bold">Client Reviews</h4>
                            </span>
                            <span class="w-50">
                                <a href="{{ route('add-review') }}">
                                    <div class="float-right px-4 py-2">
                                        <i class="fa-solid fa-plus text-white px-2 py-1 mr-1 rounded"
                                            style="background-color: #951111"></i>
                                        Add Review
                                    </div>
                                </a>
                            </span>
                            <input class="hidden" id="appurl" value="{{ env('APP_URL') }}" />
                            <div class="reviews-container">
                                @foreach ($test_review as $reviews)
                                    @if ($reviews->listing)
                                        <div class="review-item">
                                            <img src="{{ asset('uploads/listing_featured_photos/' . $reviews->listing->listing_featured_photo) }}"
                                                alt="Car" class="review-car-image">
                                            <div class="review-content">
                                                <h6 style="color:#020a0a;">{{ $reviews->name }}</h6>
                                                <img style="float:right;padding-right:2em;"
                                                    src="{{ asset('uploads/listing_location_photos/' . $reviews->location->listing_location_photo) }}"
                                                    height="20" width="60">
                                                <div class="review-stars">
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
                                                    <br>
                                                    <p>
                                                        <small class="fw-bold">
                                                            by {{ $reviews->name }}
                                                            ({{ $reviews->location->listing_location_name }})
                                                            on {{ $reviews->created_at->format('d / M / Y') }}
                                                            <strong style="color:#951111;" class="px-5">Verified
                                                                Buyer</strong>
                                                        </small>
                                                    </p>
                                                    <small class="d-block">{{ $reviews->review }}</small>
                                                </div>
                                                {{-- <p class="review-title">{{ $reviews->agent->name ? $reviews->agent->name : 'null' }}</p> --}}
                                                {{-- <p class="review-details">{{ $reviews->review ? $reviews->review : 'null' }}</p> --}}
                                                <p class="review-meta">Review on <strong
                                                        style="color:#0b0be7;">{{ $reviews->listing->listing_name ? $reviews->listing->listing_name : 'null' }}</strong>
                                                </p>
                                                <button class="border-0 rounded text-sm bg-primary fw-bold text-white">
                                                    <i class="fa-brands fa-facebook-f"></i>
                                                    Share
                                                </button>
                                                <button class="border-0 rounded text-sm fw-bold text-white bg-dark">
                                                    <i class="fa-brands fa-x-twitter"></i>
                                                    Share
                                                </button>
                                                <p style="float: right; padding-right:2em;">
                                                    Like &nbsp;&nbsp;<a class="like_button"
                                                        data-reviewid="{{ $reviews->id }}" href="javascript:void(0)"><i
                                                            class="fa fa-thumbs-up"
                                                            aria-hidden="true"></i></a>&nbsp;&nbsp;
                                                    (<span class="likeCount">5</span>)
                                                </p>
                                                <div class="review-actions">
                                                    <!-- Insert action buttons here -->
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                @endforeach
                                {{-- <div class="review-text"> --}}
                                {{-- <p class="review-title">Happy with belta</p> --}}
                                {{-- <p class="review-details">I like the car and the mileage is good.</p> --}}
                                {{-- <p class="review-meta">Review on TOYOTA Belta (DBA-KSP92)</p> --}}
                                {{-- </div> --}}
                                {{-- <div class="review-actions"> --}}
                                {{--
                                <!-- Insert action buttons here --> --}}
                                {{--
                            </div> --}}
                                {{--
                            </div> --}}
                                {{-- </div> --}}
                                <!-- Repeat for the second review -->
                            </div>
                            <a href="{{ route('allreviews') }}" class="d-flex justify-content-end w-100 text-md">
                                <span class="py-2" style="text-decoration: underline">read more reviews...</span>
                            </a>

                            {{-- <div class="row my-5 mob-hide"> --}}
                            {{-- <div class="col-md-12"> --}}



                            {{-- @foreach ($clientreviews as $reviews) --}}
                            {{-- @if ($reviews->listing) --}}
                            {{-- <div --}} {{-- data-name="{{ $reviews->agent->name ? $reviews->agent->name : 'null' }}" --}} {{--
            data-img="{{ $reviews->listing->listing_featured_photo ? $reviews->listing->listing_featured_photo : 'null' }}"
            --}} {{-- data-review="{{ $reviews->review ? $reviews->review : 'null' }}" --}}
                            {{--
            data-car_name="{{ $reviews->listing->listing_name ? $reviews->listing->listing_name : 'null' }}" --}} {{--
            data-time="{{ $reviews->created_at ? $reviews->created_at : 'null' }}"> --}}
                            {{-- <a type="button" class="bg-transparent border-0 m-0 p-0 w-100" --}} {{-- style="cursor:pointer"
                data-bs-toggle="modal" --}} {{-- data-bs-target="#exampleModal1"> --}}


                            {{-- <div class="row mt-4 client-box2 py-1"> --}}

                            {{-- <div class="col-md-3 col-lg-3 col-sm-12" --}} {{--
                        style="background:url('{{ asset('uploads/listing_featured_photos/' . $reviews->listing->listing_featured_photo) }}');background-size:cover;padding:7% 0px;"
                        --}} {{-- alt="{{ $reviews->listing->listing_name }}')"> --}}


                            {{-- </div> --}}
                            {{-- <div class="col-md-9 col-sm-12 col-lg-9" --}} {{-- style="text-align:left;"> --}}


                            {{-- @php --}}
                            {{-- $reviewValue = $reviews->rating; // Your review value from the backend --}}
                            {{-- $maxStars = 5; // Maximum number of stars --}}

                            {{-- // Calculate the number of filled and empty stars --}}
                            {{-- $filledStars = min($reviewValue, $maxStars); --}}
                            {{-- $emptyStars = $maxStars - $filledStars; --}}
                            {{-- @endphp --}}

                            {{--
                            <!-- Display filled stars --> --}}
                            {{-- @for ($i = 0; $i < $filledStars; $i++) --}} {{-- <i class="fas fa-star"
                            style="color:#F9C303;"></i> --}}
                            {{-- @endfor --}}

                            {{--
                            <!-- Display empty stars --> --}}
                            {{-- @for ($i = 0; $i < $emptyStars; $i++) --}} {{-- <i class="far fa-star"
                                style="color: #F9C303;"></i> --}}
                            {{-- @endfor --}}
                            {{-- <h6 class="fw-bold" style="color:#731718;"> --}}
                            {{-- {{ $reviews->agent->name }}</h6> --}}
                            {{-- <small class="d-block">{{ $reviews->review }}</small> --}}
                            {{--
                </div> --}}


                            {{-- </div> --}}

                            {{-- </a> --}}
                            {{-- </div> --}}
                            {{-- @endif --}}
                            {{-- @endforeach --}}

                            {{-- </div> --}}
                            {{-- </div> --}}


                            {{-- <div class="row my-5 desktop-hide"> --}}
                            {{-- <div class="col-md-12"> --}}
                            {{-- <h2>Client Reviews</h2> --}}
                            {{-- <a href="{{ route('allreviews') }}" class="d-block my-4"> --}}
                            {{-- <button --}} {{-- class="btn btn-primary  py-2">View All --}}
                            {{-- </button> --}}
                            {{-- </a> --}}


                            {{-- <div class="owl-carousel owl-theme"> --}}
                            {{-- @foreach ($clientreviews as $reviews) --}}
                            {{-- @if ($reviews->listing) --}}
                            {{-- <div class="items"> --}}
                            {{-- <div data-name="{{ $reviews->agent->name }}" --}} {{--
                    data-img="{{ $reviews->listing->listing_featured_photo }}" --}} {{--
                    data-review="{{ $reviews->review }}" --}} {{-- data-car_name="{{ $reviews->listing->listing_name }}"
                    --}}
                            {{-- data-time="{{ $reviews->created_at }}"> --}}
                            {{-- <a type="button" class="bg-transparent border-0 m-0 p-0 " --}} {{-- style="cursor:pointer"
                        data-bs-toggle="modal" --}} {{-- data-bs-target="#exampleModal1"> --}}


                            {{-- <div class="row mt-4 client-box2 py-1"> --}}

                            {{-- <div class="col-md-3 col-lg-3 col-sm-12 px-1"> --}}
                            {{-- <img --}} {{--
                                    src="{{ asset('uploads/listing_featured_photos/' . $reviews->listing->listing_featured_photo) }}"
                                    --}} {{-- class="w-100" --}} {{-- style="    height: 160px; --}}
                            {{--					object-fit: cover;"> --}}

                            {{-- </div> --}}
                            {{-- <div class="col-md-9 col-sm-12 col-lg-9" --}} {{-- style="text-align:left;"> --}}


                            {{-- @php --}}
                            {{-- $reviewValue = $reviews->rating; // Your review value from the backend --}}
                            {{-- $maxStars = 5; // Maximum number of stars --}}

                            {{-- // Calculate the number of filled and empty stars --}}
                            {{-- $filledStars = min($reviewValue, $maxStars); --}}
                            {{-- $emptyStars = $maxStars - $filledStars; --}}
                            {{-- @endphp --}}

                            {{--
                            <!-- Display filled stars --> --}}
                            {{-- @for ($i = 0; $i < $filledStars; $i++) --}} {{-- <i class="fas fa-star" --}} {{--
                                    style="color:#F9C303;"></i> --}}
                            {{-- @endfor --}}

                            {{--
                            <!-- Display empty stars --> --}}
                            {{-- @for ($i = 0; $i < $emptyStars; $i++) --}} {{-- <i class="far fa-star" --}} {{--
                                        style="color: #F9C303;"></i> --}}
                            {{-- @endfor --}}
                            {{-- <h6 class="fw-bold" style="color:#731718;"> --}}
                            {{-- {{ $reviews->agent->name }}</h6> --}}
                            {{-- <small --}} {{-- class="d-block">{{ $reviews->review }}</small> --}}
                            {{--
            </div> --}}


                            {{-- </div> --}}

                            {{-- </a> --}}
                            {{-- </div> --}}
                            {{-- </div> --}}
                            {{-- @endif --}}
                            {{-- @endforeach --}}

                            {{-- </div> --}}
                            {{-- </div> --}}
                            {{-- </div> --}}

                            <div class="row my-5">
                                <div class="col-md-12">
                                    <h4 class="fw-bold">FAQS</h4>
                                    <div class="mainfaqs">

                                        {{-- <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"> --}}
                                        {{-- <li class="nav-item" role="presentation"> --}}
                                        {{-- <a class="nav-link active" id="pills-home-tab" --}} {{-- data-toggle="pill" --}} {{--
                        href="#pills-home" role="tab" --}}
                                        {{-- aria-controls="pills-home" --}} {{--
                        aria-selected="true">All Questions Related To all --}}
                                        {{-- Problems</a> --}}
                                        {{-- </li> --}}
                                        {{-- <li class="nav-item" role="presentation"> --}}
                                        {{-- <a class="nav-link" id="pills-profile-tab" --}} {{-- data-toggle="pill" --}} {{--
                        href="#pills-profile" role="tab" --}}
                                        {{-- aria-controls="pills-profile" --}} {{--
                        aria-selected="false">QUESTIONS REGARDING AUCTION</a> --}}
                                        {{-- </li> --}}
                                        {{-- <li class="nav-item" role="presentation"> --}}
                                        {{-- <a class="nav-link" id="pills-contact-tab" --}} {{-- data-toggle="pill" --}} {{--
                        href="#pills-contact" role="tab" --}}
                                        {{-- aria-controls="pills-lhd" --}} {{--
                        aria-selected="false">QUESTIONS REGARDING PAYMENT</a> --}}
                                        {{-- </li> --}}
                                        {{-- <li class="nav-item" role="presentation"> --}}
                                        {{-- <a class="nav-link" id="pills-others-tab" --}} {{-- data-toggle="pill" --}} {{--
                        href="#pills-others" role="tab" --}}
                                        {{-- aria-controls="pills-others" --}} {{--
                        aria-selected="false">QUESTIONS REGARDING --}}
                                        {{-- SHIPMENT</a> --}}
                                        {{-- </li> --}}
                                        {{-- <li class="nav-item" role="presentation"> --}}
                                        {{-- <a class="nav-link" id="pills-howtopay-tab" --}} {{-- data-toggle="pill" --}} {{--
                        href="#pills-howtopay" role="tab" --}}
                                        {{-- aria-controls="pills-howtopay" --}} {{--
                        aria-selected="false">MISCELLANEOUS QUESTIONS</a> --}}
                                        {{-- </li> --}}

                                        {{-- </ul> --}}
                                        <div class="tab-content" id="pills-tabContent">
                                            {{-- <div class="tab-pane fade show active" id="pills-home" --}} {{-- role="tabpanel" --}} {{--
                    aria-labelledby="pills-home-tab"> --}}
                                            {{-- <div class="row  px-4"> --}}

                                            {{-- <div class="accordion w-100" id="accordionExample"> --}}
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="row align-items-center border-bottom mr-1">
                                                        <div class="col-10 px-0">
                                                            <div class="card-header px-0" id="heading1">
                                                                <a class="accordo-text px-0 btn-block text-left collapsed font-weight-bold"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapse1" aria-expanded="true"
                                                                    aria-controls="collapse1">
                                                                    How do I buy a
                                                                    vehicle/machinery from SS
                                                                    Japan
                                                                    Limited?
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-2 text-right">
                                                            <i class="fa-solid fa-angle-down"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapse1" class="collapse" aria-labelledby="heading1"
                                                        data-parent="#accordionExample" ">
                                                                                                                            <div class="card-body">
                                                                                                                                Once you have provided us with the
                                                                                                                                necessary
                                                                                                                                information
                                                                                                                                regarding the vehicle you want, and
                                                                                                                                have made the
                                                                                                                                initial
                                                                                                                                auction deposit, we can start
                                                                                                                                searching and send you
                                                                                                                                possible matches daily. Once you
                                                                                                                                give us a go ahead
                                                                                                                                to
                                                                                                                                purchase, we will source your car.
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    {{-- two --}}

                                                                                                                    <div class="col-lg-6">
                                                                                                                        <div class="row align-items-center border-bottom">
                                                                                                                            <div class="col-10 px-0">
                                                                                                                                <div class="card-header px-0" id="heading2">
                                                                                                                                    <a class="accordo-text px-0 btn-block text-left collapsed font-weight-bold"
                                                                                                                                       type="button"
                                                                                                                                       data-toggle="collapse" data-target="#collapse2"
                                                                                                                                       aria-expanded="true"
                                                                                                                                       aria-controls="collapse2">
                                                                                                                                        Who takes care of getting my
                                                                                                                                        car ready for
                                                                                                                                        export
                                                                                                                                        and shipping it?
                                                                                                                                    </a>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-2 text-right">
                                                                                                                                <i class="fa-solid fa-angle-down"></i>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                                                                                                             data-parent="#accordionExample" ">
                                                        <div class="card-body">
                                                            We will prepare your vehicle for
                                                            export to any port
                                                            of your
                                                            choosing and will handle all the
                                                            booking and
                                                            shipping
                                                            process from Japan. Depending on
                                                            your country and
                                                            method of
                                                            shipping, costs for transport will
                                                            be confirmed.
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- three --}}
                                                <div class="col-lg-6">
                                                    <div class="row align-items-center border-bottom mr-1">
                                                        <div class="col-9 px-0">
                                                            <div class="card-header px-0" id="heading2">
                                                                <a class="accordo-text px-0 btn-block text-left collapsed font-weight-bold"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapse7" aria-expanded="true"
                                                                    aria-controls="collapse7">
                                                                    What is the Auction Grading
                                                                    System?
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 text-right">
                                                            <i class="fa-solid fa-angle-down"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapse7" class="collapse" aria-labelledby="heading2"
                                                        data-parent="#accordionExample" ">
                                                                                                                            <div class="card-body">
                                                                                                                                All vehicles sold at auction are
                                                                                                                                given an overall
                                                                                                                                grade by
                                                                                                                                the independent auction engineers
                                                                                                                                that inspect them.
                                                                                                                                Grades
                                                                                                                                can range from 0 to 9 but most
                                                                                                                                auctions only use 0
                                                                                                                                to 5.
                                                                                                                                This number is shown in either the
                                                                                                                                top left or top
                                                                                                                                right of
                                                                                                                                the auction sheet.
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    {{-- four --}}

                                                                                                                    <div class="col-lg-6">
                                                                                                                        <div class="row align-items-center border-bottom">
                                                                                                                            <div class="col-10 px-0">
                                                                                                                                <div class="card-header px-0" id="heading4">
                                                                                                                                    <a class="accordo-text px-0 btn-block text-left collapsed font-weight-bold"
                                                                                                                                       type="button"
                                                                                                                                       data-toggle="collapse" data-target="#collapse4"
                                                                                                                                       aria-expanded="true"
                                                                                                                                       aria-controls="collapse4">
                                                                                                                                        How can I confirm about the
                                                                                                                                        quality of the
                                                                                                                                        car?
                                                                                                                                    </a>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-2 text-right">
                                                                                                                                <i class="fa-solid fa-angle-down"></i>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div id="collapse4" class="collapse" aria-labelledby="heading4"
                                                                                                                             data-parent="#accordionExample" ">
                                                        <div class="card-body">
                                                            We thoroughly inspect every vehicle
                                                            to ensure
                                                            highest
                                                            quality possible, and provide only
                                                            the most recent
                                                            pictures
                                                            of the vehicles to our customers for
                                                            their
                                                            satisfaction.
                                                            Furthermore, our agents guide you
                                                            extensively about
                                                            the
                                                            vehicle’s condition before and after
                                                            you buy them.
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- five --}}

                                                <div class="col-lg-6">
                                                    <div class="row align-items-center border-bottom mr-1">
                                                        <div class="col-10 px-0">
                                                            <div class="card-header px-0" id="heading5">
                                                                <a class="accordo-text px-0 btn-block text-left collapsed font-weight-bold"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapse5" aria-expanded="true"
                                                                    aria-controls="collapse5">
                                                                    Does your buying team
                                                                    inspect the cars
                                                                    before
                                                                    bidding?
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-2 text-right">
                                                            <i class="fa-solid fa-angle-down"></i>
                                                        </div>
                                                    </div>
                                                    {{-- drop --}}
                                                    <div id="collapse5" class="collapse" aria-labelledby="heading5"
                                                        data-parent="#accordionExample" ">
                                                                                                                            <div class="card-body">
                                                                                                                                Yes, we examine the car completely
                                                                                                                                and once
                                                                                                                                satisfied, we
                                                                                                                                bid on your selected vehicles.
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    {{--
                                            </div> --}}

                                                                                                                    {{--
                                            </div> --}}
                                                                                                                    {{-- </div> --}}
                                                                                                                    {{-- <div class="tab-pane fade" id="pills-profile" --}} {{-- role="tabpanel" --}} {{--
                        aria-labelledby="pills-profile-tab"> --}}
                                                                                                                    <div class="col-lg-6">
                                                                                                                        <div class="row align-items-center border-bottom">
                                                                                                                            <div class="col-10 px-0">
                                                                                                                                <div class="card-header px-0" id="heading1">
                                                                                                                                    <a class="accordo-text px-0 btn-block text-left collapsed font-weight-bold"
                                                                                                                                       type="button"
                                                                                                                                       data-toggle="collapse" data-target="#collapse6"
                                                                                                                                       aria-expanded="true"
                                                                                                                                       aria-controls="collapse6">
                                                                                                                                        When do I have to make the complete
                                                                                                                                        payment?
                                                                                                                                    </a>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-2 text-right">
                                                                                                                                <i class="fa-solid fa-angle-down"></i>
                                                                                                                            </div>
                                                                                                                        </div>

                                                                                                                        <div id="collapse6" class="collapse" aria-labelledby="heading1"
                                                                                                                             data-parent="#accordionExample" ">
                                                        <div class="card-body">
                                                            You are required to make the complete
                                                            payment after the bid
                                                            is
                                                            YEN(¥) or USD ($) , to avoid any delay in
                                                            the shipment.
                                                        </div>
                                                    </div>
                                                </div>


                                                {{--
                                            </div> --}}
                                                {{-- <div class="tab-pane fade" id="pills-contact" --}} {{-- role="tabpanel" --}} {{--
                        aria-labelledby="pills-contact-tab"> --}}


                                                {{-- seven --}}

                                                <div class="col-lg-6">
                                                    <div class="row align-items-center border-bottom mr-1">
                                                        <div class="col-10 px-0">
                                                            <div class="card-header px-0" id="heading2">
                                                                <a class="accordo-text px-0 btn-block text-left collapsed font-weight-bold"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapse8" aria-expanded="true"
                                                                    aria-controls="collapse8">
                                                                    When will the car be shipped?
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-2 text-right">
                                                            <i class="fa-solid fa-angle-down"></i>
                                                        </div>
                                                    </div>


                                                    <div id="collapse8" class="collapse" aria-labelledby="heading2"
                                                        data-parent="#accordionExample" ">
                                                                                                                            <div class="card-body">
                                                                                                                                We will ship your vehicle as soon as you
                                                                                                                                complete the
                                                                                                                                minimum
                                                                                                                                deposit for shipment. It is 50%~100% of the
                                                                                                                                Total C&F, which
                                                                                                                                is
                                                                                                                                required for the shipment to be processed.
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>


                                                                                                                    {{--
                                            </div> --}}
                                                                                                                    {{-- <div class="tab-pane fade" id="pills-others" role="tabpanel" --}} {{--
                        aria-labelledby="pills-others-tab"> --}}

                                                                                                                    {{-- eight --}}

                                                                                                                    <div class="col-lg-6">
                                                                                                                        <div class="row align-items-center border-bottom">
                                                                                                                            <div class="col-10 px-0">
                                                                                                                                <div class="card-header px-0" id="heading2">
                                                                                                                                    <a class="accordo-text px-0 btn-block text-left collapsed font-weight-bold"
                                                                                                                                       type="button"
                                                                                                                                       data-toggle="collapse" data-target="#collapse3"
                                                                                                                                       aria-expanded="true"
                                                                                                                                       aria-controls="collapse3">
                                                                                                                                        How long will shipping take?
                                                                                                                                    </a>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-2 text-right">
                                                                                                                                <i class="fa-solid fa-angle-down"></i>
                                                                                                                            </div>
                                                                                                                        </div>


                                                                                                                        <div id="collapse3" class="collapse" aria-labelledby="heading3"
                                                                                                                             data-parent="#accordionExample" ">
                                                        <div class="card-body">
                                                            We cannot commit an accurate time of
                                                            shipment as it depends
                                                            on
                                                            shipping schedule and availability of space.
                                                            On an average,
                                                            it takes
                                                            4 to 6 weeks.
                                                        </div>
                                                    </div>
                                                </div>


                                                {{--
                                            </div> --}}
                                                {{-- <div class="tab-pane fade" id="pills-howtopay" --}} {{-- role="tabpanel" --}} {{--
                        aria-labelledby="pills-howtopay"> --}}


                                                <div class="col-lg-6">
                                                    <div class="row align-items-center mr-1">
                                                        <div class="col-10 px-0">
                                                            <div class="card-header px-0" id="heading4">
                                                                <a class="accordo-text px-0 btn-block text-left collapsed font-weight-bold"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapse9" aria-expanded="true"
                                                                    aria-controls="collapse9">
                                                                    How long does it take for the
                                                                    documents to reach my
                                                                    country?
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-2 text-right">
                                                            <i class="fa-solid fa-angle-down"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapse9" class="collapse" aria-labelledby="heading4"
                                                        data-parent="#accordionExample" ">
                                                                                                                            <div class="card-body">
                                                                                                                                Once shipment has departed, Original BL Scan
                                                                                                                                will be
                                                                                                                                supplied within
                                                                                                                                2-3 business days after the complete CNF
                                                                                                                                payment is made.
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-12 border-end"></div>
                                                                                                                </div>

                                                                                                                {{-- </div> --}}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                {{-- <div class="row my-5 w-100"> --}}
                                                                                                {{-- <div class="col-md-12 col-lg-12 col-sm-12"> --}}
                                                                                                {{-- <div class="bg-wrapper text-light p-5 shadow" --}} {{--
            style="background: url('assets/images/cta-bg.png');"> --}}
                                                                                                {{-- <h2 class="fw-bold">SS Japan</h2> --}}
                                                                                                {{-- <p>For Any Queries, Call Our Support Team at +81-52-387-9772</p> --}}
                                                                                                {{-- <a href="{{ route('contact') }}"> --}}
                                                                                                {{-- <button class="btn btn-primary">Contact --}}
                                                                                                {{-- Us --}}
                                                                                                {{-- </button> --}}
                                                                                                {{-- </a> --}}
                                                                                                {{-- </div> --}}
                                                                                                {{-- </div> --}}
                                                                                                {{-- </div> --}}
                                                                                            </div>
                                                                                        </div>


                                                                                        <!-- Right Column -->
                                                                                        <div class="col-md-2 order-3 order-md-3 order-lg-3 order-sm-3 text-dark right-sidebar">
                                                                                            @include('front.layouts.right_sidebar')
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Button trigger modal -->


                                                                                <!-- Modal -->


                                                                                {{-- <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" --}} {{--
    aria-hidden="true"> --}}
                                                                                {{-- <div class="modal-dialog"> --}}
                                                                                {{-- <div class="modal-content"> --}}
                                                                                {{-- <div class="modal-header"> --}}
                                                                                {{-- <h1 class="modal-title fs-5" id="exampleModalLabel1">Customer Review</h1> --}}

                                                                                {{-- </div> --}}
                                                                                {{-- <div class="modal-body"> --}}
                                                                                {{-- <div class="row"> --}}
                                                                                {{-- <div class="col-md-8 col-lg-8"><img class="w-100" alt="" id="review-img"></div> --}}
                                                                                {{-- <div class="col-md-4 col-lg-4 body-inner"> --}}
                                                                                {{-- <div class="row"> --}}
                                                                                {{-- <div class="col-md-12"> --}}


                                                                                {{-- <h6 class="mt-4 font-weight-bold" id="username">
                <i --}} {{-- class="fa-solid fa-user"></i> UserName
                                </h6> --}}
                                                                                {{-- @php --}}
                                                                                {{-- $reviewValue = $reviews->rating; // Your review value from the backend --}}
                                                                                {{-- $maxStars = 5; // Maximum number of stars --}}

                                                                                {{-- // Calculate the number of filled and empty stars --}}
                                                                                {{-- $filledStars = min($reviewValue, $maxStars); --}}
                                                                                {{-- $emptyStars = $maxStars - $filledStars; --}}
                                                                                {{-- @endphp --}}

                                                                                {{--
            <!-- Display filled stars --> --}}
                                                                                {{-- @for ($i = 0; $i < $filledStars; $i++) --}} {{-- <i class="fas fa-star"
                                    style="color:#F9C303;"></i> --}}
                                                                                {{-- @endfor --}}

                                                                                {{--
            <!-- Display empty stars --> --}}
                                                                                {{-- @for ($i = 0; $i < $emptyStars; $i++) --}} {{-- <i class="far fa-star"
                                        style="color: #F9C303;"></i> --}}
                                                                                {{-- @endfor --}}

                                                                                {{--
</div> --}}


                                                                                {{-- </div> --}}


                                                                                {{-- <h4 class="my-3">Reviews</h4> --}}
                                                                                {{-- <h6 id="review-description"> --}}
                                                                                {{-- </h6> --}}

                                                                                {{-- </div> --}}
                                                                                {{-- </div> --}}
                                                                                {{-- </div> --}}
                                                                                {{-- <div class="modal-footer border-0"> --}}
                                                                                {{-- <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal">Close</button> --}}
                                                                                {{-- </div> --}}
                                                                                {{-- </div> --}}
                                                                                {{-- </div> --}}
                                                                                {{-- </div> --}}
                                                                            </section>
                                                                        </div>

@endsection
<div id="popup" class="popup">
    <div class="popup-content">
        <span class="close" id="closePopupBtn">&times;</span>
        <p>Listing added to favorites successfully</p>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize likeCounts as an object with unique review IDs as keys
        let likeCounts = {};

        // Attach a click event listener to all elements with class "like_button"
        const likeButtons = document.querySelectorAll('.like_button');
        likeButtons.forEach(like_button => {
            like_button.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent the default link behavior
                const reviewId = like_button.getAttribute('data-reviewid');

                // Check if the likeCount for this review exists in likeCounts object, if not, initialize it to 0
                if (!likeCounts.hasOwnProperty(reviewId)) {
                    likeCounts[reviewId] = 5;
                }

                // Increment the like count for this review
                likeCounts[reviewId] += 1;

                // Update the displayed like count for this review
                const likeCountSpan = like_button.parentElement.querySelector('.likeCount');
                if (likeCountSpan) {
                    likeCountSpan.textContent = likeCounts[reviewId];
                }
            });
        });

    });

    function addToFavorites(id, e) {
        // e.preventDefault();
        const listingId = id;

        $.ajax({
            url: '/add-to-favorites',
            type: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: JSON.stringify({
                listingId
            }),
            success: function(data) {
                console.log('Listing added to favorites successfully');
                if ($('.popup').length) {
                    $('.popup').css('display', 'block');
                    setTimeout(() => {
                        $('.popup').css('display', 'none');
                    }, 3000);
                }
            },
            error: function(xhr, status, error) {
                if (xhr.status === 401) {
                    // Redirect to login page
                    window.location.href = '/customer/login';
                } else {
                    console.error('Error adding listing to favorites', error);
                }
            }
        });

    }

    document.addEventListener('DOMContentLoaded', function() {
        // Select all FAQ question elements
        var faqQuestions = document.querySelectorAll('.card-header a');

        // Add click event listener to each question
        faqQuestions.forEach(function(question) {
            question.addEventListener('click', function(event) {
                // Prevent default anchor click behavior
                event.preventDefault();

                // The id of the div that contains the answer
                var targetId = this.getAttribute('data-target');

                // The div that contains the answer
                var answerDiv = document.querySelector(targetId);

                // Toggle the 'collapse' class to show or hide the answer
                answerDiv.classList.toggle('collapse');
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        var h2Elements = document.querySelectorAll('.mob-hide .box-content .content h2');

        h2Elements.forEach(function(element) {
            var originalText = element.textContent;

            if (originalText.length > 25) {
                var truncatedText = originalText.substring(0, 25) + '...';
                element.textContent = truncatedText;
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        var spanElements = document.querySelectorAll('.fuel_type');

        spanElements.forEach(function(spanElement) {
            var originalText = spanElement.textContent;
            if (originalText.includes('/')) {
                var truncatedText = originalText.split('/')[0] + ' |';
                console.log(truncatedText);
                spanElement.textContent = truncatedText;
            }
        });
    });
</script>
<style>

    .collapse {
        transition: all 2s ease !important;
    }

    /* This class will be added dynamically to your collapsible div when it's shown */
    .collapse.show {
        padding: 1rem !important;
    }

    /* Customizing the card body padding to ensure no layout shifts */
    .card-body {
        padding: 0;
    }

    .row {
        margin: 0 -15px;
    !important;
        /* Adjust the margin if necessary */
    }

    .col-md-4.col-sm-12.col-lg-3 {
        padding: 0 15px;
    !important;
        /* Adjust the padding if necessary */
        margin-bottom: 30px;
    !important;
        /* Adds space between the rows */
    }

    .col-md-4.col-sm-12.col-lg-3 {
        padding: 0 15px;
        /* Adjust the padding if necessary */
        margin-bottom: 30px;
        /* Adds space between the rows */
        box-sizing: border-box;
        /* Ensures padding is included in the width */
    }

    /*.mob-hide .box-content {*/
    /*    border-radius: 10px !important;*/
    /*    background: #FFF !important;*/
    /*    width: 260px !important;*/
    /*    height: 416px !important;*/
    /*    flex-shrink: 0 !important;*/
    /*    border: none !important; !* Assuming you don't need a border, or update if you have a border style *!*/
    /*    margin: auto !important; !* Centering the box if needed *!*/
    /*    display: flex !important;*/
    /*    flex-direction: column !important;*/
    /*    justify-content: space-between !important;*/
    /*    overflow: hidden !important; !* Ensuring content doesn't spill out *!*/
    /*    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); !* Adding a subtle shadow for depth, adjust as needed *!*/
    /*}*/
    .mob-hide .box-content {
        border-radius: 0 0 20px 20px !important;
        background: #FFF;
        flex-shrink: 0;
        border: none;
        /* Assuming you don't need a border, or update if you have a border style */
        margin: auto;
        /* Centering the box if needed */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden;
        /* Ensuring content doesn't spill out */
        /*box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); !* Adding a subtle shadow for depth, adjust as needed *!*/
    }

    /* For large screens (e.g., desktops) */
    /*@media (min-width: 2000px) {*/
    /*    .mob-hide .box-content {*/
    /*        width: 340px; !* Adjusted width for very large screens *!*/
    /*        height: 544px; !* Adjusted height for very large screens *!*/
    /*    }*/

    /*    .col-md-4.col-sm-12.col-lg-3 {*/
    /*        !* Adjust width similarly if necessary *!*/
    /*        width: calc(25% - 30px); !* Assuming a 4-column layout, adjust the percentage as needed *!*/
    /*    }*/

    /*    .favorite-button {*/
    /*        position: absolute;*/
    /*        top: 360px;*/
    /*    }*/
    /*}*/

    /*!* For screens around 1920x1080 *!*/
    /*@media (min-width: 1920px) and (max-width: 1999px) {*/
    /*    .mob-hide .box-content {*/
    /*        width: 375px; !* Adjusted width for 1920px screens *!*/
    /*        height: 500px; !* Adjusted height for 1920px screens *!*/
    /*    }*/

    /*    .col-md-4.col-sm-12.col-lg-3 {*/
    /*        !* Calculate the width minus the total horizontal padding to maintain the box size *!*/
    /*        width: calc(33.3333% - 30px); !* Assuming a 3-column layout, adjust the percentage as needed *!*/
    /*        !* If you have a specific gutter width you want to maintain, adjust the -30px above *!*/
    /*    }*/

    /*    .favorite-button {*/
    /*        position: absolute;*/
    /*        top: 400px !important;*/
    /*    }*/
    /*}*/

    /*!* For large screens (e.g., desktops) *!*/
    /*@media (min-width: 1200px) and (max-width: 1499px) {*/
    /*    .mob-hide .box-content {*/
    /*        width: 240px; !* No change from your original *!*/
    /*        height: 410px; !* No change from your original *!*/
    /*    }*/
    /*}*/
    /*@media (min-width: 1500px) and (max-width: 1650px) {*/
    /*    .mob-hide .box-content {*/
    /*        width: 310px; !* Adjusted width for 1920px screens *!*/
    /*        height: 450px; !* Adjusted height for 1920px screens *!*/
    /*    }*/

    /*    .col-md-4.col-sm-12.col-lg-3 {*/
    /*        !* Calculate the width minus the total horizontal padding to maintain the box size *!*/
    /*        width: calc(33.3333% - 30px); !* Assuming a 3-column layout, adjust the percentage as needed *!*/
    /*        !* If you have a specific gutter width you want to maintain, adjust the -30px above *!*/
    /*    }*/

    /*    .favorite-button {*/
    /*        position: absolute;*/
    /*        top: 380px !important;*/
    /*    }*/
    /*}*/
    /*@media (min-width: 1650px) and (max-width: 1800px) {*/
    /*    .mob-hide .box-content {*/
    /*        width: 350px; !* Adjusted width for 1920px screens *!*/
    /*        height: 470px; !* Adjusted height for 1920px screens *!*/
    /*    }*/

    /*    .col-md-4.col-sm-12.col-lg-3 {*/
    /*        !* Calculate the width minus the total horizontal padding to maintain the box size *!*/
    /*        width: calc(33.3333% - 30px); !* Assuming a 3-column layout, adjust the percentage as needed *!*/
    /*        !* If you have a specific gutter width you want to maintain, adjust the -30px above *!*/
    /*    }*/

    /*    .favorite-button {*/
    /*        position: absolute;*/
    /*        top: 380px !important;*/
    /*    }*/
    /*}*/
    /*@media (min-width: 1801px) and (max-width: 1919px) {*/
    /*    .mob-hide .box-content {*/
    /*        width: 340px; !* Adjusted width for 1920px screens *!*/
    /*        height: 450px; !* Adjusted height for 1920px screens *!*/
    /*    }*/

    /*    .col-md-4.col-sm-12.col-lg-3 {*/
    /*        !* Calculate the width minus the total horizontal padding to maintain the box size *!*/
    /*        width: calc(33.3333% - 30px); !* Assuming a 3-column layout, adjust the percentage as needed *!*/
    /*        !* If you have a specific gutter width you want to maintain, adjust the -30px above *!*/
    /*    }*/

    /*    .favorite-button {*/
    /*        position: absolute;*/
    /*        top: 360px !important;*/
    /*    }*/
    /*}*/

    /*!* For medium screens (e.g., tablets in landscape mode) *!*/
    /*@media (min-width: 992px) and (max-width: 1199px) {*/
    /*    .mob-hide .box-content {*/
    /*        width: 200px; !* No change from your original *!*/
    /*        height: 330px; !* No change from your original *!*/
    /*    }*/
    /*}*/

    /*!* For small screens (e.g., tablets in portrait mode) *!*/
    /*@media (min-width: 768px) and (max-width: 991px) {*/
    /*    .mob-hide .box-content {*/
    /*        width: 100%; !* No change from your original *!*/
    /*        height: auto; !* No change from your original *!*/
    /*    }*/
    /*}*/

    /*!* For extra small screens (e.g., smartphones) *!*/
    /*@media (max-width: 767px) {*/
    /*    .mob-hide .box-content {*/
    /*        width: 100%; !* No change from your original *!*/
    /*        height: auto; !* No change from your original *!*/
    /*    }*/
    /*}*/

    /* For very large screens (more than 2000px wide) - 4 columns */
    @media (min-width: 2000px) {
        .col-md-4.col-sm-12.col-lg-3 {
            width: calc(25% - 30px);
            /* 4 cards per row */
        }

        /* Other styles */
    }

    /* For screens around 1920x1080 - 3 columns */
    @media (min-width: 1920px) and (max-width: 1999px) {
        .col-md-4.col-sm-12.col-lg-3 {
            width: calc(33.3333% - 30px);
            /* 3 cards per row */
        }
        .search-box-wrapper{
            margin-top: -100px !important;
        }


        /* Other styles */
    }

    /* For large screens (e.g., desktops) between 1651px and 1919px - 3 columns */
    @media (min-width: 1651px) and (max-width: 1919px) {
        .col-md-4.col-sm-12.col-lg-3 {
            width: calc(33.3333% - 30px);
            /* 3 cards per row */
        }

        /* Other styles */
    }

    /* For screens between 1500px and 1650px - 3 columns */
    @media (min-width: 1500px) and (max-width: 1650px) {
        .col-md-4.col-sm-12.col-lg-3 {
            width: calc(33.3333% - 30px);
            /* 3 cards per row */
        }

        /* Other styles */
    }

    /* For screens between 1200px and 1499px - 3 columns */
    @media (min-width: 1200px) and (max-width: 1499px) {
        .col-md-4.col-sm-12.col-lg-3 {
            width: calc(33.3333% - 30px);
            /* 3 cards per row */
        }

        /* Other styles */
    }

    /* For medium screens (e.g., tablets in landscape mode) between 992px and 1199px - 2 columns */
    @media (min-width: 992px) and (max-width: 1199px) {
        .col-md-4.col-sm-12.col-lg-3 {
            width: calc(50% - 30px);
            /* 2 cards per row */
        }

        /* Other styles */
    }

    /* For small screens (e.g., tablets in portrait mode) between 768px and 991px - 1 column */
    @media (min-width: 768px) and (max-width: 991px) {
        .col-md-4.col-sm-12.col-lg-3 {
            width: 100%;
            /* 1 card per row */
        }

        /* Other styles */
    }

    /* For extra small screens (e.g., smartphones) - 1 column */
    @media (max-width: 767px) {
        .col-md-4.col-sm-12.col-lg-3 {
            width: 100%;
            /* 1 card per row */
        }

        /* Other styles */
    }

    .mob-hide .box-content img {
        padding: 8px;
        display: block !important;
        width: 100% !important;
        height: 170px !important;
        margin-bottom: 0 !important;
    }

    .mob-hide .box-content .content {
        padding: 2px !important;
        padding-top: 0 !important;
    }

    .mob-hide .box-content .content h2 {
        font-size: 0.8rem !important;
        color: #3f70c9 !important;
        /* Update with the actual color */
        margin: 15px 6px !important;
        font-weight: bold !important;
        text-overflow: ellipsis !important;
        overflow: hidden !important;
        /*white-space: nowrap !important;*/
    }

    .mob-hide .box-content .content .location {
        color: grey !important;
        font-size: 0.9rem !important;
        margin: 15px 3px !important;
    }

    .mob-hide .box-content .content .details {
        display: -webkit-box !important;
        -webkit-box-orient: vertical !important;
        -webkit-line-clamp: 2 !important;
        /* Limit to two lines */
        overflow: hidden !important;
        line-height: 1.2em !important;
        /* Adjust line height as needed */
        height: calc(2.4em + 1px) !important;
        /* Adjust height based on line height, this accounts for two lines */
        font-size: 0.7rem !important;
        display: flex !important;
        align-items: center !important;
        margin: 4px 0 !important;
        /* Adjust vertical margin as needed */
        justify-content: left !important;
        flex-wrap: wrap !important;
    }

    .mob-hide .box-content .content .details span {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        margin: 0 5px !important;
        /* Half of the spacing you want between items and separators */
    }

    .mob-hide .box-content .content .details span:not(:first-child):not(:last-child)::before {
        content: '|' !important;
        color: #808080 !important;
        /* Adjust the color to match your design */
        padding-right: 5px !important;
        /* The other half of the spacing */
        display: inline-block !important;
    }

    /* Correct any potential misalignment caused by line height differences */
    .mob-hide .box-content .content .details span::before,
    .mob-hide .box-content .content .details span {
        line-height: 1 !important;
    }

    .mob-hide .box-content .content .price {
        display: flex !important;
        /* flex-direction: column !important; */
        /* align-items: start !important; */
        /* Aligns the text to the left */
        margin-top: 8px !important;
        /* Gives some space above the price */
        /* Gives some space within the price section */
        border-top: 1px solid #ccc !important;
        /* Adds a border on top of the price section */
        padding: 5px 10px !important;
    }

    .mob-hide .box-content .content .price span {
        font-weight: bold !important;
        color: #808080 !important;
        /* Dark grey color for the price text */
        font-size: 1.25rem !important;
        /* Larger font size for the price */
    }

    .mob-hide .box-content .content .price .update {
        font-size: 0.7rem !important;
        color: #808080 !important;
        /* Light grey color for the update text */
        align-self: start !important;
        /* Align the update text to the left */
    }

    .mob-hide .box-content button {
        width: 100% !important;
        height: 35px !important;
        flex-shrink: 0 !important;
        border-radius: 0 0 20px 20px !important;
        background: #531010 !important;
        color: white !important;
        font-size: 0.7rem !important;
        text-transform: uppercase !important;
        cursor: pointer !important;
        border: none !important;
        padding: 0 !important;
        /* Padding is not needed since height is explicitly set */
        display: block !important;
        /* To ensure the width is respected */
        margin: 8px auto 0 !important;
    }

    .mob-hide .box-content button:hover {
        background-color: #250202 !important;
        /* Darken the button on hover - adjust color as needed */
    }

    .box-content.position-relative {
        position: relative !important;
    }

    .badge-used-car {
        position: absolute !important;
        top: 135px !important;
        /* Adjust as needed */
        right: 9px !important;
        /* Adjust as needed */
        background-color: #531010 !important;
        /* Red background, change as needed */
        color: white !important;
        padding: 5px 10px !important;
        font-size: 0.7rem !important;
        /*font-weight: bold !important;*/
        z-index: 11 !important;
        /* Ensure it's above other content */
        /*border-radius: 0 0 3px 3px !important; !* Rounded bottom corners *!*/
    }

    .badge-photos {
        position: absolute;
        top: 135px; /* Adjust as needed */
        left: 9px; /* Adjust to align it to the left side */
        right: 9px;
        background-color: black;
        color: white;
        padding: 5px 10px;
        font-size: 0.7rem;
        z-index: 10;
        opacity: 0.7;
        width: -webkit-fill-available;
    }


    .badge-photo {
        position: absolute !important;
        top: 140px !important;
        /* Adjust as needed */
        right: 219px !important;
        /* Adjust as needed */
        opacity: 0.8;
        background-color: #020a0a !important;
        /* Red background, change as needed */
        color: white !important;
        padding: 5px 10px !important;
        font-size: 0.7rem !important;
        font-weight: bold !important;
        z-index: 10 !important;
        /* Ensure it's above other content */
        /*border-radius: 0 0 3px 3px !important; !* Rounded bottom corners *!*/
    }

    .favorite-button {
        position: absolute;
        top: 320px;
        /* Adjust as needed */
        right: 25px;
        /* Adjust as needed */
        font-size: 1.5rem;
        /* Adjust as needed */
        color: #808080;
        /* Adjust as needed */
        z-index: 5;
        /* Higher than the image but lower than the badge */
    }

    .favorite-button i {
        cursor: pointer;
        /* Additional styling if needed */
    }

    /* If not using an icon font */
    .favorite-button button {
        border: none;
        width: 30px;
        /* Adjust as needed */
        height: 30px;
        /* Adjust as needed */
        cursor: pointer;
    }

    .favorite-button i:hover {
        color: #e00;
        /* Change color on hover */
        cursor: pointer;
        font-size: 1.8rem;
        /* Adjust as needed */
    }

    /*  end of car box styling */

    .best-seller {
        background-color: #FFF;
        border-radius: 25px;
        box-shadow: 0 4px 8px rgb(0 0 0 / 52%);
    }

    .best-seller h2 {
        font-weight: bold;
        /* Bold font for the title */
        color: #333;
        /* Dark font color for the title */
        padding-bottom: 0.5rem;
        /* Space below the title */
    }

    .best-seller .col-md-4,
    .best-seller .col-lg-4,
    .best-seller .col-sm-12 {
        padding: 1rem;
        /* Padding around the items */
    }

    .best-seller .row > [class^="col-"] {
        display: flex;
        flex-direction: column;
        /* Use flexbox for alignment */
        align-items: center;
        /* Align items vertically */
    }

    .best-seller i.fas.fa-car {
        font-size: 3rem;
        /* Larger icon size */
        color: #333;
        /* Icon color */
    }

    .best-seller ul {
        list-style: none;
        /* Remove default list styling */
    }

    .best-seller ul a {
        text-decoration: none;
        /* Remove underline from links */
        color: #333;
        /* Link color */
    }

    .best-seller ul li {
        padding: 0.25rem 0;
        /* Spacing for list items */
        font-size: 0.9rem;
        /* Font size for list items */
    }

    /* Style for the car type labels (e.g., SUV, Sedan) */
    .best-seller .col-3 {
        font-size: 0.9rem;
        /* Font size for type labels */
        text-transform: uppercase;
        /* Uppercase text for type labels */
        font-weight: bold;
        /* Bold text for type labels */
        color: #731718;
        /* Text color for type labels */
        margin-right: 0.5rem;
        /* Space between icon and type label */
    }

    /* Adjustments for responsive layouts */
    @media (max-width: 768px) {

        .best-seller .col-md-4,
        .best-seller .col-lg-4,
        .best-seller .col-sm-12 {
            padding: 0.5rem;
            /* Smaller padding on smaller screens */
        }

        .best-seller i.fas.fa-car {
            font-size: 1.5rem;
            /* Smaller icon size on smaller screens */
        }
    }

    .my-3.custom {
        background-color: #731718;
        /* Dark red background */
        height: 50px;
        /* Increased height */
        text-align: center;
        /* Center text horizontally */
        margin-left: -45px;
        /* Adjust as needed */
        width: inherit;
        /* Width */
        color: white;
        /* Set the text color to white */
        line-height: 50px;
        /* Center text vertically by setting line height equal to height */
        display: flex;
        /* Use flexbox to align items */
        align-items: center;
        /* Align items vertically */
        justify-content: center;
        /* Align content horizontally */
    }

    .custom-icon {
        width: 6em;
        /* Same size as the icon */
        height: 2em;
        /* Maintain aspect ratio */
        object-fit: contain;
        /* Keep the image from being distorted */
    }


    .reviews-container {
        width: 100%;
        font-family: Arial, sans-serif;
        /* Or any other font of your choice */
    }

    .review-item {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        /* Space between review items */
    }

    .review-car-image {
        width: 14em;
        /* Adjust as needed */
        height: 10em;
        margin-right: 0;
    }

    .review-content {
        border: 0px solid #ddd;
        /* Light grey border */
        border-radius: 4px;
        padding: 10px;
        width: calc(100% - 120px);
        /* Adjust based on image width and margins */
    }

    .review-stars {
        /* Style for the star rating */
    }

    .review-text {
        margin-top: 5px;
    }

    .review-title {
        font-weight: bold;
    }

    .review-details {
        font-size: 0.9rem;
        color: #555;
        /* Dark grey text */
    }

    .review-meta {
        font-size: 0.8rem;
        color: #999;
        /* Light grey text */
        margin-top: 5px;
    }

    .review-actions {
        /* Style for the action buttons */
        margin-top: 10px;
    }

    .custom-icon {
        width: 150%;
        /* Adjust the width to fit the container */
        height: auto;
        /* Maintain aspect ratio */
        max-width: 60px;
        /* Maximum width of the image */
        max-height: 60px;
        /* Maximum height of the image */
        display: block;
        /* To remove any extra space below the image */
        margin: 0 auto;
        /* Center the image in its column */
    }

        /* Popup container */
        .popup {
            display: none;
            position: fixed;
            top: 10%;
            left: 85%;
            width: 350px;
            background: #731718;
            transform: translate(-50%, -50%);
            padding: 0px;
            margin: auto;
            z-index: 9999;
        }

        /* Popup content */
        .popup-content {
            padding: 20px;
            text-align: center;
            margin: auto;
            color: white;
            border-radius: 5px;
        }

        .popup-content p {
            margin: 0px;
        }

        /* Close button */
        .close {
            float: right;
            cursor: pointer;
            color: white;
        }

    @media only screen and (max-width: 768px) {
        .custom-icon {
            max-width: 85px;
            /* Smaller size for mobile devices */
            max-height: 100px;
        }

        .col-3,
        .col-8 {
            flex: 0 0 100%;
            /* Stack the image and text on top of each other */
            max-width: 100%;
            /* Use full width */
        }
    }
</style>
