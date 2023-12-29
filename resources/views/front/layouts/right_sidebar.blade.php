@php
$advertisements = App\Models\HomeAdvertisement::where('id', 1)->first();
@endphp
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