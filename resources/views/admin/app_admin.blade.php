@php
$user = Auth::user();
$g_setting = \App\Models\GeneralSetting::where('id',1)->first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" href="{{ asset('uploads/site_photos/'.$g_setting->favicon) }}">

    <title>{{ ADMIN_PANEL }}</title>

    @include('admin.app_styles')

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @include('admin.app_scripts')

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        @php
            $route = Route::currentRouteName();
        @endphp

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin_dashboard') }}">
            <div class="sidebar-brand-text mx-3 ttn">
                <div class="right">
                    {{ env('APP_NAME') }}
                </div>
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Dashboard -->
        <li class="nav-item {{ $route == 'admin_dashboard' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_dashboard') }}">
                <i class="fas fa-fw fa-home"></i>
                <span>{{ DASHBOARD }}</span>
            </a>
        </li>

        <!-- General Settings -->
        @can('admin_setting_general', 'admin_payment','admin_currency_view','admin_social_media_view')
            <li class="nav-item {{ in_array($route, ['admin_setting_general', 'admin_payment', 'admin_social_media_view', 'admin_social_media_create', 'admin_social_media_store', 'admin_social_media_edit', 'admin_currency_view', 'admin_currency_create', 'admin_currency_edit']) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting" aria-expanded="true" aria-controls="collapseSetting">
                    <i class="fas fa-folder"></i>
                    <span>{{ SETTINGS }}</span>
                </a>
                <div id="collapseSetting" class="collapse {{ in_array($route, ['admin_setting_general', 'admin_payment', 'admin_social_media_view', 'admin_social_media_create', 'admin_social_media_store', 'admin_social_media_edit', 'admin_currency_view', 'admin_currency_create', 'admin_currency_edit']) ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @can('admin_setting_general')
                            <a class="collapse-item" href="{{ route('admin_setting_general') }}">{{ GENERAL_SETTING }}</a>
                        @endcan
                        @can('admin_payment')
                            <a class="collapse-item" href="{{ route('admin_payment') }}">{{ PAYMENT_SETTING }}</a>
                        @endcan
                        @can('admin_currency_view')
                            <a class="collapse-item" href="{{ route('admin_currency_view') }}">{{ CURRENCY }}</a>
                        @endcan
                        @can('admin_social_media_view')
                            <a class="collapse-item" href="{{ route('admin_social_media_view') }}">{{ SOCIAL_MEDIA }}</a>
                        @endcan
                    </div>
                </div>
            </li>
        @endcan
        <!-- Home Advertisements -->
        @can('admin_home_advertisement')
            <li class="nav-item {{ $route == 'admin_home_advertisement' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_home_advertisement') }}">
                    <i class="far fa-caret-square-right"></i>
                    <span>{{ HOME_ADVERTISEMENTS }}</span>
                </a>
            </li>
        @endcan
        <!-- Insurance -->
        @can('admin_insurance_view', 'admin_insurance_create')
            <li class="nav-item {{ $route == 'admin_insurance_view'|| $route =='admin_insurance_create' ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInsurance" aria-expanded="true" aria-controls="collapseInsurance">
                    <i class="fas fa-folder"></i>
                    <span>Insurance</span>
                </a>
                <div id="collapseInsurance" class="collapse {{ $route == 'admin_insurance_view'|| $route == 'admin_insurance_create' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @can('admin_insurance_view')
                            <a class="collapse-item" href="{{ route('admin_insurance_view') }}">List All Insurances</a>
                        @endcan
                        @can('admin_insurance_create')
                            <a class="collapse-item" href="{{ route('admin_insurance_create') }}">Create New</a>
                        @endcan
                    </div>
                </div>
            </li>
        @endcan

            <!-- Freight -->
        @can('admin_freight_view' , 'admin_freight_create')
            <li class="nav-item {{ $route == 'admin_freight_view'|| $route =='admin_freight_create' ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFreight" aria-expanded="true" aria-controls="collapseFreight">
                    <i class="fas fa-folder"></i>
                    <span>Freight</span>
                </a>
                <div id="collapseFreight" class="collapse {{ $route == 'admin_freight_view'|| $route == 'admin_freight_create' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @can('admin_freight_view')
                            <a class="collapse-item" href="{{ route('admin_freight_view') }}">List All freights</a>
                        @endcan
                        @can('admin_freight_create')
                            <a class="collapse-item" href="{{ route('admin_freight_create') }}">Create New</a>
                        @endcan
                    </div>
                </div>
            </li>
        @endcan

        @can('admin_inspection_view' , 'admin_inspection_create')
        <!-- Inspection -->
        <li class="nav-item {{ $route == 'admin_inspection_view'|| $route =='admin_inspection_create' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInspection" aria-expanded="true" aria-controls="collapseInspection">
                <i class="fas fa-folder"></i>
                <span>Inspection</span>
            </a>
            <div id="collapseInspection" class="collapse {{ $route == 'admin_inspection_view'|| $route == 'admin_inspection_create' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @can('admin_inspection_view')
                        <a class="collapse-item" href="{{ route('admin_inspection_view') }}">List All inspections</a>
                    @endcan
                    @can('admin_inspection_create')
                        <a class="collapse-item" href="{{ route('admin_inspection_create') }}">Create New</a>
                    @endcan
                </div>
            </div>
        </li>
        @endcan
        <!-- permissions -->
        @can('permissions.index' , 'permissions.create' , 'permissions.edit')
            <li class="nav-item {{ $route == 'permissions.index'|| $route =='permissions.create' || $route =='permissions.edit' ?  'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePermissions" aria-expanded="true" aria-controls="collapsePermissions">
                    <i class="fas fa-folder"></i>
                    <span>Premissions</span>
                </a>
                <div id="collapsePermissions" class="collapse {{ $route =='permissions.index' || $route == 'permissions.create' || $route == 'permissions.edit' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @can('permissions.index')
                           <a class="collapse-item" href="{{ route('permissions.index') }}">List All Permissions</a>
                        @endcan
                        @can('permissions.create')
                            <a class="collapse-item" href="{{ route('permissions.create') }}">Create New</a>
                        @endcan
                    </div>
                </div>
            </li>
        @endif

        <!-- Roles -->
        @can('roles.index' , 'roles.create' ,'roles.edit' , 'admin_users.index')
            <li class="nav-item {{ $route == 'roles.index'|| $route =='roles.create' || $route =='roles.edit' ?  'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoles" aria-expanded="true" aria-controls="collapseRoles">
                    <i class="fas fa-folder"></i>
                    <span>User Management</span>
                </a>
                <div id="collapseRoles" class="collapse {{ $route =='roles.index' || $route == 'roles.create' || $route == 'roles.edit' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @can('permissions.create')
                            <a class="collapse-item" href="{{ route('roles.index') }}">Roles and Permissions</a>
                        @endcan
                        @can('admin_users.index')
                            <a class="collapse-item" href="{{ route('admin_users.index') }}">User Management</a>
                        @endcan
                    </div>
                </div>
            </li>
        @endcan
        <!-- admin_inspection_view -->
        <!-- Language Settings -->
        <!-- <li class="nav-item {{ $route =='admin_language_menu_text'||$route =='admin_language_website_text'||$route =='admin_language_notification_text'||$route =='admin_language_admin_panel_text' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLanguage" aria-expanded="true" aria-controls="collapseLanguage">
                <i class="fas fa-folder"></i>
                <span>{{ LANGUAGE_SETTINGS }}</span>
            </a>
            <div id="collapseLanguage" class="collapse {{ $route =='admin_language_menu_text'||$route =='admin_language_website_text'||$route =='admin_language_notification_text'||$route =='admin_language_admin_panel_text' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item " href="{{ route('admin_language_menu_text') }}">{{ MENU_TEXT }}</a>
                    <a class="collapse-item " href="{{ route('admin_language_website_text') }}">{{ WEBSITE_TEXT }}</a>
                    <a class="collapse-item " href="{{ route('admin_language_notification_text') }}">{{ NOTIFICATION_TEXT }}</a>
                    <a class="collapse-item " href="{{ route('admin_language_admin_panel_text') }}">{{ ADMIN_PANEL_TEXT }}</a>
                </div>
            </div>
        </li> -->


        <!-- Page Settings -->
        @can('admin_page_home_edit' , 'admin_page_about_edit' , 'admin_page_blog_edit' , 'admin_page_faq_edit' , 'admin_page_contact_edit' , 'admin_page_pricing_edit' , 'admin_page_listing_brand_edit' , 'admin_page_listing_location_edit' , 'admin_page_listing_edit' , 'admin_page_term_edit' , 'admin_page_privacy_edit' , 'admin_page_other_edit')
            <li class="nav-item {{ $route == 'admin_page_home_edit'||$route == 'admin_page_about_edit'||$route == 'admin_page_blog_edit'||$route == 'admin_page_faq_edit'||$route == 'admin_page_contact_edit'||$route == 'admin_page_term_edit'||$route == 'admin_page_privacy_edit'||$route == 'admin_page_other_edit'||$route == 'admin_page_pricing_edit'||$route == 'admin_page_listing_brand_edit'||$route == 'admin_page_listing_location_edit'||$route == 'admin_page_listing_edit' ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePageSettings" aria-expanded="true" aria-controls="collapsePageSettings">
                    <i class="fas fa-folder"></i>
                    <span>{{ PAGE_SETTINGS }}</span>
                </a>
                <div id="collapsePageSettings" class="collapse {{ $route == 'admin_page_home_edit'||$route == 'admin_page_about_edit'||$route == 'admin_page_blog_edit'||$route == 'admin_page_faq_edit'||$route == 'admin_page_contact_edit'||$route == 'admin_page_term_edit'||$route == 'admin_page_privacy_edit'||$route == 'admin_page_other_edit'||$route == 'admin_page_pricing_edit'||$route == 'admin_page_listing_brand_edit'||$route == 'admin_page_listing_location_edit'||$route == 'admin_page_listing_edit' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @can('admin_page_home_edit')
                            <a class="collapse-item" href="{{ route('admin_page_home_edit') }}">{{ HOME }}</a>
                        @endcan
                        @can('admin_page_about_edit')
                            <a class="collapse-item" href="{{ route('admin_page_about_edit') }}">{{ ABOUT }}</a>
                        @endcan
                        @can('admin_page_blog_edit')
                            <a class="collapse-item" href="{{ route('admin_page_blog_edit') }}">{{ BLOG }}</a>
                        @endcan
                        @can('admin_page_faq_edit')
                            <a class="collapse-item" href="{{ route('admin_page_faq_edit') }}">{{ FAQ }}</a>
                        @endcan
                        @can('admin_page_contact_edit')
                            <a class="collapse-item" href="{{ route('admin_page_contact_edit') }}">{{ CONTACT }}</a>
                        @endcan
                        @can('admin_page_pricing_edit')
                            <a class="collapse-item" href="{{ route('admin_page_pricing_edit') }}">{{ PRICING }}</a>
                        @endcan
                        @can('admin_page_listing_brand_edit')
                            <a class="collapse-item" href="{{ route('admin_page_listing_brand_edit') }}">{{ LISTING_BRAND }}</a>
                        @endcan
                        @can('admin_page_listing_location_edit')
                            <a class="collapse-item" href="{{ route('admin_page_listing_location_edit') }}">{{ LISTING_LOCATION }}</a>
                        @endcan
                        @can('admin_page_listing_edit')
                            <a class="collapse-item" href="{{ route('admin_page_listing_edit') }}">{{ LISTING }}</a>
                        @endcan
                        @can('admin_page_term_edit')
                            <a class="collapse-item" href="{{ route('admin_page_term_edit') }}">{{ TERMS_AND_CONDITIONS }}</a>
                        @endcan
                        @can('admin_page_privacy_edit')
                            <a class="collapse-item" href="{{ route('admin_page_privacy_edit') }}">{{ PRIVACY_POLICY }}</a>
                        @endcan
                        @can('admin_page_other_edit')
                            <a class="collapse-item" href="{{ route('admin_page_other_edit') }}">{{ OTHER }}</a>
                        @endcan
                    </div>
                </div>
            </li>
        @endcan

        <!-- Blog Settings -->
        <!-- <li class="nav-item {{ $route == 'admin_category_view'||$route == 'admin_category_create'||$route == 'admin_category_edit'||$route =='admin_blog_view'||$route =='admin_blog_create'||$route =='admin_blog_edit'||$route =='admin_comment_approved'||$route =='admin_comment_pending' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBlog" aria-expanded="true" aria-controls="collapseBlog">
                <i class="fas fa-folder"></i>
                <span>{{ BLOG_SECTION }}</span>
            </a>
            <div id="collapseBlog" class="collapse {{ $route == 'admin_category_view'||$route == 'admin_category_create'||$route == 'admin_category_edit'||$route =='admin_blog_view'||$route =='admin_blog_create'||$route =='admin_blog_edit'||$route =='admin_comment_approved'||$route =='admin_comment_pending' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <a class="collapse-item" href="{{ route('admin_blog_view') }}">{{ BLOGS }}</a>
                    <a class="collapse-item" href="{{ route('admin_comment_approved') }}">{{ APPROVED_COMMENTS }}</a>
                    <a class="collapse-item" href="{{ route('admin_comment_pending') }}">{{ PENDING_COMMENTS }}</a>

                </div>
            </div>
        </li> -->


        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin_category_view') }}">
                <i class="fas fa-folder"></i>
                <span>{{ CATEGORIES }}</span>
            </a>
        </li>
        @can('admin_listing_transmissions_index')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin_listing_transmissions_index') }}">
                <i class="fas fa-folder"></i>
                <span>Transmissions</span>
            </a>
        </li>
        @endcan



        <!-- Listing Settings -->
        @can('admin_listing_brand_view' , 'admin_listing_location_view' , 'admin_amenity_view' , 'admin_listing_view')
            <li class="nav-item {{ $route == 'admin_amenity_view'||$route == 'admin_amenity_create'||$route == 'admin_amenity_edit'||$route == 'admin_listing_brand_view'||$route == 'admin_listing_brand_create'||$route == 'admin_listing_brand_edit'||$route == 'admin_listing_location_view'||$route == 'admin_listing_location_create'||$route == 'admin_listing_location_edit'||$route == 'admin_listing_view'||$route == 'admin_listing_create'||$route == 'admin_listing_edit' ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseListing" aria-expanded="true" aria-controls="collapseListing">
                    <i class="fas fa-folder"></i>
                    <span>{{ LISTING_SECTION }}</span>
                </a>
                <div id="collapseListing" class="collapse {{ $route == 'admin_amenity_view'||$route == 'admin_amenity_create'||$route == 'admin_amenity_edit'||$route == 'admin_listing_brand_view'||$route == 'admin_listing_brand_create'||$route == 'admin_listing_brand_edit'||$route == 'admin_listing_location_view'||$route == 'admin_listing_location_create'||$route == 'admin_listing_location_edit'||$route == 'admin_listing_view'||$route == 'admin_listing_create'||$route == 'admin_listing_edit' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @can('admin_listing_brand_view')
                            <a class="collapse-item" href="{{ route('admin_listing_brand_view') }}">{{ LISTING_BRAND }}</a>
                        @endcan
                        @can('admin_listing_location_view')
                            <a class="collapse-item" href="{{ route('admin_listing_location_view') }}">{{ LISTING_LOCATION }}</a>
                        @endcan
                        @can('admin_listing_city_view')
                            <a class="collapse-item" href="{{ route('admin_listing_city_view') }}">Listing Cities</a>
                        @endcan
                        @can('admin_listing_port_view')
                            <a class="collapse-item" href="{{ route('admin_listing_port_view') }}">Listing Ports</a>
                        @endcan

                        @can('admin_amenity_view')
                           <a class="collapse-item" href="{{ route('admin_amenity_view') }}">{{ LISTING_AMENITY }}</a>
                        @endcan
                        @can('admin_listing_view')
                            <a class="collapse-item" href="{{ route('admin_listing_view') }}">{{ LISTING }}</a>
                        @endcan
                    </div>
                </div>
            </li>
        @endcan



        @can('admin_offer_managment_view' , 'admin_offer_managment_edit')
            <li class="nav-item {{ $route == 'admin_offer_managment_view'|| $route =='admin_offer_managment_edit' ?  'active' : '' }}">
                <a class="nav-link collapsed" href="{{ route('admin_offer_managment_view') }}">
                    <i class="fas fa-folder"></i>
                    <span>Offer management</span>
                </a>
            </li>
        @endcan
        @can('admin_listing_option_service_view' , 'admin_listing_option_service_create' , 'admin_listing_option_service_store' , 'admin_listing_option_service_edit' , 'admin_listing_option_service_update')
            <li class="nav-item {{ $route == 'admin_listing_option_service_view'||$route == 'admin_listing_option_service_create'||$route == 'admin_listing_option_service_edit'||$route == 'admin_listing_option_service_store'||$route == 'admin_listing_option_service_update' ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWebsite" aria-expanded="true" aria-controls="collapseWebsite">
                    <i class="fas fa-folder"></i>
                    <span>Option Services</span>
                </a>
                <div id="collapseWebsite" class="collapse {{ $route == 'admin_listing_option_service_view'||$route == 'admin_listing_option_service_create'||$route == 'admin_listing_option_service_edit'||$route == 'admin_listing_option_service_store'||$route == 'admin_listing_option_service_update' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin_listing_option_service_view') }}">List Option Services </a>
                        <a class="collapse-item" href="{{ route('admin_listing_option_service_create') }}">Create Option Service</a>
                    </div>
                </div>
            </li>
        @endcan
        <!-- Shipment Section -->
        @can('admin_shippment_requests')
        <li class="nav-item {{ $route == 'admin_shippment_requests' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseShippingRequest" aria-expanded="true" aria-controls="collapseShippingRequest">
                <i class="fas fa-folder"></i>
                <span>{{ SHIPPMENT_SECTION }}</span>
            </a>
            <div id="collapseShippingRequest" class="collapse {{ $route == 'admin_shippment_requests' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin_shippment_requests') }}">Shippment Requests</a>
                </div>
            </div>
        </li>
        @endcan
        @can('services.index')
        <li class="nav-item {{ $route == 'services.index' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseServices" aria-expanded="true" aria-controls="collapseServices">
                <i class="fas fa-folder"></i>
                <span>Services</span>
            </a>
            <div id="collapseServices" class="collapse {{ $route == 'admin_shippment_requests' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('services.index') }}">Services</a>
                </div>
            </div>
        </li>
        @endcan
        <!-- services.index -->
        <!-- Review Section -->
        <!-- <li class="nav-item {{ $route == 'admin_view_admin_review'||$route == 'admin_view_customer_review' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReview" aria-expanded="true" aria-controls="collapseReview">
                <i class="fas fa-folder"></i>
                <span>{{ REVIEW_SECTION }}</span>
            </a>
            <div id="collapseReview" class="collapse {{ $route == 'admin_view_admin_review'||$route == 'admin_view_customer_review' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <a class="collapse-item" href="{{ route('admin_view_admin_review') }}">{{ ADMIN_REVIEW }}</a>
                    <a class="collapse-item" href="{{ route('admin_view_customer_review') }}">{{ CUSTOMER_REVIEW }}</a>

                </div>
            </div>
        </li> -->


        <!-- Package Section -->
        <!-- <li class="nav-item {{ $route == 'admin_package_view'||$route == 'admin_package_create'||$route == 'admin_package_edit' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_package_view') }}">
                <i class="far fa-caret-square-right"></i>
                <span>{{ PACKAGE_SECTION }}</span>
            </a>
        </li> -->


        <!-- Dynamic Pages -->
        <!-- <li class="nav-item {{ $route == 'admin_dynamic_page_view'||$route == 'admin_dynamic_page_create'||$route == 'admin_dynamic_page_edit' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_dynamic_page_view') }}">
                <i class="far fa-caret-square-right"></i>
                <span>{{ DYNAMIC_PAGES }}</span>
            </a>
        </li> -->


        <!-- Purchase History -->
        <!-- <li class="nav-item {{ $route == 'admin_purchase_history_view'||$route == 'admin_purchase_history_detail'||$route == 'admin_purchase_history_invoice' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_purchase_history_view') }}">
                <i class="far fa-caret-square-right"></i>
                <span>{{ PURCHASE_HISTORY }}</span>
            </a>
        </li> -->


        <!-- Customer -->
        <!-- <li class="nav-item {{ $route == 'admin_customer_view' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_customer_view') }}">
                <i class="far fa-caret-square-right"></i>
                <span>{{ CUSTOMER }}</span>
            </a>
        </li> -->


        <!-- Email Template -->
        <!-- <li class="nav-item {{ $route == 'admin_email_template_view' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_email_template_view') }}">
                <i class="far fa-caret-square-right"></i>
                <span>{{ EMAIL_TEMPLATE }}</span>
            </a>
        </li> -->




        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">


                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="btn btn-info btn-sm mt-3" href="{{ url('/') }}" target="_blank">
                            {{ VISIT_WEBSITE }}
                        </a>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600">{{ $user->name }}</span>
                            <img class="img-profile rounded-circle" src="{{ asset('uploads/user_photos/'.$user->photo) }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                            <a class="dropdown-item" href="{{ route('admin_profile_change') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> {{ CHANGE_PROFILE }}
                            </a>
                            <a class="dropdown-item" href="{{ route('admin_password_change') }}">
                                <i class="fas fa-unlock-alt fa-sm fa-fw mr-2 text-gray-400"></i> {{ CHANGE_PASSWORD }}
                            </a>
                            <a class="dropdown-item" href="{{ route('admin_photo_change') }}">
                                <i class="fas fa-image fa-sm fa-fw mr-2 text-gray-400"></i> {{ CHANGE_PHOTO }}
                            </a>
                            <a class="dropdown-item" href="{{ route('admin_banner_change') }}">
                                <i class="fas fa-image fa-sm fa-fw mr-2 text-gray-400"></i> {{ CHANGE_BANNER }}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin_logout') }}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> {{ LOGOUT }}
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">

                @yield('admin_content')

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

@include('admin.app_scripts_footer')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<style>
    .images-preview-div {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .image-container {
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        border: 1px solid #ccc;
        padding: 5px;
        position: relative;
        cursor: grab;
    }
    .image-container img {
        max-width: 100px;
        max-height: 100px;
        display: block;
    }
    .remove-image {
        position: absolute;
        top: -10px;
        right: -10px;
        background: red;
        color: white;
        border: none;
        width: 20px;
        height: 20px;
        text-align: center;
        line-height: 18px;
        cursor: pointer;
        border-radius: 50%;
        font-size: 12px;
        transition: transform 0.2s, background-color 0.2s;
    }
    .remove-image:hover {
        transform: scale(1.1);
        background-color: #ff6666;
    }
    .remove-image:active {
        transform: scale(0.9);
    }
    .drag-handle {
        cursor: grab;
        background-color: #eee;
        padding: 2px 5px;
        border-radius: 3px;
        margin-bottom: 5px;
        user-select: none;
    }
</style>
<script>
    $(function() {
        const previewImages = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                const filesAmount = input.files.length;

                for (let i = 0; i < filesAmount; i++) {
                    const reader = new FileReader();

                    reader.onload = function(event) {
                        const img = $('<img>').attr('src', event.target.result);
                        const closeButton = $('<button class="remove-image">X</button>').click(function() {
                            $(this).parent().remove();
                        });
                        const dragHandle = $('<div class="drag-handle">Drag</div>');
                        const imgContainer = $('<div class="image-container">').append(dragHandle).append(img).append(closeButton);

                        $(imgContainer).appendTo(imgPreviewPlaceholder);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        $('#images').on('change', function() {
            previewImages(this, 'div.images-preview-div');
        });

        // Initialize drag and drop sorting functionality
        $('.images-preview-div').sortable({
            containment: 'parent',
            tolerance: 'pointer',
            axis: 'xy', // Allow dragging along both axes
            handle: '.drag-handle',
            start: function(event, ui) {
                ui.item.children('.drag-handle').css('cursor', 'grabbing');
            },
            stop: function(event, ui) {
                ui.item.children('.drag-handle').css('cursor', 'grab');
            }
        });
    });
</script>




</script>
</body>
</html>
