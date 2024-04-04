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
                                <h6><a class="text-dark" href="#">Home </a> > <a class="text-dark" href="#">How to pay</a></h6>
                                <h2 class="font-weight-bold my-3">How to pay?</h2>
                                <h3 class="orange font-weight-bold">We are currently accepting the following payment methods:
                                </h3>
                            </div>
                        </div>

                       <div class="row">
                        <div class="col-md-2 col-lg-2  mt-3"><img src="{{asset('assets/images/bank-transfer-logo.svg')}}" class="w-75 shadow p-3 rounded" alt=""></div>
                        <div class="col-md-10 col-lg-10 pt-md-3 pt-lg-3">
                            <h5 class="font-weight-bold pt-md-4 pt-lg-4">Pay with Bank Transfer</h5>
                            <h6>Japanese Yen Account</h6>
                            <small><ul class="list-unstyled">
                                <li>Bank Name: Mitsubishi UFJ Bank</li>
                                <li>SWIFT Code: BOTKJPJT</li>
                                <li>Branch Name: Nagoya Ekimae Branch / 221</li>
                                <li>Branch Address: 3-28-12, Meieki, Nakamura-ku Nagoya city, Aichi-ken, Japan</li>
                                <li>Account Type: Ordinary / Futsu</li>
                                <li>Account Number: 0474484</li>
                                <li>Account Name: SS Japan Limited</li>
                            </ul>
                        </small>
                        <h6>Us Dollar Account</h6>
                        <small><ul class="list-unstyled">
                            <li>Bank Name: Mitsubishi UFJ Bank</li>
                            <li>SWIFT Code: BOTKJPJT</li>
                            <li>Branch Name: Nagoya Ekimae Branch / 221</li>
                            <li>Branch Address: 3-28-12, Meieki, Nakamura-ku Nagoya city, Aichi-ken, Japan</li>
                            <li>Account Type: Dollar</li>
                            <li>Account Number: 0474484</li>
                            <li>Account Name: SS Japan Limited</li>
                        </ul>
                    </small>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-2 col-lg-2 mt-2"><img src="{{asset('assets/images/debit.png')}}" class="w-75 shadow p-3 rounded" alt=""></div>
                        <div class="col-md-10 col-lg-10 pt-md-3 pt-lg-3 ">
                            <h5 class="font-weight-bold pt-md-4 pt-lg-4">Pay With Credit / Debit Card</h5>
                            <p>Pay surely with your credit / debit card. We accept Visa and Mastercard.</p>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-2 col-lg-2 mt-3 mt-2"><img src="{{asset('assets/images/paypal-new-20232814.logowik.com.webp')}}" class="w-75 p-3 shadow rounded" alt=""></div>
                        <div class="col-md-10 col-lg-10 pt-md-3 pt-lg-3">
                            <h5 class="font-weight-bold pt-md-4 pt-lg-4">Pay With PayPal</h5>
                            <p>Pay online with PayPal. PayPal accepts MasterCard, Visa, American Express and Disco</p>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-2 col-lg-2  mt-4"><img src="{{asset('assets/images/FDH-Bank-Logo.jpg')}}" class="w-75 shadow p-3  rounded" alt=""></div>
                        <div class="col-md-10 col-lg-10 pt-md-3 pt-lg-3">
                            <h5 class="font-weight-bold pt-md-4 pt-lg-4">Pay At FDH Bank
                            </h5>
                            <p>Bring the performa invoice and ID at any convenient FDH Bank branch.
                            </p>
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
