@extends('front.layouts.app_front')
@section('content')

<section>
    <div class="container-fluid px-md-5 px-lg-5 my-5">
        <div class="row ">

            <!-- left Column -->

          
            <div class="col-md-2 order-2 order-sm-2  order-md-1 first-side">
                
                @include('front.layouts.left_sidebar');

            </div>

            <!-- Middle Column -->

            <div class="col-md-10   order-md-2 order-lg-2 order-sm-1 order-1">
           
                <div class="row">
              
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <h6><a class="text-dark" href="#">Home </a> > <a class="text-dark" href="#">How to buy</a></h6>
                                <h2 class="font-weight-bold my-3">How to buy</h2>
                          
                            </div>
                        </div>
              
                       <div class="row shadow p-3 mx-md-1 mx-lg-1 rounded">
                        <div class="col-md-6 col-lg-6 col-sm-12  my-4">
                            <h4 class="font-weight-bold primary mb-4 text-light px-3 py-2" style="border-radius:30px;">STEP 1: Order</h4>
                          <img class="w-100" src="{{asset('uploads/site_photos/step 1.jpg')}}" alt="buy">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12  my-4">
                           <h5 class="py-4 px-5 my-5" style="background-color: #EBF3FF;border-radius: 35px;">Choose the vehicle you want to purchase. our car search engine will help you search through our inventory.</h5>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12  my-4">
                            <h5 class="py-4 px-5 my-5" style="background-color: #EBF3FF;border-radius: 35px;">YYou can also customize search depending on your requirement and preferences. detailed photos and specifications can be seen for each inventory.
                                </h5>
                         </div>
                         <div class="col-md-6 col-lg-6 col-sm-12  my-4">
              
                            <img class="w-100" src="{{asset('uploads/site_photos/buy now step 2.jpg')}}" alt="buy">
                        </div>
                       </div>

                       <div class="row shadow p-3 mx-md-1 mx-lg-1 rounded my-4">
                        <div class="col-md-6 col-lg-6 col-sm-12  my-4">
                            <h4 class="font-weight-bold primary mb-4 text-light px-3 py-2" style="border-radius:30px;">STEP 2: Buy Now</h4>
                            <img class="w-100" src="{{asset('uploads/site_photos/step 3.jpg')}}" alt="buy">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12  my-4">
                            <h5 class="py-4 px-5 my-5" style="background-color: #EBF3FF;border-radius: 35px;">Set your purchase condition like destination country,destination port and so on.</h5>
                        </div>
                       
                       </div>
                       <div class="row shadow p-3 mx-md-1 mx-lg-1 rounded my-4">
                        <div class="col-md-6 col-lg-6 col-sm-12  my-4">
                            <h4 class="font-weight-bold primary mb-4 text-light px-3 py-2" style="border-radius:30px;">STEP 3: MAKE A PAYMENT</h4>
                            <img class="w-100" src="{{asset('uploads/site_photos/make payment.jpg')}}" alt="buy">
                        </div>
                        <div class="col-md-6 col-lg-S6 col-sm-12  my-4">
                            <h5 class="py-4 px-5 my-5" style="background-color: #EBF3FF;border-radius: 35px;">Bank wire transfer (telegraphic transfer) all customer should send money only to ss japan co,ltd. beneficiary accounts in japan.
                                </h5>
                        </div>
                        <div class="col-md-6 col-lg-S6 col-sm-12  my-4">
                            <h5 class="py-4 px-5 my-5" style="background-color: #EBF3FF;border-radius: 35px;">Paypal payment. ask your sales representative to get invoice for onlypaypal then you will get paypal account address
                                </h5>
                            </div> <div class="col-md-6 col-lg-6 col-sm-12  my-4">
                                
                                <img class="w-100" src="{{asset('uploads/site_photos/how to buy.jpg')}}" alt="buy">
                            </div>
                       
                       </div>
                       <div class="row shadow p-3 mx-md-1 mx-lg-1 rounded my-4">
                        <div class="col-md-6 col-lg-6 col-sm-12  my-4">
                            <h4 class="font-weight-bold primary mb-4 text-light px-3 py-2" style="border-radius:30px;">STEP 4: SHIPMENT</h4>
                            <img class="w-100" src="{{asset('uploads/site_photos/shipment.jpg')}}" alt="buy">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12  my-4">
                            <h5 class="py-4 px-5 my-5" style="background-color: #EBF3FF;border-radius: 35px;">TRACK YOUR SHIPMENT</h5>
                        </div>
                       
                       </div>
                       <div class="row shadow p-3 mx-md-1 mx-lg-1 rounded my-4">
                        <div class="col-md-6 col-lg-6 col-sm-12  my-4">
                            <h4 class="font-weight-bold primary mb-4 text-light px-3 py-2" style="border-radius:30px;">STEP 5: CUSTOM CLEARANCE</h4>
                            <img class="w-100" src="{{asset('uploads/site_photos/custom clearance.jpg')}}" alt="buy">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12  my-4">
                            <h5 class="py-4 px-5 my-5" style="background-color: #EBF3FF;border-radius: 35px;">COMPLETE CUSTOM CLEARANCE AND ENJOY YOUR NEW VEHICLE</h5>
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