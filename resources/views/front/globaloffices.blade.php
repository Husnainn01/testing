@extends('front.layouts.app_front')

@section('content') 
<section>
    @php
        $g_settings=\App\Models\GeneralSetting::where('id',1)->first();
    @endphp
    <div class="container-fluid px-md-5 px-lg-5 my-5">
        <div class="row ">

            <!-- left Column -->

          
            <div class="col-md-2 order-2 order-sm-2  order-md-1 first-side">
                
                @include('front.layouts.left_sidebar');

            </div>

            <!-- Middle Column -->

            <div class="col-md-10   order-md-2 order-lg-2 order-sm-1 order-1">
           
                <div class="row">
                    <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                            <h6><a href="{{route('front.home')}}" class="text-dark"> Home </a>> About Us > Global Offices</h6></div>    
                        </div>
                       @include('front.layouts.about_leftsidebar')
                    </div>    
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <h2 class="font-weight-bold">Global Offices</h2>
                            </div>
                        </div>
              
                   <div class="row p-3 " id="officesrow" style="background-color: #F2F8FF;">
                    <div class="col-md-3">
                        <img src="assets/images/default-address.png" class="w-100" alt="">
                    </div>
                    <div class="col-md-8">
                      <h5><i class="fas fa-circle mr-2" style="color:#ff5500;"></i>Head Office</h5>
                        <p>S1-1506, Nishifukuda, Minato-ku, Nagoya city, Aichi-ken, Japan 455-0874.</p>
                    </div>
                    <div class="col-md-1"><i class="fas fa-caret-down rotate"></i></div>
                   </div>
                   <div class="row my-3 hide" id="content">
                    <!--<div class="col-md-6 col-lg-6 col-sm-12 col-12"><img src="assets/images/default-address.png" class="w-100" alt=""></div>-->
                    <!--<div class="col-md-6 col-lg-6 col-sm-12 col-12"><img src="assets/images/default-address.png" class="w-100" alt=""></div>-->
                    <div class="col-md-3 "><h4 class="orange">Office hours</h4>
                    <h6>Mon-Sat : 10:00 Am - 07:00 PM</h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-12 col-12 "><h4 class="orange">Address</h4>
                    <h6 class="w-100">S1-1506, Nishifukuda, Minato-ku, Nagoya city, Aichi-ken, Japan 455-0874</h6>
                        <!--<h6><a href="#"  style="color:#003580;">View on Google Map</a></h6>-->
                </div>

                    <div class="col-md-3 col-lg-3 col-sm-12 col-12 "><h4 >Contact Details</h4>
                    <h6>Tel: {{$g_settings->top_phone}}</h6>
                    <h6>Fax: +81-52-387-9773</h6>
                    <h6>Email:<a href="mailto:info@ss Japanjapan.com" class="text-dark "> {{$g_settings->top_email}}</a></h6>
                    <h6>Whatsapp No: <a href="api" class="text-dark">+81-52-387-9772</a></h6>
                    <h6>Mon-Sat : 10:00 Am - 07:00 PM</h6>



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