@extends('front.customer-newdashboard.layouts.template')
@section('content')
    <section class="container-fluid p-3 nav-small-txt border-bottom">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item text-primary">Dashboard</li>>
            <li class="list-inline-item mx-2">All Reserved Vehicles / Items</li>

        </ul>
        <h3 class="fw-medium">All Reserved Vehicles / Items</h3>
        <small>It contains all the quotations you have requested.</small>
    </section>
    <section class="container-fluid">
        <div class="cars" style="overflow-y:auto;">
            @forelse($total_reserved_listing_cars as $total_reserved_listing_car)
                @php
                    $reserved_car = $total_reserved_listing_car->car;
                @endphp
                <section class="container border-bottom pb-1">
                    <div class="row">
                        <div class="col-2" style="background: url('')">
                            <img src="{{ asset('uploads/listing_featured_photos/' . $reserved_car->listing_featured_photo) }}"
                                class="w-100 mt-2" height="110px" style="object-fit: cover; height:-webkit-fill-available"
                                alt="">
                        </div>
                        <div class="col-7">
                            <div class="container"></div>
                            <div class="row mt-2">
                                <h6 class="text-primary p-0 fw-bold mb-0">{{ $reserved_car->listing_name }}</h6>
                                {{-- <p>{{ $reserved_car->listing_description }}</p> --}}
                                <div class="badges p-0 mb-2"><span
                                        class="badge bg-dark">{{ $reserved_car->listing_stock_status }}</span>
                                    <!-- <span class="badge bg-success mx-2">BF Stock</span><span class="badge bg-warning">Today Offers</span>-->
                                </div>
                                <table class="table-bordered w-100 text-left specification" style="font-size: 12px;">
                                    {{-- <tr >
                                            <td style="background: #F0F0F1;" class="text-left pl-2"><small>Price</small></td>
                                            <td class="text-left pl-2"><small>{{$detail->listing_price}}</small></td>
                                </tr> --}}
                                    <tr>
                                        <td style="background: #F0F0F1;" class="text-left pl-2"><small>Stock ID</small></td>
                                        <td class="text-left pl-2">
                                            <small>{{ $reserved_car->listing_stock_id ?? '-' }}</small>
                                        </td>
                                        <td style="background: #F0F0F1;" class="text-left pl-2"><small>Mileage</small></td>
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
                                        <td style="background: #F0F0F1;" class="text-left pl-2"><small>Steering</small></td>
                                        <td class="text-left pl-2"><small>{{ $reserved_car->steering ?? '-' }}</small></td>
                                    </tr>

                                    <tr>
                                        <td style="background: #F0F0F1;" class="text-left pl-2"><small>Fuel</small></td>
                                        <td class="text-left pl-2">
                                            <small>{{ $reserved_car->listing_fuel_type ?? '-' }}</small>
                                        </td>

                                        <td style="background: #F0F0F1;" class="text-left pl-2"><small>Transmission</small>
                                        </td>
                                        <td class="text-left pl-2">
                                            <small>{{ $reserved_car->listing_transmission ?? '-' }}</small>
                                        </td>
                                    <tr>
                                        <td style="background: #F0F0F1;" class="text-left pl-2"><small>Brand</small></td>
                                        <td class="text-left pl-2">
                                            <small>{{ $reserved_car->rListingBrand->listing_brand_name ?? '-' }}</small>
                                        </td>

                                        <td style="background: #F0F0F1;" class="text-left pl-2"><small>Location</small></td>
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
                <p>No Pending cars found</p>
            @endforelse
        </div>
        <div class="col-12">
            <div class="mob-hide p-3 pagination d-flex justify-content-center">
                {{ $total_reserved_listing_cars->links() }}
            </div>
        </div>

    </section>
@endsection
