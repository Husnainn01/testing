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
                            <h6><a href="{{route('front.home')}}" class="text-dark"> Home </a> > About Us > Company Profile</h6></div>    
                        </div>
                        @include('front.layouts.about_leftsidebar')
                    </div>    
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <h2>CSR-Policy</h2>
                            </div>
                        </div>
              
                       <div class="row">
                        <div class="col-md-1 col-lg-1 p-0 mt-3"><img src="assets/images/csr-icon1.svg" class="w-100" alt=""></div>
                        <div class="col-md-10 col-lg-10 pt-3">
                            <h5 class="font-weight-bold">To Our Valued Customers</h5>
                            <p>We will constantly keep the client in mind, seek to provide services that satisfy our customers expection, and strive to contribute to the growth of our customer and their business</p>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-1 col-lg-1 p-0 "><img src="assets/images/csr-icon1.svg" class="w-100" alt=""></div>
                        <div class="col-md-10 col-lg-10 ">
                            <h5 class="font-weight-bold">For Our Business Partners</h5>
                            <p>We will abide by all applicable rules and regulations, strive for free,fair,and transport transections,build trusting partnerships, and purse mututal development</p>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-1 col-lg-1 p-0"><img src="assets/images/csr-icon1.svg" class="w-100" alt=""></div>
                        <div class="col-md-10 col-lg-10 ">
                            <h5 class="font-weight-bold">To Soceity</h5>
                            <p>We will fully consider the significance, role and responsibilities of a golobal company in our business activites, actively commit to the international community and local communities, and strive for support and assistance activities appropriate for a japanese company through a business activies</p>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-1 col-lg-1 p-0 "><img src="assets/images/csr-icon1.svg" class="w-100" alt=""></div>
                        <div class="col-md-10 col-lg-10 ">
                            <h5 class="font-weight-bold">For Employees</h5>
                            <p>We will encourage self employees self-realization via work, take pleasure in being a business person who contributes to the international soceity and seek to achieve the happiness of employess and their families, in addtion to complying with labour-related laws and regulations</p>
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