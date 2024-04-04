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
              
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <h6><a class="text-dark" href="#">Home </a> > <a class="text-dark" href="#">Export Information</a></h6>
                                <h2 class="font-weight-bold my-3">Export Information</h2>
                          
                            </div>
                        </div>
              
                       <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <ul class="list-unstyled">
                                <li><h5 class="font-weight-bold"><i class="fas fa-caret-down fa-rotate-270 orange mr-2"></i>Standard Terms of Trade:</h5 class="font-weight-bold"><p class="pl-4 py-2">Unless otherwise stated, a vehicle is reserved for three (3) business days. Minimum 50% payment will be required
                                    Vehicle is reserved for three (3) business days. Minimum 50% payment will be required within the reservation period. Failure to do so will lead to automatic cancellation of the order and same vehicle cannot be reserved twice. Shipping procedure will begin once we receive your security deposit which is agreed by the customer and the Company. As soon as we receive full payment, we will send you all the documents by courier DHL service on your registered address. Scanned TT copy will be required after payment in order to avoid any delay of shipping or document preparation, but documents will only be dispatch once TT is received in our company account in Japan.</p></li>
                            </ul>
                            <h3 class="orange font-weight-bold my-4">Shipping Terms</h3>
                            <ul class="list-unstyled">
                                <li><h5 class="font-weight-bold"><i class="fas fa-caret-down fa-rotate-270 orange mr-2"></i>FOB: Free - On - Board:</h5 class="font-weight-bold"><p class="pl-4 py-2">This is the cost of the vehicle excluding ocean freight. If you buy the vehicle at FOB price, the price only includes the cost of the vehicle and the expenses until loading on the ship in Japan.
                                    </p></li>
                                    <li><h5 class="font-weight-bold"><i class="fas fa-caret-down fa-rotate-270 orange mr-2"></i>CFR: Cost and Freight.
                                        CIF: Cost, Insurance and Freight.
                                        </h5 class="font-weight-bold"><p class="pl-4 py-2">This is the cost of the vehicle including all expenses caused in Japan and during ocean freight. If you need an insurance for the vehicle, please ask for our assistance. Additional cost will be charged if insurance is required which depends on regions and vehicle invoice cost.
                                        </p></li>
                                        <li><h5 class="font-weight-bold"><i class="fas fa-caret-down fa-rotate-270 orange mr-2"></i>T.T: Telegraphic Transfer / Wire Transfer:

                                            </h5 class="font-weight-bold"><p class="pl-4 py-2">This is the best way of payment. It is the fastest, safest and most eective mode of sending money. You can
                                                transfer money by Telegraphic Transfer at most of the major banks.
                                            </p></li>
                                            <li><h5 class="font-weight-bold"><i class="fas fa-caret-down fa-rotate-270 orange mr-2"></i>L/C: Letter of Credit:

                                            </h5 class="font-weight-bold"><p class="pl-4 py-2">We receive Letters of Credit at sight for selected countries. Please contact your nearest bank about the
                                                document
                                            </p></li>
                                            <li><h5 class="font-weight-bold"><i class="fas fa-caret-down fa-rotate-270 orange mr-2"></i>Electronic payment:

                                            </h5 class="font-weight-bold"><p class="pl-4 py-2">We receive Letters of Credit at sight for selected countries. Please contact your nearest bank about the document.
                                            </p></li>
                            </ul>
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