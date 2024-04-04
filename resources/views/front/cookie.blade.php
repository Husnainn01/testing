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

            <div class="col-md-10   order-md-2 order-lg-2 order-sm-1 order-1">
           
                <div class="row">
                    <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                        	<h6><a href="{{route('front.home')}}" class="text-dark"> Home </a> > About Us > <a>Cookie Policy</a></h6></div>    
                        </div>
                       @include('front.layouts.about_leftsidebar')
                    </div>    
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <h2>Cookie Policy</h2>
                            </div>
                        </div>
              
                   <div class="row">
                    <div class="col-md-12">
                    <p>We use cookies to differentiate you from other website users and to provide you a personalized browsing experince.We use cookies so that our website remembers what you've done while browsing,such as your log-in details or how far you've gotten with a purchase</p>
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