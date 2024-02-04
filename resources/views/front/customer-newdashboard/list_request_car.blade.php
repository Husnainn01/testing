@extends('front.customer-newdashboard.layouts.template')
@section('content')
<section class="container-fluid p-3 nav-small-txt border-bottom">
    <ul class="list-unstyled list-inline">
        <li class="list-inline-item text-primary">Dashboard</li>
        <li class="list-inline-item mx-2">Request Car</li>
    </ul>
    <h3 class="fw-medium">Requested Cars <i class="fa-solid fa-car-side text-primary"></i></h3>
</section>

<section class="container mt-3">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Car Name</th>
                        <th scope="col">Car Model</th>
                        <th scope="col">Year</th>
                        <th scope="col">Mileage</th>
                        <th scope="col">Engine</th>
                        <th scope="col">Transmission</th>
                    </tr>
                </thead>
                <tbody>
                @if($requestedCars == null)
                    <tr>
                        <td colspan="7" class="text-center">No requested cars found.</td>
                    </tr>
                @else
                    @foreach($requestedCars as $index => $car)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $car->car_name }}</td>
                            <td>{{ $car->car_model }}</td>
                            <td>{{ $car->year }}</td>
                            <td>{{ $car->mileage }}</td>
                            <td>{{ $car->engine }}</td>
                            <td>{{ $car->transmission }}</td>
                        </tr>
                        @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
