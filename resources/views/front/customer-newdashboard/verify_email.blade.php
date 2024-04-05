@extends('front.customer-newdashboard.layouts.template')
@section('content')
<section class="container-fluid p-3 nav-small-txt border-bottom">
    <ul class="list-unstyled list-inline">
        <li class="list-inline-item text-primary">Dashboard</li>>
        <li class="list-inline-item mx-2">Verify your email address</li>

    </ul>


</section>
<section class="container-fluid py-4 bg-light">
    <div class="row ">
        <div class="col-lg-12 col-md-12 col-sm-12"><p class="text-center ">One More Step!</p></div>
        <div class="col-lg-3 col-md-3 col-sm-12"><img src="{{asset('assets/resend_email (1).png')}}" class="ms-auto d-block" alt=""></div>
        <div class="col-lg-9 col-md-9 col-sm-12"><h4>Verify your Email Address to GET POINTS!</h4>
        <p class="mb-0">and access all of BE FORWARD's features.</p>
        <p class="mb-0">Verification email was sent to</p>
        <p class="mb-0">Kevin@gmail.com</p>
        <p class="mb-0">Open the email and click the verification link.</p>
        <p class="mb-0">The link is valid for <strong>72 hours.</strong></p>
        <p>(It may be automatically sorted to the junk mail folder or trash box, so please check it once if you cannot find the email.)</p>
        </div>
        <div class="col-12"><button class="m-auto d-block btn btn-primary py-2 px-5">Resend Email Verification</button></div>
    </div>
</section>
@endsection
