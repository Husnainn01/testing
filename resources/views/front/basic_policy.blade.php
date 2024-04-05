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
                            <h6><a href="{{route('front.home')}}" class="text-dark"> Home </a> > About Us > Basic Policy Against Anti Special Forces</h6></div>    
                        </div>
                       @include('front.layouts.about_leftsidebar')
                    </div>    
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <h2 class="font-weight-bold">Basic Policy Against Anti Special Forces</h2>
                            </div>
                        </div>
              
                   <div class="row">
                    <div class="col-md-12">
                  <h5 class="text-danger font-weight-bold my-3">ss Japan declares the following core policy to prevent harm
                    caused by groups or individuals (dubbed "Anti-Social
                    Forces (ASF)") who seek economic gain through the use
                    of violence, coercion, and deception.
                    </h5>
                    <ul class="px-3 policy-list">
                        <li>We will deal with ASF as an organization and safeguard the
                            safety of our employees who must cope with ASF's outrageous
                            demands</li>
                            <li>We will end all ties with ASF, including any business partnerships,
                                and our employees will strive tirelessly to achieve this goal.
                                </li>
                                <li>We shall never provide favors to ASF or engage in illicit dealings
                                    with them.
                                    </li>
                                    <li>f we detect any inappropriate demands from ASF, we will
                                        respond by pursuing civil and criminal legal action against them.
                                        </li>
                                        <li>We will work closely with the police department, lawyers, and
                                            other specialist authorities to eliminate ASF and avoid damage
                                            caused by it</li>
                                            <li>We don't give money to anti-social groups or engage in any
                                                illegal activities.</li>
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