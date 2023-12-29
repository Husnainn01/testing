@extends('front.customer-newdashboard.layouts.template')
@section('content')
<section class="container-fluid p-3 nav-small-txt border-bottom">
    <ul class="list-unstyled list-inline">
        <li class="list-inline-item text-primary">Dashboard</li>>
        <li class="list-inline-item mx-2">favorites</li>
    </ul>
    <h3 class="fw-medium">Favorites</h3>
</section>
<section class="container-fluid p-3 m-auto my-3">
    <i class="fa-solid fa-car text-primary mb-2"></i> Favorites
  <div class="divider w-100 border-top"></div>
  <div class="row mt-3 gap-1 bg-light p-2">
    <div class="col-lg-2 col-md-4 col-sm-12 position-relative">
        <img src="{{asset('uploads/listing_photos/jeep.jfif')}}" class="w-100" alt="">
        <small class="d-block fw-bold">2018  JEEPWRANGLER</small>
        <small class="d-block">Vehicle Price:</small>
        <small class="d-block">$26,090</small>
        <span class="badge bg-danger position-absolute top-0">X</span>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12 position-relative">
        <img src="{{asset('uploads/listing_photos/jeep.jfif')}}" class="w-100" alt="">
        <small class="d-block fw-bold">2018  JEEPWRANGLER</small>
        <small class="d-block">Vehicle Price:</small>
        <small class="d-block">$26,090</small>
        <span class="badge bg-danger position-absolute top-0">X</span>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12 position-relative">
        <img src="{{asset('uploads/listing_photos/jeep.jfif')}}" class="w-100" alt="">
        <small class="d-block fw-bold">2018  JEEPWRANGLER</small>
        <small class="d-block">Vehicle Price:</small>
        <small class="d-block">$26,090</small>
        <span class="badge bg-danger position-absolute top-0">X</span>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12 position-relative">
        <img src="{{asset('uploads/listing_photos/jeep.jfif')}}" class="w-100" alt="">
        <small class="d-block fw-bold">2018  JEEPWRANGLER</small>
        <small class="d-block">Vehicle Price:</small>
        <small class="d-block">$26,090</small>
        <span class="badge bg-danger position-absolute top-0">X</span>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12 position-relative">
        <img src="{{asset('uploads/listing_photos/jeep.jfif')}}" class="w-100" alt="">
        <small class="d-block fw-bold">2018  JEEPWRANGLER</small>
        <small class="d-block">Vehicle Price:</small>
        <small class="d-block">$26,090</small>
        <span class="badge bg-danger position-absolute top-0">X</span>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12 position-relative">
        <img src="{{asset('uploads/listing_photos/jeep.jfif')}}" class="w-100" alt="">
        <small class="d-block fw-bold">2018  JEEPWRANGLER</small>
        <small class="d-block">Vehicle Price:</small>
        <small class="d-block">$26,090</small>
        <span class="badge bg-danger position-absolute top-0">X</span>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12 position-relative">
        <img src="{{asset('uploads/listing_photos/jeep.jfif')}}" class="w-100" alt="">
        <small class="d-block fw-bold">2018  JEEPWRANGLER</small>
        <small class="d-block">Vehicle Price:</small>
        <small class="d-block">$26,090</small>
        <span class="badge bg-danger position-absolute top-0">X</span>
    </div>
    
  </div>
</section>
{{-- <section class="container-fluid p-3 text-center m-auto my-5">
    <h4>NO ITEM FOUND</h4>
    <p>Browse the stock and enquire/get a quote for the item you like</p>
    <button class="btn btn-primary my-3 px-5 py-2">Browse our stock</button>
    <p>Return to this page to review list of inquired vehicles</p>
</section> --}}
<section class="container-fluid p-3 m-auto my-3">
    <i class="fa-solid fa-car text-primary mb-2"></i> Recommendations for You
  <div class="divider w-100 border-top"></div>
  <div class="row mt-3 gap-1 bg-light p-2">
    <div class="col-lg-2 col-md-4 col-sm-12">
        <img src="{{asset('uploads/listing_photos/jeep.jfif')}}" class="w-100" alt="">
        <small class="d-block fw-bold">2018  JEEPWRANGLER</small>
        <small class="d-block">Vehicle Price:</small>
        <small class="d-block">$26,090</small>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12">
        <img src="{{asset('uploads/listing_photos/jeep.jfif')}}" class="w-100" alt="">
        <small class="d-block fw-bold">2018  JEEPWRANGLER</small>
        <small class="d-block">Vehicle Price:</small>
        <small class="d-block">$26,090</small>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12">
        <img src="{{asset('uploads/listing_photos/jeep.jfif')}}" class="w-100" alt="">
        <small class="d-block fw-bold">2018  JEEPWRANGLER</small>
        <small class="d-block">Vehicle Price:</small>
        <small class="d-block">$26,090</small>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12">
        <img src="{{asset('uploads/listing_photos/jeep.jfif')}}" class="w-100" alt="">
        <small class="d-block fw-bold">2018  JEEPWRANGLER</small>
        <small class="d-block">Vehicle Price:</small>
        <small class="d-block">$26,090</small>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12">
        <img src="{{asset('uploads/listing_photos/jeep.jfif')}}" class="w-100" alt="">
        <small class="d-block fw-bold">2018  JEEPWRANGLER</small>
        <small class="d-block">Vehicle Price:</small>
        <small class="d-block">$26,090</small>
    </div>
  </div>
</section>
@endsection
