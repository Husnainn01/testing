@php
$g_setting = \App\Models\GeneralSetting::where('id',1)->first();
$currency_list = \App\Models\Currency::get();

@endphp

@if(!session()->get('currency_name'))
@php
$sess_arr = \App\Models\Currency::where('is_default','Yes')->first();
$name1 = $sess_arr->name;
$symbol1 = $sess_arr->symbol;
$value1 = $sess_arr->value;
session()->put('currency_name',$name1);
session()->put('currency_symbol',$symbol1);
session()->put('currency_value',$value1);
@endphp
@endif

<!DOCTYPE html>
<html lang="en">
   	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
{{--        <!--<link rel="icon" type="image/png" href="{{ asset('images/' . $g_setting->favicon) }}"> -->--}}
                <link rel="icon" type="image/png" href="{{ asset('images/ssjapanfevico.png') }}">

        <title> SS Japan</title>

        <link rel="shortcut icon" href="{{ asset('images/' . $g_setting->favicon) }}" type="image/x-icon">
        <style>
            .privacy-policy-box p.question {
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 16px;
            }

            .privacy-policy-box  {
            font-weight: 400;
            font-size: 14px;
            line-height: 150%;
            letter-spacing: 0.5px;
            color: var(--dark);
            }
        </style>


        @php
            $route = Route::currentRouteName();
        @endphp

        @if($route == null)
            @php $item_row = \App\Models\PageHomeItem::where('id',1)->first(); @endphp
		    <title>{{ $item_row->seo_title }}</title>
		    <meta name="description" content="{{ $item_row->seo_meta_description }}">
        @endif

        @if($route == 'front_about')
            @php $item_row = \App\Models\PageAboutItem::where('id',1)->first(); @endphp
            <title>{{ $item_row->seo_title }}</title>
            <meta name="description" content="{{ $item_row->seo_meta_description }}">
        @endif

        @if($route == 'front_contact')
            @php $item_row = \App\Models\PageContactItem::where('id',1)->first(); @endphp
            <title>{{ $item_row->seo_title }}</title>
            <meta name="description" content="{{ $item_row->seo_meta_description }}">
        @endif

        @if($route == 'front_blogs')
            @php $item_row = \App\Models\PageBlogItem::where('id',1)->first(); @endphp
            <title>{{ $item_row->seo_title }}</title>
            <meta name="description" content="{{ $item_row->seo_meta_description }}">
        @endif

        @if($route == 'front_post')
            @php
                $main_url = Request::url();
                $slug = explode('post/',$main_url);
            @endphp
            @php $item_row = \App\Models\Blog::where('post_slug',$slug[1])->first(); @endphp
            <title>{{ $item_row->seo_title }}</title>
            <meta name="description" content="{{ $item_row->seo_meta_description }}">
        @endif

        @if($route == 'front_listing_result')
            @php $item_row = \App\Models\PageListingItem::where('id',1)->first(); @endphp
            <title>{{ $item_row->seo_title }}</title>
            <meta name="description" content="{{ $item_row->seo_meta_description }}">
        @endif

        @if($route == 'front_listing_detail')
            @php
                $main_url = Request::url();
                $slug = explode('listing/',$main_url);
            @endphp
            @php $item_row = \App\Models\Listing::where('listing_slug',$slug[1])->first(); @endphp
            <title>{{ $item_row->seo_title }}</title>
            <meta name="description" content="{{ $item_row->seo_meta_description }}">
        @endif

        @if($route == 'front_pricing')
            @php $item_row = \App\Models\PagePricingItem::where('id',1)->first(); @endphp
            <title>{{ $item_row->seo_title }}</title>
            <meta name="description" content="{{ $item_row->seo_meta_description }}">
        @endif

        @if($route == 'front_faq')
            @php $item_row = \App\Models\PageFaqItem::where('id',1)->first(); @endphp
            <title>{{ $item_row->seo_title }}</title>
            <meta name="description" content="{{ $item_row->seo_meta_description }}">
        @endif

        @if($route == 'front_listing_location_all')
            @php $item_row = \App\Models\PageListingLocationItem::where('id',1)->first(); @endphp
            <title>{{ $item_row->seo_title }}</title>
            <meta name="description" content="{{ $item_row->seo_meta_description }}">
        @endif

        @if($route == 'front_listing_brand_all')
            @php $item_row = \App\Models\PageListingBrandItem::where('id',1)->first(); @endphp
            <title>{{ $item_row->seo_title }}</title>
            <meta name="description" content="{{ $item_row->seo_meta_description }}">
        @endif

        @if($route == 'front_dynamic_page')
            @php
                $main_url = Request::url();
                $slug = explode('page/',$main_url);
            @endphp
            @php $item_row = \App\Models\DynamicPage::where('dynamic_page_slug',$slug[1])->first(); @endphp
            <title>{{ $item_row->seo_title }}</title>
            <meta name="description" content="{{ $item_row->seo_meta_description }}">
        @endif

        @if($route == 'front_category')
            @php
                $main_url = Request::url();
                $slug = explode('category/',$main_url);
            @endphp
            @php $item_row = \App\Models\Category::where('category_slug',$slug[1])->first(); @endphp
            <title>{{ $item_row->seo_title }}</title>
            <meta name="description" content="{{ $item_row->seo_meta_description }}">
        @endif

        @if($route == 'front_listing_location_detail')
            @php
                $main_url = Request::url();
                $slug = explode('listing/location/',$main_url);
            @endphp
            @php $item_row = \App\Models\ListingLocation::where('listing_location_slug',$slug[1])->first(); @endphp
            <title>{{ $item_row->seo_title }}</title>
            <meta name="description" content="{{ $item_row->seo_meta_description }}">
        @endif

        @if($route == 'front_listing_brand_detail')
            @php
                $main_url = Request::url();
                $slug = explode('listing/brand/',$main_url);
            @endphp
            @php $item_row = \App\Models\ListingBrand::where('listing_brand_slug',$slug[1])->first(); @endphp
            <title>{{ $item_row->seo_title }}</title>
            <meta name="description" content="{{ $item_row->seo_meta_description }}">
        @endif

        @if($route == 'customer_login')
            @php $item_row = \App\Models\PageOtherItem::where('id',1)->first(); @endphp
            <title>{{ $item_row->login_page_seo_title }}</title>
            <meta name="description" content="{{ $item_row->login_page_seo_meta_description }}">
        @endif

        @if($route == 'customer_registration')
            @php $item_row = \App\Models\PageOtherItem::where('id',1)->first(); @endphp
            <title>{{ $item_row->registration_page_seo_title }}</title>
            <meta name="description" content="{{ $item_row->registration_page_seo_meta_description }}">
        @endif

        @if($route == 'customer_forget_password')
            @php $item_row = \App\Models\PageOtherItem::where('id',1)->first(); @endphp
            <title>{{ $item_row->forget_password_page_seo_title }}</title>
            <meta name="description" content="{{ $item_row->forget_password_page_seo_meta_description }}">
        @endif

        @if($route == 'front_terms_and_conditions')
            @php $item_row = \App\Models\PageTermItem::where('id',1)->first(); @endphp
            <title>{{ $item_row->seo_title }}</title>
            <meta name="description" content="{{ $item_row->seo_meta_description }}">
        @endif

        @if($route == 'front_privacy_policy')
            @php $item_row = \App\Models\PagePrivacyItem::where('id',1)->first(); @endphp
            <title>{{ $item_row->seo_title }}</title>
            <meta name="description" content="{{ $item_row->seo_meta_description }}">
        @endif

        @if($route == 'customer_dashboard'||$route == 'customer_package'||$route == 'customer_package_purchase_history'||$route == 'customer_listing_view'||$route == 'customer_listing_view_detail'||$route == 'customer_listing_add'||$route == 'customer_listing_edit'||$route == 'customer_my_reviews'||$route == 'customer_my_review_edit'||$route == 'customer_wishlist'||$route == 'customer_update_profile'||$route == 'customer_update_password'||$route == 'customer_update_photo'||$route == 'customer_update_banner'||$route == 'customer_package_purchase_invoice'||$route == 'customer_package_purchase_history_detail')
            @php $item_row = \App\Models\PageOtherItem::where('id',1)->first(); @endphp
            <title>{{ $item_row->customer_panel_page_seo_title }}</title>
            <meta name="description" content="{{ $item_row->customer_panel_page_seo_meta_description }}">
        @endif


		@include('front.app_styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
        <link  href="{{asset('frontend/paginate/pagination.css')}}">
{{--        <script src="{{asset('frontend/paginate/pagination.js')}}"></script>--}}
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css" />
   	<body>
		@include('front.layouts.app_nav')
        @if(session('success'))
        <div id="success" class="myalert alert alert-success justify-content-start w-50 text-dark fw-bold shadow" role="alert" style="z-index: 999;
        position: absolute!important;
        left: 424px!important;
        right: 100px!important;
        top: 10px!important;
        z-index:1002;">
           <i class="fa-solid fa-circle-exclamation" style="color:green;margin-right: 10px;"></i> {{ session('success') }}

        </div>
      @endif

      @if(session('error'))
      <div id="error" class="myalert alert alert-danger justify-content-start w-50 text-dark fw-bold shadow" role="alert" style="background:#ececed!important;z-index: 999;
      position: absolute!important;
      left: 424px!important;
      right: 100px!important;
      top: 50px!important;
      z-index:1002;">
         <i class="fa-solid fa-circle-exclamation" style="color:red;margin-right: 10px;"></i> {{ session('error') }}
      </div>
    @endif
          @yield('content')
          <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
          @include('front.app_scripts')

        @include('front.layouts.app_footer')


      	<div class="scroll-top" onclick="scrollToTop()">
		  	<i class="fas fa-long-arrow-alt-up"></i>
	    </div>

    <script src="https://kit.fontawesome.com/003e68ae06.js" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{asset('frontend/paginate/jquery.simpleLoadMore.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    // Function to change the page numbers to dots for all pagination elements with the 'custom-pagination' class
    function changeToDots() {
        $('.custom-pagination').each(function() {
            var paginationList = $(this);

            paginationList.find('li.page-item').each(function(index) {
                if (!$(this).hasClass('disabled')) {
                    $(this).find('.page-link').text('•');
                }
            });
        });
    }

    // Call the function to change navigation dots for all pagination elements with the 'custom-pagination' class
    changeToDots();
});
        function custom_template(obj){
                var data = $(obj.element).data();
                var text = $(obj.element).text();
                if(data && data['img_src']){
                    img_src = data['img_src'];
                    template = $("<div><img src=\"" + img_src + "\" style=\"width:100%;height:150px;\"/><p style=\"font-weight: 700;font-size:14pt;text-align:center;\">" + text + "</p></div>");
                    return template;
                }
            }
        var options = {
            'templateSelection': custom_template,
            'templateResult': custom_template,
        }
        $('#id_select2_example').select2(options);
        $('.select2-container--default .select2-selection--single').css({'height': '220px'});


        setTimeout(function() {
  var successDiv = document.getElementById('success');
  if (successDiv) {
    successDiv.style.display = 'none';
  }
}, 3000);

setTimeout(function() {
  var successDiv = document.getElementById('error');
  if (successDiv) {
    successDiv.style.display = 'none';
  }
}, 3000);

function brandChange(){
let formData=$('#form-car').serialize();
$.ajax({
                type: 'POST',
                url: '{{route('car-data')}}',
                data: formData,
                success: function (response) {
                    // Handle the success response as needed
                    var selectElement = $('#car-models'); // Using jQuery to select the element

selectElement.empty();

        if (response.length === 0) {
            selectElement.append('<option value="">Empty</option>');
        } else {
            response.forEach(function (element) {
                selectElement.append(`<option value="${element}">${element}</option>`);
            });
        }
                },
                error: function (error) {
                    // Handle errors if any
                    console.error(error);
                }
            });
}

    function scrollToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    </script>
   </body>
</html>
