@extends('front.layouts.app_front')

@section('content')
@php $location= \App\Models\ListingLocation::all();
$modelYears = \App\Models\Listing::distinct()
->orderBy('listing_model_year', 'asc')
->pluck('listing_model_year');
$slider=\App\Models\Slide::where('id',1)->first();
$brands=\App\Models\ListingBrand::all();
$freights = \App\Models\Freight::all();
$insurances = \App\Models\Insurance::all();
$inspection_certificates = \App\Models\Inspection::all();
$fueltype = \App\Models\listing::distinct()
->orderBy('listing_fuel_type', 'asc')
->pluck('listing_fuel_type');
$seat = \App\Models\listing::distinct()
->orderBy('listing_seat', 'asc')
->pluck('listing_seat');
$body = \App\Models\listing::distinct()
->orderBy('listing_body', 'asc')
->pluck('listing_body');
$price = \App\Models\listing::distinct()
->orderBy('listing_price', 'asc')
->pluck('listing_price');
$enginecapacity = \App\Models\listing::distinct()
->orderBy('listing_engine_capacity', 'asc')
->pluck('listing_engine_capacity');
$color = \App\Models\listing::distinct()
->orderBy('listing_exterior_color', 'asc')
->pluck('listing_exterior_color');
$mileage= \App\Models\listing::distinct()
->orderBy('listing_mileage', 'asc')
->pluck('listing_mileage');
$door=\App\Models\listing::distinct()
->orderBy('listing_door', 'asc')
->pluck('listing_door');
$listing_stock=App\Models\listing::all()->count();

$userdata=Auth::user();
@endphp
<section>
    <div class="container-fluid p-0">

        <section>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @if ($slider->slide1 != '')
                    <div class="carousel-item active">
                        <img src="{{asset('uploads/sliders/'.$slider->slide1)}}" class="d-block w-100" alt="...">
                    </div>
                    @endif

                    @if ($slider->slide2 != '')
                    <div class="carousel-item ">
                        <img src="{{asset('uploads/sliders/'.$slider->slide2)}}" class="d-block w-100" alt="...">
                    </div>
                    @endif
                    @if ($slider->slide3 != '')
                    <div class="carousel-item ">
                        <img src="{{asset('uploads/sliders/'.$slider->slide3)}}" class="d-block w-100" alt="...">
                    </div>
                    @endif
                    @if ($slider->slide4 != '')
                    <div class="carousel-item ">
                        <img src="{{asset('uploads/sliders/'.$slider->slide4)}}" class="d-block w-100" alt="...">
                    </div>
                    @endif
                    @if ($slider->slide5 != '')
                    <div class="carousel-item ">
                        <img src="{{asset('uploads/sliders/'.$slider->slide5)}}" class="d-block w-100" alt="...">
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
    </div>

    <div class="container-fluid px-md-5 px-lg-5 px-sm-5 my-2">
        <div class="row left-sidebar">

            <!-- left Column -->
            <div class="col-md-2 order-2 order-sm-2  order-md-1 first-side">
                @include('front.layouts.left_sidebar')

            </div>

            <!-- Middle Column -->

            <div class="col-md-10 order-1 order-sm-12 order-lg-2 order-md-2 pl-md-5 pl-lg-5 px-sm-5">
                <form action="{{route('mainfilter')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row header-search-box header-search-box_main"
                                style="margin-top:-72px;">
                                <div class="col-md-4"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-5 p-3 text-center primary text-light"
                                    style="border-top-left-radius:100px;">
                                    <h5>{{$listing_stock}} Total Cars <i id="main_filter_icon"
                                            class=" mx-2 fas fa-caret-down float-end dropdownicon text-white"></i></h5>
                                </div>

                            </div>
                            <div id="main_filter_body" class="row p-3 search-box shadow rounded-bottom-2"
                                style="border-top:5px solid #731718;">
                                <div class="col-md-4 px-1">

                                    <select name="brands" id="" class="w-100 form-select">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $branditem)
                                        <option value="{{$branditem->id}}">
                                            {{$branditem->listing_brand_name}}</option>

                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-4 px-1">

                                    <select name="doors" id="" class="w-100 form-select mt-xs-3">
                                        <option value="">Doors</option>
                                        @forelse ($door as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                        @empty
                                        <option value="">Empty</option>
                                        @endforelse



                                    </select>
                                </div>
                                <div class="col-md-4 px-1">

                                    <select name="condition" id="" class="w-100 form-select  mt-xs-3">
                                        <option value="">Condition</option>
                                        <option value="New car">New Cars</option>
                                        <option value="Used car">Used Cars</option>

                                    </select>
                                </div>
                                <div class="col-md-4 px-1 my-3">

                                    <select name="status" id="" class="w-100 form-select">
                                        <option value="">Select Status</option>
                                        <option value="in_stock">In Stock</option>
                                        <option value="reserved">Reserved</option>
                                        <option value="sold">Sold</option>


                                    </select>
                                </div>

                                <div class="col-md-4 px-1 my-3">


                                    <select name="steering" id="" class="w-100 form-select">
                                        <option value="">Select Steering</option>
                                        <option value="left steering">Left Steering</option>
                                        <option value="right_steering">Right Steering</option>

                                    </select>

                                </div>

                                <div class="col-md-4 my-3  px-1">

                                    <select name="seats" id="" class="w-100 form-select">
                                        <option value="">Seats</option>
                                       @foreach ($seat as $item)
                                       <option value="{{$item}}">{{$item}}</option>
                                       @endforeach

                                    </select>

                                </div>

                                <div class="col-md-4 px-1">

                                     <select name="body_type" id="" class="w-100 form-select  mt-xs-3">
                                                <option value="">Body Type</option>
                                                @foreach ($body as $item)
                                                <option value="{{$item}}">{{$item}}</option>
                                                @endforeach



                                            </select>

                                </div>

                                <div class="col-md-4 ">

                                    <div class="row">
                                        <div class="col-md-6 px-1 "> <select name="min_price" id="" class="w-100 form-select  mt-xs-3">
                                                <option value="">Min Price</option>
                                               @forelse ($price as $item)
                                               <option value="{{$item}}">{{$item}}</option>
                                               @empty
                                               <option value="">Empty</option>
                                               @endforelse

                                            </select></div>
                                        <div class="col-md-6 px-1 "> <select name="max_price" id="" class="w-100 form-select  mt-xs-3">
                                                <option value="">Max Price</option>
                                                @forelse ($price as $item)
                                                <option value="{{$item}}">{{$item}}</option>
                                                @empty
                                                <option value="">Empty</option>
                                                @endforelse

                                            </select></div>
                                    </div>


                                </div>

                                <div class="col-md-4 ">

                                    <div class="row">
                                        <div class="col-md-6 px-1">
                                            <select name="from_year" id="" class="w-100 form-select  mt-xs-3">
                                                <option value="">From Year</option>
                                                @foreach ($modelYears as $yearitem)
                                                <option value="{{$yearitem}}">{{$yearitem}}</option>
                                                @endforeach



                                            </select>

                                        </div>

                                        <div class="col-md-6 px-1 ">
                                            <select name="to_year" id="" class="w-100 form-select">
                                                <option value="">To Year</option>
                                                @foreach ($modelYears as $yearitem)
                                                <option value="{{$yearitem}}">{{$yearitem}}</option>
                                                @endforeach



                                            </select>
                                        </div>

                                    </div>


                                </div>

                                <div class="col-md-4 my-3 ">
                                    <div class="row">
                                        <div class="col-md-6 px-1 "> <select name="min_mileage" id="" class="w-100 form-select  ">
                                                <option value="">Mine.Mileage</option>
                                                @forelse ($mileage as $item)
                                                <option value="{{$item}}">{{$item}}</option>

                                                @empty
                                                <option value="">Empty</option>

                                                @endforelse


                                            </select></div>
                                        <div class="col-md-6  px-1"> <select name="max_mileage" id="" class="w-100 form-select  mt-xs-3">
                                                <option value="">Max.Mileage</option>
                                                @forelse ($mileage as $item)
                                                <option value="{{$item}}">{{$item}}</option>

                                                @empty
                                                <option value="">Empty</option>

                                                @endforelse

                                            </select></div>
                                    </div>
                                </div>

                                <div class="col-md-4 my-3">

                                    <div class="row">
                                        <div class="col-md-6 px-1 "> <select name="min_engine_capacity" id="" class="w-100 form-select ">
                                                <option value="">Min-Capacity</option>
                                                @foreach ($enginecapacity as $item)
                                                    <option value="{{$item}}">{{$item}}</option>
                                                @endforeach

                                            </select></div>
                                        <div class="col-md-6 px-1 "> <select name="max_engine_capacity" id="" class="w-100 form-select  mt-xs-3">

                                                <option value="">Max-Capacity</option>
                                                @foreach ($enginecapacity as $item)
                                                    <option value="{{$item}}">{{$item}}</option>
                                                @endforeach
                                            </select></div>
                                    </div>


                                </div>

                                <div class="col-md-4 px-1 my-3">


                                    <select name="fuel_type" id="" class="w-100 form-select">
                                        <option value="">Fuel Any</option>
                                        @foreach ($fueltype as $items)
                                        <option value="{{$items}}">{{$items}}</option>
                                        @endforeach




                                    </select>



                                </div>

                                <div class="col-md-4 px-1 my-2">


                                    <select name="transmission" id="" class="w-100 form-select">
                                        <option value="">Transmission (any)</option>
                                        <option value="automatic">Automatic</option>
                                        <option value="manual">Manual</option>



                                    </select>



                                </div>


                                <div class="col-md-8 px-1 my-2">


                                    <select name="color" id="" class="w-100 form-select">
                                        <option value="">Color</option>
                                       @forelse ($color as $item)
                                       <option value="{{$item}}">{{$item}}</option>
                                       @empty
                                       <option value="">Empty</option>
                                       @endforelse


                                    </select>



                                </div>
                                <div class="col-md-4 my-2">


                                    <!--<h5>Total Items Found:<span class="text-danger">1196</span></h5>-->


                                </div>
                                <div class="col-md-4 my-3">


                                    <div style="cursor: pointer;" class="float-right" onclick="reloadWindow()"><i
                                            class="fas fa-history"></i>Reset</div>


                                </div>
                                <div class="col-md-4 ">


                                    <button type="submit" class="btn btn-primary my-2 w-100">Search</button>


                                </div>

                            </div>
                        </form>
                            <div class="row mt-5">
                                <div class="col-md-12 border-bottom">
                                    <div class="row pb-2">
                                        <div class="col-md-8 col-lg-8 col-sm-12">
                                            <h5>View Vehicle Shipping From:</h5>
                                            <ul class="list-inline country_list">
                                                <li class="list-inline-item px-3 py-1 my-1"><a href="{{route('allcars')}}" class="w-100 text-dark"><small>All</small></a></li>
                                                @foreach ($location as $locationitems)
                                                <li class="list-inline-item px-3 py-1 my-1"><a
                                                        class="text-dark text-decoration-none w-100"
                                                        href="{{route('location_find',['slug'=>$locationitems->listing_location_slug])}}"><small>{{$locationitems->listing_location_name}}</small></a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-12">
                                            {{-- <div class="row my-3">
                                                <div class="col-md-6 col-lg-6 col-sm-6">
                                                    <small for="">Item per page</small><select
                                                        class="w-100 form-control" name="" id="">
                                                        <option value="">10</option>
                                                        <option value="">25</option>
                                                        <option value="">50</option>
                                                        <option value="">100</option>


                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-sm-6">
                                                    <small for="">Sort By</small><select class="w-100 form-control"
                                                        name="" id="">
                                                        <option value="">Select</option>
                                                        <option value="">Price High to low</option>
                                                        <option value="">Price low to high</option>



                                                    </select>
                                                </div>
                                            </div> --}}


            </div>


        </div>

        <div class="some-list-2">
            <div class="row cars-box'">
            @foreach ($data as $items)
            @php
            $location = DB::table('listing_locations')->where('id',$items->listing_location_id)->first();

            @endphp
            <div class="col-md-12   mb-2 ">

                <div class="row mt-2 cars-box shadow " style="  border-radius: 10px;"
                    data-name="{{$items->listing_name}}" data-location="{{$location->listing_location_name}}"
                    data-mileage="{{$items->listing_mileage}}" data-transmission="{{$items->listing_transmission}}"
                    data-fuel="{{$items->listing_fuel_type}}" data-steering="{{$items->steering}}"
                    data-body="{{$items->listing_body}}" data-seat="{{$items->listing_seat}}"
                    data-engine="{{$items->listing_engine_capacity}}" data-model="{{$items->listing_model_year}}"
                    data-door="{{$items->listing_door}}" data-color="{{$items->listing_exterior_color}}"
                    data-photo="{{$items->listing_featured_photo}}" data-price="{{$items->listing_price}}"
                    data-car_id="{{$items->id}}"
                    data-status="{{$items->listing_stock_status}}"
                    >
                    <div class="col-md-3 col-lg-3 col-sm-12 p-md-0 p-lg-0 img-responsive" style="background:url('{{asset('/uploads/listing_featured_photos/'.$items->listing_featured_photo)}}');
                    background-size:cover;background-position:center;background-repeat:no-repeat;
                    border-radius: 5px 0px 0px 5px;">

                        <a class="text-dark w-100 d-flex flex-column justify-content-between h-100"
                            style="text-decoration: none!important;"
                            href="{{route('front_listing_detail',['slug'=>$items->listing_slug])}}">

                                @if($items->listing_stock_status == 'in_stock')
                                <span class="badge position-absolute start-0 p-2 text-light primary top-0">In Stock</span>
                                @elseif($items->listing_stock_status == 'reserved')
                                <span class="badge position-absolute start-0 p-2 text-light primary top-0">Reserved</span>
                                @else
                                <span class="badge position-absolute start-0 p-2 text-light primary top-0" >SOLD</span>
                                @endif

                                {{-- <h5 class="fw-medium mt-2">Stock ID:<span>{{$items->id}}</span></h5>
                                <p class="text-danger fw-bold">Auction Grade:4</p> --}}

                        </a>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 py-2">
                        <a class="text-dark w-100" style="text-decoration: none!important;"
                            href="{{route('front_listing_detail',['slug'=>$items->listing_slug])}}">
                            <div class="row">
                                <div class="col-md-8">

                                    <h6 class="m-0 font-weight-bold">{{$items->listing_name}}</h6>
                                    <ul class="list-unstyled p-0">

                                        <li><small class="pt-2 d-block"><span
                                                    class="">Mileage:</span>{{$items->listing_mileage}}</small></li>
                                        <li><small><span
                                                    class="">Transmission:</span>{{$items->listing_transmission}}</small>
                                        </li>
                                        <li><small><span class="">Fuel Type:</span>{{$items->listing_fuel_type}}</small>
                                        </li>
                                        <li><small><span class="">Steering:</span>{{$items->steering}}</small></li>

                                    </ul>


                                </div>

                                <div class="col-md-4 py-2"><small class="text-right d-block "><img
                                            src="{{asset('uploads/listing_location_photos/'.$location->listing_location_photo)}}"
                                            width="20" alt=""> {{$location->listing_location_name}}</small></div>


                                {{-- <div class="col-md-12 col-sm-12 col-lg-12 mob-overflow">
                                    <table class="table table-bordered ">

                                        <tr class="text-center" style="background-color: #EBF3FF;">
                                            <th><small class="fw-bold">Mileage</small></th>
                                            <th> <small class="fw-bold">Automatic</small></th>
                                            <th> <small class="fw-bold">Fuel</small></th>
                                            <th> <small class="fw-bold">Steering</small></th>

                                        </tr>
                                        <tr>

                                            <td class=" py-2 ">

                                                <small>{{$items->listing_mileage}}</small>
                                            </td>
                                            <td class="py-2">

                                                <small>{{$items->listing_transmission}}</small>
                                            </td>
                                            <td class=" py-2">

                                                <small>{{$items->listing_fuel_type}}</small>
                                            </td>
                                            <td class=" py-2">

                                                <small>{{$items->steering}}</small>
                                            </td>


                                        </tr>
                                        <tr class="text-center" style="background-color: #EBF3FF;">
                                            <th><small class="fw-bold">Engine</small></th>
                                            <th> <small class="fw-bold">Year</small></th>
                                            <th> <small class="fw-bold">Doors</small></th>
                                            <th> <small class="fw-bold">Color</small></th>

                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2">

                                                <small>{{$items->listing_engine_capacity}}</small>
                                            </td>
                                            <td class="px-4 py-2">
                                                <small>{{$items->listing_model_year}}</h6>

                                            </td>
                                            <td class="px-4 py-2">

                                                <small>{{$items->listing_door}}</small>
                                            </td>
                                            <td class="px-4 py-2">

                                                <small>{{$items->listing_exterior_color}}</small>
                                            </td>

                                        </tr>
                                    </table>
                                </div> --}}

                            </div>
                        </a>

                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-12">

                        <h5>
                            <small class=>FOB Prices:</small>
                            @if (Auth::check())
                            <small class="float-right text-danger fs-sm mt-2">
                            @php
                                $listingPrice = (string) $items->listing_price; // Convert to string
                                $formattedPrice = strlen($listingPrice) > 7 ? substr($listingPrice, 0, 7) : $listingPrice;
                                $formattedPriceAsFloat = (float) $formattedPrice;
                                
                                @endphp

                                @if(!session()->get('currency_symbol'))
                                    ${{ round($formattedPriceAsFloat, 2) }}
                                @else
                                    @php
                                    $formattedPriceAsFloat = (float) $formattedPrice;
                                    if (is_numeric($formattedPriceAsFloat)) {
                                        $convertedPrice = round($formattedPriceAsFloat * session()->get('currency_value'), 2);
                                        echo session()->get('currency_symbol') . $convertedPrice;
                                    } else {
                                        // Handle the case when $formattedPrice is not a valid number
                                        echo "Invalid Price";
                                    }
                                    @endphp
                                @endif
                            </small>

                            @else
                            <small class="float-right text-danger"><a class="text-danger" href="{{route('customer_login')}}">Login</a></small>
                            @endif


                        </h5>

                        <h5 class="mt-2"><small class="float-start">Total Price</small><small
                                class="float-right text-danger" data-toggle="modal"
                            data-target="#exampleModal">ASK</small></h5>
                        <button type="button" class="btn btn-primary my-2 w-100 send-offer" data-toggle="modal"
                            data-target="#exampleModal">
                            Send Offer
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        </div>


    </div>
    </div>
    </div>




    <!-- Right Column -->


        <div class="col-md-3 order-3 order-md-3 order-lg-3 order-sm-3 text-dark ">
            @include('front.layouts.right_sidebar')
        </div>





    </div>



    </div>
    </div>



</section>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<form action="{{ route('get_qoute') }}" method="POST">
    @csrf
<input class="hidden" id="appurl" value="{{ env('APP_URL') }}"/>

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send Offer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-12">
                        <div class="box-holder position-relative">
                            <img id="photo" src="{{ asset('assets/images/car (1).jpg') }}" class="w-100" alt="">
                            {{-- <span class="badge bg-danger position-absolute start-0 p-2 text-light">In
                                Stock</span> --}}
                            <h2 class="badge position-absolute start-0 p-2 text-light primary top-0" id="status_value"></h2>
                            <h5 class="fw-medium mt-2">Stock ID:<span></span></h5>
                            <p class="text-danger fw-bold">Auction Grade:</p>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-7 col-sm-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 id="name"></h6>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-right" id="location"><img src="{{ asset('assets/images/flags/AO.svg')}} "
                                        class="flag" alt=""></h5>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12 mob-overflow">
                                <table class="table table-bordered ">

                                    <tr class="text-center" style="background-color: #EBF3FF;">
                                        <th><small class="fw-bold">Mileage</small></th>
                                        <th> <small class="fw-bold">Automatic</small></th>
                                        <th> <small class="fw-bold">Fuel</small></th>
                                        <th> <small class="fw-bold">Steering</small></th>
                                        <th> <small class="fw-bold">Drive</small></th>
                                        <th><small class="fw-bold">Seats</small></th>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 ">
                                            <small id="mileage"></small>
                                        </td>
                                        <td class="px-4 py-2">
                                            <small id="transmission"></small>
                                        </td>
                                        <td class="px-4 py-2">
                                            <small id="fuel"></small>
                                        </td>
                                        <td class="px-4 py-2">

                                            <small id="steering"></small>
                                        </td>
                                        <td class="px-4 py-2">

                                            <small id="body"></small>
                                        </td>
                                        <td class="px-4 py-2">

                                            <small id="seats"></small>
                                        </td>
                                    </tr>
                                    <tr class="text-center" style="background-color: #EBF3FF;">
                                        <th><small class="fw-bold">Engine</small></th>
                                        <th> <small class="fw-bold">Year</small></th>
                                        <th> <small class="fw-bold">Doors</small></th>
                                        <th> <small class="fw-bold">Color</small></th>
                                        <th> <small class="fw-bold">Modal Code</small></th>
                                        <th><small class="fw-bold">Engine Code</small></th>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2">
                                            <small id="engine"></small>
                                        </td>
                                        <td class="px-4 py-2">
                                            <small id="model"></h6>
                                        </td>
                                        <td class="px-4 py-2">
                                            <small id="doors"></small>
                                        </td>
                                        <td class="px-4 py-2">
                                            <small id="color"></small>
                                        </td>
                                        <td class="px-4 py-2">
                                            <small>*****</small>
                                        </td>
                                        <td class="px-4 py-2">
                                            <small>*****</small>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-12 rounded mb-2" style="background-color: #F6F6F6;">
                        <form id="quote-form" action="{{ route('get_qoute') }}" method="POST">
                            @csrf
                            <div class="row border-bottom  ">
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <span class="position-relative">
                                        <small >FOB Price:</small>
                                    </span>
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <h5 class="orange text-right" id="price_car"></h5>
                                    <input type="hidden" name="car_id" id="id_car" >
                                    <input type="hidden" id="car_listing_price" >
                                </div>
                            </div>
                            @if (Auth::check())
                            <div class="row border-bottom py-2">
                                <div class="col-md-4 col-sm-12 col-lg-4">
                                    <label class="form-check-label fs-sm"  for="freight">
                                        Freight to
                                    </label>
                                </div>
                                <div class="col-md-8 col-sm-12 col-lg-8">
                                    <h6 class="orange text-right">
                                        <select id="freight" class="form-control" name="freight" onchange="calculateTotal()" style="    font-size: 13px;
                                        padding: 2px 10px;
                                        height: 33px;">
                                            <option value="0" disabled selected>Select</option>
                                            @if(sizeof($freights))
                                                @foreach($freights as $freightOption)
                                                    <option value="{{$freightOption->id}}" data-price="{{$freightOption->price}}">{{$freightOption->destination}} ({{$freightOption->price}})</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </h6>
                                </div>
                            </div>
                            <div class="row border-bottom py-2">
                                <div class="col-md-4 col-sm-12 col-lg-4">
                                    <label class="form-check-label fs-sm" for="insurance">
                                        Select Insurance Type
                                    </label>
                                </div>
                                <div class="col-md-8 col-sm-12 col-lg-8">
                                    <h6 class="orange text-right">
                                        <select name="insurance" id="insurance" class="form-control" onchange="calculateTotal()" style="    font-size: 13px;
                                        padding: 2px 10px;
                                        height: 33px;">
                                            <option disabled selected>Select </option>
                                            @if(sizeof($insurances))
                                            @foreach($insurances as $insurance)
                                            <option value="{{$insurance->id}}" data-price="{{$insurance->price}}">{{$insurance->insurance_type}}({{$insurance->price}})
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </h6>
                                </div>
                            </div>
                            <div class="row border-bottom py-2">
                                <div class="col-md-4 col-sm-12 col-lg-4">
                                    <label class="form-check-label fs-sm" for="flexCheckDefault2" sty>
                                        Inspection Certificate
                                    </label>
                                </div>
                                <div class="col-md-8 col-sm-12 col-lg-8">
                                    <h6 class="orange text-right">
                                        <select name="inspection_certificate" id="inspection_certificate" class="form-control" onchange="calculateTotal()" style="    font-size: 13px;
                                        padding: 2px 10px;
                                        height: 33px;">
                                            <option disabled selected>Select </option>
                                            @if(sizeof($inspection_certificates))
                                            @foreach($inspection_certificates as $inspection_certificate)
                                            <option value="{{$inspection_certificate->id}}" data-price="{{$inspection_certificate->price}}">
                                                {{$inspection_certificate->inspection_type}}({{$inspection_certificate->price}})</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </h6>
                                </div>
                            </div>
                            <div class="row  py-2 d-block">
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <span>
                                        <small>Total Price</small>
                                    </span>
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <small class="text-danger font-weight-bold d-block" id="total_price_text"></small>
                                    <input type="text" name="total_price" hidden id="total_price">
                                </div>
                            </div>
                            @else
                                <a class="btn btn-primary w-100 mt-3" href="{{route('customer_login')}}">Login</a>
                            @endif
                            @if(Auth::check())
                                <input type="text" hidden name="name" class="form-control" value="{{ $userdata->name }}" placeholder="Enter Your Full Name" required>
                                <input type="email" hidden name="email" class="form-control" placeholder="Enter Your Email" value="{{$userdata->email}}">
                                <input type="number" hidden name="phone_no" class="form-control" placeholder="Enter Your Phone Number" value="{{$userdata->phone}}">
                            @endif
                        </form>

                    </div>
                </div>
                <div class="px-md-5 px-lg-5 ">
                    <div class="row">
                        <div class="col-md-2 mb-3 text-md-right text-lg-right text-left"><small>Your
                                Offer*</small></div>

                        <div class="col-md-10 mb-3">
                            <input type="text" name="offer" class="form-control" required
                                placeholder="Enter Your Offer">
                        </div>

                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <button type="submit" class="btn btn-primary d-block m-auto w-50">
                            Get Qoute Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</form>

<script>

function calculateTotal() {
    var total = 0;
    var price = parseFloat(document.getElementById('car_listing_price').value);
    var freightPrice = 0;
    var insurance = 0;
    var inspection = 0;
    var selectedFreight = document.getElementById('freight');
    var selectedOption = selectedFreight.options[selectedFreight.selectedIndex];
    if(selectedOption.getAttribute('data-price') !== null)
    {
        freightPrice = parseFloat(selectedOption.getAttribute('data-price'));
    }

    var selectedinsurance = document.getElementById('insurance');
    var selectedinsuranceOption = selectedinsurance.options[selectedinsurance.selectedIndex];
    if(selectedinsuranceOption.getAttribute('data-price') !== null)
    {
        insurance = parseFloat(selectedinsuranceOption.getAttribute('data-price'));
    }

    var selectedinspection = document.getElementById('inspection_certificate');
    var inspectionOption = selectedinspection.options[selectedinspection.selectedIndex];
    if(inspectionOption.getAttribute('data-price') !== null)
    {
        inspection = parseFloat(inspectionOption.getAttribute('data-price'));
    }

    total = price + freightPrice + insurance + inspection;
    console.log(total);
    document.getElementById('total_price_text').textContent = '$' + total.toFixed(2);
    document.getElementById('total_price').value=total;
}

calculateTotal();

document.getElementById('freight').addEventListener('change', calculateTotal);
document.getElementById('insurance').addEventListener('change', calculateTotal);
document.getElementById('inspection_certificate').addEventListener('change', calculateTotal);


    let loaderHtml = $("#loader-area").html();
    (function ($) {
        "use strict";
        $(document).ready(function () {
            loadListingUsingAjax();
            $("#searchFormId").on('submit', function (e) {
                e.preventDefault();
                submitSearchForm()
            })
            $("#listing_type").on('change', function () {
                submitSearchForm()
            })
            $(".form-check-input").on('click', function () {
                submitSearchForm()
            })
            $("#text").on('keyup', function (e) {
                if (e.target.keyCode === '13') {
                    submitSearchForm()
                }
            })
        });
    })(jQuery);

    function loadListingUsingAjax() {
        submitSearchForm()
    }

    function submitSearchForm() {
        $('#content-area').html(loaderHtml);

        $.ajax({
            type: 'get',
            data: $('#searchFormId').serialize(),
            url: "{{ route('search-front_listing_result') }}",
            success: function (response) {
                $('#content-area').html(response);
            },
            error: function (err) { }
        });
    }

    function loadAjaxListing(url) {
        $('#content-area').html(loaderHtml);
        $.ajax({
            type: 'get',
            url: url,
            success: function (response) {
                $('#content-area').html(response);
            },
            error: function (err) { }
        });
    }
    function reloadWindow() {
        location.reload();
    }

</script>
@endsection
