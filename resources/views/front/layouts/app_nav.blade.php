@php
    $g_settings = \App\Models\GeneralSetting::where('id',1)->first();
    $dynamic_pages = \App\Models\DynamicPage::get();
    $page_about_item = \App\Models\PageAboutItem::where('id',1)->first();
    $page_faq_item = \App\Models\PageFaqItem::where('id',1)->first();
    $page_blog_item = \App\Models\PageBlogItem::where('id',1)->first();
    $page_listing_item = \App\Models\PageListingItem::where('id',1)->first();
    $page_pricing_item = \App\Models\PagePricingItem::where('id',1)->first();
    $page_contact_item = \App\Models\PageContactItem::where('id',1)->first();
    $page_listing_location_item = \App\Models\PageListingLocationItem::where('id',1)->first();
    $page_listing_brand_item = \App\Models\PageListingBrandItem::where('id',1)->first();
    $item_count = \App\Models\Listing::count();
    $today_cars = \App\Models\Listing::whereDate('created_at', '=', now()->toDateString())->count();
    $brands = \App\Models\ListingBrand::all();
    $location= \App\Models\ListingLocation::all();
    $modelYears = \App\Models\Listing::distinct()
        ->orderBy('listing_model_year', 'asc')
        ->pluck('listing_model_year');
@endphp
<header class="desktop-header primary">
    <div class="container-fluid text-light">
        <div class="row border-bottom border-white py-2" style="background-color:gray;color:white;height:35px">
            <div class="col-md-3" style="max-width: 20%">
                <p class="mb-0">Japanese Used Cars for Sale </p>
            </div>
            <div class="col-md-3" style="max-width: 18%">
                <p class="mb-0">Total cars in stock : {{$item_count}} </p>
            </div>
            <div class="col-md-3" style="max-width: 17%">
                <p class="mb-0">Cars added today : {{$today_cars}} </p>
            </div>
            <div class="col-md-3" style="max-width: 25%">
                <p class="text-center mb-0"><i class="far fa-clock"></i> Japanese Time
                    : {{ \Carbon\Carbon::now()->format('M/d/Y h:i A') }}</p>
            </div>
            <div class="col-md-3" style="max-width: 20%">
                <div class="dropdown float-right">
                    <div class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                         aria-haspopup="true" aria-expanded="false">
                        {{ session()->get('country','Japan') }}
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach($location as $row)
                            <a class="dropdown-item"
                               href="{{ route('location_find', ['slug' => $row->listing_location_slug]) }}">
                                <img src="{{asset('uploads/listing_location_photos/'.$row->listing_location_photo)}}"
                                     class="small-logo" alt="">
                                {{ $row->listing_location_name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-3" style="background-color:black;">
            <div class="col-md-2 position-relative ">
                <div class="w-50  text-center position-relative">
                    <a href="{{ url('/') }}"><img class="w-75 p-1"
                                                  src="{{ asset('uploads/site_photos/' .$g_settings->logo)}}"
                                                  alt="logo"></a>
                </div>
            </div>
            <div class="col-md-6">
                <form action="{{ url('search-listing') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-11 px-0">
                            <input class="w-100 py-2 px-3 border-0 search" type="text"
                                   placeholder="Search for used cars" name="text">
                        </div>
                        <div class="col-1 px-0">
                            <button type="submit" style="background:#731718;"
                                    class="border-0 search-btn h-100 w-100 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-magnifying-glass text-white"></i>
                            </button>
                        </div>
                    </div>


                    <div class="col-md-12 mt-3">
                        <ul class="list-inline" style="font-size: 14px">
                            <li class="list-inline-item">
                                <div class="dropdown stock-dropdown">
                                    <button class="bg-transparent text-light dropdown-toggle border-0" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        Search From Stock
                                    </button>
                                    <div class="dropdown-menu brao" aria-labelledby="dropdownMenuButton">
                                        <div class="row">
                                            <div class="col-md-3 border-right">

                                                <h6 class="text-dark ">Search By Type</h6>
                                                <div style="height: 450px;overflow-y:auto;">
                                                    <ul class="list-unstyled brand-list ">
                                                        @foreach ($brands as $branditem)
                                                            @php $count = DB::table('listings')->where('listing_brand_id', $branditem->id)->count(); @endphp
                                                            <li class="nav-item px-1">
                                                                <a href="{{route('brandsfilter',['slug'=>$branditem->listing_brand_slug])}}"
                                                                   class="nav-link"><small><img width="20"
                                                                                                src="{{asset('uploads/listing_brand_photos/'.$branditem->listing_brand_photo)}}"/>{{$branditem->listing_brand_name}}
                                                                        ({{$count}})</small></a>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-2 border-right">
                                                <h6 class="text-dark ">Search By Price</h6>
                                                <ul class="list-unstyled mob-hide">
                                                    <a href="{{route('pricing',['price1'=>'0','price2'=>'500'])}}"
                                                       class="text-dark" style="text-decoration:none;">
                                                        <li class="py-2">
                                                            <i class="fas fa-tag theme-text theme-text "
                                                               aria-hidden="true"></i>
                                                            <small>$0 - $500</small>
                                                        </li>
                                                    </a>
                                                    <a href="{{route('pricing',['price1'=>'500','price2'=>'1000'])}}"
                                                       class="text-dark" style="text-decoration:none;">
                                                        <li class="py-2">
                                                            <i class="fas fa-tag theme-text " aria-hidden="true"></i>
                                                            <small>$500 - $1000</small>
                                                        </li>
                                                    </a>
                                                    <a href="{{route('pricing',['price1'=>'1000','price2'=>'1500'])}}"
                                                       class="text-dark" style="text-decoration:none;">
                                                        <li class="py-2">
                                                            <i class="fas fa-tag theme-text " aria-hidden="true"></i>
                                                            <small>$1000 - $1500</small>
                                                        </li>
                                                    </a>
                                                    <a href="{{route('pricing',['price1'=>'1500','price2'=>'2000'])}}"
                                                       class="text-dark" style="text-decoration:none;">
                                                        <li class="py-2">
                                                            <i class="fas fa-tag theme-text " aria-hidden="true"></i>
                                                            <small>$1500 - $2000</small>
                                                        </li>
                                                    </a>
                                                    <a href="{{route('pricing',['price1'=>'2000','price2'=>'2500'])}}"
                                                       class="text-dark" style="text-decoration:none;">
                                                        <li class="py-2">
                                                            <i class="fas fa-tag theme-text " aria-hidden="true"></i>
                                                            <small>$2000 - $2500</small>
                                                        </li>
                                                    </a>
                                                    <a href="{{route('pricing',['price1'=>'2500','price2'=>'3000'])}}"
                                                       class="text-dark" style="text-decoration:none;">
                                                        <li class="py-2">
                                                            <i class="fas fa-tag theme-text " aria-hidden="true"></i>
                                                            <small>$2500 - $3000</small>
                                                        </li>
                                                    </a>
                                                    <a href="{{route('pricing',['price1'=>'3000','price2'=>'90000'])}}"
                                                       class="text-dark" style="text-decoration:none;">
                                                        <li class="py-2">
                                                            <i class="fas fa-tag theme-text " aria-hidden="true"></i>
                                                            <small>Over $3000</small>
                                                        </li>
                                                    </a>
                                                </ul>
                                            </div>
                                            <div class="col-md-2 border-right">
                                                <h6 class="text-dark ">Search By Year</h6>
                                                <ul class="list-unstyled brand-list">
                                                    @foreach ($modelYears as $item)
                                                        @if($item)
                                                            <li><a href="{{route('find_model_year',['year'=>$item])}}"
                                                                   class="w-100"><small
                                                                        class="w-100 d-block py-1">{{$item}}</small></a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="col-md-3 border-right">
                                                <h6 class="text-dark">Search By Location</h6>
                                                <ul class="list-unstyled">
                                                    @foreach ($location as $locationitem)
                                                        <li class=""><small class="d-block"><a
                                                                    class="text-decoration-none d-block w-100 py-2"
                                                                    href="{{route('location_find',['slug'=>$locationitem->listing_location_slug])}}"><img
                                                                        class="mr-2 mx-2"
                                                                        src="{{asset('uploads/listing_location_photos/'.$locationitem->listing_location_photo)}}"
                                                                        height="20"
                                                                        width="30">{{$locationitem->listing_location_name}}
                                                                </a></small></li>
                                                    @endforeach


                                                </ul>
                                            </div>
                                            <div class="col-md-2">
                                                <h6 class="text-dark ">Search By Steering</h6>
                                                <ul class="list-unstyled mob-hide">
                                                    <li class=" py-2 "><a
                                                            href="{{route('steering',['type'=>'right_steering'])}}"
                                                            class="d-block px-2" style="text-decoration:none;"><i
                                                                class="fas fa-car theme-text"
                                                                aria-hidden="true"></i><small> Right Hand</small></a>
                                                    </li>
                                                    <li class=" py-2 "><a
                                                            href="{{route('steering',['type'=>'left_steering'])}}"
                                                            class="d-block px-2" style="text-decoration:none;"><i
                                                                class="fas fa-car theme-text"
                                                                aria-hidden="true"></i><small> Left Hand</small></a>
                                                    </li>


                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                            {{--                            <li class="list-inline-item">--}}
                            {{--                                <div class="dropdown ">--}}
                            {{--                                    <button class="bg-transparent text-light dropdown-toggle border-0" type="button"--}}
                            {{--                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"--}}
                            {{--                                            aria-expanded="false">--}}
                            {{--                                        {{ NEED_HELP }}--}}
                            {{--                                    </button>--}}
                            {{--                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
                            {{--                                        <a class="dropdown-item" href="{{route('why_choose_us')}}">Why Choose SS--}}
                            {{--                                            Japan?</a>--}}
                            {{--                                        <a class="dropdown-item" href="{{route('how_to_buy')}}">How to buy</a>--}}
                            {{--                                        <a class="dropdown-item" href="{{route('how_to_pay')}}">How to pay</a>--}}
                            {{--                                        <a class="dropdown-item" href="{{route('faqs')}}">FAQs</a>--}}
                            {{--                                        <a class="dropdown-item" href="{{route('export_information')}}">Export--}}
                            {{--                                            Information</a>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </li>--}}
                            {{--                            <li class="list-inline-item">--}}
                            {{--                                <div class="dropdown ">--}}
                            {{--                                    <button class="bg-transparent text-light dropdown-toggle border-0" type="button"--}}
                            {{--                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"--}}
                            {{--                                            aria-expanded="false">--}}
                            {{--                                        About SS Japan--}}
                            {{--                                    </button>--}}
                            {{--                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
                            {{--                                        <a class="dropdown-item" href="{{route('about')}}">Company Profile</a>--}}
                            {{--                                        <a class="dropdown-item" href="{{route('global_offices')}}">Global Offices</a>--}}
                            {{--                                        <a class="dropdown-item" href="{{route('csr_policycsr_policy')}}">CSR-Policy</a>--}}
                            {{--                                        <a class="dropdown-item" href="{{route('terms_services')}}">Terms of service</a>--}}
                            {{--                                        <a class="dropdown-item" href="{{route('privacy_policy')}}">Privacy Policy</a>--}}
                            {{--                                        <a class="dropdown-item" href="{{route('cookiecookie')}}">Cookie Policy</a>--}}
                            {{--                                        <a class="dropdown-item" href="{{route('security_control')}}">Security Export--}}
                            {{--                                            Control</a>--}}
                            {{--                                        <a class="dropdown-item" href="{{route('basic_policy')}}">Bais Policy Against--}}
                            {{--                                            Anti-Social Forces </a>--}}
                            {{--                                        <a href="{{route('how-we-deliver')}}"--}}
                            {{--                                           class=" text-decoration-none dropdown-item"--}}
                            {{--                                           aria-label="Menu Item">{{ HOW_WE_DELIVER}}</a>--}}


                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </li>--}}
                            <li class="list-inline-item ">
                                <a href="{{route('liveoption')}}" class="text-light text-decoration-none"
                                   aria-label="Menu Item">{{ LIVE_AUCTION }}</a>
                            </li>

                        </ul>

                    </div>
                    <!-- end ahsan edit -->
                </form>
            </div>
            <div class="col-md-4">
                <div class="d-flex my-auto justify-content-center" style="font-size: 1.5rem">
                    <div class="mr-3">
                        <div class="dropdown float-right support-dropdown">
                            {{--                            <div class="border-0 bg-transparent text-light" style="cursor: pointer;" type="button"--}}
                            {{--                                 id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"--}}
                            {{--                                 aria-expanded="false">--}}
                            {{--                                <div class="d-flex">--}}
                            {{--                                    <div class="mr-2"><i class="fas fa-headset fs-4 my-2" aria-hidden="true"></i></div>--}}
                            {{--                                    <div class="my-auto"><small class="m-0"> Support</small>--}}
                            {{--                                        <small class="m-0">call us</small>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <h6>Call Us</h6>
                                            <small class="d-block">Call to our team</small>
                                            <small class="d-block">+81-52-387-9772</small>
                                            <h6 class="m-0 mt-3">Email Us</h6>
                                            <a href="info@ss-japan.com"><small>info@ss-japan.com</small></a>
                                            <h6 class="m-0 mt-3">Business Hours</h6>
                                            <small>Mon-Fri 10.00AM - 7.00 PM</small>
                                            <small>Saturday 10.00AM - 1.00 PM</small>

                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <h6>Chat Now</h6>
                                            <small>Chat with SS Japan team &amp; support team for quick answers on
                                                product features pricing and more</small>
                                            <a href="#" class="btn btn-primary w-75 my-2 cursor-pointer d-block">Chat
                                                Now</a>
                                            <small class="d-block">24x7</small>
                                            <small><i class="fab fa-whatsapp bg-success p-1 rounded-circle text-light"
                                                      aria-hidden="true"></i> +81-52-387-9772</small>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="mr-3">

                        <div class="d-flex">
                            <div class="mr-2"><i class="fa-solid fa-heart fs-4 my-2" style="font-size: 1.9rem" aria-hidden="true"></i></div>
                            <div class="my-auto">
                                <a class=" text-light" href="#">
                                    {{--                                    <small class="m-0 text-light" href="#">Check</small>--}}
                                    <small class="m-0 text-light">Favorites</small>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="">
                        <div class="dropdown  login-dropdown">
                            <div class="border-0 bg-transparent text-light" style="cursor: pointer;" type="button"
                                 id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                 aria-expanded="false">
                                <div class="d-flex">
                                    <div class="mr-2"><i class="fas fa-user fs-4 my-2" style="font-size: 1.8rem" aria-hidden="true"></i>
                                    </div>
                                    <div class=" my-auto pl-0" onclick="{{ route('customer_login') }}">
                                        <small class="m-0">Login</small>
                                        {{--                                        <small class="m-0">My Account</small>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="container">
                                    @if(Auth::user() || (Auth::guard('admin')->check()))
                                        @if(Auth::guard('admin')->check())
                                            <div class="row">
                                                <small class="d-block w-100 text-center font-weight-bold">My
                                                    Account</small>
                                                <a href="{{ route('admin_dashboard') }}" class="w-75 m-auto d-block ">
                                                    <button class="w-100 d-block mt-2 btn-primary"
                                                            style="border-radius:5px!important;cursor:pointer;">
                                                        Dashboard
                                                    </button>
                                                </a>
                                                <a href="{{ route('admin_logout') }}" class="w-75 m-auto d-block ">
                                                    <button class="w-100 d-block mt-2 btn-primary"
                                                            style="border-radius:5px!important;cursor:pointer;">Logout
                                                    </button>
                                                </a>
                                            </div>
                                        @else
                                            <div class="row">
                                                <small class="d-block w-100 text-center font-weight-bold">My
                                                    Account</small>
                                                <a href="{{ route('customer_dashboard') }}"
                                                   class="w-75 m-auto d-block ">
                                                    <button class="w-100 d-block mt-2 btn-primary"
                                                            style="border-radius:5px!important;cursor:pointer;">
                                                        Dashboard
                                                    </button>
                                                </a>
                                                <a href="{{ route('customer_logout') }}" class="w-75 m-auto d-block ">
                                                    <button class="w-100 d-block mt-2 btn-primary"
                                                            style="border-radius:5px!important;cursor:pointer;">Logout
                                                    </button>
                                                </a>
                                            </div>
                                        @endif
                                    @else
                                        <div class="row">
                                            <small class="d-block text-center w-100 font-weight-bold">My
                                                Account</small>
                                            <a href="{{ route('customer_login') }}" class="w-75 m-auto d-block">
                                                <button class="w-100 d-block m-auto btn-primary my-5"
                                                        style="border-radius:5px!important;cursor:pointer;">Sign
                                                    In
                                                </button>
                                            </a>
                                            <br><br>
                                            <small class="text-center d-block w-100">New Customer ?
                                                <a href="{{ route('customer_registration') }}">
                                                    Sign up
                                                </a>
                                            </small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3 px-0">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <div class="border-0 bg-transparent text-light" style="cursor: pointer;" type="button"
                                 id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                 aria-expanded="false">
                                <div class="d-flex">
                                    <div class="mr-2"><i class="fas fa-headset fs-4 my-2" aria-hidden="true"></i></div>
                                    <div class="my-auto">
                                        Support call us
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="dropdown ">
                                <button class="bg-transparent text-light dropdown-toggle border-0" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    About Us
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('about')}}">Company Profile</a>
                                    <a class="dropdown-item" href="{{route('global_offices')}}">Global Offices</a>
                                    <a class="dropdown-item" href="{{route('csr_policycsr_policy')}}">CSR-Policy</a>
                                    <a class="dropdown-item" href="{{route('terms_services')}}">Terms of service</a>
                                    <a class="dropdown-item" href="{{route('privacy_policy')}}">Privacy Policy</a>
                                    <a class="dropdown-item" href="{{route('cookiecookie')}}">Cookie Policy</a>
                                    <a class="dropdown-item" href="{{route('security_control')}}">Security Export
                                        Control</a>
                                    <a class="dropdown-item" href="{{route('basic_policy')}}">Bais Policy Against
                                        Anti-Social Forces </a>
                                    <a href="{{route('how-we-deliver')}}"
                                       class=" text-decoration-none dropdown-item"
                                       aria-label="Menu Item">{{ HOW_WE_DELIVER}}</a>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="dropdown ">
                                <button class="bg-transparent text-light dropdown-toggle border-0" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    {{ NEED_HELP }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('why_choose_us')}}">Why Choose SS
                                        Japan?</a>
                                    <a class="dropdown-item" href="{{route('how_to_buy')}}">How to buy</a>
                                    <a class="dropdown-item" href="{{route('how_to_pay')}}">How to pay</a>
                                    <a class="dropdown-item" href="{{route('faqs')}}">FAQs</a>
                                    <a class="dropdown-item" href="{{route('export_information')}}">Export
                                        Information</a>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

    </div>
</header>
<header class="site-header-block">

    <div class="mobile-header">
        <div class="row" style="height: inherit;">
            <div class="col-3" style="height: inherit;">
                <div class="mobile-nav-toggle">
            <span>
                <i></i>
                <i></i>
                <i></i>
              </span>

                </div>
            </div>
            <div class="col-4" style="height: inherit;">
                <div class="float-right p-  ">
                    <a href="{{route('front.home')}}"><img
                            src="{{asset('uploads/site_photos/0ea83f18e14ebe3951eeb034aed66a4b.png')}}" width="40"
                            class="mt-2" alt=""></a>
                </div>
            </div>
            <div class="col-5" style="height: inherit;">
                <div class="float-right">
                    <ul class="list-inline mob-list-item">
                        <li class="list-inline-item"><i class="fas fa-headset fs-4 my-2 text-light"></i></li>
                        <li class="list-inline-item"><i class="far fa-heart fs-4 my-2 text-light"></i></li>
                        <li class="list-inline-item"><i class="fas fa-user-circle fs-4 my-2 text-light"></i></li>


                    </ul>
                </div>
            </div>
        </div>


    </div>

    <div class="navigation">
        <div class="mobile-top-bar">
        <span class="mobile-nav-toggle close">
          <span>X</span>
        </span>
        </div>
        <div class="main-navigation">
            <ul>
                <li>
                    <div class="dropdown">
                        <div class="text-light " type="button" id="dropdownMenuButton" data-toggle="dropdown"
                             aria-haspopup="true" aria-expanded="false">
                            <a href="filtertemplate.html">Search From Stock</a>
                        </div>

                    </div>
                </li>
                <li>


                    <div id="help" class="d-block w-100 text-light">Need Help <i class="fas fa-caret-down rotate"></i>
                    </div>
                    <ul id="mob-inner-item" class="list-unstyled " aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('why_choose_us')}}">Why Choose SS Japan?</a>
                        <a class="dropdown-item" href="{{route('how_to_buy')}}">How to buy</a>
                        <a class="dropdown-item" href="{{route('how_to_pay')}}">How to pay</a>
                        <a class="dropdown-item" href="{{route('faqs')}}">FAQs</a>
                        <a class="dropdown-item" href="{{route('export_information')}}">Export Information</a>
                    </ul>

                </li>
                <li class="text-light">

                    <div id="aboutss" class="d-block w-100">About SS Japan <i class="fas fa-caret-down rotate"></i>
                    </div>
                    <ul id="Japan-content" class="list-unstyled" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('about')}}">Company Profile</a>
                        <a class="dropdown-item" href="{{route('global_offices')}}">Global Offices</a>
                        <a class="dropdown-item" href="{{route('csr_policycsr_policy')}}">CSR-Policy</a>
                        <a class="dropdown-item" href="{{route('terms_services')}}">Terms of service</a>
                        <a class="dropdown-item" href="{{route('privacy_policy')}}">Privacy Policy</a>
                        <a class="dropdown-item" href="{{route('cookiecookie')}}">Cookie Policy</a>
                        <a class="dropdown-item" href="{{route('security_control')}}">Security Export Control</a>
                        <a class="dropdown-item" href="{{route('basic_policy')}}">Bais Policy Against AF </a>


                    </ul>
                </li>

                <li>
                    <a href="contact.blade.html" aria-label="Menu Item">Contact Us</a>
                </li>
                <li>
                    <a href="/" aria-label="Menu Item">Call Us</a>
                </li>
            </ul>
        </div>
    </div>
</header>
<!--  -->
<!-- Button trigger modal -->
<!-- Button trigger modal -->
