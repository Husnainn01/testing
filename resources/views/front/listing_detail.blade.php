@extends('front.layouts.app_front')

@section('content')
@php
$social_media_items=\App\Models\SocialMediaItem::all();
$userdata=Auth::user();
@endphp
<script type='text/javascript'
    src='https://platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons'
    async='async'></script>

<!-- Add Instagram share button -->
<script type='text/javascript'>
    stWidget.addEntry({
            "service": "instagram",
            "element": document.querySelector('body'), // You can target a specific element if needed
            "url": "https://www.your-website.com", // Replace with your website URL
            "title": "Check out my website!",
            "type": "large"
        });
</script>
<style>
    .hide {
        display: none;
    }

    .water-mark {
        position: absolute;
        bottom: 5px;
        right: 20px;
        opacity: 1;
        color: white;
    }

    @media print {
        header {
            display: none;
        }

        footer {
            display: none;
        }

        .rit_print {
            position: relative;
        }

        .navbar {
            display: none;
        }

        .btn {
            display: none;
        }

        body {
            margin: 10mm !important;
            ;
            font-size: 12pt !important;
            ;
        }

        .print_hide {
            display: none;
        }

        .print-50 {
            width: 50% !important;
        }

        .print_rit_50 {
            padding: 5% !important;
        }

    }

    .specification {
        border: 1px solid #c7c7c7;
        ;
        /* Or another color for the border */
        padding: 5px 0;
        /* Adjust the padding as needed */
        margin-bottom: 1rem;
    }
</style>
<div class="container my-5">
    <div class="row px-3 px-sm-3">
        <div class="col-md-6 print-50">
            <h6>Home {{ $detail->brand_name }} > {{ $detail->listing_name }} > SUV >2012</h6>
            {{--
            <div class="carousel">
                <div class="big-slide">
                    <img src="{{asset('/uploads/listing_photos/'.$listing_first_photos->photo)}}" alt="Image 1">
                    <div class="slider-arrow prev"><i class="fas fa-chevron-left  "></i></div>
                    <div class="slider-arrow next"><i class="fas fa-chevron-right"></i></div>
                </div>
                <div class="thumbnails">
                    @foreach ($listing_photos as $photos)
                    <div class="thumbnail">
                        <img src="{{asset('/uploads/listing_photos/'.$photos->photo)}}" class="w-100"
                            alt="img{{$photos->id}}" />
                    </div>
                    @endforeach
                </div>
                <!-- Add more thumbnail divs as needed -->
            </div> --}}



            <!-- Carousel -->
            <div id="carousel" class="carousel slide gallery" data-ride="carousel">
                <div class="carousel-inner position-relative ">
                    <span class="badge position-absolute start-0 p-2 text-light primary">In Stock</span>
                    @php $key = 0; @endphp
                    @foreach ($listing_photos as $photos)
                    @php $key++; @endphp
                    <div class="carousel-item {{ $key == 1 ? 'active' : '' }}" data-slide-number="{{ $key }}"
                        data-toggle="lightbox" data-gallery="gallery"
                        data-remote="{{ asset('/uploads/listing_photos/'.$photos->photo) }}">
                        <img height="300" src="{{ asset('/uploads/listing_photos/'.$photos->photo) }}"
                            class="d-block w-100" alt="...">
                    </div>
                    @endforeach
                    @if($detail->listing_stock_status == 'in_stock')
                    <span class="badge position-absolute start-0 p-2 text-light primary top-0">In Stock</span>
                    @elseif($detail->listing_stock_status == 'reserved')
                    <span class="badge position-absolute start-0 p-2 text-light primary top-0">Reserved</span>
                    @else
                    <span class="badge position-absolute start-0 p-2 text-light primary top-0">SOLD</span>
                    @endif
                    <span class="water-mark" style="background-color:black;">1/{{$listing_photos->count()}}</span>
                    {{-- <div class="water-mark">
                        <h4>SS-Japan.com</h4>
                    </div>--}}
                </div>

                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
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
            {{-- <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">--}}
                {{-- <div class="carousel-inner">--}}
                    {{-- <div class="carousel-item active" data-slide-number="0">--}}
                        {{-- <div class="row mx-0">--}}
                            {{-- @php $value = 0; @endphp--}}
                            {{-- @foreach ($listing_photos as $photos)--}}

                            {{-- <div id="carousel-selector-{{$value}}" --}} {{--
                                class="thumb col-3 px-1 py-2 {{ $value == 0 ? 'selected' : '' }}" --}} {{--
                                data-target="#carousel" data-slide-to="{{$value}}">--}}
                                {{-- @php $value++; @endphp--}}
                                {{-- <img src="{{ asset('/uploads/listing_photos/'.$photos->photo) }}" alt='img' --}}
                                    {{-- class="img-fluid">--}}
                                {{-- </div>--}}
                            {{-- @endforeach--}}


                            {{-- </div>--}}
                        {{-- </div>--}}

                    {{-- </div>--}}

                {{-- </div>--}}

            <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                @php $chunked_photos = array_chunk($listing_photos->toArray(), 8); @endphp

                <!-- Carousel Indicators -->
                <ol class="carousel-indicators" style="margin-bottom: -15px;">
                    @foreach ($chunked_photos as $photo_chunk_index => $photo_chunk)
                    <li data-target="#carousel-thumbs" data-slide-to="{{ $photo_chunk_index }}"
                        class="{{ $photo_chunk_index == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>

                <!-- Carousel Inner -->
                <div class="carousel-inner">
                    @foreach ($chunked_photos as $photo_chunk_index => $photo_chunk)
                    <div class="carousel-item {{ $photo_chunk_index == 0 ? 'active' : '' }}">
                        @php $row_photos = array_chunk($photo_chunk, 4); @endphp
                        @foreach ($row_photos as $row_index => $row)
                        <div class="row mx-0">
                            @foreach ($row as $photo_index => $photo)
                            <div id="carousel-selector-{{ $photo_chunk_index * 8 + $row_index * 4 + $photo_index }}"
                                class="thumb col-3 px-1 py-2 {{ $photo_chunk_index == 0 && $row_index == 0 && $photo_index == 0 ? 'selected' : '' }}"
                                data-target="#carousel"
                                data-slide-to="{{ $photo_chunk_index * 8 + $row_index * 4 + $photo_index }}">
                                <img src="{{ asset('/uploads/listing_photos/'.$photo['photo']) }}" alt='img'
                                    class="img-fluid">
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>

                <!-- Carousel Controls -->
                <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="row border-bottom my-3 pt-5 d-block">
                <div class="col-md-6">
                    <h5>Share:
                        @foreach ($social_media_items as $items)
                        <a href="{{$items->social_url}}"><i class="{{$items->social_icon}}"
                                style="color:white!important;background:#731718;padding:10px;border-radius:5px;"></i></a>
                        @endforeach
                    </h5>
                </div>
                <a style="border: none;
		background: transparent;
		cursor: pointer;float: right;" onclick="handleClick()">
                    <span class="text-right" style="font-size:20px;color: #003580;margin-top: -30px;">
                        <i class="fas fa-download"></i> Download
                    </span>
                </a>
            </div>
            <div class="row my-2 text-center">
                <!-- Year -->
                <div class="col-md-3 col-sm-6 col-lg-3 specification">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <p class="mb-0">{{ $detail->listing_model_year }}</p>
                    <small>Year</small>
                </div>
                <!-- Mileage -->
                <div class="col-md-3 col-sm-6 col-lg-3 specification">
                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                    <p class="mb-0">{{ $detail->listing_mileage }}</p>
                    <small>Mileage</small>
                </div>
                <!-- Fuel Type -->
                <div class="col-md-2 col-sm-6 col-lg-2 specification">
                    <i class="fa fa-fire" aria-hidden="true"></i>
                    <p class="mb-0">{{ $detail->listing_fuel_type }}</p>
                    <small>Fuel</small>
                </div>
                <!-- Transmission -->
                <div class="col-md-2 col-sm-6 col-lg-2 specification">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    <p class="mb-0">{{ $detail->listing_transmission }}</p>
                    <small>Trans</small>
                </div>
                <!-- Engine Capacity -->
                <div class="col-md-2 col-sm-6 col-lg-2 specification">
                    <i class="fa fa-car" aria-hidden="true"></i>
                    <p class="mb-0">{{ $detail->listing_engine_capacity }}</p>
                    <small>Engine</small>
                </div>
            </div>
            <div class="row my-4">
                <table class="table-bordered w-100 text-left specification">
                    {{-- <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Price</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_price}}</small></td>
                    </tr> --}}
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Ref. No.</small></td>
                        <td class="text-left pl-2">
                            <small>-
                                {{-- {{$detail->listing_type}}--}}
                            </small>
                        </td>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Type</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_type}}</small></td>
                    </tr>

                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Chassis No.</small></td>
                        <td class="text-left pl-2">
                            <small>-
                                {{-- {{$detail->listing_type}}--}}
                            </small>
                        </td>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Extreior Color</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_exterior_color}}</small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Model Code</small></td>
                        <td class="text-left pl-2">
                            <small>-
                                {{-- {{$detail->listing_type}}--}}
                            </small>
                        </td>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Interior Color</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_interior_color}}</small></td>
                        {{-- <td style="background: #EBF3FF;" class="text-left pl-2"><small>Interior Color</small></td>
                        --}}
                        {{-- <td class="text-left pl-2"><small>{{$detail->listing_interior_color}}</small></td>--}}
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Engine Size</small></td>
                        <td class="text-left pl-2">
                            <small>-
                                {{-- {{$detail->listing_type}}--}}
                            </small>
                        </td>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Cylinder</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_cylinder}}</small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Location</small></td>
                        <td class="text-left pl-2"><small>{{$listing_locations_car->listing_location_name}}</small>
                        </td>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Steering</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_steering}}</small></td>
                    </tr>
                    {{-- <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Engine Capcity</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_engine_capacity}}</small></td>
                    </tr> --}}

                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Version/Class</small></td>
                        <td class="text-left pl-2">
                            <small>-
                                {{-- {{$detail->listing_type}}--}}
                            </small>
                        </td>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Fuel Type</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_fuel_type}}</small></td>
                    </tr>
                    {{-- <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Vin</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_vin}}</small></td>
                    </tr> --}}
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Derive</small></td>
                        <td class="text-left pl-2">
                            <small>-
                                {{-- {{$detail->listing_type}}--}}
                            </small>
                        </td>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Price</small></td>
                        <td class="text-left pl-2"><small>
                                @if(!session()->get('currency_symbol'))
                                ${{ round($detail->listing_price,2) }}
                                @else
                                {{ session()->get('currency_symbol') }}{{
                                round($detail->listing_price*session()->get('currency_value'),2) }}
                                @endif
                            </small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Transmission</small></td>
                        <td class="text-left pl-2">
                            <small>-
                                {{-- {{$detail->listing_type}}--}}
                            </small>
                        </td>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Body</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_body}}</small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF; color:orangered" class="text-left pl-2">
                            <small>Registration<br>Year/Month</small>
                        </td>
                        <td class="text-left pl-2">
                            <small>-
                                {{-- {{$detail->listing_type}}--}}
                            </small>
                        </td>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Seat</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_seat}}</small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF; color:green;" class="text-left pl-2">
                            <small>Manufacture<br>year/Month</small>
                        </td>
                        <td class="text-left pl-2"><small>{{$detail->listing_wheel}}</small></td>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Wheel</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_wheel}}</small></td>
                    </tr>
                    {{-- <tr>--}}
                        {{-- <td style="background: #EBF3FF;" class="text-left pl-2"><small>Doors</small></td>--}}
                        {{-- <td class="text-left pl-2"><small>{{$detail->listing_door}}</small></td>--}}
                        {{-- <td style="background: #EBF3FF;" class="text-left pl-2"><small>Doors</small></td>--}}
                        {{-- <td class="text-left pl-2"><small>{{$detail->listing_door}}</small></td>--}}
                        {{-- </tr>--}}
                    {{-- <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Model Year</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_model_year}}</small></td>
                    </tr> --}}


                </table>
            </div>
            {{-- <div class="row my-3">--}}
                {{-- <div class=" mb-3 w-100">--}}
                    {{-- <h3>Features</h3>--}}
                    {{-- </div>--}}
                {{-- <div class=" d-flex flex-wrap">--}}
                    {{-- @foreach($listing_amenities as $row)--}}
                    {{-- @php--}}
                    {{-- $res = DB::table('amenities')->where('id',$row->amenity_id)->first();--}}
                    {{-- @endphp--}}
                    {{-- <div class="w-auto py-2 px-2 border mx-1 my-1" style="background:#F7FFF0">--}}
                        {{-- <small>{{$res->amenity_name}}</small></div>--}}
                    {{-- @endforeach--}}

                    {{-- </div>--}}
                {{--<img src="{{asset('uploads/site_photos/0ea83f18e14ebe3951eeb034aed66a4b.png')}}"
                    style="opacity: 0.5" class="mt-4 hide" width="100" alt="">--}}

                {{-- </div>--}}
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 col-12  print_rit_50">
            <div class="row p-3 border-md-bottom border-lg-bottom ">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <h3 class="font-weight-bold">Stock-id:{{$detail->listing_stock_id}}</h3>
                <button class="btn btn-primary float-right" id="addToFavoritesBtn" data-listing-id="{{ $detail->id }}"
                    onclick="addToFavorites()">❤️ Add to Favorites
                </button>
                <h5 class="py-2 w-100">
                    {{$detail->listing_name}}</h5>
{{--                <a style="border: none;--}}
{{--                background: transparent;--}}
{{--                cursor: pointer;" onclick="handleClick()">--}}
{{--                    <span class="text-right" style="font-size:26px;color: #003580;">--}}
{{--                        <i class="fas fa-print"></i> Print--}}
{{--                    </span>--}}
{{--                </a>--}}
            </div>
            <!-- <div class="row my-3">
        <div class="col-md-6 col-sm-12 col-lg-6">
            {{-- <h5> Stock ID:5057</h5> --}}
            {{-- <p  class="orange">Auction Grade: 4</p> --}}
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="text-right orange">
                        <h5>
                            <i class="far fa-heart"></i> Add to Favorites
                        </h5>
                    </div>
                </div>
            </div> -->
            <div class="container-fluid border rounded " style="background-color: #F6F6F6;">
                <form id="quote-form" action="{{ route('get_qoute') }}" method="POST">
                    @csrf
                    <div class="row border-bottom p-3">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-5 px-0">
                                    <span class="position-relative">
                                        <div class="float-left">FOB Price:</div>
                                    </span>
                                </div>
                                <div class="col-5 px-0">
                                    @auth
                                    <h5 class="orange text-right">${{$detail->listing_price}}</h5>
                                    <input type="hidden" name="car_id" value="{{ $detail->id }}">
                                    <input type="hidden" id="car_listing_price" value="{{ $detail->listing_price }}">
                                    @endauth
                                </div>
                                <div class="col-5 pt-3 px-0">
                                    Total Price:
                                </div>
                                <div class="col-5 pt-3 px-0 text-right">
                                    23$
                                </div>
                                <div class="col-12 mt-lg-5 mt-3 border">
                                    <div class="row">
                                        <div class="col-12 text-performa py-2">
                                            HOW TO GET A PERFORMA INVOICE
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-xs pl-4 text-wrap py-2 text-black">
                                                <b>To get Performa Invoice, please do the followings</b>
                                            </div>
                                            <div class="col text-xs">
                                                <ol class="pl-3">
                                                    <li>
                                                        Fill out the required fields and click the inquiry button.
                                                    </li>
                                                    <li class="py-2">
                                                        You will receive a quotation grom BR FORWARD via email.
                                                    </li>
                                                    <li class="pb-2">
                                                        Reply to the emailif you accept the quotation.
                                                    </li>
                                                    <li>
                                                        You will aissue a <b>Performa Invoice</b> once yo completed the
                                                        steps above.
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-12 text-center inquiry-header pt-sm-0 pt-2">
                                    Guest Inquiry
                                </div>
                                <div class="col-12 text-sm pt-2 pr-0 pl-2">
                                    Please fill the <span class="text-danger">*</span>required fields
                                </div>
                                <div class="col-sm-6 px-1 pl-2 mt-2">
                                    <label for="" class="form-label">Your Name <span
                                            class="text-danger">*</span></label>
                                    <Input class="form-fields" placeholder="Name" />
                                </div>
                                <div class="col-sm-6 px-1 pl-2 mt-2">
                                    <label for="" class="form-label">Email <span class="text-danger">*</span></label>
                                    <Input class="form-fields" placeholder="Email" />
                                </div>
                                <div class="col-sm-6 px-1 pl-2 my-2">
                                    <label for="" class="form-label">Tel <span class="text-danger">*</span></label>
                                    <Input class="form-fields" placeholder="Email" />
                                </div>
                                <div class="col-sm-6 px-1 pl-2 d-flex flex-column my-2">
                                    <label for="" class="form-label">Country <span class="text-danger">*</span></label>
                                    <select name="" id="" class="form-fields mt-2 py-1 form-label">
                                        <option value="">option1</option>
                                        <option value="">option2</option>
                                        <option value="">option3</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 px-1 pl-2">
                                    <label for="" class="form-label">City <span class="text-danger">*</span></label>
                                    <Input class="form-fields" placeholder="City" />
                                </div>
                                <div class="col-sm-6 px-1 pl-2 mt-sm-0 mt-2">
                                    <label for="" class="form-label">Address <span class="text-danger">*</span></label>
                                    <Input class="form-fields" placeholder="Address" />
                                </div>
                                <div class="col-12 px-1 pl-2 mt-2">
                                    <button class="form-btn py-2 rounded mt-3 d-flex align-items-center justify-content-center">
                                        <i class="fa-regular fa-envelope pr-1" style="font-size: 0.9rem"></i>
                                        GET A PRICE QUOTE NOW
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (Auth::check())
                    <div class="row border-bottom p-3">
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <label class="form-check-label" for="freight">
                                Freight to
                            </label>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <h6 class="orange text-right">
                                <select id="freight" class="form-control" name="freight" onchange="calculateTotal()">
                                    <option value="0" disabled selected>Select</option>
                                    @if(sizeof($freights))
                                    @foreach($freights as $freightOption)
                                    <option value="{{$freightOption->id}}" data-price="{{$freightOption->price}}">
                                        {{$freightOption->destination}}
                                        ({{$freightOption->price}})
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                            </h6>
                        </div>
                    </div>
                    <div class="row border-bottom p-3">
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <label class="form-check-label" for="insurance">
                                Select Insurance Type
                            </label>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <h6 class="orange text-right">
                                <select name="insurance" id="insurance" class="form-control"
                                    onchange="calculateTotal()">
                                    <option disabled selected>Select</option>
                                    @if(sizeof($insurances))
                                    @foreach($insurances as $insurance)
                                    <option value="{{$insurance->id}}" data-price="{{$insurance->price}}">
                                        {{$insurance->insurance_type}}
                                        ({{$insurance->price}})
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                            </h6>
                        </div>
                    </div>
                    <div class="row border-bottom p-3">
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <label class="form-check-label" for="flexCheckDefault2">
                                Inspection Certificate
                            </label>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <h6 class="orange text-right">
                                <select name="inspection_certificate" id="inspection_certificate" class="form-control"
                                    onchange="calculateTotal()">
                                    <option disabled selected>Select</option>
                                    @if(sizeof($inspection_certificates))
                                    @foreach($inspection_certificates as $inspection_certificate)
                                    <option value="{{$inspection_certificate->id}}"
                                        data-price="{{$inspection_certificate->price}}">
                                        {{$inspection_certificate->inspection_type}}
                                        ({{$inspection_certificate->price}})
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                            </h6>
                        </div>
                    </div>
                    <div class="row border-bottom p-3">
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <label class="form-check-label" for="flexCheckDefault1">
                                Your Offer<span class="text-danger">*</span>
                            </label>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <h6 class="orange text-right">
                                <input type="text" name="offer" class="form-control" required
                                    placeholder="Enter Your Offer">
                            </h6>
                        </div>
                    </div>
                    @if(Auth::check())
                    <input type="text" hidden name="name" class="form-control" value="{{ $userdata->name }}"
                        placeholder="Enter Your Full Name" required>
                    <input type="email" hidden name="email" class="form-control" placeholder="Enter Your Email"
                        value="{{$userdata->email}}">
                    <input type="number" hidden name="phone_no" class="form-control"
                        placeholder="Enter Your Phone Number" value="{{$userdata->phone}}">
                    @endif
                    <div class="row border-bottom p-3 bg-white">
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <span>
                                <h4 class="float-left mr-3 font-weight-bold">Total Price</h4>
                            </span>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <h6 class="orange text-right" id="total_price_text">${{$detail->listing_price}}</h6>
                            <input type="text" name="total_price" hidden id="total_price">
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary w-100 text-center border-0 font-weight-bold my-3 py-2"
                                style="background-color:#ff5500;">Submit
                            </button>
                        </div>
                        @else
                        <a class="btn btn-primary w-100 my-3 mob-spacing" href="{{route('customer_login')}}">Login</a>
                        @endif
                    </div>
                </form>
                {{-- second form --}}
                <div class="row mt-3 mx-0 bg-light rounded px-3 py-3">
                    <div class="col-4 text-sm pt-2 px-0">
                        <b>FINAL COUNTRY</b>
                    </div>
                    <div class="col-8 px-0">
                        <select name="" id="" class="post-select text-sm py-2">
                            <option value="">Pakistan</option>
                        </select>
                    </div>
                    <div class="col-12 px-0">
                        <div class="row d-flex align-items-center mt-3">
                            <div class="col-4">
                                PORT/CITY
                            </div>
                            <div class="col-4 d-flex flex-column">
                                <b>Karachi</b>
                                <span class="text-sm">pick up the port (RORO)</span>
                            </div>
                            <div class="col-4">
                                <button class="text-sm py-1 border-0 rounded bg-info px-3 text-white">CLOSE</button>
                            </div>
                        </div>
                    </div>
                    <div class="row w-100 mx-0 mt-3">
                        <div class="col-12 text-sm px-0">
                            <span class="">
                                from <b>KARACHI</b> port to
                            </span>
                        </div>
                        <div class="col-12 port-data py-2 mt-2">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-4">
                                    <span class="d-flex align-items-center">
                                        <input type="radio">
                                        <b class="text-sm pl-2">KARACHI</b>
                                    </span>
                                </div>
                                <div class="col-4 text-md">
                                    <span class="text-md text-primary">pick up at port</span>
                                </div>
                                <div class="col-4">
                                    <span class="text-danger fw-bold">$369</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-0">
                            <div class="row">
                                <div class="col-12 text-md pt-3">
                                    <b>Additional Options</b>
                                </div>
                                <div class="col-12 d-flex align-items-center">
                                    <input type="checkbox">
                                    <label for="" class="text-md pt-2 px-2">
                                        <b>Marine Insurance</b>
                                        <i class="fa-solid fa-question bg-info text-white text-sm p-1 pt-0"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-0 text-md" style="border-top :1px solid gray">
                            <div class="row pt-2" >
                                <div class="col-6 fw-bold">
                                    Total Price
                                </div>
                                <div class="col-6 text-right">
                                    <span class="fw-bold text-secondary">CIF</span>
                                    <span class="fw-bold text-danger">$3,8</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="container-fluid border my-4 print_hide "--}}
{{--                    style="border-color:#5A922C!important;background-color: #F7FFF0;">--}}
{{--                    <!--<form >-->--}}
{{--                    @csrf--}}
{{--                    <div class="row border-bottom p-3 " style="background-color: #5A922C;">--}}
{{--                        <div class="col-md-12 col-sm-12 col-lg-6">--}}
{{--                            <span>--}}
{{--                                <h6 class="float-left text-light">Inquiry Form</h6>--}}
{{--                            </span>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div class="row border-bottom p-3">--}}

{{--                        @csrf--}}
{{--                        <div class="col-md-12 col-sm-12 col-lg-12">--}}
{{--                            <span>--}}
{{--                                <h6 class="float-left mr-3 mt-2" style="font-weight:600;">Want To Talk With Us</h6>--}}
{{--                            </span>--}}

{{--                            <span class="float-left w-100 text-left">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" name="option_1" type="checkbox"--}}
{{--                                        value="I want to negotiate the best price." id="flexCheckDefault">--}}
{{--                                    <label class="form-check-label" for="flexCheckDefault">--}}
{{--                                        <small>I want to negotiate the best price.</small>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" name="option_2" type="checkbox"--}}
{{--                                        value="I want to know the shipping schedule." id="flexCheckDefault">--}}
{{--                                    <label class="form-check-label" for="flexCheckDefault">--}}
{{--                                        <small>I want to know the shipping schedule.</small>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" name="option_3" type="checkbox"--}}
{{--                                        value="I want to know about the condition of the car." id="flexCheckDefault">--}}
{{--                                    <label class="form-check-label" for="flexCheckDefault">--}}
{{--                                        <small>I want to know about the condition of the car.</small>--}}
{{--                                    </label>--}}
{{--                                </div>--}}


{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div class="row border-bottom p-3">--}}
{{--                        <div class="col-md-12 col-sm-12 col-lg-12">--}}
{{--                            <span><textarea class="w-100 p-2 form-textarea" name="" id="" cols="30" rows="3"--}}
{{--                                    placeholder="Type your message here.." name="message"></textarea>--}}
{{--                                <p>Please note that it is the buyer's responsibility to confirm that the vehicle--}}
{{--                                    satisfies all--}}
{{--                                    import regulations at you destination.</p>--}}
{{--                            </span>--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                    <div class="row  p-3 ">--}}
{{--                        <div class="col-md-6 col-sm-12 col-lg-6  py-sm-2">--}}
{{--                            <span>--}}
{{--                                <input type="text" name="first_name" class="form-control py-sm-2 mob-spacing"--}}
{{--                                    placeholder="First Name">--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 col-sm-12 col-lg-6  py-sm-2 mob-spacing">--}}
{{--                            <input type="text" name="last_name" class="form-control" placeholder="Last Name">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 col-sm-12 col-lg-6  py-sm-2 mob-spacing">--}}
{{--                            <span>--}}
{{--                                <input type="number" name="phone_no" class="form-control" placeholder="Phone number">--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 col-sm-12 col-lg-6  py-sm-2 mob-spacing">--}}
{{--                            <input type="email" name="email" class="form-control" placeholder="Email Address">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-12">--}}
{{--                            <button type="submit" onclick="reloadPage()"--}}
{{--                                class="btn btn-primary w-100 text-center border-0 font-weight-bold my-3 py-2"--}}
{{--                                style="background-color:#ff5500;">Send--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
                <h2> {{ FEATURES }}</h2>
                <div class="features-grid">
                    @foreach($listing_amenities as $row)
                    @php
                    $res = DB::table('amenities')->where('id', $row->amenity_id)->first();
                    $highlight = in_array($res->amenity_name, ['Alloy Wheels', 'Power Steering','Power
                    Window','A/C','ABS','Airbag','Radio','Jack','Back Camera', 'Keyless Entry', 'Navigation','Fog
                    Lights','Tv','DVD']); // Define your highlighted features
                    @endphp
                    <div class="feature-box {{ $highlight ? 'highlight' : '' }}">
                        {{ $res->amenity_name }}
                    </div>
                    @endforeach
                </div>

            </div>

            <!--</form>-->
        </div>
    </div>
</div>


<script>
    function reloadPage() {
            location.reload(); // Use location.reload() to refresh the page
        }

        function handleClick() {
            window.print();
        }
</script>





{{-- <div class="listing-single-banner"
    style="background-image: url('{{ asset('uploads/listing_featured_photos/'.$detail->listing_featured_photo)  }}');">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $detail->listing_name }}</h1>
                <div class="price">
                    @if(!session()->get('currency_symbol'))
                    ${{ number_format($detail->listing_price) }}
                    @else
                    {{ session()->get('currency_symbol') }}{{
                    number_format($detail->listing_price*session()->get('currency_value')) }}
                    @endif
                </div>
                <div class="location">
                    <i class="fas fa-map-marker-alt"></i> {{ $detail->rListingLocation->listing_location_name }}
                </div>
                <div class="review">
                    @if($overall_rating == 5)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    @elseif($overall_rating == 4.5)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    @elseif($overall_rating == 4)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    @elseif($overall_rating == 3.5)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>
                    @elseif($overall_rating == 3)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    @elseif($overall_rating == 2.5)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    @elseif($overall_rating == 2)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    @elseif($overall_rating == 1.5)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    @elseif($overall_rating == 1)
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    @elseif($overall_rating == 0)
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    @endif
                    <span>({{ count($reviews) }} {{ REVIEWS }})</span>
                </div>
                <div class="call">
                    <i class="fas fa-phone-volume"></i> {{ $detail->listing_phone }}
                </div>
                <div class="listing-items">
                    <a href="{{ route('front_listing_brand_detail',$detail->rListingBrand->listing_brand_slug) }}">
                        <i class="far fa-edit"></i> {{ $detail->rListingBrand->listing_brand_name }}
                    </a>
                    <a href="{{ route('front_add_wishlist',$detail->id) }}">
                        <i class="fas fa-heart"></i> {{ ADD_TO_WISHLIST }}
                    </a>
                    <a href="" data-toggle="modal" data-target="#send_message_modal">
                        <i class="far fa-envelope"></i> {{ SEND_MESSAGE }}
                    </a>

                    <!-- Send Message Modal -->
                    <div class="modal fade modal_listing_detail" id="send_message_modal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ SEND_MESSAGE }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('front_listing_detail_send_message') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="listing_name" value="{{ $detail->listing_name }}">
                                        <input type="hidden" name="listing_slug" value="{{ $detail->listing_slug }}">
                                        <input type="hidden" name="agent_name" value="{{ $agent_detail->name }}">
                                        <input type="hidden" name="agent_email" value="{{ $agent_detail->email }}">
                                        <div class="form-group">
                                            <label for="">{{ NAME }}</label>
                                            <div>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ EMAIL }}</label>
                                            <div>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ PHONE }}</label>
                                            <div>
                                                <input type="text" name="phone" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ MESSAGE }}</label>
                                            <div>
                                                <textarea name="message" class="form-control h-100" cols="30" rows="10"
                                                    required></textarea>
                                            </div>
                                        </div>
                                        @if($g_setting->google_recaptcha_status == 'Show')
                                        <div class="form-group">
                                            <div class="g-recaptcha"
                                                data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-success">{{ SEND_MESSAGE
                                                    }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // Send Message Modal -->


                    <a href="" data-toggle="modal" data-target="#report_modal">
                        <i class="far fa-flag"></i> {{ REPORT }}
                    </a>


                    <!-- Report Modal -->
                    <div class="modal fade modal_listing_detail" id="report_modal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ SUBMIT_REPORT }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('front_listing_detail_report_listing') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="listing_name" value="{{ $detail->listing_name }}">
                                        <input type="hidden" name="listing_slug" value="{{ $detail->listing_slug }}">
                                        <div class="form-group">
                                            <label for="">{{ NAME }}</label>
                                            <div>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ EMAIL }}</label>
                                            <div>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ PHONE }}</label>
                                            <div>
                                                <input type="text" name="phone" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ MESSAGE }}</label>
                                            <div>
                                                <textarea name="message" class="form-control h-100" cols="30" rows="10"
                                                    required></textarea>
                                            </div>
                                        </div>
                                        @if($g_setting->google_recaptcha_status == 'Show')
                                        <div class="form-group">
                                            <div class="g-recaptcha"
                                                data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-success">{{ SUBMIT_REPORT
                                                    }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // Report Modal -->


                </div>

                @if(!$listing_social_items->isEmpty())
                <div class="social">
                    <ul>
                        @foreach($listing_social_items as $row)
                        @if($row->social_icon == 'Facebook')
                        @php $icon_code = 'fab fa-facebook-f'; @endphp

                        @elseif($row->social_icon == 'Twitter')
                        @php $icon_code = 'fab fa-twitter'; @endphp

                        @elseif($row->social_icon == 'LinkedIn')
                        @php $icon_code = 'fab fa-linkedin-in'; @endphp

                        @elseif($row->social_icon == 'YouTube')
                        @php $icon_code = 'fab fa-youtube'; @endphp

                        @elseif($row->social_icon == 'Pinterest')
                        @php $icon_code = 'fab fa-pinterest-p'; @endphp

                        @elseif($row->social_icon == 'GooglePlus')
                        @php $icon_code = 'fab fa-google-plus-g'; @endphp

                        @elseif($row->social_icon == 'Instagram')
                        @php $icon_code = 'fab fa-instagram'; @endphp

                        @endif
                        <li>
                            <a href="{{ $row->social_url }}"><i class="{{ $icon_code }}"></i></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="listing-page">
                    <h2><i class="fas fa-folder"></i> {{ DESCRIPTION }}</h2>
                    <p>
                        {!! clean($detail->listing_description) !!}
                    </p>

                    @if(!$listing_photos->isEmpty())
                    <div class="gap"></div>
                    <h2><i class="fas fa-image"></i> {{ PHOTOS }}</h2>
                    <div class="photo-all">
                        <div class="row">
                            @foreach($listing_photos as $row)
                            <div class="col-md-6 col-lg-4">
                                <div class="item">
                                    <a href="{{ asset('uploads/listing_photos/'.$row->photo) }}" class="magnific">
                                        <img src="{{ asset('uploads/listing_photos/'.$row->photo) }}" alt="">
                                        <div class="icon">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                        <div class="bg"></div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif


                    @if(!$listing_videos->isEmpty())
                    <div class="gap"></div>
                    <h2><i class="fas fa-video"></i> {{ VIDEOS }}</h2>
                    <div class="video-all">
                        <div class="row">
                            @foreach($listing_videos as $row)
                            <div class="col-md-6 col-lg-4">
                                <div class="item">
                                    <a class="video-button"
                                        href="http://www.youtube.com/watch?v={{ $row->youtube_video_id }}">
                                        <img src="http://img.youtube.com/vi/{{ $row->youtube_video_id }}/0.jpg" alt="">
                                        <div class="icon">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="bg"></div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif


                    @if($detail->listing_map!='')
                    <div class="gap"></div>
                    <h2><i class="fas fa-map"></i> {{ LOCATION_MAP }}</h2>
                    <div class="map">
                        {!! $detail->listing_map !!}
                    </div>
                    @endif


                    <div class="gap"></div>
                    <h2><i class="fas fa-atom"></i> {{ FEATURES }}</h2>
                    <div class="contact">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="w-300">{{ PRICE }}</td>
                                    <td>
                                        @if(!session()->get('currency_symbol'))
                                        ${{ number_format($detail->listing_price) }}
                                        @else
                                        {{ session()->get('currency_symbol') }}{{
                                        number_format($detail->listing_price*session()->get('currency_value')) }}
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>{{ TYPE }}</td>
                                    <td>
                                        {{ $detail->listing_type }}
                                    </td>
                                </tr>

                                @if($detail->listing_exterior_color != '')
                                <tr>
                                    <td>{{ EXTERIOR_COLOR }}</td>
                                    <td>
                                        {{ $detail->listing_exterior_color }}
                                    </td>
                                </tr>
                                @endif

                                @if($detail->listing_interior_color != '')
                                <tr>
                                    <td>{{ INTERIOR_COLOR }}</td>
                                    <td>
                                        {{ $detail->listing_interior_color }}
                                    </td>
                                </tr>
                                @endif

                                @if($detail->listing_cylinder != '')
                                <tr>
                                    <td>{{ CYLINDER }}</td>
                                    <td>
                                        {{ $detail->listing_cylinder }}
                                    </td>
                                </tr>
                                @endif

                                @if($detail->listing_fuel_type != '')
                                <tr>
                                    <td>{{ FUEL_TYPE }}</td>
                                    <td>
                                        {{ $detail->listing_fuel_type }}
                                    </td>
                                </tr>
                                @endif

                                @if($detail->listing_transmission != '')
                                <tr>
                                    <td>{{ TRANSMISSION }}</td>
                                    <td>
                                        {{ $detail->listing_transmission }}
                                    </td>
                                </tr>
                                @endif

                                @if($detail->listing_engine_capacity != '')
                                <tr>
                                    <td>{{ ENGINE_CAPACITY }}</td>
                                    <td>
                                        {{ $detail->listing_engine_capacity }}
                                    </td>
                                </tr>
                                @endif

                                @if($detail->listing_vin != '')
                                <tr>
                                    <td>{{ VIN }}</td>
                                    <td>
                                        {{ $detail->listing_vin }}
                                    </td>
                                </tr>
                                @endif

                                @if($detail->listing_body != '')
                                <tr>
                                    <td>{{ BODY }}</td>
                                    <td>
                                        {{ $detail->listing_body }}
                                    </td>
                                </tr>
                                @endif

                                @if($detail->listing_seat != '')
                                <tr>
                                    <td>{{ SEAT }}</td>
                                    <td>
                                        {{ $detail->listing_seat }}
                                    </td>
                                </tr>
                                @endif

                                @if($detail->listing_wheel != '')
                                <tr>
                                    <td>{{ WHEEL }}</td>
                                    <td>
                                        {{ $detail->listing_wheel }}
                                    </td>
                                </tr>
                                @endif

                                @if($detail->listing_door != '')
                                <tr>
                                    <td>{{ DOOR }}</td>
                                    <td>
                                        {{ $detail->listing_door }}
                                    </td>
                                </tr>
                                @endif

                                @if($detail->listing_mileage != '')
                                <tr>
                                    <td>{{ MILEAGE }}</td>
                                    <td>
                                        {{ $detail->listing_mileage }}
                                    </td>
                                </tr>
                                @endif

                                @if($detail->listing_model_year != '')
                                <tr>
                                    <td>{{ MODEL_YEAR }}</td>
                                    <td>
                                        {{ $detail->listing_model_year }}
                                    </td>
                                </tr>
                                @endif

                            </table>
                        </div>
                    </div>


                    @if(!$listing_amenities->isEmpty())
                    <div class="gap"></div>
                    <h2><i class="fas fa-bullhorn"></i> {{ AMENITIES }}</h2>
                    <div class="amenities">
                        <ul>
                            @foreach($listing_amenities as $row)
                            @php
                            $res = DB::table('amenities')->where('id',$row->amenity_id)->first();
                            @endphp
                            <li><i class="fas fa-check-square"></i> {{ $res->amenity_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif


                    @if(!$listing_additional_features->isEmpty())
                    <div class="gap"></div>
                    <h2><i class="far fa-id-card"></i> {{ ADDITIONAL_FEATURES }}</h2>
                    <div class="contact">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                @foreach($listing_additional_features as $row)
                                <tr>
                                    <td class="w-300">{{ $row->additional_feature_name }}</td>
                                    <td>{{ $row->additional_feature_value }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    @endif


                    <div class="gap"></div>
                    <h2><i class="far fa-id-card"></i> {{ CONTACT_INFORMATION }}</h2>
                    <div class="contact">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                @if($detail->listing_address!='')
                                <tr>
                                    <td class="w-200">{{ ADDRESS }}</td>
                                    <td>
                                        {!! clean(nl2br($detail->listing_address)) !!}
                                    </td>
                                </tr>
                                @endif

                                <tr>
                                    <td>{{ PHONE_NUMBER }}</td>
                                    <td>
                                        {!! clean(nl2br($detail->listing_phone)) !!}
                                    </td>
                                </tr>

                                @if($detail->listing_email!='')
                                <tr>
                                    <td>{{ EMAIL_ADDRESS }}</td>
                                    <td>
                                        {!! clean(nl2br($detail->listing_email)) !!}
                                    </td>
                                </tr>
                                @endif

                                @if($detail->listing_website!='')
                                <tr>
                                    <td>{{ WEBSITE }}</td>
                                    <td class="website">
                                        <a href="{{ $detail->listing_website }}" target="_blank">{{
                                            $detail->listing_website }}</a>
                                    </td>
                                </tr>
                                @endif

                            </table>
                        </div>
                    </div>

                    <div class="gap"></div>
                    <h2>{{ REVIEWS }} ({{ count($reviews) }})</h2>

                    <div class="review-overall">
                        <div class="review">
                            @if($overall_rating == 5)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            @elseif($overall_rating == 4.5)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            @elseif($overall_rating == 4)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            @elseif($overall_rating == 3.5)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            @elseif($overall_rating == 3)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            @elseif($overall_rating == 2.5)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            @elseif($overall_rating == 2)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            @elseif($overall_rating == 1.5)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            @elseif($overall_rating == 1)
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            @elseif($overall_rating == 0)
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            @endif
                        </div>
                        <div class="total">
                            @if(count($reviews) != 0)
                            ({{ OVERALL }} {{ $overall_rating }} {{ OUT_OF_5 }})
                            @else
                            ({{ OVERALL }} 0 {{ OUT_OF_5 }})
                            @endif
                        </div>
                    </div>


                    <div class="reviews">

                        @if($reviews->isEmpty())
                        <span class="text-danger">{{ NO_REVIEW_FOUND }}</span>
                        @else
                        @foreach($reviews as $item)
                        @if($item->agent_type=="Customer")
                        @php
                        $u_detail = DB::table('users')->where('id',$item->agent_id)->first();
                        @endphp
                        @else
                        @php
                        $u_detail = DB::table('admins')->where('id',$item->agent_id)->first();
                        @endphp
                        @endif
                        <div class="row item">
                            <div class="col-md-12 col-lg-2">
                                <div class="photo">
                                    @if($u_detail->photo == '')
                                    <img src="{{ asset('uploads/user_photos/default_photo.jpg') }}" alt="">
                                    @else
                                    <img src="{{ asset('uploads/user_photos/'.$u_detail->photo) }}" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-10">
                                <div class="name">
                                    {{ $u_detail->name }}
                                </div>
                                <div class="date-time">
                                    {{ \Carbon\Carbon::parse($u_detail->created_at)->format('d M, Y') }}
                                </div>

                                <div class="score">
                                    @if($item->rating == 5)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    @elseif($item->rating == 4.5)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    @elseif($item->rating == 4)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @elseif($item->rating == 3.5)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    @elseif($item->rating == 3)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @elseif($item->rating == 2.5)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @elseif($item->rating == 2)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @elseif($item->rating == 1.5)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @elseif($item->rating == 1)
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @endif
                                </div>
                                <div class="comment">
                                    <p>
                                        {!! clean($item->review) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @endif

                    </div>


                    <div class="gap"></div>
                    <h2>{{ WRITE_A_REVIEW }}</h2>
                    <div class="review-form">

                        @if($current_auth_user_id == 0)

                        <a href="{{ route('customer_login') }}" class="login-to-review">{{ LOGIN_TO_REVIEW }}</a>
                        @elseif($current_auth_user_id == $agent_detail->id)
                        <div class="text-danger">{{ OWN_PRODUCT_REVIEW_STOP }}</div>

                        @elseif($already_given == 1)
                        <div class="text-danger">{{ ALREADY_GIVEN_REVIEW_STOP }}</div>
                        @else
                        <form action="{{ route('customer_review') }}" method="post">
                            @csrf
                            <input type="hidden" name="listing_id" value="{{ $detail->id }}">
                            <div class="form-group">
                                <label for="">{{ YOUR_RATING }}</label>
                                <select name="rating" class="form-control">
                                    <option value="1">{{ STAR_1 }}</option>
                                    <option value="2">{{ STAR_2 }}</option>
                                    <option value="3">{{ STAR_3 }}</option>
                                    <option value="4">{{ STAR_4 }}</option>
                                    <option value="5">{{ STAR_5 }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">{{ YOUR_REVIEW }}</label>
                                <textarea name="review" class="form-control h-100" cols="30" rows="10"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ SUBMIT }}</button>
                        </form>
                        @endif


                    </div>


                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="listing-sidebar" id="sticky_sidebar">

                    <div class="ls-widget">
                        <h2>{{ AGENT }}</h2>
                        <div class="agent">
                            <div class="photo">
                                @if($agent_detail->photo == '')
                                <img src="{{ asset('uploads/user_photos/default_photo.jpg') }}" alt="">
                                @else
                                <img src="{{ asset('uploads/user_photos/'.$agent_detail->photo) }}" alt="">
                                @endif

                            </div>
                            <div class="text">
                                @if($detail->user_id == 0)
                                @php $type = "admin"; @endphp
                                @else
                                @php $type = "user"; @endphp
                                @endif
                                <h3><a href="{{ route('front_listing_agent_detail',[$type,$agent_detail->id]) }}">{{
                                        $agent_detail->name }}</a>
                                </h3>
                                <h4>{{ POSTED_ON }} {{ \Carbon\Carbon::parse($detail->created_at)->format('d M, Y') }}
                                </h4>
                            </div>
                        </div>
                        <div class="agent-contact">
                            <ul>
                                @if($agent_detail->address!='' || $agent_detail->city!='' || $agent_detail->state!='' ||
                                $agent_detail->country!='')
                                <li>
                                    <i class="fas fa-map-marker-alt"></i> {{ $agent_detail->address }}
                                    {{ $agent_detail->city }} {{ $agent_detail->country }}
                                </li>
                                @endif
                                @if($agent_detail->phone!='')
                                <li><i class="fas fa-phone-volume"></i> {{ $agent_detail->phone }}</li>
                                @endif
                                @if($agent_detail->email!='')
                                <li><i class="fas fa-envelope"></i> {{ $agent_detail->email }}</li>
                                @endif
                                @if($agent_detail->website!='')
                                <li><a href="{{ $agent_detail->website }}" target="_blank"><i class="fas fa-globe"></i>
                                        {{ $agent_detail->website }}</a></li>
                                @endif
                            </ul>
                        </div>


                        @if( ($agent_detail->facebook != '') ||
                        ($agent_detail->twitter != '') ||
                        ($agent_detail->linkedin != '') ||
                        ($agent_detail->pinterest != '') ||
                        ($agent_detail->youtube != '') )
                        <div class="agent-social">
                            <ul>
                                @if($agent_detail->facebook != '')
                                <li><a href="{{ $agent_detail->facebook }}" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                @endif

                                @if($agent_detail->twitter != '')
                                <li><a href="{{ $agent_detail->twitter }}" target="_blank"><i
                                            class="fab fa-twitter"></i></a></li>
                                @endif

                                @if($agent_detail->linkedin != '')
                                <li><a href="{{ $agent_detail->linkedin }}" target="_blank"><i
                                            class="fab fa-linkedin-in"></i></a></li>
                                @endif

                                @if($agent_detail->pinterest != '')
                                <li><a href="{{ $agent_detail->pinterest }}" target="_blank"><i
                                            class="fab fa-pinterest-p"></i></a></li>
                                @endif

                                @if($agent_detail->youtube != '')
                                <li><a href="{{ $agent_detail->youtube }}" target="_blank"><i
                                            class="fab fa-youtube"></i></a></li>
                                @endif
                            </ul>
                        </div>
                        @endif

                        <a href="{{ route('front_listing_agent_detail',[$type,$agent_detail->id]) }}"
                            class="btn btn-primary btn-block agent-view-profile">{{ VIEW_PROFILE }}</a>
                    </div>

                    @if($detail->listing_oh_monday != '' || $detail->listing_oh_tuesday != '' ||
                    $detail->listing_oh_wednesday != '' || $detail->listing_oh_thursday != '' ||
                    $detail->listing_oh_friday != '' || $detail->listing_oh_saturday != '' || $detail->listing_oh_sunday
                    != '')
                    <div class="ls-widget">
                        <h2>{{ OPENING_HOUR }}</h2>
                        <div class="openning-hour">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>{{ MONDAY }}</td>
                                        <td>{{ $detail->listing_oh_monday }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ TUESDAY }}</td>
                                        <td>{{ $detail->listing_oh_tuesday }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ WEDNESDAY }}</td>
                                        <td>{{ $detail->listing_oh_wednesday }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ THURSDAY }}</td>
                                        <td>{{ $detail->listing_oh_thursday }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ FRIDAY }}</td>
                                        <td>{{ $detail->listing_oh_friday }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ SATURDAY }}</td>
                                        <td>{{ $detail->listing_oh_saturday }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ SUNDAY }}</td>
                                        <td>{{ $detail->listing_oh_sunday }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="ls-widget">
                        <h2>{{ BRANDS }}</h2>
                        <div class="category">
                            <ul>
                                @foreach($listing_brands as $row)
                                <li><a href="{{ route('front_listing_brand_detail',$row->listing_brand_slug) }}"><i
                                            class="fas fa-angle-right"></i> {{ $row->listing_brand_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="ls-widget">
                        <h2>{{ LOCATIONS }}</h2>
                        <div class="category">
                            <ul>
                                @foreach($listing_locations as $row)
                                <li><a href="{{ route('front_listing_location_detail',$row->listing_location_slug) }}"><i
                                            class="fas fa-angle-right"></i> {{ $row->listing_location_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> --}}

<script>
    function calculateTotal() {
            var total = 0;
            var price = parseFloat(document.getElementById('car_listing_price').value);
            var freightPrice = 0;
            var insurance = 0;
            var inspection = 0;
            var selectedFreight = document.getElementById('freight');
            var selectedOption = selectedFreight.options[selectedFreight.selectedIndex];
            if (selectedOption.getAttribute('data-price') !== null) {
                freightPrice = parseFloat(selectedOption.getAttribute('data-price'));
            }

            var selectedinsurance = document.getElementById('insurance');
            var selectedinsuranceOption = selectedinsurance.options[selectedinsurance.selectedIndex];
            if (selectedinsuranceOption.getAttribute('data-price') !== null) {
                insurance = parseFloat(selectedinsuranceOption.getAttribute('data-price'));
            }

            var selectedinspection = document.getElementById('inspection_certificate');
            var inspectionOption = selectedinspection.options[selectedinspection.selectedIndex];
            if (inspectionOption.getAttribute('data-price') !== null) {
                inspection = parseFloat(inspectionOption.getAttribute('data-price'));
            }

            total = price + freightPrice + insurance + inspection;
            console.log(total);
            document.getElementById('total_price_text').textContent = '$' + total.toFixed(2);
            document.getElementById('total_price').value = total;
        }

        calculateTotal();

        document.getElementById('freight').addEventListener('change', calculateTotal);
        document.getElementById('insurance').addEventListener('change', calculateTotal);
        document.getElementById('inspection_certificate').addEventListener('change', calculateTotal);
        document.addEventListener("DOMContentLoaded", function () {
            // Your JavaScript code here
        });

        function addToFavorites() {
            const listingId = document.getElementById('addToFavoritesBtn').getAttribute('data-listing-id');

            // Make an AJAX request using fetch
            fetch('/add-to-favorites', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    // Make sure to include the CSRF token if your application requires CSRF protection
                },
                body: JSON.stringify({listingId})
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Listing added to favorites successfully');
                    // Update the UI as needed (e.g., change the button color)
                })
                .catch(error => {
                    console.error('Error adding listing to favorites', error);
                });
        }

</script>
<style>
    /* Features Styles */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        /* Creates four columns */
        gap: 0.5rem;
        /* Adjust the gap between boxes */
        padding: 1rem;
        background-color: #fff;
    }

    .feature-box {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 40px;
        /* Adjust height as needed */
        background-color: #F7FFF0;
        /* Background color for the boxes */
        font-size: 0.875rem;
        color: #333;
        border-radius: 0;
        border: 1px solid #dcdcdc;
    }

    .feature-box.highlight {
        background-color: #f38989;
        /* Highlight color */
        font-weight: bold;
        color: black;
    }

    /* Responsive behavior for smaller screens */
    @media (max-width: 992px) {
        .features-grid {
            grid-template-columns: repeat(2, 1fr);
            /* Two columns for smaller screens */
        }

        .feature-box {
            height: 80px;
            /* Adjust height for smaller screens */
        }
    }

    @media (max-width: 576px) {
        .features-grid {
            grid-template-columns: 1fr;
            /* One column for extra small screens */
        }
    }

    .carousel-indicators li {
        background-color: #ccc;
        /* Gray color */
        width: 10px;
        height: 10px;
        border-radius: 100%;
        margin: 1px 3px;
    }

    .carousel-indicators .active {
        background-color: #000;
        /* Black color for the active indicator */
    }

    /* Optional: if you want to remove the arrows */
    .carousel-control-prev,
    .carousel-control-next {
        display: none;
    }

    .water-mark {
        right: 475px !important;
    }
</style>
@endsection
