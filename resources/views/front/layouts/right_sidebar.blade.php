@php
$advertisements = App\Models\HomeAdvertisement::where('id', 1)->first();
@endphp
<style>

    /* Base styles for .card-features */
    .card-features {
        width: 254px;
        height: 291px;
        border: 1px solid maroon;
        border-left-width: 3px;
        border-right-width: 3px;
        border-radius: 15px;
        text-align: center;
        margin: auto; /* Center in the flex container */
    }

    /* Responsive styles */
    /*@media only screen and (max-width: 768px) {*/
    /*    .card-features {*/
    /*        width: 90%;*/
    /*        height: auto;*/
    /*        border-width: 2px;*/
    /*    }*/
    /*    !* Add any additional responsive styles needed *!*/
    /*}*/
    .one-third {
        width: calc(33.333% - 10px); /* Adjust width to account for 3 in a row, minus gap */
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 0; /* Space between the two rows */
    }
    .card-features p {
        color: grey;
        font-size: 10px;
    }
    .create-account {
        display: flex;
        gap: 0px;
        margin-left: 20px;
        padding-top: 10px;
        color: maroon;
    }
    .features {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around; /* This will distribute space evenly around the items */

    }
    .feature {
        width: 40px;
        height: 40px;
        font-size: 14px;
        border-radius: 50%;
        text-align: center;
        display: flex;
        flex-direction: column;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 10px;
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
        width: 85%;
        margin: 0 auto;
        background-color: maroon;
        color: white;
        font-weight: 700;
    }

    /* Responsive Styles */
    /*@media only screen and (max-width: 768px) {*/
    /*    .card-features {*/
    /*        width: 90%;*/
    /*        height: auto;*/
    /*        margin-right: 0;*/
    /*        border-left: 2px solid maroon;*/
    /*        border-right: 2px solid maroon;*/
    /*    }*/
    /*    .create-account {*/
    /*        flex-direction: column;*/
    /*        align-items: center;*/
    /*        margin-left: 0;*/
    /*    }*/
    /*    .feature {*/
    /*        margin-left: auto;*/
    /*        margin-right: auto;*/
    /*    }*/
    /*    .button a {*/
    /*        width: 90%;*/
    /*    }*/
    /*}*/
    @media (min-width: 2000px) {
        .one-third {
            width: calc(25% - 10px); /* 4 cards per row */
        }
    }

    /* For screens around 1920x1080 - 3 columns */
    @media (min-width: 1920px) and (max-width: 1999px) {
        .one-third {
            width: calc(33.333% - 10px); /* 3 cards per row */
        }
    }

    /* For screens between 1651px and 1919px - 3 columns */
    @media (min-width: 1651px) and (max-width: 1919px) {
        .one-third {
            width: calc(33.333% - 10px); /* 3 cards per row */
        }
    }

    /* For screens between 1500px and 1650px - 3 columns */
    @media (min-width: 1500px) and (max-width: 1650px) {
        .one-third {
            width: calc(33.333% - 10px); /* 3 cards per row */
        }
    }
    /* For screens between 1200px and 1499px - 2 columns */
    @media (min-width: 1200px) and (max-width: 1499px) {
        .one-third {
            width: calc(33.333% - 10px); /* 2 cards per row */
        }
    }

    /* For medium screens between 992px and 1199px - 2 columns */
    @media (min-width: 992px) and (max-width: 1199px) {
        .one-third {
            width: calc(33.333% - 10px); /* 3 cards per row */
        }
        .card-features {
            width: 180px; /* Further adjusted width */
            height: auto; /* Adjusted height */
            /* Other styles */
        }
    }

    /* For small screens between 768px and 991px - 3 columns */
    @media (min-width: 768px) and (max-width: 991px) {
        .one-third {
            width: calc(33.333% - 10px); /* 3 cards per row */
        }
        .card-features {
            width: 160px; /* Further adjusted width */
            height: auto; /* Adjusted height */
            /* Other styles */
        }
    }

    /* For extra small screens - 1 column */
    @media (max-width: 767px) {
        .one-third {
            width: 100%; /* 1 card per row */
            margin-bottom: 20px; /* Add some space between cards */
        }
        .card-features {
            width: 90%; /* Adjusted width for very small screens */
            height: auto; /* Adjusted height */
            /* Other styles */
        }
    }


</style>
<div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;position: sticky;top:18px">

<div class="my-3 card-features">

    <div class="create-account">
        <i class="fa-solid fa-user"  style="font-weight: 100; font-size:18px;margin-bottom: 10px;"></i>
        <h6 style="font-weight: 700;">Create Account</h6>
    </div>
    <p>Sign up & enjoy these features</p>
    <div class="features">

        <div class="one-third">
            <div class="feature" style="background-color: maroon;">
                <i class="fa-solid fa-l" style="color:white;margin-bottom: 10px;"></i>

            </div>
            <p>Learn more</p>
        </div>
       <div class="one-third">
        <div class="feature" style="border: 1px solid red;">
            <i class="fa-solid fa-heart" style="font-weight: 100; color:red;margin-bottom: 10px;"></i>
        </div>
        <p>Favourites</p>
       </div>
       <div class="one-third">
        <div class="feature" style="border: 1px solid blue;">
            <i class="fa-solid fa-bell" style="font-weight: 100; color:blue;margin-bottom: 10px;"></i>
        </div>
        <p>Notify me</p>
       </div>
        <div class="one-third">
            <div class="feature" style="border:2px solid purple;">
                <i class="fa-solid fa-bell" style="font-weight: 100; color:purple;margin-bottom: 10px;"></i>
            </div>
            <p>Save search</p>
        </div>
        <div class="one-third">
            <div class="feature" style="border:2px solid orange;">
                <i class="fa-solid fa-envelope" style="color: orange;margin-bottom: 10px;"></i>

            </div>
            <p>Easy enquiry</p>
        </div>
        <div class="one-third">
            <div class="feature" style="border:2px solid gold;">
                <i class="fa-solid fa-cart-shopping" style="color: gold;margin-bottom: 10px;"></i>
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
        <img style="object-fit: cover;" src="{{ asset('uploads/advertisements/'.$advertisements->above_featured_listing_1) }}" height="250px" width="210px" class="shadow rounded-2 m-lg-auto m-md-auto d-block" alt="img">
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
</div>
