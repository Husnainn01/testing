@extends('front.layouts.app_front')
@section('content')

@php
							$g_setting = \App\Models\GeneralSetting::where('id',1)->first();
							
						@endphp
<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-sm-12 col-lg-6 order-2 order-sm-2 order-md-1 order-lg-1"><div class="py-5 text-center">
				<img src="{{asset('uploads/site_photos/'.$g_setting->logo)}}" class="w-25 my-3" alt="logo">
				<h4 class="font-weight-bold">Why SS Japan ?</h4>
				<p class="w-50 d-block m-auto">More than Decade in Business, Exported over 500,000 vehicles to more than 152 countries</p>
			   
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
			<div class="col-md-6 col-sm-12 col-lg-6 order-1 order-sm-1 order-lg-2 order-md-2" style="background-color: #F8F8F8;">
				<div class="py-5 text-center">
				  <h4 class="font-weight-bold"></h4>
				  <p class="mb-4">Fill Form To send Message to us</p>
				  <div class="form">
				  
					<form  class="w-60 d-block mob-full-width m-auto px-5 py-4 shadow myform rounded">
						@csrf
						<h5  class="font-weight-bold">Contact Us</h5>
						<div>
							<div class="row mt-4">
							
							<div class="col-md-12 col-sm-12 col-lg-12 px-1"><input type="text" class="w-100" name="name" placeholder="Enter Name"></div>
							<div class="col-md-12 col-sm-12 col-lg-12 px-1"><input type="email" class="w-100 mt-3" name="email" placeholder="Enter Email"></div>
							<div class="col-md-12 col-sm-12 col-lg-12 px-1"><input type="text" class="w-100 mt-3" name="subject" placeholder="Enter Subject"></div>
							<div class="col-md-12 col-sm-12 col-lg-12 px-1"><textarea name="message" id="" cols="30" rows="6" class="w-100 mt-3"></textarea></div>
						
							@if($g_setting->google_recaptcha_status == 'Show')
							<div class="form-group">
								<div class="g-recaptcha" data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
							</div>
							@endif
							</div>
						</div>
						
						
						
						<button class="w-100 p-2 border-0 my-3 text-light font-weight-bold rounded" style="  background-color: #731718!important;">Submit</button>
						
						
					</form>
				  </div>
				</div>

			</div>
		</div>
	</div>
</section>


{{-- <div class="page-banner" style="background-image: url('{{ asset('uploads/page_banners/'.$page_other_item->registration_page_banner) }}')">
	<div class="page-banner-bg"></div>
	<h1>{{ REGISTRATION }}</h1>
	<nav>
		<ol class="breadcrumb justify-content-center">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
			<li class="breadcrumb-item active">{{ REGISTRATION }}</li>
		</ol>
	</nav>
</div> --}}

{{-- 
<div class="page-content pt_50 pb_60">
	<div class="container">
		<div class="row cart">

			<div class="col-md-12">
				<div class="reg-login-form">
					<div class="inner">

						@php
							$g_setting = \App\Models\GeneralSetting::where('id',1)->first();
						@endphp

						<form action="{{ route('customer_registration_store') }}" method="post">
							@csrf
							<div class="form-group">
								<label for="">{{ NAME }}</label>
								<input type="text" class="form-control" name="name">
							</div>
							<div class="form-group">
								<label for="">{{ EMAIL_ADDRESS }}</label>
								<input type="email" class="form-control" name="email">
							</div>
							<div class="form-group">
								<label for="">{{ PASSWORD }}</label>
								<input type="password" class="form-control" name="password">
							</div>
							<div class="form-group">
								<label for="">{{ RETYPE_PASSWORD }}</label>
								<input type="password" class="form-control" name="re_password">
							</div>
							@if($g_setting->google_recaptcha_status == 'Show')
							<div class="form-group">
								<div class="g-recaptcha" data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
							</div>
							@endif
							<button type="submit" class="btn btn-primary">{{ MAKE_REGISTRATION }}</button>
							<div class="new-user">
								{{ HAVE_AN_ACCOUNT }} <a href="{{ route('customer_login') }}" class="link">{{ LOGIN_NOW }}</a>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div> --}}

@endsection
