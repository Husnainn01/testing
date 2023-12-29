@extends('front.customer-newdashboard.layouts.template')
@section('content')
<section class="container-fluid p-3 nav-small-txt border-bottom">
    <ul class="list-unstyled list-inline">
        <li class="list-inline-item text-primary">Dashboard</li>>
        <li class="list-inline-item mx-2">Car Detail / {{ $detail->listing_name }}</li>
    </ul>
    <h3 class="fw-medium">{{ $detail->listing_name }} Details</h3>
</section>
<section class="container">
    <div class="row">

        <div class="col-6" style="background: url('')">
            <img src="{{ asset('uploads/listing_featured_photos/' . $detail->listing_featured_photo) }}" class="w-100 mt-2" alt="">
            <div class="container text-center my-3">
                <div class="row mx-auto my-auto justify-content-center">
                    <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                @foreach($listing_photos as $listing_photo)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-img">
                                                <img src=" {{ asset('/uploads/listing_photos/'.$listing_photo->photo) }} " class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-6">
            <div class="row my-2">
                <div class="col-md-12 mb-3">
                    <h6 class="fw-bold mt-2 mb-0">Total Price: ${{ $detail->listing_price }}</h6>
                    <small class="mb-0 mt-3 d-block">Final Country : <span class="fw-bold">{{ $detail->rListingLocation->listing_location_name ?? '-' }}</span></small>
                    <small>City : <span class="fw-bold">{{ $detail->rListingLocation->cities->first()->name ?? '-' }}</span></small>
                    <h3>Specification</h3>
                </div>
                <div
                    class="col-md-2 col-sm-6 col-sm-6 col-lg-2 border-right specification border-dark text-center p-md-0 p-lg-0 p-3">
                    <p class="mb-0">{{ $user_favourite->listing_mileage ?? '-' }}</p><small class="text-center">Mileage</small>
                </div>
                <div
                    class="col-md-2 col-sm-6 col-sm-6 col-lg-2 border-right specification border-dark text-center  p-md-0 p-lg-0 p-3">
                    <p class="mb-0">{{$detail->listing_model_year ?? '-'}}</p><small class="text-center">Year</small>
                </div>
                <div
                    class="col-md-2 col-sm-6 col-sm-6 col-lg-2 border-right specification border-dark text-center  p-md-0 p-lg-0 p-3">
                    <p class="mb-0">{{$detail->listing_engine_capacity ?? '-'}}</p><small class="text-center">Engine</small>
                </div>
                <div
                    class="col-md-2 col-sm-6 col-sm-6 col-lg-2 border-right specification border-dark text-center  p-md-0 p-lg-0 p-3">
                    <p class="mb-0">{{$detail->listing_transmission ?? '-'}}</p><small class="text-center">Trans</small>
                </div>
                <div
                    class="col-md-3 col-sm-6 col-sm-6 col-lg-3 border-right specification border-dark text-center  p-md-0 p-lg-0 p-3">
                    <p class="mb-0">{{$listing_locations_car->listing_location_name ?? '-'}}</p><small class="text-center">Location</small>
                </div>


            </div>
            <div class="row my-4">
                <table class="table-bordered w-100 text-left specification">
                    {{-- <tr >
                                <td style="background: #EBF3FF;" class="text-left pl-2"><small>Price</small></td>
                                <td class="text-left pl-2"><small>{{$detail->listing_price ?? '-'}}</small></td>
                    </tr> --}}
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Type</small></td>
                        <td class="text-center pl-2"><small>{{$detail->listing_type ?? '-'}}</small></td>
                    </tr>

                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Exterior Color</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_exterior_color ?? '-'}}</small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Interior Color</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_interior_color ?? '-'}}</small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Cylinder</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_cylinder}}</small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Steering</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_steering ?? '-'}}</small></td>
                    </tr>
                    {{-- <tr >
                                <td style="background: #EBF3FF;" class="text-left pl-2"><small>Engine Capcity</small></td>
                                <td class="text-left pl-2"><small>{{$detail->listing_engine_capacity ?? '-'}}</small></td>
                    </tr> --}}

                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Fuel Type</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_fuel_type ?? '-'}}</small></td>
                    </tr>
                    {{-- <tr >
                                <td style="background: #EBF3FF;" class="text-left pl-2"><small>Vin</small></td>
                                <td class="text-left pl-2"><small>{{$detail->listing_vin ?? '-'}}</small></td>
                    </tr> --}}
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Price</small></td>
                        <td class="text-left pl-2"><small>
                            @if(!session()->get('currency_symbol'))
                                ${{ round($detail->listing_price,2) }}
                            @else
                                {{ session()->get('currency_symbol') }}{{ round($detail->listing_price*session()->get('currency_value'),2) }}
                            @endif</small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Body</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_body ?? '-'}}</small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Seat</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_seat ?? '-'}}</small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Wheel</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_wheel ?? '-'}}</small></td>
                    </tr>
                    <tr>
                        <td style="background: #EBF3FF;" class="text-left pl-2"><small>Doors</small></td>
                        <td class="text-left pl-2"><small>{{$detail->listing_door ?? '-'}}</small></td>
                    </tr>
                    {{-- <tr>
                                <td style="background: #EBF3FF;" class="text-left pl-2"><small>Model Year</small></td>
                                <td class="text-left pl-2"><small>{{$detail->listing_model_year ?? '-'}}</small></td>
                    </tr> --}}






                </table>
            </div>
            <div class="row my-3">
                <div class=" mb-3 w-100">
                    <h3>Features</h3>
                </div>
                <div class=" d-flex flex-wrap ">
                    @foreach($listing_amenities as $row)
                        @php
                        $res = DB::table('amenities')->where('id',$row->amenity_id)->first();
                        @endphp
                        <div class="w-auto py-2 px-2 border mx-1 my-1" style="background:#F7FFF0">
                            <small>{{$res->amenity_name}}<</small>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
