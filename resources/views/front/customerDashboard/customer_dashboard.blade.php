@extends('front.customerDashboard.customer_main')
@section('content')
<div class="content-body">
	<div class="container-fluid">
		<div class="row">
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
			<div class="col-lg-2 col-md-2 col-sm-12">
				<a href="{{ route('customer_land_transport') }}">
					<div class="card border-0">
						<img class="card-img-top img-fluid w-100" src="{{ asset('assets\images\icon_menu_01.png') }}" alt="Card image cap">
						<div class="card-body flex-wrap justify-content-center">
							<h5 class="card-title text-center fw-bold" style="color:#731718;">Collective Order for Land Transport & Shipping</h5>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12">
				<a href="{{ route('customer_car_and_shipping_information') }}">
					<div class="card border-0">
						<img class="card-img-top img-fluid" src="{{ asset('assets\images\car_shipping_info.png') }}" alt="Card image cap">
						<div class="card-body flex-wrap justify-content-center">
							<h5 class="card-title text-center fw-bold" style="color:#731718;">Car & Shipping Information (Track and Trace)</h5>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12">
				<a href="{{ route('web_ordering_history') }}">
					<div class="card border-0">
						<img class="card-img-top img-fluid" src="{{ asset('assets\images\web_ordering_history.png') }}" alt="Card image cap">
						<div class="card-body flex-wrap justify-content-center">
							<h5 class="card-title text-center fw-bold" style="color:#731718;">Web ordering history</h5>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12">
				<a href="{{ route('customer_shipping_documents') }}">
					<div class="card border-0">
						<img class="card-img-top img-fluid" src="{{ asset('assets\images\shipping_document.png') }}" alt="Card image cap">
						<div class="card-body flex-wrap justify-content-center">
							<h5 class="card-title text-center fw-bold" style="color:#731718;">Shipping Documents</h5>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12">
				<a href="{{ route('customer_invoices') }}">
					<div class="card border-0">
						<img class="card-img-top img-fluid" src="{{ asset('assets\images\invoice.png') }}" alt="Card image cap">
						<div class="card-body flex-wrap justify-content-center">
							<h5 class="card-title text-center fw-bold" style="color:#731718;">Invoice</h5>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
@endsection
