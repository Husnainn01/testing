@extends('front.layouts.app_front')
@section('content')

<section>
    <div class="container-fluid px-5 my-5">
        <div class="row ">

            <!-- left Column -->


            <div class="col-md-2 order-2 order-sm-2  order-md-1 first-side">
                @include('front.layouts.left_sidebar')

            </div>

            <!-- Middle Column -->

            <div class="col-md-10   order-md-2 order-lg-2 order-sm-1 order-1">

                <div class="row">
                    <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                            <h6>Home > About Us > Security Export Control</h6></div>
                        </div>
                    @include('front.layouts.about_leftsidebar')
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <h2>Security Export Control</h2>
                            </div>
                        </div>

                   <div class="row">
                    <div class="col-md-12">
                    <p>Any applicable national and international laws,norms and regulations relating to contributing to the maintenace of international peace and security, as well as anti-terrosim, including all aplicable export controls,must be followed by ss Japan . Any transaction againest this is hereby prohibited</p>
                    </div>
                   </div>
                    </div>

                </div>
            </div>


            <!-- Right Column -->



        </div>
    </div>


</section>
@endsection
