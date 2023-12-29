<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>How we devlier</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/animation.css') }}">
</head>

<body>
    <section class="container-fluid p-0">
        <div class="top-image" style="background: url('{{asset('assets/images/number-of-cars.jpg')}}');background-position: center;
        background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="w-75 m-auto d-block text-center">
                        <h4 class="text-white">In order to place orders through our platform, customers are required to
                            first navigate to our website and create an account</h4>
                        {{-- <div class="m-auto d-block pt-4">
                            <a class="btn btn-primary fs-5 w-25 border-0" href="{{route('customer_login')}}" style="background: orangered">Sign</a> <a
                                class="btn btn-primary fs-5 w-25 mx-3 border-0" href="{{route('customer_registration')}}" style="background: orangered">Create an Account</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="main-image" style="background: url('{{asset('assets/images/animation-bg-normal.png')}}')">
            <img src="{{asset('uploads/user_photos/12f21653cf7851e34d2285928d5b2dcc.png')}}" class="position-absolute logo aos-init aos-animate" data-aos="fade-right" style="    top: 33px;
            left: 145px;" width="115" height="100" alt="">

            <div class="route-box first route-1 d-flex align-items-center aos-init aos-animate" data-aos="fade-right"
                data-aos-duration="1000">
                <div class="route">
                    <div class="inner-route">
                        <span><span>SS Japan</span> Route 1</span>
                    </div>
                </div>
                <p>Customers have the choice to acquire <a href="/?page_id=2026&amp;v=24d22e03afb2">stock</a> through
                    direct purchase or by participating in <a href="">auctions</a>, both of which are facilitated
                    by SS Japan</p>
            </div>

            <div class="route-box route-2 d-flex align-items-center aos-init" data-aos="fade-right"
                data-aos-duration="1000">
                <div class="route">
                    <div class="inner-route">
                        <span><span>SS Japan</span> Route 2</span>
                    </div>
                </div>
                <p>If customers opt to purchase from the current stock, discounts and special offers may be available
                    based on the <a href="/?page_id=2026&amp;v=24d22e03afb2">terms of payment</a> and <a
                        href="/?page_id=94&amp;v=24d22e03afb2">volume of the purchase</a></p>
            </div>



            <div class="route-box route-3 d-flex align-items-center aos-init" data-aos="fade-left"
                data-aos-duration="1000">
                <div class="route">
                    <div class="inner-route">
                        <span><span>SS Japan</span> Route 3</span>
                    </div>
                </div>
                <p>All stock units offered by Fathe INC have <a href="/?page_id=97&amp;v=24d22e03afb2">undergone
                        personal inspection</a></p>
            </div>

            <div class="route-box route-3 d-flex align-items-center aos-init" data-aos="fade-left"
                data-aos-duration="1000">
                <div class="route">
                    <div class="inner-route">
                        <span><span>SS Japan</span> Route 3</span>
                    </div>
                </div>
                <p>All stock units offered by Fathe INC have <a href="/?page_id=97&amp;v=24d22e03afb2">undergone
                        personal inspection</a></p>
            </div>

            <div class="route-box route-5 d-flex align-items-center aos-init" data-aos="fade-left"
                data-aos-duration="1000">
                <div class="route">
                    <div class="inner-route">
                        <span><span>SS Japan</span> Route 5</span>
                    </div>
                </div>
                <p>SS Japan also offers <a href="#">Re-Auction</a> services to its customers</p>
            </div>

            <div class="car-check">
                <img data-aos="zoom-out-up" data-aos-duration="1000"
                    src="{{ asset('assets/images/car-check-damage.png') }}" alt="image" class="aos-init aos-animate">
                <img data-aos="zoom-out-down" data-aos-duration="1200"
                    src="{{ asset('assets/images/car-check-inspection.png') }}" alt="image"
                    class="aos-init aos-animate">
                <img data-aos="zoom-out-down" data-aos-duration="1400"
                    src="{{ asset('assets/images/car-check-engine.png') }}" alt="image" class="aos-init aos-animate">
                <img data-aos="zoom-out-up" data-aos-duration="1600"
                    src="{{ asset('assets/images/car-check-emission.png') }}" alt="image"
                    class="aos-init aos-animate">
            </div>

            <div class="box box-6 aos-init aos-animate" data-aos="fade-up-right" data-aos-duration="1000">
                <h4>SS Japan is registered with:</h4>
                <ul>
                    <li>Chamber of Commerce</li>
                    <li>Jasto</li>
                    <li>Trade car view</li>
                    <li>APEC</li>
                </ul>
                <div class="d-flex justify-content-sm-end mt-4 mt-md-0"><a
                        href="{{ route('customer_registration') }}">Register</a></div>
            </div>
            <div class="box box-7 aos-init" data-aos="fade-up-left" data-aos-duration="1000">
                <p>Explore <a href="/?page_id=2026&amp;v=24d22e03afb2">top-quality cars</a> on our website. Our
                    constantly updated inventory ensures you'll find the perfect vehicle. Contact our knowledgeable team
                    with any questions. We're here to help you every step of the way.
                    <a href="#">Thank you for choosing us</a>
                </p>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('front.home') }}" class="me-4">View Cars</a>
                    <a href="{{ route('about') }}">SS Japan Profile</a>
                </div>
            </div>

            <div class="box box-8">
                <h5 data-aos="fade-up-left" data-aos-duration="1000" class="aos-init">SS Japan Customer Registration
                </h5>
                <div data-aos="fade-up-left" data-aos-duration="1000" class="d-flex justify-content-xl-end aos-init"><a
                        href="{{ route('customer_registration') }}">Register</a></div>
                <img data-aos="fade-up" data-aos-duration="1500" src="{{ asset('assets/images/box-8-1.png') }}"
                    alt="image" class="aos-init">
                <img data-aos="fade-up" data-aos-duration="1500" src="{{ asset('assets/images/box-8-2.png') }}"
                    alt="image" class="aos-init">
            </div>
            <div class="box box-9">
                <h5 data-aos="fade-up-right" data-aos-duration="1000" class="aos-init">SS Japan Partners</h5>
                <div data-aos="fade-up-right" data-aos-duration="1000"
                    class="d-flex justify-content-sm-end aos-init"><a href="{{ route('front.home') }}">View
                        Partners</a></div>
                <img data-aos="fade-up" data-aos-duration="1500" src="{{ asset('assets/images/box-9-1.png') }}"
                    alt="image" class="aos-init">
                <img data-aos="fade-up" data-aos-duration="1500" src="{{ asset('assets/images/box-9-2.png') }}"
                    alt="image" class="aos-init">
            </div>
            <div class="back-to-top">
                <a href="#">Back to top <img
                        src="{{ asset('assets/images/animation-arrow-back-rounded.png') }}" alt="arrow top"></a>
            </div>

            <div id="image" style="--maximum: NaNpx; --epoch: 0.0862331575864089;" class="">
                <img class="car" src="{{ asset('assets/images/animation-car.png') }}" alt="car">
                <img class="carrier d-none" src="{{ asset('assets/images/animation-carrier.png') }}" alt="carrier">
            </div>
        </div>





    </section>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/js/animation.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


</body>

</html>
