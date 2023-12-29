@extends('front.customer-newdashboard.layouts.template')
@section('content')
<section class="container-fluid p-3 nav-small-txt border-bottom">
    <ul class="list-unstyled list-inline">
        <li class="list-inline-item text-primary">Dashboard</li>>
        <li class="list-inline-item mx-2">Request Car</li>

    </ul>
    <h3 class="fw-medium">Fill Form for Request Car <i class="fa-solid fa-car-side text-primary"></i></h3>

</section>
<section class="container mt-3">
    <div class="row">
        <div class="col-12"></div>
        <div class="col-12">
            <form action="" class="border p-5">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <label for="car-name">Car Name</label>
                        <input type="text" class="form-control rounded-3" id="car-name">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <label for="car-name">Car Model</label>
                        <input type="text" class="form-control rounded-3" id="car-name">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-1">
                        <label for="car-name">Year</label>
                        <input type="text" class="form-control rounded-3" id="car-name">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12  mt-1">
                        <label for="car-name">Mileage</label>
                        <input type="text" class="form-control rounded-3" id="car-name">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12  mt-1">
                        <label for="car-name">Engine</label>
                        <input type="text" class="form-control rounded-3" id="car-name">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12  mt-1">
                        <label for="car-name">Trans</label>
                        <input type="text" class="form-control rounded-3" id="car-name">
                    </div>
                    <div class="col-lg-12 col-md-12 col-12  mt-1">
                       <button class="btn btn-primary m-auto d-block px-5 py-2 mt-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
