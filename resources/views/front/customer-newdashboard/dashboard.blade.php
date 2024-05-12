@extends('front.customer-newdashboard.layouts.template')
@section('content')
    <section class="container-fluid p-3 nav-small-txt border-bottom">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item text-primary">Dashboard</li>>
            <li class="list-inline-item mx-2">INQUIRIES & BUY NOW </li>>
            <li class="list-inline-item mx-2">Issue Invoice & Reserve</li>
        </ul>
        <h3 class="fw-medium">Issue Invoice & Reserve</h3>
        <ul class="nav nav-tabs text-white" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Favorites</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Pending</button>
            </li>
            {{-- <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                    type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Reserved</button>
            </li> --}}

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">
                <div class="cars" style="overflow-y:auto;">
                    @forelse($user_favourites as $reserved_car)
                        @php
                            // dd($reserved_car->rListingLocation->listing_location_name);
                            // dd($reserved_car->rListingBrand->listing_brand_name);
                        @endphp
                        <section class="container border-bottom pb-1">
                            <div class="row">
                                <div class="col-2" style="background: url('')">
                                    <img src="{{ asset('uploads/listing_featured_photos/' . $reserved_car->listing_featured_photo) }}"
                                        class="w-100 mt-2" height="40px" style="object-fit: cover; height:100%"
                                        alt="">
                                </div>
                                <div class="col-7">
                                    <div class="container"></div>
                                    <div class="row mt-2">
                                        <h6 class="text-primary p-0 fw-bold mb-0">{{ $reserved_car->listing_name }}</h6>
                                        <p>{{ $reserved_car->listing_description }}</p>
                                        <div class="badges p-0 mb-2"><span
                                                @php
$status = $reserved_car->listing_stock_status;
                                                    if($reserved_car->listing_stock_status == "in_stock"){
                                                        $status = "In Stock";
                                                    } @endphp
                                                class="badge bg-dark">{{ $status }}</span>

                                        </div>
                                        <table class="table-bordered w-100 text-left specification"
                                            style="font-size: 12px;">
                                            {{-- <tr >
                                                    <td style="background: #F0F0F1;" class="text-left pl-2"><small>Price</small></td>
                                                    <td class="text-left pl-2"><small>{{$detail->listing_price}}</small></td>
                                        </tr> --}}
                                            <tr>
                                                <td style="background: #F0F0F1;" class="text-left pl-2"><small>Stock
                                                        ID</small></td>
                                                <td class="text-left pl-2">
                                                    <small>{{ $reserved_car->listing_stock_id ?? '-' }}</small>
                                                </td>
                                                <td style="background: #F0F0F1;" class="text-left pl-2">
                                                    <small>Mileage</small>
                                                </td>
                                                <td class="text-left pl-2">
                                                    <small>{{ $reserved_car->listing_mileage ?? '-' }}</small>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="background: #F0F0F1;" class="text-left pl-2"><small>Engine
                                                        Capacity</small></td>
                                                <td class="text-left pl-2">
                                                    <small>{{ $reserved_car->listing_engine_capacity ?? '-' }}</small>
                                                </td>
                                                <td style="background: #F0F0F1;" class="text-left pl-2">
                                                    <small>Steering</small>
                                                </td>
                                                <td class="text-left pl-2">
                                                    <small>{{ $reserved_car->steering ?? '-' }}</small>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="background: #F0F0F1;" class="text-left pl-2"><small>Fuel</small>
                                                </td>
                                                <td class="text-left pl-2">
                                                    <small>{{ $reserved_car->listing_fuel_type ?? '-' }}</small>
                                                </td>

                                                <td style="background: #F0F0F1;" class="text-left pl-2">
                                                    <small>Transmission</small>
                                                </td>
                                                <td class="text-left pl-2">
                                                    <small>{{ $reserved_car->listing_transmission ?? '-' }}</small>
                                                </td>
                                            <tr>
                                                <td style="background: #F0F0F1;" class="text-left pl-2"><small>Brand</small>
                                                </td>
                                                <td class="text-left pl-2">
                                                    <small>{{ $reserved_car->rListingBrand->listing_brand_name ?? '-' }}</small>
                                                </td>

                                                <td style="background: #F0F0F1;" class="text-left pl-2">
                                                    <small>Location</small>
                                                </td>
                                                <td class="text-left pl-2">
                                                    <small>{{ $reserved_car->rListingLocation->listing_location_name ?? '-' }}</small>
                                                </td>

                                                {{-- <tr>
                                                    <td style="background: #F0F0F1;" class="text-left pl-2"><small>Model Year</small></td>
                                                    <td class="text-left pl-2"><small>{{$reserved_car->listing_model_year ?? '-'}}</small></td>
                                        </tr> --}}
                                        </table>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <h6 class="fw-bold mt-2 ">Total Price: $ {{ $reserved_car->listing_price }}</h6>
                                    <small class="mb-0 mt-3 d-block">Final Country : <span
                                            class="fw-bold">{{ $reserved_car->rListingLocation->listing_location_name ?? '-' }}</span></small>
                                    <small class="d-block">City : <span
                                            class="fw-bold">{{ $reserved_car->rListingLocation->cities->first()->name ?? '-' }}</span></small>
                                    <a class=" badge bg-primary "
                                        href="{{ route('car_detail', $reserved_car->listing_slug) }}">View Detail</a>
                                </div>
                            </div>
                        </section>
                    @empty
                        <p>No Favourites cars found</p>
                    @endforelse
                </div>
                <div class="col-12">
                    <div class="mob-hide p-3 pagination d-flex justify-content-center">
                        {{ $user_favourites->links() }}
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <div class="cars" style="overflow-y:auto;">
                    @forelse($total_pending_listing_cars as $total_pending_listing_car)
                        @php
                            $pending_car = $total_pending_listing_car->car;
                        @endphp
                        <section class="container border-bottom pb-1">
                            <div class="row">
                                <div class="col-2" style="background: url('')">
                                    <img src="{{ asset('uploads/listing_featured_photos/' . $pending_car->listing_featured_photo) }}"
                                        class="w-100 mt-2" height="100%"
                                        style="object-fit: cover; height:-webkit-fill-available;" alt="">
                                </div>
                                <div class="col-7">
                                    <div class="container"></div>
                                    <div class="row mt-2">
                                        <h6 class="text-primary p-0 fw-bold mb-0">{{ $pending_car->listing_name }}</h6>
                                        <p>{{ $pending_car->listing_description }}</p>
                                        <div class="badges p-0 mb-2"><span
                                                @php
$status = $reserved_car->listing_stock_status;
                                                                                                if($reserved_car->listing_stock_status == "in_stock"){
                                                                                                    $status = "In Stock";
                                                                                                } @endphp
                                                class="badge bg-dark">{{ $status }}</span>

                                        </div>
                                        <table class="table-bordered w-100 text-left specification"
                                            style="font-size: 12px;">
                                            {{-- <tr >
                                                    <td style="background: #F0F0F1;" class="text-left pl-2"><small>Price</small></td>
                                                    <td class="text-left pl-2"><small>{{$detail->listing_price}}</small></td>
                                        </tr> --}}
                                            <tr>
                                                <td style="background: #F0F0F1;" class="text-left pl-2"><small>Stock
                                                        ID</small></td>
                                                <td class="text-left pl-2">
                                                    <small>{{ $pending_car->listing_stock_id ?? '-' }}</small>
                                                </td>
                                                <td style="background: #F0F0F1;" class="text-left pl-2">
                                                    <small>Mileage</small>
                                                </td>
                                                <td class="text-left pl-2">
                                                    <small>{{ $pending_car->listing_mileage ?? '-' }}</small>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="background: #F0F0F1;" class="text-left pl-2"><small>Engine
                                                        Capacity</small></td>
                                                <td class="text-left pl-2">
                                                    <small>{{ $pending_car->listing_engine_capacity ?? '-' }}</small>
                                                </td>
                                                <td style="background: #F0F0F1;" class="text-left pl-2">
                                                    <small>Steering</small>
                                                </td>
                                                <td class="text-left pl-2">
                                                    <small>{{ $pending_car->steering ?? '-' }}</small>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="background: #F0F0F1;" class="text-left pl-2">
                                                    <small>Fuel</small>
                                                </td>
                                                <td class="text-left pl-2">
                                                    <small>{{ $pending_car->listing_fuel_type ?? '-' }}</small>
                                                </td>

                                                <td style="background: #F0F0F1;" class="text-left pl-2">
                                                    <small>Transmission</small>
                                                </td>
                                                <td class="text-left pl-2">
                                                    <small>{{ $pending_car->listing_transmission ?? '-' }}</small>
                                                </td>
                                            <tr>
                                                <td style="background: #F0F0F1;" class="text-left pl-2">
                                                    <small>Brand</small>
                                                </td>
                                                <td class="text-left pl-2">
                                                    <small>{{ $pending_car->brand_name ?? '-' }}</small>
                                                </td>

                                                <td style="background: #F0F0F1;" class="text-left pl-2">
                                                    <small>Location</small>
                                                </td>
                                                <td class="text-left pl-2">
                                                    <small>{{ $pending_car->listing_address ?? '-' }}</small>
                                                </td>

                                                {{-- <tr>
                                                    <td style="background: #F0F0F1;" class="text-left pl-2"><small>Model Year</small></td>
                                                    <td class="text-left pl-2"><small>{{$pending_car->listing_model_year ?? '-'}}</small></td>
                                        </tr> --}}
                                        </table>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <h6 class="fw-bold mt-2 ">Total Price: $ {{ $pending_car->listing_price }}</h6>
                                    <small class="mb-0 mt-3 d-block">Final Country : <span
                                            class="fw-bold">{{ $pending_car->rListingLocation->listing_location_name ?? '-' }}</span></small>
                                    <small class="d-block">City : <span
                                            class="fw-bold">{{ $pending_car->rListingLocation->cities->first()->name ?? '-' }}</span></small>
                                    <a class=" badge bg-primary "
                                        href="{{ route('car_detail', $pending_car->listing_slug) }}">View Detail</a>
                                </div>
                            </div>
                        </section>
                    @empty
                        <p>No Pending cars found</p>
                    @endforelse
                </div>
                <div class="col-12">
                    <div class="mob-hide p-3 pagination d-flex justify-content-center">
                        {{ $total_pending_listing_cars->links() }}
                    </div>
                </div>
            </div>


        </div>
    </section>


    {{-- This code will be used when items will be empty --}}

    {{-- <section class="container-fluid p-3 text-center m-auto my-5">
    <h4>NO ITEM FOUND</h4>
    <p>Browse the stock and enquire/get a quote for the item you like</p>
    <button class="btn btn-primary my-3 px-5 py-2">Browse our stock</button>
    <p>Return to this page to review list of inquired vehicles</p>
</section> --}}

    {{--  --}}
@endsection
