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
            <form action="{{ route('requested_car_store') }}" method="POST" class="border p-5">
                @csrf

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <label for="car-name" class="form-label">Car Name *</label>
                        <input type="text" required class="form-control rounded-3" id="car-name" name="car_name" required>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <label for="car-model" class="form-label">Car Model *</label>
                        <input type="text" required class="form-control rounded-3" id="car-model" name="model" required>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12 mt-1">
                        <label for="year" class="form-label">Year *</label>
                        <input type="text" required required class="form-control rounded-3" id="year" name="year" required>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12 mt-1">
                        <label for="mileage" class="form-label">Mileage</label>
                        <input type="text" required class="form-control rounded-3" id="mileage" name="mileage" required>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12 mt-1">
                        <label for="engine" class="form-label">Engine *</label>
                        <input type="text" required class="form-control rounded-3" id="engine" name="engine" required>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12 mt-1">
                        <label for="transmission" class="form-label">Transmission *</label>
                        <input type="text" required class="form-control rounded-3" id="transmission" name="transmission" required>
                    </div>

                    <div class="col-lg-12 col-md-12 col-12 mt-1">
                        <button class="btn btn-primary m-auto d-block px-5 py-2 mt-3" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
