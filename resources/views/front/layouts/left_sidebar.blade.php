@php
$location = \App\Models\ListingLocation::all();
$leftside_brands = \App\Models\ListingBrand::all();
$category = \App\Models\Category::all();
$type = \App\Models\Listing::pluck('listing_body')->unique();

@endphp
<style>
    a.text-decoration-none {
        width: 100%;
    }
    .load-more__btn-wrap {
    text-align: right;
    margin-bottom: 1.1rem
}
</style>
<div class="container">
    <div class="row">
        <div class="col-12 side-header py-2">
            Search By Brand
        </div>
        <div class="col-12 d-flex justify-content-center" style="padding-left:1.8rem !important">
            <div class="brands-list mob-hide">
                <div class="row brands-box">
                    <ul class="list-unstyled  brand-responsive">
                        @foreach ($leftside_brands as $branditems)
                        @php
                        $count = DB::table('listings')
                        ->where('listing_brand_id', $branditems->id)
                        ->count();
                        @endphp
                        <a class="brands-box"
                            href="{{ route('brandsfilter', ['slug' => $branditems->listing_brand_slug]) }}"
                            class="text-dark" style="text-decoration:none;">
                            <li class=" py-2 ">
                                <img src="{{ asset('uploads/listing_brand_photos/' . $branditems->listing_brand_photo) }}"
                                    class="small-logo" alt="">
                                <small>
                                    {{ $branditems->listing_brand_name }}({{ $count }})
                                </small>
                            </li>
                        </a>
                        @endforeach
                    </ul>
                </div>
            </div>
            <ul class="list-unstyled list-inline desktop-hide mob-brands">
                @foreach ($leftside_brands as $branditems)
                <a class="list-inline-item"
                    href="{{ route('brandsfilter', ['slug' => $branditems->listing_brand_slug]) }}" class="text-dark"
                    style="text-decoration:none;">
                    <li class=" py-2 "><img
                            src="{{ asset('uploads/listing_brand_photos/' . $branditems->listing_brand_photo) }}"
                            class="small-logo" alt=""><small> {{ $branditems->listing_brand_name }}</small>
                    </li>
                </a>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12 side-header py-2">Search By Type</div>
        <div class="col-12 pl-3">
            <ul class="list-unstyled">
                <li class="mt-3">
                    <a class="text-decoration-none d-flex" href="{{ route('Find-type', ['slug' => 'suv']) }}">
                        <i class="fa-solid fa-truck"></i>
                        <small class="pl-2">SUV</small>
                </li>
                <li class="mt-3"><a class="text-decoration-none"
                        href="{{ route('Find-type', ['slug' => 'cargo']) }}">
                        <i class="fa-solid fa-truck"></i>
                        <small class="pl-2">Cargo</small></li>
                <li class="mt-3"><a class="text-decoration-none"
                        href="{{ route('Find-type', ['slug' => 'truck']) }}">
                        <i class="fa-solid fa-truck"></i>
                        <small class="pl-2">Truck</small></li>
                {{-- <li class="mt-3"><a class="text-decoration-none"><small>C</small></li> --}}
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12 side-header py-2 w-full">
            Search By Steering
        </div>
        <div class="col-12 pl-3">
            <ul class="list-unstyled mob-hide">
                <a href="{{ route('steering', ['type' => 'right_steering']) }}" class="text-dark"
                    style="text-decoration:none;">
                    <li class="py-2"><i class="fas fa-car"></i><small class="pl-1"> Right Hand</small></li>
                </a>
                <a href="{{ route('steering', ['type' => 'left_steering']) }}" class="text-dark"
                    style="text-decoration:none;">
                    <li class=" py-2 "><i class="fas fa-car"></i><small class="pl-1"> Left Hand</small></li>
                </a>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12 side-header py-2">
            Search By Price
        </div>
        <div class="col-12 d-flex justify-content-center pl-3">
            <ul class="list-unstyled mob-hide w-100">
                <a href="{{ route('pricing', ['price1' => 0, 'price2' => 500]) }}" class="text-dark"
                    style="text-decoration:none;">
                    <li class="py-2">
                        <i class="fas fa-tag"></i>
                        <small>$0 - $500</small>
                    </li>
                </a>
                <a href="{{ route('pricing', ['price1' => 500, 'price2' => 1000]) }}" class="text-dark"
                    style="text-decoration:none;">
                    <li class="py-2">
                        <i class="fas fa-tag"></i>
                        <small>$500 - $1000</small>
                    </li>
                </a>
                <a href="{{ route('pricing', ['price1' => 1000, 'price2' => 1500]) }}" class="text-dark"
                    style="text-decoration:none;">
                    <li class="py-2">
                        <i class="fas fa-tag"></i>
                        <small>$1000 - $1500</small>
                    </li>
                </a>
                <a href="{{ route('pricing', ['price1' => 1500, 'price2' => 2000]) }}" class="text-dark"
                    style="text-decoration:none;">
                    <li class="py-2">
                        <i class="fas fa-tag"></i>
                        <small>$1500 - $2000</small>
                    </li>
                </a>
                <a href="{{ route('pricing', ['price1' => 2000, 'price2' => 2500]) }}" class="text-dark"
                    style="text-decoration:none;">
                    <li class="py-2">
                        <i class="fas fa-tag"></i>
                        <small>$2000 - $2500</small>
                    </li>
                </a>
                <a href="{{ route('pricing', ['price1' => 2500, 'price2' => 3000]) }}" class="text-dark"
                    style="text-decoration:none;">
                    <li class="py-2">
                        <i class="fas fa-tag"></i>
                        <small>$2500 - $3000</small>
                    </li>
                </a>
                <a href="{{ route('pricing', ['price1' => 3000, 'price2' => 999999]) }}" class="text-dark"
                    style="text-decoration:none;">
                    <li class="py-2">
                        <i class="fas fa-tag"></i>
                        <small>Over than $3000</small>
                    </li>
                </a>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12 side-header py-2">
            Category
        </div>
        <div class="col-12 d-flex justify-content-center pl-3">
            <ul class="list-unstyled d-flex align-items-center flex-column">
                @foreach ($category as $item)
                <li class="mt-3">
                    <a class="text-decoration-none"
                        href="{{ route('category', ['slug' => $item->category_slug]) }}"><small><img
                                src="{{ asset('uploads/categories_images/' . $item->category_image) }}"
                                class="small-logo" alt="" />
                            {{ $item->category_name }}</small>
                        @endforeach
                        {{--
                <li class="mt-3"><a class="text-decoration-none"><small>C</small></li> --}}
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12 side-header py-2">
            Inventory Location
        </div>
        <div class="col-12 pl-3">
            <ul class="list-unstyled">
                @foreach ($location as $locationitems)
                <li class="mt-3"><a class="text-decoration-none"
                        href="{{ route('location_find', ['slug' => $locationitems->listing_location_slug]) }}">
                        <img class="small-logo" src="{{ asset('uploads/listing_location_photos/' . $locationitems->listing_location_photo) }}"
                            >
                        <small class="pl-2">
                            {{ $locationitems->listing_location_name }}
                        </small>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>




<!-- <h6 class="mb-3 custom fw-bold py-3 text-white" style="background:#731718">Search By Brand</h6> -->



{{-- <h6 class="my-3 custom">Search By Type</h6>
<ul class="list-unstyled">

    <li class="mt-3"><a class="text-decoration-none"
            href="{{ route('Find-type', ['slug' => 'suv']) }}"><small>SUV</small></li>
    <li class="mt-3"><a class="text-decoration-none"
            href="{{ route('Find-type', ['slug' => 'cargo']) }}"><small>Cargo</small></li>
    <li class="mt-3"><a class="text-decoration-none"
            href="{{ route('Find-type', ['slug' => 'truck']) }}"><small>Truck</small></li> --}}


    {{-- <li class="mt-3"><a class="text-decoration-none"><small>C</small></li> --}}
    {{--
</ul> --}}

{{-- <h6 class="my-3 custom mob-hide"></h6>
<ul class="list-unstyled mob-hide">
    <a href="{{ route('steering', ['type' => 'right_steering']) }}" class="text-dark" style="text-decoration:none;">
        <li class=" py-2 "><i class="fas fa-car"></i><small> Right Hand</small></li>
    </a>
    <a href="{{ route('steering', ['type' => 'left_steering']) }}" class="text-dark" style="text-decoration:none;">
        <li class=" py-2 "><i class="fas fa-car"></i><small> Left Hand</small></li>
    </a>


</ul> --}}
{{-- <h6 class="my-3 mob-hide">Search By Type</h6>
<ul class="list-unstyled mob-hide">
    <a href="filtertemplate.html" class="text-dark" style="text-decoration:none;">
        <li class=" py-2 "><i class="fas fa-car"></i><small> Toyato(177)</small></li>
    </a>
    <a href="filtertemplate.html" class="text-dark" style="text-decoration:none;">
        <li class=" py-2 "><i class="fas fa-car"></i><small> Nissan(177)</small></li>
    </a>
    <a href="filtertemplate.html" class="text-dark" style="text-decoration:none;">
        <li class=" py-2 "><i class="fas fa-car"></i><small> Honda(177)</small></li>
    </a>
    <a href="filtertemplate.html" class="text-dark" style="text-decoration:none;">
        <li class=" py-2 "><i class="fas fa-car"></i><small> Mistibushi(177)</small></li>
    </a>
    <a href="filtertemplate.html" class="text-dark" style="text-decoration:none;">
        <li class=" py-2 "><i class="fas fa-car"></i><small> Subaru(177)</small></li>
    </a>
    <a href="filtertemplate.html" class="text-dark" style="text-decoration:none;">
        <li class=" py-2 "><i class="fas fa-car"></i><small> Mazda(177)</small></li>
    </a>
    <a href="filtertemplate.html" class="text-dark" style="text-decoration:none;">
        <li class=" py-2 "><i class="fas fa-car"></i><small> Suzuki(177)</small></li>
    </a>
    <a href="filtertemplate.html" class="text-dark" style="text-decoration:none;">
        <li class=" py-2 "><i class="fas fa-car"></i><small> Isuzu(177)</small></li>
    </a>

</ul> --}}
{{-- <h6 class="my-3 custom mob-hide">Search By Price</h6>
<ul class="list-unstyled mob-hide">
    <a href="{{ route('pricing', ['price1' => 0, 'price2' => 500]) }}" class="text-dark" style="text-decoration:none;">
        <li class="py-2">
            <i class="fas fa-tag"></i>
            <small>$0 - $500</small>
        </li>
    </a>
    <a href="{{ route('pricing', ['price1' => 500, 'price2' => 1000]) }}" class="text-dark"
        style="text-decoration:none;">
        <li class="py-2">
            <i class="fas fa-tag"></i>
            <small>$500 - $1000</small>
        </li>
    </a>
    <a href="{{ route('pricing', ['price1' => 1000, 'price2' => 1500]) }}" class="text-dark"
        style="text-decoration:none;">
        <li class="py-2">
            <i class="fas fa-tag"></i>
            <small>$1000 - $1500</small>
        </li>
    </a>
    <a href="{{ route('pricing', ['price1' => 1500, 'price2' => 2000]) }}" class="text-dark"
        style="text-decoration:none;">
        <li class="py-2">
            <i class="fas fa-tag"></i>
            <small>$1500 - $2000</small>
        </li>
    </a>
    <a href="{{ route('pricing', ['price1' => 2000, 'price2' => 2500]) }}" class="text-dark"
        style="text-decoration:none;">
        <li class="py-2">
            <i class="fas fa-tag"></i>
            <small>$2000 - $2500</small>
        </li>
    </a>
    <a href="{{ route('pricing', ['price1' => 2500, 'price2' => 3000]) }}" class="text-dark"
        style="text-decoration:none;">
        <li class="py-2">
            <i class="fas fa-tag"></i>
            <small>$2500 - $3000</small>
        </li>
    </a>
    <a href="{{ route('pricing', ['price1' => 3000, 'price2' => 999999]) }}" class="text-dark"
        style="text-decoration:none;">
        <li class="py-2">
            <i class="fas fa-tag"></i>
            <small>Over than $3000</small>
        </li>
    </a>
</ul> --}}


{{-- <h6 class="my-3 custom">Category</h6>
<ul class="list-unstyled">
    @foreach ($category as $item)
    <li class="mt-3"><a class="text-decoration-none"
            href="{{ route('category', ['slug' => $item->category_slug]) }}"><small><img
                    src="{{ asset('uploads/categories_images/' . $item->category_image) }}" class="small-logo" alt="" />
                {{ $item->category_name }}</small>
            @endforeach --}}
            {{--
    <li class="mt-3"><a class="text-decoration-none"><small>C</small></li> --}}
    {{--
</ul> --}}






{{-- <h6 class="my-3 custom">Inventory Location</h6>
<ul class="list-unstyled">
    @foreach ($location as $locationitems)
    <li class="mt-3"><a class="text-decoration-none"
            href="{{ route('location_find', ['slug' => $locationitems->listing_location_slug]) }}"><small><img
                    class="mr-2"
                    src="{{ asset('uploads/listing_location_photos/' . $locationitems->listing_location_photo) }}"
                    height="25" width="40">{{ $locationitems->listing_location_name }}</small></a></li>
    @endforeach

</ul> --}}