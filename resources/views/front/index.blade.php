@extends('front.layouts.app_front')
@php
    $slider = \App\Models\Slide::where('id', 1)->first();
    $countcars=\App\Models\Listing::all()->count();
@endphp
@section('content')
    <div id="overlay"></div>
    <div id="dialog-box">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <button id="close-dialog">X</button>
                    <h2>Select Your Country!</h2>
                    <p>Select Your import country to check the inventory in stock.</p>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 my-2">
                    <form action="{{ route('dialogbox') }}">
                        <select id="id_select2_example" name="location" style="width: 200px;">

                            @foreach ($location as $locationitems)
                                <option value="{{ $locationitems->id }}"
                                    data-img_src="{{ asset('uploads/listing_location_photos/' . $locationitems->listing_location_photo) }}">
                                    {{ $locationitems->listing_location_name }}</option>
                            @endforeach
                        </select>
                        <div class="col-md-3 col-sm-12 col-lg-3 col-12 my-3"> <button class="btn btn-primary w-100 py-2"
                                type="submit">Submit</button></div>
                    </form>
                </div>

                <div class="col-md-12 col-sm-12 col-lg-12 col-12 my-3"> <a href="{{ url('/') }}" class="float-right">
                        <p class="mt-2 btn btn-primary text-white"><i class="fas fa-globe mx-2" aria-hidden="true"></i>GO TO
                            THE SS Japan</p>
                </div></a>
            </div>
        </div>
    </div>
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
                            <img src="{{ asset('uploads/sliders/' . $slider->slide1) }}" class="d-block w-100" alt="...">
                        </div>
                    @endif
                    @if ($slider->slide2 != '')
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/sliders/' . $slider->slide2) }}" class="d-block w-100" alt="...">
                        </div>
                    @endif
                    @if ($slider->slide3 != '')
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/sliders/' . $slider->slide3) }}" class="d-block w-100" alt="...">
                        </div>
                    @endif
                    @if ($slider->slide4 != '')
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/sliders/' . $slider->slide4) }}" class="d-block w-100" alt="...">
                        </div>
                    @endif
                    @if ($slider->slide5 != '')
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/sliders/' . $slider->slide5) }}" class="d-block w-100" alt="...">
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
            <div class="container-fluid px-md-5 px-lg-5  my-5">
                <div class="row ">

                    <!-- left Column -->

                    <div class="col-md-2 order-2 order-sm-2  order-md-1 left-sidebar">
                        <div class="first-side">
                            @include('front.layouts.left_sidebar')
                        </div>
                    </div>

                    <!-- Middle Column -->

                    <div class="col-md-8 order-1 order-sm-1 order-lg-1 search-box-wrapper px-md-5 px-lg-5 px-sm-0">
                        <div class="px-3 px-sm-3 px-md-0 px-lg-0">
                            <div class="row header-search-box">
                                <div class="col-md-3"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-5 p-3 text-center primary"
                                    style="color:white;border-top-left-radius:100px;">
                                    <h5>{{$countcars}} Total Car </h5>
                                </div>

                            </div>
                            <form action="{{ route('filtercar') }}" method="POST" id="form-car">
                                <div id="homefilter-body">
                                    <div class="row p-md-3 p-lg-3 p-sm-1 p-1 search-box shadow rounded-bottom-2 bg-white"
                                        style="border-top:5px solid #731718;">

                                        @csrf
                                        <div class="col-md-4 col-6 col-sm-6">
                                            <label for="" class="mb-2 font-weight-bold">Make</label>
                                            <select name="brand" id="" class="w-100 form-select" onchange="brandChange()">
                                                <option value="">Select Make</option>
                                                @foreach ($brands as $brandsitems)
                                                    <option value="{{ $brandsitems->id }}">
                                                        <a>{{ $brandsitems->listing_brand_name }}</a></option>
                                                @endforeach


                                            </select>
                                        </div>
                                        <div class="col-md-4 col-6 col-sm-6">
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
                                        <div class="col-md-4 col-sm-6 col-6">
                                            <label for="" class="mb-2 font-weight-bold">Body Type</label>
                                            <select name="bodytype" id="" class="w-100 form-select">
                                                <option value="">Select Car Type</option>
                                                <option value="New Car">New Car</option>
                                                <option value="Used Car">Used Car</option>

                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-6 my-md-4 my-sm-0 my-lg-4 my-0">
                                            <label for="" class="mb-2 font-weight-bold">Location</label>
                                            <select name="location" id="" class="w-100 form-select">
                                                <option value="">Select Location</option>
                                                @foreach ($location as $locationitems)
                                                    <option value="{{ $locationitems->id }}">
                                                        {{ $locationitems->listing_location_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col-md-4 col-sm-6 col-6 col-lg-4 my-md-4 my-lg-4 my-sm-0 my-0 ">
                                            <label for="" class="mb-2 font-weight-bold">Price From & Price
                                                To</label>
                                            <div class="row manufacturer-row">
                                                <div class="col-md-6 col-sm-6 col-6 col-lg-6 px-1">
                                                    <input class="form-select" type="number" name="pricefrom"
                                                        id="pricefrom" min="0" placeholder="Price From">

                                                </div>
                                                <div class="col-md-6 col-sm-6 col-6 col-lg-6 px-1"> <input
                                                        class="form-select" id="priceto" type="number" name="priceto"
                                                        placeholder="Price To" min="0">
                                                </div>
                                            </div>


                                        </div>

                                        <div class="col-md-4 col-sm-6 col-6 col-lg-4 my-md-4 my-lg-4 my-sm-0 my-0 py-1">
                                            <a href="#"> <button
                                                    class="btn btn-primary my-4 w-100 py-2">Search</button></a>

                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            @if (isset($carlocation))
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <h3 class="my-4 fw-bold">Most Popular Cars In
                                        {{ $carlocation->listing_location_name }}</h3>
                                </div>
                            @else
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <h3 class="my-4 fw-bold">Most Popular Cars</h3>
                                </div>
                            @endif
                        </div>

                        <div class="row">

{{--  --}}


{{--  --}}

                            @foreach ($most_popular_cars as $carsitems)
                                <div class="col-md-2 col-sm-12 col-lg-3 mb-5 mob-hide">
                                    <a href="{{ route('front_listing_detail', ['slug' => $carsitems->listing_slug]) }}"
                                        class="text-dark box-content" style="text-decoration: none;">
                                        <div class="border rounded box box-content position-relative">
                                            <img src="{{ asset('uploads/listing_featured_photos/' . $carsitems->listing_featured_photo) }}"
                                                class="w-100" height="130" alt="car">
                                            @if ($carsitems->listing_stock_status == 'in_stock')
                                                <span class="badge position-absolute start-0 p-2 text-light primary">In
                                                    Stock</span>
                                            @elseif($carsitems->listing_stock_status == 'reserved')
                                                <span
                                                    class="badge position-absolute start-0 p-2 text-light primary">Reserved</span>
                                            @else
                                                <span
                                                    class="badge position-absolute start-0 p-2 text-light primary">SOLD</span>
                                            @endif

                                            <div class="p-2 ">

                                                <h6 class="my-1">{{ $carsitems->listing_name }}</h6>
                                                <div class="d-block">

                                                    <small class=" fw-bold d-block  mt-1">
                                                        Stock-id: <span class="text-danger ">{{ $carsitems->listing_stock_id }}</span>
                                                    </small>
                                                    <small>

                                                        @if (Auth::check())
                                                            Price:<span class="text-danger fw-bold">
                                                            @if(!session()->get('currency_symbol'))
                                                                ${{ round($carsitems->listing_price,2) }}
                                                            @else
                                                                {{ session()->get('currency_symbol') }}{{ round($carsitems->listing_price*session()->get('currency_value'),2) }}
                                                            @endif</span>
                                                        @else
                                                            Price:<span class="text-danger fw-bold"> <a
                                                                    class="w-25  text-danger"
                                                                    href="{{ route('customer_login') }}"><u>login</u></a></span>
                                                        @endif
                                                        </span>
                                                    </small>
                                                </div>


                                                <small class=" fw-bold d-block  mt-1">
                                                    Type: <span class="text-danger ">{{ $carsitems->listing_type }}</span>
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
                                                                        Stock-id: <span class="text-danger ">{{ $carsitems->listing_stock_id }}</span>
                                                                    </small>
                                                                    <small>

                                                                        @if (Auth::check())
                                                                            Price:<span class="text-danger fw-bold">
                                                                            @if(!session()->get('currency_symbol'))
                                                                                ${{ round($carsitems->listing_price,2) }}
                                                                            @else
                                                                                {{ session()->get('currency_symbol') }}{{ round($carsitems->listing_price*session()->get('currency_value'),2) }}
                                                                            @endif</span>
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
                            <div class="mob-hide d-block w-100 px-3 custom-pagination">
                                {{ $most_popular_cars->links() }}
                            </div>
                        <div class="row mt-4 px-3">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <h3 class="my-4 fw-bold">New Arrivals Cars</h3>
                            </div>

                            @foreach ($new_arrivals as $carsitems)
                                <div class="col-md-2 col-sm-12 col-lg-3 mb-5 mob-hide">
                                    <a href="{{ route('front_listing_detail', ['slug' => $carsitems->listing_slug]) }}"
                                        class="text-dark box-content" style="text-decoration: none;">
                                        <div class="border rounded box box-content position-relative">
                                            <img src="{{ asset('uploads/listing_featured_photos/' . $carsitems->listing_featured_photo) }}"
                                                class="w-100" height="130" alt="car">
                                            @if ($carsitems->listing_stock_status == 'in_stock')
                                                <span class="badge position-absolute start-0 p-2 text-light primary">In
                                                    Stock</span>
                                            @elseif($carsitems->listing_stock_status == 'reserved')
                                                <span
                                                    class="badge position-absolute start-0 p-2 text-light primary">Reserved</span>
                                            @else
                                                <span
                                                    class="badge position-absolute start-0 p-2 text-light primary">SOLD</span>
                                            @endif
                                            <div class="p-2">

                                                <h6 class="my-1">{{ $carsitems->listing_name }}</h6>
                                                <div class="d-block">
                                                    <small class=" fw-bold d-block  mt-1">
                                                        Stock-id: <span class="text-danger ">{{ $carsitems->listing_stock_id }}</span>
                                                    </small>
                                                    <small>

                                                        @if (Auth::check())
                                                            Price:<span class="text-danger fw-bold">
                                                            @if(!session()->get('currency_symbol'))
                                                                ${{ round($carsitems->listing_price,2) }}
                                                            @else
                                                                {{ session()->get('currency_symbol') }}{{ round($carsitems->listing_price*session()->get('currency_value'),2) }}
                                                            @endif</span>
                                                        @else
                                                            Price:<span class="text-danger fw-bold"> <a
                                                                    class="w-25  text-danger"
                                                                    href="{{ route('customer_login') }}"><u>login</u></a></span>
                                                        @endif
                                                        </span>
                                                    </small>
                                                </div>
                                                <small class=" fw-bold d-block mt-1">
                                                    Type: <span class="text-danger">{{ $carsitems->listing_type }}</span>
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
                                                   Steering: <span class="text-danger ">{{ $carsitems->steering }}</span>
                                                </small>



                                            </div>
                                        </div>
                                    </a>
                                </div>
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
                                                                    Stock-id: <span class="text-danger ">{{ $carsitems->listing_stock_id }}</span>
                                                                </small>
                                                                <small>

                                                                    @if (Auth::check())
                                                                        Price:<span class="text-danger fw-bold">
                                                                        @if(!session()->get('currency_symbol'))
                                                                            ${{ round($carsitems->listing_price,2) }}
                                                                        @else
                                                                            {{ session()->get('currency_symbol') }}{{ round($carsitems->listing_price*session()->get('currency_value'),2) }}
                                                                        @endif</span>
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
                                                                Steering: <span class="text-danger ">{{ $carsitems->steering }}</span>
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

                        <div class="custom-pagination">
                        {{ $new_arrivals->links() }}
                        </div>
                        </div>



                        <div class="row my-5 border-bottom border-1 best-seller">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <h2 class="fw-bold">Best Seller By Types</h2>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12 my-3">
                                <div class="row ">
                                    <div class="col-3">
                                        <i class="fas fa-car fs-1"></i>
                                    </div>
                                    <div class="col-8">
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
                                    <div class="col-3">
                                        <i class="fas fa-car fs-1"></i>
                                    </div>
                                    <div class="col-8">
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
                                    <div class="col-3">
                                        <i class="fas fa-car fs-1"></i>
                                    </div>
                                    <div class="col-8">
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
                                    <div class="col-3">
                                        <i class="fas fa-car fs-1"></i>
                                    </div>
                                    <div class="col-8">
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
                                    <div class="col-3">
                                        <i class="fas fa-car fs-1"></i>
                                    </div>
                                    <div class="col-8">
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
                                    <div class="col-3">
                                        <i class="fas fa-car fs-1"></i>
                                    </div>
                                    <div class="col-8">
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
                        <div class="row my-5 mob-hide">
                            <div class="col-md-12">
                                <span class="w-50 mob-100 float-left">
                                    <h2>Client Reviews</h2>
                                    <a class="text-primary" href="{{route('allreviews')}}">View All</a>
                                </span>
                                <span class="w-50 "><a href="{{ route('add-review') }}"><button
                                            class="btn btn-primary float-right px-4 py-2">Add Review</button></a></span>

<input class="hidden" id="appurl" value="{{ env('APP_URL') }}"/>


                                @foreach ($clientreviews as $reviews)
                                    @if ($reviews->listing)
                                        <div data-name="{{ $reviews->agent->name ? $reviews->agent->name : 'null' }}"
                                            data-img="{{ $reviews->listing->listing_featured_photo ? $reviews->listing->listing_featured_photo : 'null' }}"
                                            data-review="{{ $reviews->review ? $reviews->review : 'null' }}"
                                            data-car_name="{{ $reviews->listing->listing_name ? $reviews->listing->listing_name : 'null' }}"
                                            data-time="{{ $reviews->created_at ? $reviews->created_at : 'null' }}">
                                            <a type="button" class="bg-transparent border-0 m-0 p-0 w-100"
                                                style="cursor:pointer" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal1">



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
                                                        <h6 class="fw-bold" style="color:#731718;">
                                                            {{ $reviews->agent->name }}</h6>
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

                                                            <div class="col-md-3 col-lg-3 col-sm-12 px-1">
                                                                <img src="{{ asset('uploads/listing_featured_photos/' . $reviews->listing->listing_featured_photo) }}"
                                                                    class="w-100"
                                                                    style="    height: 160px;
					object-fit: cover;">

                                                            </div>
                                                            <div class="col-md-9 col-sm-12 col-lg-9"
                                                                style="text-align:left;">





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

                        <div class="row my-5">
                            <div class="col-md-12">
                                <h2>FAQS</h2>
                                <div class="mainfaqs">

                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                                href="#pills-home" role="tab" aria-controls="pills-home"
                                                aria-selected="true">All Questions Related To all Problems</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                                href="#pills-profile" role="tab" aria-controls="pills-profile"
                                                aria-selected="false">QUESTIONS REGARDING AUCTION</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                                href="#pills-contact" role="tab" aria-controls="pills-lhd"
                                                aria-selected="false">QUESTIONS REGARDING PAYMENT</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-others-tab" data-toggle="pill"
                                                href="#pills-others" role="tab" aria-controls="pills-others"
                                                aria-selected="false">QUESTIONS REGARDING SHIPMENT</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-howtopay-tab" data-toggle="pill"
                                                href="#pills-howtopay" role="tab" aria-controls="pills-howtopay"
                                                aria-selected="false">MISCELLANEOUS QUESTIONS</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                            aria-labelledby="pills-home-tab">
                                            <div class="row  px-4">

                                                <div class="accordion w-100" id="accordionExample">



                                                    <div class="card row ">
                                                        <div class="card-header" id="heading1">
                                                            <h2 class="mb-0">
                                                                <a class="accordo-text btn-link btn-block text-left collapsed font-weight-bold"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapse1" aria-expanded="true"
                                                                    aria-controls="collapse1">
                                                                    Q1. How do I buy a vehicle/machinery from SS Japan
                                                                    Limited?
                                                                </a>
                                                            </h2>
                                                        </div>

                                                        <div id="collapse1" class="collapse" aria-labelledby="heading1"
                                                            data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                Once you have provided us with the necessary information
                                                                regarding the vehicle you want, and have made the initial
                                                                auction deposit, we can start searching and send you
                                                                possible matches daily. Once you give us a go ahead to
                                                                purchase, we will source your car.
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card row ">
                                                        <div class="card-header" id="heading2">
                                                            <h2 class="mb-0">
                                                                <a class="accordo-text  btn-link btn-block text-left collapsed font-weight-bold"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapse2" aria-expanded="true"
                                                                    aria-controls="collapse2">
                                                                    Q2. Who takes care of getting my car ready for export
                                                                    and shipping it?
                                                                </a>
                                                            </h2>
                                                        </div>

                                                        <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                                            data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                We will prepare your vehicle for export to any port of your
                                                                choosing and will handle all the booking and shipping
                                                                process from Japan. Depending on your country and method of
                                                                shipping, costs for transport will be confirmed.
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="card row ">
                                                        <div class="card-header" id="heading3">
                                                            <h2 class="mb-0">
                                                                <a class="accordo-text  btn-link btn-block text-left collapsed font-weight-bold"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapse3" aria-expanded="true"
                                                                    aria-controls="collapse3">
                                                                    Q3. What is the Auction Grading System?
                                                                </a>
                                                            </h2>
                                                        </div>

                                                        <div id="collapse3" class="collapse" aria-labelledby="heading3"
                                                            data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                All vehicles sold at auction are given an overall grade by
                                                                the independent auction engineers that inspect them. Grades
                                                                can range from 0 to 9 but most auctions only use 0 to 5.
                                                                This number is shown in either the top left or top right of
                                                                the auction sheet.
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card row ">
                                                        <div class="card-header" id="heading4">
                                                            <h2 class="mb-0">
                                                                <a class="accordo-text  btn-link btn-block text-left collapsed font-weight-bold"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapse4" aria-expanded="true"
                                                                    aria-controls="collapse4">
                                                                    Q4. How can I confirm about the quality of the car?
                                                                </a>
                                                            </h2>
                                                        </div>

                                                        <div id="collapse4" class="collapse" aria-labelledby="heading4"
                                                            data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                We thoroughly inspect every vehicle to ensure highest
                                                                quality possible, and provide only the most recent pictures
                                                                of the vehicles to our customers for their satisfaction.
                                                                Furthermore, our agents guide you extensively about the
                                                                vehicle’s condition before and after you buy them.
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card row ">
                                                        <div class="card-header" id="heading5">
                                                            <h2 class="mb-0">
                                                                <a class="accordo-text  btn-link btn-block text-left collapsed font-weight-bold"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapse5" aria-expanded="true"
                                                                    aria-controls="collapse5">
                                                                    Q5. Does your buying team inspect the cars before
                                                                    bidding?
                                                                </a>
                                                            </h2>
                                                        </div>

                                                        <div id="collapse5" class="collapse" aria-labelledby="heading5"
                                                            data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                Yes, we examine the car completely and once satisfied, we
                                                                bid on your selected vehicles.
                                                            </div>
                                                        </div>
                                                    </div>






                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                            aria-labelledby="pills-profile-tab">



                                            <div class="card row ">
                                                <div class="card-header" id="heading1">
                                                    <h2 class="mb-0">
                                                        <a class="accordo-text  btn-link btn-block text-left collapsed font-weight-bold"
                                                            type="button" data-toggle="collapse"
                                                            data-target="#collapse1" aria-expanded="true"
                                                            aria-controls="collapse1">
                                                            Q1. When do I have to make the complete payment?
                                                        </a>
                                                    </h2>
                                                </div>

                                                <div id="collapse1" class="collapse" aria-labelledby="heading1"
                                                    data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        You are required to make the complete payment after the bid is
                                                        YEN(¥) or USD ($) , to avoid any delay in the shipment.
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                            aria-labelledby="pills-contact-tab">



                                            <div class="card row ">
                                                <div class="card-header" id="heading2">
                                                    <h2 class="mb-0">
                                                        <a class="accordo-text  btn-link btn-block text-left collapsed font-weight-bold"
                                                            type="button" data-toggle="collapse"
                                                            data-target="#collapse2" aria-expanded="true"
                                                            aria-controls="collapse2">
                                                            Q1. When will the car be shipped?
                                                        </a>
                                                    </h2>
                                                </div>

                                                <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                                    data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        We will ship your vehicle as soon as you complete the minimum
                                                        deposit for shipment. It is 50%~100% of the Total C&F, which is
                                                        required for the shipment to be processed.
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="tab-pane fade" id="pills-others" role="tabpanel"
                                            aria-labelledby="pills-others-tab">



                                            <div class="card row ">
                                                <div class="card-header" id="heading3">
                                                    <h2 class="mb-0">
                                                        <a class="accordo-text  btn-link btn-block text-left collapsed font-weight-bold"
                                                            type="button" data-toggle="collapse"
                                                            data-target="#collapse3" aria-expanded="true"
                                                            aria-controls="collapse3">
                                                            Q2. How long will shipping take?
                                                        </a>
                                                    </h2>
                                                </div>

                                                <div id="collapse3" class="collapse" aria-labelledby="heading3"
                                                    data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        We cannot commit an accurate time of shipment as it depends on
                                                        shipping schedule and availability of space. On an average, it takes
                                                        4 to 6 weeks.
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="tab-pane fade" id="pills-howtopay" role="tabpanel"
                                            aria-labelledby="pills-howtopay">



                                            <div class="card row ">
                                                <div class="card-header" id="heading4">
                                                    <h2 class="mb-0">
                                                        <a class="accordo-text  btn-link btn-block text-left collapsed font-weight-bold"
                                                            type="button" data-toggle="collapse"
                                                            data-target="#collapse4" aria-expanded="true"
                                                            aria-controls="collapse4">
                                                            Q3. How long does it take for the documents to reach my country?
                                                        </a>
                                                    </h2>
                                                </div>

                                                <div id="collapse4" class="collapse" aria-labelledby="heading4"
                                                    data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        Once shipment has departed, Original BL Scan will be supplied within
                                                        2-3 business days after the complete CNF payment is made.
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-5 w-100">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="bg-wrapper text-light p-5 shadow"
                                    style="background: url('assets/images/cta-bg.png');">
                                    <h2 class="fw-bold">SS Japan</h2>
                                    <p>For Any Queries, Call Our Support Team at +81-52-387-9772</p>
                                    <a href="{{ route('contact') }}"> <button class="btn btn-primary">Contact
                                            Us</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>


                    <!-- Right Column -->

                    <div class="col-md-2 order-3 order-md-3 order-lg-3 order-sm-3 text-dark ">
                        @include('front.layouts.right_sidebar')
                    </div>

                </div>
            </div>
            <!-- Button trigger modal -->


            <!-- Modal -->


            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel1">Customer Review</h1>

                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 col-lg-8"><img class="w-100" alt="" id="review-img"></div>
                                <div class="col-md-4 col-lg-4 body-inner">
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


@endsection
