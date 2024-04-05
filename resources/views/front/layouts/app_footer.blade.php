<footer class="primary myfooter" class="py-5">
	@php $brands=\App\Models\ListingBrand::all();
	$about=\App\Models\GeneralSetting::where('id','1')->first();
	$social_media_items=\App\Models\SocialMediaItem::all();
	$locations=\App\Models\ListingLocation::all();
	$g_settings=\App\Models\GeneralSetting::where('id',1)->first();
	$currency=\App\Models\Currency::all();
    $type=\App\Models\Listing::pluck('listing_body')->unique();
    $category= \App\Models\Category::all();

	@endphp
	<div class="container-fluid footer-pad pt-4">
		<div class="row text-light">
            <div class="w-60">
                <div class="row">
                <h5 class="mb-3 pb-3 border-bottom border-3 border-white w-75">In Stock</h5>
            <div class="w-30">
				<h6 class="mb-3">By Country</h4>
                    <div class="brands-list">
                        <div class="row mx-2 brands-box">
                            <ul class="list-unstyled">
                                @foreach ($locations as $item)
                                <li class="my-2 "><a class="brands-box" href="{{route('location_find',['slug'=>$item->listing_location_slug])}}"><p>
                                    {{-- <img src="assets/images/flags/AO.svg" class="flag" alt=""> --}}
                                    <img class="mr-2" src="{{asset('uploads/listing_location_photos/'.$item->listing_location_photo)}}" height="20" width="30">{{$item->listing_location_name}}</p></a></li>

                                @endforeach



                            </ul>
                        </div>
                     </div>

			</div>
			<div class="w-30">
				<h6 class="mb-3">By Maker</h4>
                    <div class="brands-list">
                        <div class="row mx-2 brands-box">
                            <ul class="list-unstyled">
                                @foreach ($brands as $brandsitems)
                                <li>
                                    <a class="brands-box" href="{{ route('brandsfilter',['slug'=>$brandsitems->listing_brand_slug])}}"><p><img src="{{asset('uploads/listing_brand_photos/'.$brandsitems->listing_brand_photo)}}" height="20" width="30" alt="car" class="mr-2">{{$brandsitems->listing_brand_name}} </p></a></li>

                                @endforeach



                            </ul>
                        </div>
                     </div>

			</div>


    <div class="w-30">
        <h6 class="mb-3">By Category</h4>
            <ul class="list-unstyled">
                @foreach ($category as $item)
                <li class="mt-3"><a class="text-decoration-none" href="{{route('category',['slug'=>$item->category_slug])}}"><small>{{$item->category_name}}</small></a></li>
                @endforeach
            </ul>

    </div>
</div>
</div>



    <div class="w-20">
        <h5 class="mb-3 pb-3 border-bottom border-3 border-white w-75">Need Help</h5>
            <ul class="list-unstyled">
                <li class="mb-1"><a href="{{route('why_choose_us')}}">Why Choose SS Japan</a></li>
                <li class="mb-1"><a href="{{route('how_to_buy')}}">How to buy</a></li>
                <li class="mb-1"><a href="{{route('how_to_pay')}}">How to pay</a></li>
                <li class="mb-1"><a href="{{route('faqs')}}">FAQS</a></li>
                <li class="mb-1"><a href="{{route('export_information')}}">Export Information</a></li>
            </ul>
            <h5 class="mb-3 pb-3 border-bottom border-3 border-white w-75">Auction</h5>
            <ul class="list-unstyled">
                <li class="mb-1"><a href="{{route('customer_login')}}">Login</a></li>
                <li class="mb-1"><a href="{{route('customer_registration')}}">Register</a></li>

            </ul>
            <h5 class="mb-3 pb-3 border-bottom border-3 border-white w-75">The Company</h5>
            <ul class="list-unstyled">
                <li class="mb-1"><a href="{{route('about')}}">About Us</a></li>
                <li class="mb-1"><a href="{{route('csr_policycsr_policy')}}">CSR-Policy</a></li>
                <li class="mb-1"><a href="{{route('global_offices')}}">Global Offices</a></li>
                    <li class="mb-1"><a href="{{route('contact')}}">Contact Us</a></li>


            </ul>

    </div>

            <div class="w-20">
				<div class="col-md-12 col-sm-12 col-lg-12">
                    <h5 class="mb-3 border-bottom border-white pb-3">Payment Method</h4>
                        <ul class="list-unstyled">
                            <li><img src="{{asset('assets/images/visa (1).png')}}" class="paymentsmall" alt=""><img src="{{asset('assets/images/paypal (1).png')}}" class="paymentsmall mx-1" alt=""><img src="{{asset('assets/images/mastercard (1).png')}}" class="paymentsmall" alt=""></li>
                        </ul>
                        <h5 class="mb-3 pb-3 border-bottom border-3 border-white w-75">Contact Us</h5>
                    <ul class="list-unstyled">
						<li class="mb-1"><a href="tel:{{$about->top_phone}}">Tel: {{$about->top_phone}}</a></li>

						<li class="mb-1"><a href="mailto:{{$about->top_email}}">Email: {{$about->top_email}}</a></li>
                            <li class="socialicons"><p class="mr-3">Follow Us:
                                @foreach ($social_media_items as $items)
                                <a href="{{$items->social_url}}"><i class="{{$items->social_icon}} social-icon"></i></a>
                                @endforeach
                            </li>
					</ul>
					<a href="{{route('front.home')}}"><img src="{{asset('uploads/site_photos/'.$g_settings->logo)}}" alt="" class=" d-block w-75 logo"></a>
				 </div>
				<h6 class="mb-3 text-start mt-3">Header Quarter</h4>

					<ul class="list-unstyled text-start">
						<li><p >Address: {{$about->footer_address}}</p></a></li>




					</ul>
			</div>
		</div>
	</div>
	<div class="container-fluid border-top">
		<div class="container">
			<div class="row">

				<div class="col-md-6">

					{{-- <div class="dropdown float-md-right float-lg-right float-sm-left float-left border w-25 my-4">
						<div class="dropdown-menu footer-drop1" aria-labelledby="dropdownMenuButton">
							@foreach ($locations as $locationitems)
							<a class="dropdown-item border-bottom">{{$locationitems->listing_location_name}}</a>

							@endforeach

						  </div>
						<div class="bg-transparent text-light mx-1 py-1  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						   {{-- <span><img src="assets/images/flags/BI.svg" class="footer-flag "></span>Italy --}}
						{{--   Language
						</div>

					  </div> --}}

					{{-- <div class="dropdown float-md-right float-lg-right float-sm-left float-left border  mx-3 my-4">
						<div class="dropdown-menu footer-drop" aria-labelledby="dropdownMenuButton">
							@foreach ($currency as $currencyitems)
							<a class="dropdown-item border-bottom" href="#">{{$currencyitems->symbol}} {{$currencyitems->name}}</a>
							@endforeach


						  </div>
						<button class="border-0 bg-transparent my-1 text-light  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Currnecy
						</button>

					  </div> --}}


				</div>
			</div>
		</div>

	</div>
	{{-- <div class="container-fluid py-1" style="background-color: #ECECED;">
		<div class="container">
			<div class="row text-dark"> <div class="col-md-3"><button class="bg-dark text-light">DMCA</button><button class="bg-dark text-light">PROECTED</button></div>
			<div class="col-md-5"><small>{{$about->footer_copyright}}</small> </div>
			<div class="col-md-12 text-center"><small>Privacy Policy | Terms & Condition | Cookies</small></div>
</div>


		</div>
	</div> --}}
	 <div class="container-fluid text-light">
        <div class="row border-bottom border-white py-1" style="background-color:gray;color:white;" >
           <div class="col-md-12 text-center"><small class="text-center">2023 SS-Japan. All right reserved:<a href="{{route('privacy_policy')}}">Privacy Policy</a> | <a href="{{route('terms_services')}}">Terms & Condition</a> | <a href="{{route('cookiecookie')}}">Cookies</a></small></div>
            </div>
        </div>
</footer>
