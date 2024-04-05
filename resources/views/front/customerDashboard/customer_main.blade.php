<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="sshJapan">
	<meta property="og:title" content="sshJapan">
	<meta property="og:description" content="sshJapan">
	<meta property="og:image" content="https://sshJapan.dexignzone.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	<!-- PAGE TITLE HERE -->
	<title>SS JAPAN</title>
	<!-- FAVICONS ICON -->
	<link rel="icon" type="image/png" href="{{ asset('assets\images\fav.png') }}">
	<link href="{{ asset('customer\vendor\bootstrap-select\dist\css\bootstrap-select.min.css') }}" rel="stylesheet">
	<link href="{{ asset('customer\vendor\swiper\css\swiper-bundle.min.css') }}" rel="stylesheet">
	<link href="{{ asset('customer\vendor\swiper\css\swiper-bundle.min.css') }}" rel="stylesheet">
	<link href="{{ asset('customer\vendor\datatables\css\jquery.dataTables.min.css') }}" rel="stylesheet">
	<link href="{{ asset('customer\vendor\bootstrap-datetimepicker\css\bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
	
	<!-- tagify-css -->
	<link href="{{ asset('customer\vendor\tagify\dist\tagify.css') }}" rel="stylesheet">
	
	<!-- Style css -->
    <link href="{{ asset('customer\css\style.css') }}" rel="stylesheet">
	
</head>
<body>

    <div id="main-wrapper">
		@include('front.customerDashboard.customer_header')
		@yield('content')
		@include('front.customerDashboard.customer_footer')
    </div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('customer\vendor\global\global.min.js') }}"></script>
	<script src="{{ asset('customer\vendor\chart.js\Chart.bundle.min.js') }}"></script>
	<script src="{{ asset('customer\vendor\bootstrap-select\dist\js\bootstrap-select.min.js') }}"></script>
	<!-- Dashboard 1 -->
	<script src="{{ asset('customer\vendor\draggable\draggable.js') }}"></script>
	<script src="{{ asset('customer\vendor\swiper\js\swiper-bundle.min.js') }}"></script>
	
	
	<!-- tagify -->
	<script src="{{ asset('customer\vendor\tagify\dist\tagify.js') }}"></script>
	 
	<script src="{{ asset('customer\vendor\datatables\js\jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('customer\vendor\datatables\js\dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('customer\vendor\datatables\js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('customer\vendor\datatables\js/jszip.min.js') }}"></script>
	<script src="{{ asset('customer\js\plugins-init\datatables.init.js') }}"></script>
   
	<!-- Apex Chart -->
	
	<script src="{{ asset('customer\vendor\bootstrap-datetimepicker\js\moment.js') }}"></script>
	<script src="{{ asset('customer\vendor\bootstrap-datetimepicker\js\bootstrap-datetimepicker.min.js') }}"></script>

	<!-- Vectormap -->
    <script src="{{ asset('customer\vendor\jqvmap\js\jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('customer\vendor\jqvmap\js\jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('customer\vendor\jqvmap\js\jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('customer\js\custom.js') }}"></script>
	<script src="{{ asset('customer\js\deznav-init.js') }}"></script>
	<script src="{{ asset('customer\js\demo.js') }}"></script>
</body>
</html>