@php
$advertisements = App\Models\HomeAdvertisement::where('id', 1)->first();
@endphp
<style>

    .card-features {
        width: 254px;
        height: 291px;
        margin: 0 auto;
        border-left: 3px solid maroon;
        border-right: 3px solid maroon;
        border-top: 1px solid maroon;
        border-bottom: 1px solid maroon;
        border-radius: 15px;
        text-align: center;
        margin-right: 20px;
    }
    .card-features p {
        color: grey;
        font-size: 12px;
    }
    .create-account {
        display: flex;
        gap: 10px;
        margin-left: 50px;
        padding-top: 10px;
        color: maroon;
    }
    .features {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }
    .feature {
        width: 40px;
        height: 40px;
        margin-left: 20px;
        font-size: 14px;
        margin-bottom: 10px;
        border-radius: 50%;
        text-align: center;
        display: flex;
        flex-direction: column;
    }
    .feature i {
        margin-top: 15px;
    }
    .one {
        display: flex;
        flex-direction: column;
        text-align: center;
    }
    .one p {
        margin-left: 10px;
        font-size: 12px;
        color: black;
    }
    .button a {
        height: 40px;
        width: 70%;
        margin: 0 auto;
        background-color: maroon;
        color: white;
        font-weight: 700;
    }

    /* Responsive Styles */
    @media only screen and (max-width: 768px) {
        .card-features {
            width: 90%;
            height: auto;
            margin-right: 0;
            border-left: 2px solid maroon;
            border-right: 2px solid maroon;
        }
        .create-account {
            flex-direction: column;
            align-items: center;
            margin-left: 0;
        }
        .feature {
            margin-left: auto;
            margin-right: auto;
        }
        .button a {
            width: 90%;
        }
    }
</style>

<div class="card-features">

    <div class="create-account">
        <i class="fa-solid fa-user"  style="font-weight: 100; font-size:18px;"></i>
        <h6 style="font-weight: 700;">Create Account</h6>
    </div>
    <p>Sign up & enjoy these features</p>
    <div class="features">

        <div class="one">
            <div class="feature" style="background-color: maroon;">
                <i class="fa-solid fa-l" style="color:white;"></i>

            </div>
            <p>Learn more</p>
        </div>
       <div class="one">
        <div class="feature" style="border: 1px solid red;">
            <i class="fa-solid fa-heart" style="font-weight: 100; color:red;"></i>
        </div>
        <p>Favourites</p>
       </div>
       <div class="one">
        <div class="feature" style="border: 1px solid blue;">
            <i class="fa-solid fa-bell" style="font-weight: 100; color:blue;"></i>
        </div>
        <p>Notify me</p>
       </div>
        <div class="one">
            <div class="feature" style="border:2px solid purple;">
                <i class="fa-solid fa-bell" style="font-weight: 100; color:purple;"></i>
            </div>
            <p>Save search</p>
        </div>
        <div class="one">
            <div class="feature" style="border:2px solid orange;">
                <i class="fa-solid fa-envelope" style="color: orange;"></i>

            </div>
            <p>Easy enquiry</p>
        </div>
        <div class="one">
            <div class="feature" style="border:2px solid gold;">
                <i class="fa-solid fa-cart-shopping" style="color: gold;"></i>
            </div>
            <p>Buy Now</p>
        </div>
    </div>
    <div class="button">
        <a class="btn" type="button" href="{{ route('customer_registration') }}">
            Create Account
        </a>
    </div>

</div>
<div class="my-3">
    <a
        @if(isset($advertisements->above_brand_1_url))
            href="{{ (strpos($advertisements->above_brand_1_url, 'http://') === 0 || strpos($advertisements->above_brand_1_url, 'https://') === 0) ? $advertisements->above_brand_1_url : 'http://'.$advertisements->above_brand_1_url }}"
        @else
            href="#"
        @endif
        >
        <img style="object-fit: cover;" src="{{ asset('uploads/advertisements/'.$advertisements->above_brand_1) }}" height="250px" width="210px" class="shadow rounded-2 m-lg-auto m-md-auto d-block" alt="img">
    </a>
</div>
<div class="my-3">
    <a
        @if(isset($advertisements->above_featured_listing_1_url))
            href="{{ (strpos($advertisements->above_featured_listing_1_url, 'http://') === 0 || strpos($advertisements->above_featured_listing_1_url, 'https://') === 0) ? $advertisements->above_featured_listing_1_url : 'http://'.$advertisements->above_featured_listing_1_url }}"
        @else
            href="#"
        @endif
        >
        <img style="object-fit: cover;" src="{{ asset('uploads/advertisements/'.$advertisements->above_featured_listing_1) }}" height="250px" width="210px" class="shadow rounded-2  m-lg-auto m-md-auto d-block" alt="img">
    </a>
</div>
<div class="my-3">
    <a
        @if(isset($advertisements->above_location_1_url))
            href="{{ (strpos($advertisements->above_location_1_url, 'http://') === 0 || strpos($advertisements->above_location_1_url, 'https://') === 0) ? $advertisements->above_location_1_url : 'http://'.$advertisements->above_location_1_url }}"
        @else
            href="#"
        @endif
    >
        <img style="object-fit: cover;" src="{{ asset('uploads/advertisements/'.$advertisements->above_location_1) }}" height="250px" width="210px" class="shadow rounded-2  m-lg-auto m-md-auto d-block" alt="img">
    </a>
</div>
