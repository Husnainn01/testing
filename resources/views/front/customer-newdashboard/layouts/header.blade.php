<div class="border-end p-0 nav-small-txt">
    <div class="head ">
        <div class="head bg-secondary text-white w-100 text-start px-2 py-2 fw-bold"><i
                class="fa-solid fa-cart-shopping text-primary me-1"></i> Inqueries & Buy Now</div>
        <ul class="list-unstyled p-2 mb-0">
            <li class="ms-2"><a class="{{ Request::routeIs('customer_dashboard') ? 'active' : '' }} "
                    href="{{ route('customer_dashboard') }}">Issue Invoice & Reserve</li>
        </ul>
    </div>
    <div class="head">
        <div class="head bg-secondary text-white w-100 text-start px-2 py-2 fw-bold"><i
                class="fa-solid fa-lock text-primary me-1"></i> Reserved</div>
        <ul class="list-unstyled p-2 m-0">
            <li class="ms-2 py-1"><a class=" {{ Request::routeIs('all_reserved_vehicles') ? 'active' : '' }} "
                    href="{{ route('all_reserved_vehicles') }}">All Reserved Vehicles / Items</a></li>
            <li class="ms-2 py-1"><a class="{{ Request::routeIs('customer_land_transport') ? 'active' : '' }} "
                    href="{{ route('customer_land_transport') }}">Create Order</a></li>
            <li class="ms-2 py-1"><a class="{{ Request::routeIs('customer_invoices') ? 'active' : '' }} "
                    href="{{ route('customer_invoices') }}">Download Invoice</a></li>
            <li class="ms-2 py-1"><a class="{{ Request::routeIs('upload-proof') ? 'active' : '' }} "
                    href="{{ route('upload-proof') }}">Upload Paid Invoice</a></li>
            <li class="ms-2 py-1"><a
                    class="{{ Request::routeIs('customer_car_and_shipping_information') ? 'active' : '' }} "
                    href="{{ route('customer_car_and_shipping_information') }}">Shipping Information</a></li>
        </ul>
    </div>
    {{-- <div class="head ">
        <div class="head bg-secondary text-white w-100 text-start px-2 py-2 fw-bold"><i
                class="fa-solid fa-circle-check text-primary me-1"></i> Purchased</div>
        <ul class="list-unstyled p-2 mb-0">
            <li class="ms-2"><a class="{{ Request::routeIs('track-shipment') ? 'active' : '' }} "
                    href="{{ route('track-shipment') }}">Track Shipments</a></li>
        </ul>
    </div> --}}
    <div class="head ">
        <div class="head bg-secondary text-white w-100 text-start px-2 py-2 fw-bold"><i
                class="fa-solid fa-user text-primary me-1"></i> Account Settings</div>
        <ul class="list-unstyled p-2 mb-0">
            <!-- <li class="ms-2"><a  class="{{ Request::routeIs('verify-email') ? 'active' : '' }} " href="{{ route('verify-email') }}">Verify Email</a></li> -->
            <li class="ms-2 py-1"><a class="{{ Request::routeIs('account_info') ? 'active' : '' }} "
                    href="{{ route('account_info') }}">Account Information</a></li>
            <li class="ms-2 py-1"><a class="{{ Request::routeIs('request_car') ? 'active' : '' }} "
                    href="{{ route('request_car') }}">Request Car</a></li>
            <li class="ms-2 py-1"><a class="{{ Request::routeIs('list_request_car') ? 'active' : '' }} "
                    href="{{ route('list_request_car') }}">List of Requested Cars</a></li>
            <!-- <li class="ms-2 py-1"><a class="{{ Request::routeIs('history') ? 'active' : '' }} "  href="{{ route('history') }}">History</a></li> -->
            <!-- <li class="ms-2 py-1"><a  class="{{ Request::routeIs('deposite') ? 'active' : '' }} " href="{{ route('deposite') }}">Check your deposite</a></li> -->
            <!-- <li class="ms-2 py-1"><a  class="{{ Request::routeIs('language-preference') ? 'active' : '' }} " href="{{ route('language-preference') }}">Language Preferences</a></li> -->
            <li class="ms-2 py-1"><a class="{{ Request::routeIs('update_customer_password') ? 'active' : '' }} "
                    href="{{ route('update_customer_password') }}">Update your password</a></li>
            <!-- <li class="ms-2 py-1"><a  class="{{ Request::routeIs('favorites') ? 'active' : '' }} " href="{{ route('favorites') }}">Favorites</li> -->
            {{-- <li class="ms-2 py-1"><a href="#">Notify</a></li>
            <li class="ms-2 py-1"><a>Save Search</a></li> --}}
        </ul>
    </div>
</div>
