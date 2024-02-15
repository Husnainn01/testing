<div class="p-3 text-white nav-small-txt" style="background: #222222;">
    <div class="row">
        <div class="col-lg-3 col-sm-6 col-md-6 col-6"><img src="{{asset('uploads/site_photos/0ea83f18e14ebe3951eeb034aed66a4b.png')}}" height="70" alt="">
        <ul class="list-unstyled mx-3 py-3">
            <li class="my-1">+81-52-387-9772</li>
            <li class="my-1">info@ssjapan.com</li>
            <li class="my-1"> 1-1506, Nishifukuda, Minato-ku, Nagoya city,
                 Aichi-ken, Japan 455-0874</li>
        </ul>
        </div>
        <div class="col-lg-3 col-sm-6 col-md-6 col-6">
            <h6 class="text-primary">INQUIRIES & BUY NOW</h6>
            <ul class="list-unstyled ">
                <li class="my-1"><a href="{{route('customer_dashboard')}}" class="text-white">Issue Invoice & Reserve </a></li>
            </ul>
            <h6 class="text-primary mt-4">RESERVED</h6>
            <ul class="list-unstyled ">
                <li class="py-1 "><a  class="text-white" href="{{route('all_reserved_vehicles')}}">All Reserved Vehicles / Items</a></li>
                <li class="py-1 "><a class="text-white" href="{{route('customer_land_transport')}}">Create Order</a></li>
                <li class="py-1 "><a class="text-white" href="{{route('customer_invoices')}}">Download Invoice</a></li>
                <li class="py-1 "><a class="text-white"  href="{{route('customer_car_and_shipping_information')}}">Shipping Information</a></li>
            </ul>
            <h6 class="text-primary mt-4">PURCHASED</h6>
            <ul class="list-unstyled ">
                <li class="my-1"><a  class="text-white" href="{{route('track-shipment')}}">Track Shipments</a></li>
            </ul>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-6">
            <h6 class="text-primary"> ACCOUNT SETTINGS</h6>
            <ul class="list-unstyled p-2 mb-0">
                <!-- <li class="ms-2"><a  class="{{ Request::routeIs('verify-email')  ? 'active' : '' }} " href="{{route('verify-email')}}">Verify Email</a></li> -->
                <li class="py-1"><a  class="text-white" href="{{route('account_info')}}">Account Information</a></li>
                <li class="py-1"><a class="text-white" href="{{route('request_car')}}">Request Car</a></li>
                <li class="py-1"><a class="text-white" href="{{route('list_request_car')}}">List of Requested Cars</a></li>
                <!-- <li class="py-1"><a class="{{ Request::routeIs('history')  ? 'active' : '' }} "  href="{{route('history')}}">History</a></li> -->
                <!-- <li class="py-1"><a  class="{{ Request::routeIs('deposite')  ? 'active' : '' }} " href="{{route('deposite')}}">Check your deposite</a></li> -->
                <!-- <li class="py-1"><a  class="{{ Request::routeIs('language-preference')  ? 'active' : '' }} " href="{{route('language-preference')}}">Language Preferences</a></li> -->
                <li class="py-1"><a  class="text-white" href="{{route('update_customer_password')}}">Update your password</a></li>
                <!-- <li class="py-1"><a  class="{{ Request::routeIs('favorites')  ? 'active' : '' }} " href="{{route('favorites')}}">Favorites</li> -->
                {{-- <li class="py-1"><a href="#">Notify</a></li>
                <li class="py-1"><a>Save Search</a></li> --}}
            </ul>
        </div>
    </div>

</div>
<div class="container-fluid nav-small-txt">

<div class="row bg-dark">
    <div class="col-12 ">
        <ul class="list-unstyled list-inline text-center mt-2">
            <a href='https://www.ss-japan.com/terms_and_services'><li class="list-inline-item text-white">Terms & Conditions</li> </a>
            
            <a href='https://www.ss-japan.com/privacy_policy'><li class="list-inline-item text-white">Privacy</li></a>
            <a href='https://www.ss-japan.com/csr_policy'><li class="list-inline-item text-white">CSR-Policy</li></a>

        </ul>
    </div>
</div>
<div class="row bg-primary">
    <div class="col-12 ">
    <p class="text-center text-white mt-2">© 2023 SS Japan. All rights reserved.</p>
    </div>
</div>
</div>





