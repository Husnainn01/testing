@extends('front.customer-newdashboard.layouts.template')
@section('content')
<section class="container-fluid p-3 nav-small-txt border-bottom">
    <ul class="list-unstyled list-inline">
        <li class="list-inline-item text-primary">Dashboard</li>>
        <li class="list-inline-item mx-2">Account Information</li>

    </ul>
    <h3 class="fw-medium ">Account Information</h3>

</section>
<section class="container-fluid py-4 bg-light">
    <div class="row ">
        <div class="col-lg-12 col-md-12 col-sm-12"><p class="text-center ">Field with a <span class="text-danger">*</span> are required!</p></div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
      <form action="{{ route('update_account_info') }}" method="post" enctype="multipart/form-data" method="post">
          @csrf
          <div class="col-lg-6 col-md-6 col-sm-12 d-block m-auto">
              <p class="text-center fw-bold text-primary">Email : {{ $user->email }}</p>
                <div class="input-group mb-2">
                  <span class="input-group-text">Name</span>
                  <input type="text" aria-label="First name" name="name" value="{{ $user->name }}" class="form-control">
                </div>
                <div class="input-group mb-2">
                  <label class="input-group-text" for="inputGroupSelect01">Country</label>
                  <select name="country" id="country" class="form-select">
                    <option disabled selected>Select Country <span class="text-danger">*</span></option>
                    @foreach($countries as $country)
                        <option @if($user->country === $country->listing_location_name) selected  @endif value="{{ $country->listing_location_name }}">{{ $country->listing_location_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="input-group mb-2">
                  <span class="input-group-text">Phone</span>
                  <input type="text" aria-label="phone" class="form-control" name="phone" value="{{ $user->phone }}">
                </div>
                <div class="input-group mb-2">
                  <span class="input-group-text">Email</span>
                  <input type="text" aria-label="email" class="form-control" name="email" value="{{ $user->email }}">
                </div>
                <div class="input-group mb-2">
                  <span class="input-group-text">Address</span>
                  <input type="text" aria-label="address" class="form-control" name="address" value="{{ $user->address }}">
                </div>
                <div class="input-group mb-2">
                  <span class="input-group-text">City</span>
                  <select id="city" name="city" class="form-select">
                    <option disabled selected>Select City</option>
                    @foreach($cities as $city)
                    <option value="{{  $city->name }}" @if($user->city === $city->name) selected @endif>
                        {{  $city->name }}
                    </option>
                    @endforeach
                </select>
                </div>
                <button class="btn btn-primary m-auto d-block px-5 py-2 mt-3">Save Changes</button>
          </div>
        </form>
    </div>
</section>
@endsection
