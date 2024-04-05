@extends('front.layouts.app_front')

@section('content')
@php
$g_setting = \App\Models\GeneralSetting::where('id',1)->first();
@endphp
<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-sm-12 col-lg-6 order-md-1 order-lg-1 order-sm-2 order-2"><div class="py-5 text-center">
				<img src="{{asset('uploads/site_photos/'.$g_setting->logo)}}" class="w-25 my-3" alt="logo">
				<h4 class="font-weight-bold">Why SS Japan?</h4>
				<p class="w-50 d-block m-auto">More than Decade in Business, Exported over 500,000 vehicles to more than 152 countries</p>
			   
			</div>
		<div class="py-5 px-md-2 px-lg-2 mx-md-5 mx-lg-5 w-75 mob-full-width d-block m-auto ">
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
			<div class="col-md-6 col-sm-12 col-lg-6 shadow order-md-2 order-lg-2 order-sm-1 order-1" style="background-color: #F8F8F8;">
				<div class="py-5 text-center">
				  <h4 class="font-weight-bold">Welcome Back!</h4>
				  <p class="mb-4">Please Login or Create a Free account</p>
				  <div class="form">
				
					<form action="{{ route('customer_login_store') }}" method="post"   class="w-60 mob-full-width d-block m-auto px-5 py-4 shadow myform rounded">
						@csrf
						
						<h5  class="font-weight-bold">Login To Your Account</h5>
						<input type="email" class="w-100" name="email" placeholder="Enter your email">
						@error("email")
						<span class="text-start" style="color:red">{{$message}}</span>
						@enderror 
						<input type="password" placeholder="Password" class="w-100 mt-2" name="password">
						@error("password")
						<span class="text-start" style="color:red">{{$message}}</span>
						@enderror 
						@if($g_setting->google_recaptcha_status == 'Show')
							<div class="form-group">
								<div class="g-recaptcha" data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
							</div>
							@endif
						<button type="submit" class="w-100 p-2 border-0 my-3 text-light font-weight-bold rounded" style="  background-color: #731718!important;border:none!important">Login</button>
						<!--<a href="{{ route('customer_forget_password') }}" class="link">{{ FORGET_PASSWORD }}</a>-->
						<p class="font-weight-bold mb-2">Don't have account?  
							<a href="{{ route('customer_registration') }}">
								<span style="color:#731718;">Sign Up</span>
							</a>
						</p>
					</form>
				
			
				  </div>
				</div>

			</div>
		</div>
	</div>
</section>
@endsection
