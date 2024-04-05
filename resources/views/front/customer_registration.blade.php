@extends('front.layouts.app_front')
@section('content')
@php
$g_setting = \App\Models\GeneralSetting::where('id',1)->first();
@endphp
<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-sm-12 col-lg-6 order-2 order-sm-2 order-md-1 order-lg-1">
				<div class="py-5 text-center">
					<img src="{{asset('uploads/site_photos/'.$g_setting->logo)}}" class="w-25 my-3" alt="logo">
					<h4 class="font-weight-bold">Why SS Japan?</h4>
					<p class="w-50 d-block m-auto">More than Decade in Business, Exported over 500,000 vehicles to more
						than 152 countries</p>
					@if(session('success'))
					<div class="alert alert-success">
						{{ session('success') }}
					</div>
					@endif

					@if(session('error'))
					<div class="alert alert-danger">
						{{ session('error') }}
					</div>
					@endif
				</div>
				<div class="py-5 px-5 mx-5 mob-full-width w-75 d-block m-auto">
					<h5 class="font-weight-bold mb-3">How Can We Help?</h5>
					<ul class="helplist">
						<li><small>Regisration is 100% free, no credit card required, no hidden fees.</small></li>
						<li><small>Negotiate with sales representative!</small></li>
						<li><small>My Account available!</small></li>
						<li><small>Receive Latest Inventory list and news!</small></li>
						<li><small>Enter into a valuable campagin!</small></li>
					</ul>
				</div>
			</div>
			<div class="col-md-6 col-sm-12 col-lg-6 shadow order-1 order-sm-1 order-lg-2 order-md-2"
				style="background-color: #F8F8F8;">
				<div class="py-5 text-center">
					<h4 class="font-weight-bold">Sign Up Now!</h4>
					<p class="mb-4">Create account to access userfull features</p>
					<div class="form">
						<form action="{{ route('customer_registration_store') }}" method="post"
							class="w-60 d-block mob-full-width m-auto px-5 py-4 shadow myform rounded">
							@csrf
							<h5 class="font-weight-bold">Enter your details</h5>
							<div>
								<div class="row mt-4">
									<div class="col-md-12 col-sm-12 col-lg-12 px-1">
										<input type="text" required class="w-100" name="name" placeholder="Enter Name">
										@error("name")
										<span class="text-start" style="color:red">{{$message}}</span>
										@enderror
									</div>

									<div class="col-md-12 col-sm-12 col-lg-12 px-1">
										<input type="text" required class="w-100 mt-3" name="company_name"
											placeholder="Enter Company Name">
										@error("company_name")
										<span class="text-start" style="color:red">{{$message}}</span>
										@enderror
									</div>

									<div class="col-md-12 col-sm-12 col-lg-12 px-1">
										<input type="email" required class="w-100 mt-3" name="email"
											placeholder="Enter Email">
										@error("email")
										<span class="text-start" style="color:red">{{$message}}</span>
										@enderror
									</div>
									
									<div class="col-md-12 col-sm-12 col-lg-12 px-1">
										<input type="number" required class="w-100 mt-3" name="phone"
											placeholder="Enter Phone">
									</div>
									@error("phone")
									<span class="text-start" style="color:red">{{$message}}</span>
									@enderror
									<div class="col-md-12 col-sm-12 col-lg-12 px-1">
										<input type="text" class="w-100 mt-3" name="country"
											placeholder="Enter Country">
									</div>
									<div class="col-md-12 col-sm-12 col-lg-12 px-1">
										<input type="text" class="w-100 mt-3" name="address"
											placeholder="Enter Address">
									</div>
									<div class="col-md-12 col-sm-12 col-lg-12 px-1">
										<input type="password" required class="w-100 mt-3" name="password"
											placeholder="Enter Password">
										@error("password")
										<span class="text-start" style="color:red">{{$message}}</span>
										@enderror
									</div>
									<div class="col-md-12 col-sm-12 col-lg-12 px-1">
										<input type="password" required class="w-100 mt-3" name="re_password"
											placeholder="Confirm Password">
										@error("re_password")
										<span class="text-start" style="color:red">{{$message}}</span>
										@enderror
									</div>

									@if($g_setting->google_recaptcha_status == 'Show')
									<div class="form-group">
										<div class="g-recaptcha"
											data-sitekey="{{ $g_setting->google_recaptcha_site_key }}">

										</div>
									</div>
									@endif
								</div>
							</div>



							<button class="w-100 p-2 border-0 my-3 text-light font-weight-bold rounded"
								style="  background-color: #731718!important;">Create And Account</button>
							<p class="font-weight-bold mb-2">Already have an account? <a
									href="{{ route('customer_login') }}"><span style="color:#731718;">Login.</span></a>
							</p>

						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
@endsection