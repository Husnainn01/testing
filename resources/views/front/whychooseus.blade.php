@extends('front.layouts.app_front')
@section('content')
    

<section>
    <div class="container-fluid px-md-5 px-lg-5 my-5">
        <div class="row ">

            <!-- left Column -->

          
            <div class="col-md-2 order-2 order-sm-2  order-md-1 first-side">
             @include('front.layouts.left_sidebar')

            </div>

            <!-- Middle Column -->

            <div class="col-md-10   order-md-2 order-lg-2 order-sm-1 order-1 whychoose">
           
                <div class="row">
              
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <h6><a class="text-dark" href="#">Home </a> > <a class="text-dark" href="#">Why Choose Us</a></h6>
                                <h2 class="font-weight-bold my-3">Why Choose Us</h2>
                                <h3 class="orange font-weight-bold">Reason Why Our Customer Choose SS Japan?</h3>
                            </div>
                        </div>
              
                       <div class="row">
                        <div class="col-md-1 col-lg-1 p-0 mt-3"><img src="assets/images/choose-icon1.svg" class="w-100" alt=""></div>
                        <div class="col-md-10 col-lg-10 pt-3">
                            <h5 class="font-weight-bold">No.1 Used Car Exporter</h5>
                            <p>More than decade in business, exported over 500,000 vehicles to more than 152
                                countries.
                                </p>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-1 col-lg-1 p-0"><img src="assets/images/choose-icon2.svg" class="w-100" alt=""></div>
                        <div class="col-md-10 col-lg-10 ">
                            <h5 class="font-weight-bold">Customer Satisfaction</h5>
                            <p>80% of our customers repeat purchase, trusted by worldwide automobile dealers.</p>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-1 col-lg-1 p-0"><img src="assets/images/choose-icon3.svg" class="w-100" alt=""></div>
                        <div class="col-md-10 col-lg-10 ">
                            <h5 class="font-weight-bold">Best Price</h5>
                            <p>We oer large selection of low-priced vehicles, best prices gurantee in shipment,
                                clearance and more.</p>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-1 col-lg-1 p-0 "><img src="assets/images/choose-icon4.svg" class="w-100" alt=""></div>
                        <div class="col-md-10 col-lg-10 ">
                            <h5 class="font-weight-bold">Uncompromised Quality
                            </h5>
                            <p>We do a thorough inspection before shipping, so only quality is delivered to you.</p>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-1 col-lg-1 p-0 "><img src="assets/images/choose-icon5.svg" class="w-100" alt=""></div>
                        <div class="col-md-10 col-lg-10 ">
                            <h5 class="font-weight-bold">Wide Range Of Cars
                            </h5>
                            <p>We’ve vehicles of all the brands you desire.
                            </p>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-1 col-lg-1 p-0 "><img src="assets/images/choose-icon6.svg" class="w-100" alt=""></div>
                        <div class="col-md-10 col-lg-10 ">
                            <h5 class="font-weight-bold">24x7, 365 Days Support
                            </h5>
                            <p>Our support team are always connected with customers 24/7</p>
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