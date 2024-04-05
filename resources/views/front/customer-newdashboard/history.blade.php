@extends('front.customer-newdashboard.layouts.template')
@section('content')
<section class="container-fluid p-3 nav-small-txt border-bottom">
    <ul class="list-unstyled list-inline">
        <li class="list-inline-item text-primary">Dashboard</li>>
        <li class="list-inline-item mx-2">History</li>

    </ul>


</section>
<section class="container-fluid py-4 bg-light">
    <div class="row ">

        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <div class=" text-center">
                <i class="fa-solid fa-clock-rotate-left display-1  text-primary "></i></div>
            </div>
        <div class="col-lg-12 col-md-12 col-sm-12 text-center mt-3"><h4>Downloda History</h4>
        <p class="mb-0">the history contain overall</p>
        <p class="mb-0">activities of the user</p>
        <p class="mb-0">Download from below button</p>

        </div>
        <div class="col-12"><button class="m-auto d-block mt-4 btn btn-primary py-2 px-5">Download History</button></div>
    </div>
</section>
@endsection
