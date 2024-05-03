<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\HomeAdvertisementController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CustomerController as CustomerControllerForAdmin;
use App\Http\Controllers\Admin\DashboardController as DashboardControllerForAdmin;
use App\Http\Controllers\Admin\DynamicPageController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\LoginController as LoginControllerForAdmin;
use App\Http\Controllers\Admin\PageAboutController;
use App\Http\Controllers\Admin\PageBlogController;
use App\Http\Controllers\Admin\PageContactController;
use App\Http\Controllers\Admin\PagePricingController;
use App\Http\Controllers\Admin\PageListingBrandController;
use App\Http\Controllers\Admin\PageListingLocationController;
use App\Http\Controllers\Admin\PageListingController;
use App\Http\Controllers\Admin\PageFaqController;
use App\Http\Controllers\Admin\PageHomeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PageOtherController;
use App\Http\Controllers\Admin\PagePrivacyController;
use App\Http\Controllers\Admin\PageTermController;
use App\Http\Controllers\Admin\CategoryController as CategoryControllerForAdmin;
use App\Http\Controllers\Admin\BlogController as BlogControllerForAdmin;
use App\Http\Controllers\Admin\AmenityController as AmenityControllerForAdmin;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\ListingBrandController as ListingBrandControllerForAdmin;
use App\Http\Controllers\Admin\ListingLocationController as ListingLocationControllerForAdmin;
use App\Http\Controllers\Admin\ListingController as ListingControllerForAdmin;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SocialMediaItemController;
use App\Http\Controllers\Admin\FaqController as FaqControllerForAdmin;
use App\Http\Controllers\Admin\PackageController as PackageControllerForAdmin;
use App\Http\Controllers\Admin\PurchaseHistoryController as PurchaseHistoryControllerForAdmin;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\ClearDatabaseController;
use App\Http\Controllers\Front\CurrencyController as CurrencyControllerForFront;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\PricingController;
use App\Http\Controllers\Front\BlogController as BlogControllerForFront;
use App\Http\Controllers\Front\CategoryController as CategoryControllerForFront;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\FaqController as FaqControllerForFront;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\TermController;
use App\Http\Controllers\Front\CustomerAuthController;
use App\Http\Controllers\Front\CustomerController as CustomerControllerForFront;
use App\Http\Controllers\Front\ListingController as ListingControllerForFront;
use App\Http\Controllers\Front\ListingController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\FreightController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUsersController;



Route::group(['middleware' => ['XSS']], function () {

    /* --------------------------------------- */
    /* Front End */
    /* --------------------------------------- */
    Route::post('customer/login/store', [CustomerAuthController::class, 'login_store'])
        ->name('customer_login_store');
    Route::get('/', [HomeController::class, 'index'])->name('front.home');
    Route::post('/add-to-favorites', [HomeController::class, 'addToFavorites'])->name('addToFavorites');

    Route::post('currency', [CurrencyControllerForFront::class, 'index'])
        ->name('front_currency');

    Route::get('about', [AboutController::class, 'index'])
        ->name('front_about');

    Route::get('pricing', [PricingController::class, 'index'])
        ->name('front_pricing');

    Route::get('blog', [BlogControllerForFront::class, 'index'])
        ->name('front_blogs');

    Route::get('post/{slug}', [BlogControllerForFront::class, 'detail'])
        ->name('front_post');

    Route::post('post/comment', [BlogControllerForFront::class, 'comment'])
        ->name('front_comment');

    Route::get('category/{slug}', [CategoryControllerForFront::class, 'detail'])
        ->name('front_category');

    // Route::post('search', [SearchController::class,'index']);

    Route::get('search', function () {
        abort(404);
    });

    Route::get('faq', [FaqControllerForFront::class, 'index'])
        ->name('front_faq');

    Route::get('page/{slug}', [PageController::class, 'detail'])
        ->name('front_dynamic_page');

    Route::get('contact', [ContactController::class, 'index'])
        ->name('front_contact');

    Route::post('contact/store', [ContactController::class, 'send_email'])
        ->name('front_contact_form');

    Route::get('terms-and-conditions', [TermController::class, 'index'])
        ->name('front_terms_and_conditions');

    Route::get('privacy-policy', [PrivacyController::class, 'index'])
        ->name('front_privacy_policy');

    Route::get('listing/{slug}', [ListingControllerForFront::class, 'detail'])
        ->name('front_listing_detail');

    Route::post('listing/listing/send-message', [ListingControllerForFront::class, 'send_message'])
        ->name('front_listing_detail_send_message');

    Route::post('listing/listing/report-listing', [ListingControllerForFront::class, 'report_listing'])
        ->name('front_listing_detail_report_listing');

    Route::get('listing/brand/all', [ListingControllerForFront::class, 'brand_all'])
        ->name('front_listing_brand_all');

    Route::get('listing/brand/{slug}', [ListingControllerForFront::class, 'brand_detail'])
        ->name('front_listing_brand_detail');

    Route::get('listing/location/all', [ListingControllerForFront::class, 'location_all'])
        ->name('front_listing_location_all');

    Route::get('listing/location/{slug}', [ListingControllerForFront::class, 'location_detail'])
        ->name('front_listing_location_detail');

    Route::get('agent/{type}/{id}', [ListingControllerForFront::class, 'agent_detail'])
        ->name('front_listing_agent_detail');

    Route::get('listing-result', [ListingControllerForFront::class, 'listing_result'])
        ->name('front_listing_result');

    Route::post('search-listing', [ListingControllerForFront::class, 'search_listing'])
        ->name('search_front_listing_result');

    Route::get('search-listing-result', [ListingControllerForFront::class, 'search_listing_result'])
        ->name('search-front_listing_result');

    Route::get('customer/wishlist/add/{id}', [ListingControllerForFront::class, 'wishlist_add'])
        ->name('front_add_wishlist');


    /* --------------------------------------- */
    /* Customer Authemtication */
    /* --------------------------------------- */
    Route::get('customer/login', [CustomerAuthController::class, 'login'])
        ->name('customer_login');


    Route::get('customer/logout', [CustomerAuthController::class, 'logout'])
        ->name('customer_logout');

    Route::get('customer/register', [CustomerAuthController::class, 'registration'])
        ->name('customer_registration');

    Route::post('customer/registration/store', [CustomerAuthController::class, 'registration_store'])
        ->name('customer_registration_store');

    Route::get('customer/registration/verify/{token}/{email}', [CustomerAuthController::class, 'registration_verify'])
        ->name('customer_registration_verify');

    Route::get('customer/forget-password', [CustomerAuthController::class, 'forget_password'])
        ->name('customer_forget_password');

    Route::post('customer/forget-password/store', [CustomerAuthController::class, 'forget_password_store'])
        ->name('customer_forget_password_store');

    Route::get('customer/reset-password/{token}/{email}', [CustomerAuthController::class, 'reset_password']);
    Route::post('customer/reset-password/update', [CustomerAuthController::class, 'reset_password_update'])
        ->name('customer_reset_password_update');



    /* --------------------------------------- */
    /* Customer Profile */
    /* --------------------------------------- */
    Route::get('customer/dashboard', [CustomerControllerForFront::class, 'dashboard'])
        ->name('customer_dashboard');
    Route::get('all-reserved-vehicles', [CustomerControllerForFront::class, 'all_reserved_vehicles'])->name('all_reserved_vehicles');

    Route::get('customer/shipping-documents', [CustomerControllerForFront::class, 'customer_shipping_documents'])->name('customer_shipping_documents');
    Route::post('customer/upload-invoice', [CustomerControllerForFront::class, 'customeruploadinvoice'])->name('customeruploadinvoice');
    Route::post('post/customer/shipping-documents', [CustomerControllerForFront::class, 'customer_shipping_documents'])->name('shippind_doc');
    Route::get('customer/shipping-module', [CustomerControllerForFront::class, 'web_ordering_history'])->name('web_ordering_history');
    Route::get('customer/get_cities_and_ports', [CustomerControllerForFront::class, 'get_cities_and_ports'])->name('get_cities_and_ports');
    Route::get('customer/landtransport', [CustomerControllerForFront::class, 'customer_land_transport'])->name('customer_land_transport');
    Route::get('customer/invoices', [CustomerControllerForFront::class, 'customer_invoice'])->name('customer_invoices');
    Route::get('customer/car_shipping_information', [CustomerControllerForFront::class, 'car_and_shipping_information'])->name('customer_car_and_shipping_information');
    Route::post('customer/car_shipping_information', [CustomerControllerForFront::class, 'car_and_shipping_information'])->name('shipping_request_search_filter');

    Route::get('customer/view_car_shipping_information/{id}', [CustomerControllerForFront::class, 'view_car_and_shipping_information'])->name('customer.shipment.view');
    Route::post('customer/car_and_shipping_info_filter', [CustomerControllerForFront::class, 'car_and_shipping_info_filter'])
        ->name('car_and_shipping_info_filter');
    Route::get('/edit-invoice/{invoice}', [CustomerControllerForFront::class, 'editInvoice'])->name('edit_invoice');
    // Route::view('update-password','front.customer-newdashboard.update_password')->name('update-password');
    Route::get('customer/update_customer_password', [CustomerControllerForFront::class, 'update_customer_password'])->name('update_customer_password');
    Route::get('customer/request_car', [CustomerControllerForFront::class, 'request_car'])->name('request_car');
    Route::get('customer/list_request_car', [CustomerControllerForFront::class, 'list_request_car'])->name('list_request_car');
    // customer_offers
    Route::get('customer_offers', [CustomerControllerForFront::class, 'customer_offers'])->name('customer_offers');
    Route::post('customer/requested_car_store', [CustomerControllerForFront::class, 'requested_car_store'])
        ->name('requested_car_store');
    // car_detail
    Route::get('car_detail/{slug}', [CustomerControllerForFront::class, 'car_detail'])
        ->name('car_detail');
    Route::get('/view_car_and_shipping_info_detail/{id}', [CustomerControllerForFront::class, 'view_car_and_shipping_info_detail'])->name('view_car_and_shipping_info_detail');
    Route::post('customer/shipping-documents', [CustomerControllerForFront::class, 'storeShippingDocument'])
        ->name('customer_shipping_documents.store');
    Route::get('customer/download_shipment_document/{id}', [CustomerControllerForFront::class, 'download_shipment_document'])
        ->name('customer_download.shipping_documents');
    Route::get('customer/download_shipment_tt_document/{id}', [CustomerControllerForFront::class, 'download_shipment_tt_document'])
        ->name('customer_download.tt_doc');

    // customer_shipping_documents.store
    // place order shipping place_order_shipping
    Route::post('customer/place_order_shipping', [CustomerControllerForFront::class, 'place_order_shipping'])
        ->name('place_order_shipping');

    Route::get('customer/package', [CustomerControllerForFront::class, 'package'])
        ->name('customer_package');

    Route::get('customer/package/free/{id}', [CustomerControllerForFront::class, 'free_enroll'])
        ->name('customer_package_free_enroll');

    Route::get('customer/package/paid/buy/{id}', [CustomerControllerForFront::class, 'buy_package'])
        ->name('customer_package_buy');


    Route::post('customer/payment/stripe', [CustomerControllerForFront::class, 'stripe'])->name('customer_payment_stripe');
    Route::get('customer/payment/paypal', [CustomerControllerForFront::class, 'paypal']);
    Route::post('customer/payment/razorpay', [CustomerControllerForFront::class, 'razorpay'])->name('customer_payment_razorpay');
    Route::post('customer/payment/flutterwave', [CustomerControllerForFront::class, 'flutterwave'])->name('customer_payment_flutterwave');
    Route::post('customer/payment/mollie', [CustomerControllerForFront::class, 'mollie'])->name('customer_payment_mollie');
    Route::get('customer/payment/mollie-notify', [CustomerControllerForFront::class, 'mollie_notify'])->name('customer_payment_mollie_notify');

    // Route::get('customer/account-info','front.customer-newdashboard.account_information')->name('account-info');
    Route::get('customer/account-info', [CustomerControllerForFront::class, 'account_info'])->name('account_info');
    Route::post('customer/update_account_info', [CustomerControllerForFront::class, 'update_account_info'])->name('update_account_info');
    // update_account_info
    Route::get('customer/package/purchase/history', [CustomerControllerForFront::class, 'purchase_history'])
        ->name('customer_package_purchase_history');

    Route::get('customer/package/purchase/{id}', [CustomerControllerForFront::class, 'purchase_history_detail'])
        ->name('customer_package_purchase_history_detail');

    Route::get('customer/package/invoice/{id}', [CustomerControllerForFront::class, 'invoice'])
        ->name('customer_package_purchase_invoice');

    Route::get('customer/profile-change', [CustomerControllerForFront::class, 'update_profile'])
        ->name('customer_update_profile');

    Route::post('customer/profile-change/update', [CustomerControllerForFront::class, 'update_profile_confirm'])
        ->name('customer_update_profile_confirm');

    Route::get('customer/password-change', [CustomerControllerForFront::class, 'update_password'])
        ->name('customer_update_password');

    Route::post('customer/password-change/update', [CustomerControllerForFront::class, 'update_password_confirm'])
        ->name('customer_update_password_confirm');

    Route::post('/update-invoice-payment-status/{invoice}', [CustomerControllerForFront::class, 'updateInvoicePaymentStatus'])
        ->name('update_invoice_payment_status');


    Route::get('customer/photo-change', [CustomerControllerForFront::class, 'update_photo'])
        ->name('customer_update_photo');

    Route::post('customer/photo-change/update', [CustomerControllerForFront::class, 'update_photo_confirm'])
        ->name('customer_update_photo_confirm');

    Route::get('customer/banner-change', [CustomerControllerForFront::class, 'update_banner'])
        ->name('customer_update_banner');

    Route::post('customer/banner-change/update', [CustomerControllerForFront::class, 'update_banner_confirm'])
        ->name('customer_update_banner_confirm');

    Route::get('customer/listing/view', [CustomerControllerForFront::class, 'listing_view'])
        ->name('customer_listing_view');

    Route::get('customer/listing/detail/{id}', [CustomerControllerForFront::class, 'listing_view_detail'])
        ->name('customer_listing_view_detail');

    Route::get('customer/listing/add', [CustomerControllerForFront::class, 'listing_add'])
        ->name('customer_listing_add');

    Route::post('customer/listing/add/store', [CustomerControllerForFront::class, 'listing_add_store'])
        ->name('customer_listing_add_store');

    Route::get('customer/listing/delete/{id}', [CustomerControllerForFront::class, 'listing_delete'])
        ->name('customer_listing_delete');

    Route::get('customer/listing/edit/{id}', [CustomerControllerForFront::class, 'listing_edit'])
        ->name('customer_listing_edit');

    Route::post('customer/listing/update/{id}', [CustomerControllerForFront::class, 'listing_update'])
        ->name('customer_listing_update');

    Route::get('customer/reviews', [CustomerControllerForFront::class, 'my_reviews'])
        ->name('customer_my_reviews');

    Route::get('customer/review/edit/{id}', [CustomerControllerForFront::class, 'review_edit'])
        ->name('customer_my_review_edit');

    Route::post('customer/review/update/{id}', [CustomerControllerForFront::class, 'review_update'])
        ->name('customer_my_review_update');

    Route::get('customer/review/delete/{id}', [CustomerControllerForFront::class, 'review_delete'])
        ->name('customer_my_review_delete');

    Route::get('customer/wishlist', [CustomerControllerForFront::class, 'wishlist'])
        ->name('customer_wishlist');

    Route::get('customer/wishlist/delete/{id}', [CustomerControllerForFront::class, 'wishlist_delete'])
        ->name('customer_wishlist_delete');

    Route::get('customer/listing/delete-social-item/{id}', [CustomerControllerForFront::class, 'listing_delete_social_item'])
        ->name('customer_listing_delete_social_item');

    Route::get('customer/listing/delete-photo/{id}', [CustomerControllerForFront::class, 'listing_delete_photo'])
        ->name('customer_listing_delete_photo');

    Route::get('customer/listing/delete-video/{id}', [CustomerControllerForFront::class, 'listing_delete_video'])
        ->name('customer_listing_delete_video');

    Route::get('customer/listing/delete-additional-feature/{id}', [CustomerControllerForFront::class, 'listing_delete_additional_feature'])
        ->name('customer_listing_delete_additional_feature');

    Route::post('customer/review', [CustomerControllerForFront::class, 'submit_review'])
        ->name('customer_review');



    /* --------------------------------------- */
    /* --------------------------------------- */
    /* --------------------------------------- */
    /* ADMIN SECTION */
    /* --------------------------------------- */
    /* --------------------------------------- */
    /* --------------------------------------- */
    Route::get('home', function () {
        return redirect('customer_dashboard');
    });

    /* --------------------------------------- */
    /* Login and profile management */
    /* --------------------------------------- */

    // admin user end
    Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
        // Route::get('/', 'AdminController@index')->name('admin.dashboard');
        Route::get('admin/dashboard', [DashboardControllerForAdmin::class, 'index'])
            ->name('admin_dashboard');
        // admin user start
        Route::get('/admin_users', [AdminUsersController::class, 'index'])->name('admin_users.index');
        Route::get('/admin_users/create', [AdminUsersController::class, 'create'])->name('admin_users.create');
        Route::post('/admin_users', [AdminUsersController::class, 'store'])->name('admin_users.store');
        Route::get('/admin_users/{id}', [AdminUsersController::class, 'show'])->name('admin_users.show');
        Route::get('/admin_users/{id}/edit', [AdminUsersController::class, 'edit'])->name('admin_users.edit');
        Route::put('/admin_users/{id}', [AdminUsersController::class, 'update'])->name('admin_users.update');
        Route::delete('/admin_users/{id}', [AdminUsersController::class, 'destroy'])->name('admin_users.destroy');
        // Permissions routes
        Route::resource('permissions', PermissionController::class);

        // Roles routes
        Route::resource('roles', RoleController::class);

        // Assign and deassign permissions to roles
        Route::get('roles/{role}/permissions', [RoleController::class, 'permissions'])->name('roles.permissions');
        Route::post('roles/{role}/permissions', [RoleController::class, 'updatePermissions'])->name('roles.update-permissions');
    });

    Route::get('admin/dashboard', [DashboardControllerForAdmin::class, 'index'])
        ->name('admin_dashboard');

    Route::get('admin', function () {
        return redirect('admin/login');
    });


    Route::get('admin/login', [LoginControllerForAdmin::class, 'login'])
        ->name('admin_login');




    Route::post('admin/login/store', [LoginControllerForAdmin::class, 'login_check'])
        ->name('admin_login_store');

    Route::get('admin/logout', [LoginControllerForAdmin::class, 'logout'])
        ->name('admin_logout');

    Route::get('admin/forget-password', [LoginControllerForAdmin::class, 'forget_password'])
        ->name('admin_forget_password');

    Route::post('admin/forget-password/store', [LoginControllerForAdmin::class, 'forget_password_check'])
        ->name('admin_forget_password_store');

    Route::get('admin/reset-password/{token}/{email}', [LoginControllerForAdmin::class, 'reset_password']);

    Route::post('admin/reset-password/update', [LoginControllerForAdmin::class, 'reset_password_update'])
        ->name('admin_reset_password_update');

    Route::get('admin/password-change', [ProfileController::class, 'password'])
        ->name('admin_password_change');

    Route::post('admin/password-change/update', [ProfileController::class, 'password_update'])
        ->name('admin_password_change_update');

    Route::get('admin/profile-change', [ProfileController::class, 'profile'])
        ->name('admin_profile_change');

    Route::post('admin/profile-change/update', [ProfileController::class, 'profile_update'])
        ->name('admin_profile_change_update');

    Route::get('admin/photo-change', [ProfileController::class, 'photo'])
        ->name('admin_photo_change');

    Route::post('admin/photo-change/update', [ProfileController::class, 'photo_update'])
        ->name('admin_photo_change_update');

    Route::get('admin/banner-change', [ProfileController::class, 'banner'])
        ->name('admin_banner_change');

    Route::post('admin/banner-change/update', [ProfileController::class, 'banner_update'])
        ->name('admin_banner_change_update');


    /* --------------------------------------- */
    /* Payment */
    /* --------------------------------------- */
    Route::get('admin/payment/view', [SettingController::class, 'payment_edit'])
        ->name('admin_payment');

    Route::post('admin/payment/update', [SettingController::class, 'payment_update'])
        ->name('admin_payment_update');


    /* --------------------------------------- */
    /* Currency */
    /* --------------------------------------- */
    Route::get('admin/currency/view', [CurrencyController::class, 'index'])
        ->name('admin_currency_view');

    Route::get('admin/currency/create', [CurrencyController::class, 'create'])
        ->name('admin_currency_create');

    Route::post('admin/currency/store', [CurrencyController::class, 'store'])
        ->name('admin_currency_store');

    Route::get('admin/currency/delete/{id}', [CurrencyController::class, 'destroy'])
        ->name('admin_currency_delete');

    Route::get('admin/currency/edit/{id}', [CurrencyController::class, 'edit'])
        ->name('admin_currency_edit');

    Route::post('admin/currency/update/{id}', [CurrencyController::class, 'update'])
        ->name('admin_currency_update');


    /* --------------------------------------- */
    /* Blog Category */
    /* --------------------------------------- */
    Route::get('admin/category/view', [CategoryControllerForAdmin::class, 'index'])
        ->name('admin_category_view');

    Route::get('admin/category/create', [CategoryControllerForAdmin::class, 'create'])
        ->name('admin_category_create');

    Route::post('admin/category/store', [CategoryControllerForAdmin::class, 'store'])
        ->name('admin_category_store');

    Route::get('admin/category/delete/{id}', [CategoryControllerForAdmin::class, 'destroy'])
        ->name('admin_category_delete');

    Route::get('admin/category/edit/{id}', [CategoryControllerForAdmin::class, 'edit'])
        ->name('admin_category_edit');

    Route::post('admin/category/update/{id}', [CategoryControllerForAdmin::class, 'update'])
        ->name('admin_category_update');


    /* --------------------------------------- */
    /* Blog */
    /* --------------------------------------- */
    Route::get('admin/blog/view', [BlogControllerForAdmin::class, 'index'])
        ->name('admin_blog_view');

    Route::get('admin/blog/create', [BlogControllerForAdmin::class, 'create'])
        ->name('admin_blog_create');

    Route::post('admin/blog/store', [BlogControllerForAdmin::class, 'store'])
        ->name('admin_blog_store');

    Route::get('admin/blog/delete/{id}', [BlogControllerForAdmin::class, 'destroy'])
        ->name('admin_blog_delete');

    Route::get('admin/blog/edit/{id}', [BlogControllerForAdmin::class, 'edit'])
        ->name('admin_blog_edit');

    Route::post('admin/blog/update/{id}', [BlogControllerForAdmin::class, 'update'])
        ->name('admin_blog_update');


    /* --------------------------------------- */
    /* Blog Comment */
    /* --------------------------------------- */
    Route::get('admin/comment/approved', [CommentController::class, 'approved'])
        ->name('admin_comment_approved');

    Route::get('admin/comment/make-pending/{id}', [CommentController::class, 'make_pending'])
        ->name('admin_comment_make_pending');

    Route::get('admin/comment/pending', [CommentController::class, 'pending'])
        ->name('admin_comment_pending');

    Route::get('admin/comment/make-approved/{id}', [CommentController::class, 'make_approved'])
        ->name('admin_comment_make_approved');

    Route::get('admin/comment/delete/{id}', [CommentController::class, 'destroy'])
        ->name('admin_comment_delete');


    /* --------------------------------------- */
    /* Dynamic Pages */
    /* --------------------------------------- */
    Route::get('admin/dynamic-page/view', [DynamicPageController::class, 'index'])
        ->name('admin_dynamic_page_view');

    Route::get('admin/dynamic-page/create', [DynamicPageController::class, 'create'])
        ->name('admin_dynamic_page_create');

    Route::post('admin/dynamic-page/store', [DynamicPageController::class, 'store'])
        ->name('admin_dynamic_page_store');

    Route::get('admin/dynamic-page/delete/{id}', [DynamicPageController::class, 'destroy'])
        ->name('admin_dynamic_page_delete');

    Route::get('admin/dynamic-page/edit/{id}', [DynamicPageController::class, 'edit'])
        ->name('admin_dynamic_page_edit');

    Route::post('admin/dynamic-page/update/{id}', [DynamicPageController::class, 'update'])
        ->name('admin_dynamic_page_update');



    /* --------------------------------------- */
    /* Testimonial */
    /* --------------------------------------- */
    Route::get('admin/testimonial/view', [TestimonialController::class, 'index'])
        ->name('admin_testimonial_view');

    Route::get('admin/testimonial/create', [TestimonialController::class, 'create'])
        ->name('admin_testimonial_create');

    Route::post('admin/testimonial/store', [TestimonialController::class, 'store'])
        ->name('admin_testimonial_store');

    Route::get('admin/testimonial/delete/{id}', [TestimonialController::class, 'destroy'])
        ->name('admin_testimonial_delete');

    Route::get('admin/testimonial/edit/{id}', [TestimonialController::class, 'edit'])
        ->name('admin_testimonial_edit');

    Route::post('admin/testimonial/update/{id}', [TestimonialController::class, 'update'])
        ->name('admin_testimonial_update');


    /* --------------------------------------- */
    /* Amenity */
    /* --------------------------------------- */
    Route::get('admin/amenity/view', [AmenityControllerForAdmin::class, 'index'])
        ->name('admin_amenity_view');

    Route::get('admin/amenity/create', [AmenityControllerForAdmin::class, 'create'])
        ->name('admin_amenity_create');

    Route::post('admin/amenity/store', [AmenityControllerForAdmin::class, 'store'])
        ->name('admin_amenity_store');

    Route::get('admin/amenity/delete/{id}', [AmenityControllerForAdmin::class, 'destroy'])
        ->name('admin_amenity_delete');

    Route::get('admin/amenity/edit/{id}', [AmenityControllerForAdmin::class, 'edit'])
        ->name('admin_amenity_edit');

    Route::post('admin/amenity/update/{id}', [AmenityControllerForAdmin::class, 'update'])
        ->name('admin_amenity_update');


    /* --------------------------------------- */
    /* Listing Brand */
    /* --------------------------------------- */
    Route::get('admin/listing-brand/view', [ListingBrandControllerForAdmin::class, 'index'])
        ->name('admin_listing_brand_view');

    Route::get('admin/listing-brand/create', [ListingBrandControllerForAdmin::class, 'create'])
        ->name('admin_listing_brand_create');

    Route::post('admin/listing-brand/store', [ListingBrandControllerForAdmin::class, 'store'])
        ->name('admin_listing_brand_store');

    Route::get('admin/listing-brand/delete/{id}', [ListingBrandControllerForAdmin::class, 'destroy'])
        ->name('admin_listing_brand_delete');

    Route::get('admin/listing-brand/edit/{id}', [ListingBrandControllerForAdmin::class, 'edit'])
        ->name('admin_listing_brand_edit');

    Route::post('admin/listing-brand/update/{id}', [ListingBrandControllerForAdmin::class, 'update'])
        ->name('admin_listing_brand_update');

    Route::get('admin/admin_shippment_requests', [ListingBrandControllerForAdmin::class, 'admin_shippment_requests'])
        ->name('admin_shippment_requests');
    Route::get('admin/upload_invoices', [ListingBrandControllerForAdmin::class, 'admin_upload_invoices'])
        ->name('admin_see_upload_invoices');
    Route::get('admin/upload_invoices/{id}', [ListingBrandControllerForAdmin::class, 'admin_upload_invoices_files'])
        ->name('admin_see_upload_invoices_files');
    Route::get('admin/admin_shippment_show/{id}', [ListingBrandControllerForAdmin::class, 'admin_shippment_show'])
        ->name('admin_shippment_show');

    Route::put('admin_shipping_documents_update/{id}', [ListingBrandControllerForAdmin::class, 'admin_shipping_documents_update'])
        ->name('admin_shipping_documents_update');

    Route::get('admin/view_shipment_document/{id}', [ListingBrandControllerForAdmin::class, 'view_shipment_document'])
        ->name('view_shipment_document');

    Route::get('admin/download_shipment_document/{id}', [ListingBrandControllerForAdmin::class, 'download_shipment_document'])
        ->name('download.shipping_documents');

    Route::get('admin/shipping-documents/{document}/edit', [ListingBrandControllerForAdmin::class, 'editShippingDocument'])
        ->name('admin_shipping_documents.edit');

    Route::put('admin/shipping-documents/{document}', [ListingBrandControllerForAdmin::class, 'updateShippingDocument'])
        ->name('admin_shipping_documents.update');

    Route::delete('admin/shipping-documents/{document}', [ListingBrandControllerForAdmin::class, 'destroyShippingDocument'])
        ->name('admin_shipping_documents.destroy');

    Route::get('admin/shipping-documents/create/{id}', [ListingBrandControllerForAdmin::class, 'createShippingDocument'])
        ->name('admin_shipping_documents.create');

    Route::post('admin/shipping-documents', [ListingBrandControllerForAdmin::class, 'storeShippingDocument'])
        ->name('admin_shipping_documents.store');

    /* --------------------------------------- */
    /* Listing Location */
    /* --------------------------------------- */
    Route::get('admin/listing-location/view', [ListingLocationControllerForAdmin::class, 'index'])
        ->name('admin_listing_location_view');

    Route::get('admin/listing-location/create', [ListingLocationControllerForAdmin::class, 'create'])
        ->name('admin_listing_location_create');

    Route::post('admin/listing-location/store', [ListingLocationControllerForAdmin::class, 'store'])
        ->name('admin_listing_location_store');

    Route::get('admin/listing-location/delete/{id}', [ListingLocationControllerForAdmin::class, 'destroy'])
        ->name('admin_listing_location_delete');

    Route::get('admin/listing-location/edit/{id}', [ListingLocationControllerForAdmin::class, 'edit'])
        ->name('admin_listing_location_edit');

    Route::post('admin/listing-location/update/{id}', [ListingLocationControllerForAdmin::class, 'update'])
        ->name('admin_listing_location_update');
    // city
    Route::get('admin/listing-city/view', [ListingLocationControllerForAdmin::class, 'city_index'])
        ->name('admin_listing_city_view');

    Route::get('admin/listing-city/create', [ListingLocationControllerForAdmin::class, 'city_create'])
        ->name('admin_listing_city_create');

    Route::post('admin/listing-city/store', [ListingLocationControllerForAdmin::class, 'city_store'])
        ->name('admin_listing_city_store');

    Route::get('admin/listing-city/delete/{id}', [ListingLocationControllerForAdmin::class, 'city_destroy'])
        ->name('admin_listing_city_delete');

    Route::get('admin/listing-city/edit/{id}', [ListingLocationControllerForAdmin::class, 'city_edit'])
        ->name('admin_listing_city_edit');

    Route::post('admin/listing-city/update/{id}', [ListingLocationControllerForAdmin::class, 'city_update'])
        ->name('admin_listing_city_update');
    // portoption_service
    Route::get('admin/listing-port/view', [ListingLocationControllerForAdmin::class, 'port_index'])
        ->name('admin_listing_port_view');

    Route::get('admin/listing-port/create', [ListingLocationControllerForAdmin::class, 'port_create'])
        ->name('admin_listing_port_create');

    Route::post('admin/listing-port/store', [ListingLocationControllerForAdmin::class, 'port_store'])
        ->name('admin_listing_port_store');

    Route::get('admin/listing-port/delete/{id}', [ListingLocationControllerForAdmin::class, 'port_destroy'])
        ->name('admin_listing_port_delete');

    Route::get('admin/listing-port/edit/{id}', [ListingLocationControllerForAdmin::class, 'port_edit'])
        ->name('admin_listing_port_edit');

    Route::post('admin/listing-port/update/{id}', [ListingLocationControllerForAdmin::class, 'port_update'])
        ->name('admin_listing_port_update');
    // option_service
    Route::get('admin/listing-option_service/view', [ListingLocationControllerForAdmin::class, 'option_service_index'])
        ->name('admin_listing_option_service_view');

    Route::get('admin/listing-option_service/create', [ListingLocationControllerForAdmin::class, 'option_service_create'])
        ->name('admin_listing_option_service_create');

    Route::post('admin/listing-option_service/store', [ListingLocationControllerForAdmin::class, 'option_service_store'])
        ->name('admin_listing_option_service_store');

    Route::get('admin/listing-option_service/delete/{id}', [ListingLocationControllerForAdmin::class, 'option_service_destroy'])
        ->name('admin_listing_option_service_delete');

    Route::get('admin/listing-option_service/edit/{id}', [ListingLocationControllerForAdmin::class, 'option_service_edit'])
        ->name('admin_listing_option_service_edit');

    Route::post('admin/listing-option_service/update/{id}', [ListingLocationControllerForAdmin::class, 'option_service_update'])
        ->name('admin_listing_option_service_update');
    Route::post('admin_modify_shipping_status', [ListingBrandControllerForAdmin::class, 'admin_modify_shipping_status'])->name('admin_modify_shipping_status');
    // services
    // Display the form to create a new service
    Route::get('admin/services/create', [ListingBrandControllerForAdmin::class, 'serviceCreate'])->name('services.create');

    // Store a new service
    Route::post('admin/services', [ListingBrandControllerForAdmin::class, 'serviceStore'])->name('services.store');

    // Display a list of services
    Route::get('admin/services', [ListingBrandControllerForAdmin::class, 'serviceIndex'])->name('services.index');

    // Display details of a specific service
    Route::get('admin/services/{service}', [ListingBrandControllerForAdmin::class, 'serviceShow'])->name('services.show');

    // Display the form to edit a service
    Route::get('admin/services/{service}/edit', [ListingBrandControllerForAdmin::class, 'serviceEdit'])->name('services.edit');

    // Update a service
    Route::put('admin/services/{service}', [ListingBrandControllerForAdmin::class, 'serviceUpdate'])->name('services.update');

    // Delete a service
    Route::delete('admin/services/{service}', [ListingBrandControllerForAdmin::class, 'serviceDestroy'])->name('services.destroy');
    /* --------------------------------------- */
    /* Listing */
    /* --------------------------------------- */
    Route::get('admin/listing/view', [ListingControllerForAdmin::class, 'index'])
        ->name('admin_listing_view');

    Route::get('admin/listing/create', [ListingControllerForAdmin::class, 'create'])
        ->name('admin_listing_create');

    Route::post('admin/listing/store', [ListingControllerForAdmin::class, 'store'])
        ->name('admin_listing_store');

    Route::get('admin/listing/delete/{id}', [ListingControllerForAdmin::class, 'destroy'])
        ->name('admin_listing_delete');

    Route::get('admin/listing/edit/{id}', [ListingControllerForAdmin::class, 'edit'])
        ->name('admin_listing_edit');

    Route::post('admin/listing/update/{id}', [ListingControllerForAdmin::class, 'update'])
        ->name('admin_listing_update');
    Route::post('admin/listing/add_review', [ListingControllerForAdmin::class, 'add_review'])
        ->name('admin_listing_add_review');

    Route::post('admin/listing/update_photo_order', [ListingControllerForAdmin::class, 'update_photo_order'])
        ->name('admin_update_photo_order');
    // update_photo_order

    Route::get('admin/listing/delete-social-item/{id}', [ListingControllerForAdmin::class, 'delete_social_item'])
        ->name('admin_listing_delete_social_item');

    Route::get('admin/listing/delete-photo/{id}', [ListingControllerForAdmin::class, 'delete_photo'])
        ->name('admin_listing_delete_photo');

    Route::get('admin/listing/delete-video/{id}', [ListingControllerForAdmin::class, 'delete_video'])
        ->name('admin_listing_delete_video');

    Route::get('admin/listing/delete-additional-feature/{id}', [ListingControllerForAdmin::class, 'delete_additional_feature'])
        ->name('admin_listing_delete_additional_feature');

    Route::get('admin/listing-status/{id}', [ListingControllerForAdmin::class, 'change_status']);
    // Routes for Listing Transmissions

    Route::get('/admin/listings/transmissions', [ListingControllerForAdmin::class, 'listing_transmission_index'])->name('admin_listing_transmissions_index');
    Route::get('/admin/listings/transmissions/create', [ListingControllerForAdmin::class, 'listing_transmission_create'])->name('admin_listing_transmissions_create');
    Route::post('/admin/listings/transmissions', [ListingControllerForAdmin::class, 'listing_transmission_store'])->name('admin_listing_transmissions_store');
    Route::get('/admin/listings/transmissions/{transmissionId}/edit', [ListingControllerForAdmin::class, 'listing_transmission_edit'])->name('admin_listing_transmissions_edit');
    Route::put('/admin/listings/transmissions/{transmissionId}', [ListingControllerForAdmin::class, 'listing_transmission_update'])->name('admin_listing_transmissions_update');
    Route::delete('/admin/listings/transmissions/{transmissionId}', [ListingControllerForAdmin::class, 'listing_transmission_destroy'])->name('admin_listing_transmissions_destroy');


    /* --------------------------------------- */
    /* Review Settings */
    /* --------------------------------------- */
    Route::get('admin/admin-review/view', [ReviewController::class, 'view_admin_review'])
        ->name('admin_view_admin_review');

    Route::post('admin/admin-review/store', [ReviewController::class, 'store_admin_review'])
        ->name('admin_store_admin_review');

    Route::post('admin/admin-review/update/{id}', [ReviewController::class, 'update_admin_review'])
        ->name('admin_update_admin_review');

    Route::get('admin/admin-review/delete/{id}', [ReviewController::class, 'delete_admin_review'])
        ->name('admin_delete_admin_review');

    Route::get('admin/customer-review/view', [ReviewController::class, 'view_customer_review'])
        ->name('admin_view_customer_review');

    Route::get('admin/customer-review/delete/{id}', [ReviewController::class, 'delete_customer_review'])
        ->name('admin_delete_customer_review');

    /* --------------------------------------- */
    /* General Settings */
    /* --------------------------------------- */
    Route::get('admin/setting/general', [SettingController::class, 'edit'])
        ->name('admin_setting_general');

    Route::post('admin/setting/general/update', [SettingController::class, 'update'])
        ->name('admin_setting_general_update');


    /* --------------------------------------- */
    /* Advertisements */
    /* --------------------------------------- */
    Route::get('admin/advertisement/home', [HomeAdvertisementController::class, 'edit'])
        ->name('admin_home_advertisement');

    Route::post('admin/advertisement/home/update', [HomeAdvertisementController::class, 'update'])
        ->name('admin_home_advertisement_update');


    /* --------------------------------------- */
    /* Language Settings */
    /* --------------------------------------- */
    Route::get('admin/language/menu/view', [LanguageController::class, 'language_menu_text'])
        ->name('admin_language_menu_text');

    Route::post('admin/language/menu/update', [LanguageController::class, 'language_menu_text_update'])
        ->name('admin_language_menu_text_update');

    Route::get('admin/language/website/view', [LanguageController::class, 'language_website_text'])
        ->name('admin_language_website_text');

    Route::post('admin/language/website/update', [LanguageController::class, 'language_website_text_update'])
        ->name('admin_language_website_text_update');

    Route::get('admin/language/notification/view', [LanguageController::class, 'language_notification_text'])
        ->name('admin_language_notification_text');

    Route::post('admin/language/notification/update', [LanguageController::class, 'language_notification_text_update'])
        ->name('admin_language_notification_text_update');


    Route::get('admin/language/admin-panel/view', [LanguageController::class, 'language_admin_panel_text'])
        ->name('admin_language_admin_panel_text');

    Route::post('admin/language/admin-panel/update', [LanguageController::class, 'language_admin_panel_text_update'])
        ->name('admin_language_admin_panel_text_update');


    /* --------------------------------------- */
    /* Page Settings */
    /* --------------------------------------- */
    Route::get('admin/page-home/edit', [PageHomeController::class, 'edit'])
        ->name('admin_page_home_edit');
    Route::post('admin/page-home/update', [PageHomeController::class, 'update'])
        ->name('admin_page_home_update');

    Route::get('admin/page-about/edit', [PageAboutController::class, 'edit'])
        ->name('admin_page_about_edit');
    Route::post('admin/page-about/update', [PageAboutController::class, 'update'])
        ->name('admin_page_about_update');

    Route::get('admin/page-blog/edit', [PageBlogController::class, 'edit'])
        ->name('admin_page_blog_edit');
    Route::post('admin/page-blog/update', [PageBlogController::class, 'update'])
        ->name('admin_page_blog_update');

    Route::get('admin/page-faq/edit', [PageFaqController::class, 'edit'])
        ->name('admin_page_faq_edit');
    Route::post('admin/page-faq/update', [PageFaqController::class, 'update'])
        ->name('admin_page_faq_update');

    Route::get('admin/page-contact/edit', [PageContactController::class, 'edit'])
        ->name('admin_page_contact_edit');
    Route::post('admin/page-contact/update', [PageContactController::class, 'update'])
        ->name('admin_page_contact_update');

    Route::get('admin/page-pricing/edit', [PagePricingController::class, 'edit'])
        ->name('admin_page_pricing_edit');
    Route::post('admin/page-pricing/update', [PagePricingController::class, 'update'])
        ->name('admin_page_pricing_update');

    Route::get('admin/page-listing-brand/edit', [PageListingBrandController::class, 'edit'])
        ->name('admin_page_listing_brand_edit');
    Route::post('admin/page-listing-brand/update', [PageListingBrandController::class, 'update'])
        ->name('admin_page_listing_brand_update');

    Route::get('admin/page-listing-location/edit', [PageListingLocationController::class, 'edit'])
        ->name('admin_page_listing_location_edit');
    Route::post('admin/page-listing-location/update', [PageListingLocationController::class, 'update'])
        ->name('admin_page_listing_location_update');

    Route::get('admin/page-listing/edit', [PageListingController::class, 'edit'])
        ->name('admin_page_listing_edit');
    Route::post('admin/page-listing/update', [PageListingController::class, 'update'])
        ->name('admin_page_listing_update');

    Route::get('admin/page-term/edit', [PageTermController::class, 'edit'])
        ->name('admin_page_term_edit');
    Route::post('admin/page-term/update', [PageTermController::class, 'update'])
        ->name('admin_page_term_update');

    Route::get('admin/page-privacy/edit', [PagePrivacyController::class, 'edit'])
        ->name('admin_page_privacy_edit');
    Route::post('admin/page-privacy/update', [PagePrivacyController::class, 'update'])
        ->name('admin_page_privacy_update');

    Route::get('admin/page-other/edit', [PageOtherController::class, 'edit'])
        ->name('admin_page_other_edit');
    Route::post('admin/page-other/update', [PageOtherController::class, 'update'])
        ->name('admin_page_other_update');



    /* --------------------------------------- */
    /* FAQ - Admin */
    /* --------------------------------------- */
    Route::get('admin/faq/view', [FaqControllerForAdmin::class, 'index'])
        ->name('admin_faq_view');

    Route::get('admin/faq/create', [FaqControllerForAdmin::class, 'create'])
        ->name('admin_faq_create');

    Route::post('admin/faq/store', [FaqControllerForAdmin::class, 'store'])
        ->name('admin_faq_store');

    Route::get('admin/faq/delete/{id}', [FaqControllerForAdmin::class, 'destroy'])
        ->name('admin_faq_delete');

    Route::get('admin/faq/edit/{id}', [FaqControllerForAdmin::class, 'edit'])
        ->name('admin_faq_edit');

    Route::post('admin/faq/update/{id}', [FaqControllerForAdmin::class, 'update'])
        ->name('admin_faq_update');



    /* --------------------------------------- */
    /* Package - Admin */
    /* --------------------------------------- */
    Route::get('admin/package/view', [PackageControllerForAdmin::class, 'index'])
        ->name('admin_package_view');

    Route::get('admin/package/create', [PackageControllerForAdmin::class, 'create'])
        ->name('admin_package_create');

    Route::post('admin/package/store', [PackageControllerForAdmin::class, 'store'])
        ->name('admin_package_store');

    Route::get('admin/package/delete/{id}', [PackageControllerForAdmin::class, 'destroy'])
        ->name('admin_package_delete');

    Route::get('admin/package/edit/{id}', [PackageControllerForAdmin::class, 'edit'])
        ->name('admin_package_edit');

    Route::post('admin/package/update/{id}', [PackageControllerForAdmin::class, 'update'])
        ->name('admin_package_update');



    /* --------------------------------------- */
    /* Email Template - Admin */
    /* --------------------------------------- */
    Route::get('admin/email-template/view', [EmailTemplateController::class, 'index'])
        ->name('admin_email_template_view');

    Route::get('admin/email-template/edit/{id}', [EmailTemplateController::class, 'edit'])
        ->name('admin_email_template_edit');

    Route::post('admin/email-template/update/{id}', [EmailTemplateController::class, 'update'])
        ->name('admin_email_template_update');


    /* --------------------------------------- */
    /* Social Media - Admin */
    /* --------------------------------------- */
    Route::get('admin/social-media/view', [SocialMediaItemController::class, 'index'])
        ->name('admin_social_media_view');

    Route::get('admin/social-media/create', [SocialMediaItemController::class, 'create'])
        ->name('admin_social_media_create');

    Route::post('admin/social-media/store', [SocialMediaItemController::class, 'store'])
        ->name('admin_social_media_store');

    Route::get('admin/social-media/delete/{id}', [SocialMediaItemController::class, 'destroy'])
        ->name('admin_social_media_delete');

    Route::get('admin/social-media/edit/{id}', [SocialMediaItemController::class, 'edit'])
        ->name('admin_social_media_edit');

    Route::post('admin/social-media/update/{id}', [SocialMediaItemController::class, 'update'])
        ->name('admin_social_media_update');




    /* --------------------------------------- */
    /* Purchase History - Admin */
    /* --------------------------------------- */
    Route::get('admin/purchase-history/view', [PurchaseHistoryControllerForAdmin::class, 'index'])
        ->name('admin_purchase_history_view');

    Route::get('admin/purchase-history/detail/{id}', [PurchaseHistoryControllerForAdmin::class, 'detail'])
        ->name('admin_purchase_history_detail');

    Route::get('admin/purchase-history/invoice/{id}', [PurchaseHistoryControllerForAdmin::class, 'invoice'])
        ->name('admin_purchase_history_invoice');

    /* --------------------------------------- */
    /* Insurance - Admin */
    /* --------------------------------------- */
    Route::get('admin/insurance', [InsuranceController::class, 'index'])->name('admin_insurance_view');
    Route::get('admin/insurance/create', [InsuranceController::class, 'create'])->name('admin_insurance_create');
    Route::post('admin/insurance/store', [InsuranceController::class, 'store'])->name('admin_insurance_store');
    Route::get('admin/insurance/edit/{id}', [InsuranceController::class, 'edit'])->name('admin_insurance_edit');
    Route::post('admin/insurance/update', [InsuranceController::class, 'update'])->name('admin_insurance_update');
    Route::get('admin/insurance/delete/{id}', [InsuranceController::class, 'delete'])->name('admin_insurance_delete');

    /* --------------------------------------- */
    /* Freight - Admin */
    /* --------------------------------------- */
    Route::get('admin/freight', [FreightController::class, 'index'])->name('admin_freight_view');
    Route::get('admin/freight/create', [FreightController::class, 'create'])->name('admin_freight_create');
    Route::post('admin/freight/store', [FreightController::class, 'store'])->name('admin_freight_store');
    Route::get('admin/freight/edit/{id}', [FreightController::class, 'edit'])->name('admin_freight_edit');
    Route::post('admin/freight/update', [FreightController::class, 'update'])->name('admin_freight_update');
    Route::get('admin/freight/delete/{id}', [FreightController::class, 'delete'])->name('admin_freight_delete');

    /* --------------------------------------- */
    /* Freight - Admin */
    /* --------------------------------------- */
    Route::get('admin/offer_management', [FreightController::class, 'offer_index'])->name('admin_offer_managment_view');
    Route::get('admin/offer_management/edit/{id}', [FreightController::class, 'offer_edit'])->name('admin_offer_managment_edit');
    Route::post('admin/offer_management/update', [FreightController::class, 'offer_update'])->name('admin_offer_managment_update');
    Route::get('admin/offer_management/delete/{id}', [FreightController::class, 'offer_delete'])->name('admin_offer_managment_delete');
    /* --------------------------------------- */

    /* Inspection - Admin */
    /* --------------------------------------- */
    Route::get('admin/inspection', [InspectionController::class, 'index'])->name('admin_inspection_view');
    Route::get('admin/inspection/create', [InspectionController::class, 'create'])->name('admin_inspection_create');
    Route::post('admin/inspection/store', [InspectionController::class, 'store'])->name('admin_inspection_store');
    Route::get('admin/inspection/edit/{id}', [InspectionController::class, 'edit'])->name('admin_inspection_edit');
    Route::post('admin/inspection/update', [InspectionController::class, 'update'])->name('admin_inspection_update');
    Route::get('admin/inspection/delete/{id}', [InspectionController::class, 'delete'])->name('admin_inspection_delete');

    /* --------------------------------------- */
    /* Customer - Admin */
    /* --------------------------------------- */

    Route::get('admin/customer/view', [CustomerControllerForAdmin::class, 'index'])
        ->name('admin_customer_view');

    Route::get('admin/customer/detail/{id}', [CustomerControllerForAdmin::class, 'detail'])
        ->name('admin_customer_detail');

    Route::get('admin/customer/delete/{id}', [CustomerControllerForAdmin::class, 'destroy'])
        ->name('admin_customer_delete');

    Route::get('admin/customer-status/{id}', [CustomerControllerForAdmin::class, 'change_status']);
});


// Website Frontend Functions


Route::post('/filtercar', [ListingController::class, 'carfilter'])->name('filtercar');
Route::get('/brands/{slug}', [ListingController::class, 'brandsfilter'])->name('brandsfilter');
//Route::get('dialogbox',[ListingController::class,'dialogbox'])->name('dialogbox');
Route::get('/steering/{type}', [ListingController::class, 'steeringtype'])->name('steering');
Route::get('/pricing/{price1}/{price2}', [ListingController::class, 'pricingtype'])->name('pricing');
Route::post('/mainfilter', [ListingController::class, 'mainfilter'])->name('mainfilter');
Route::get('all-locations', [ListingController::class, 'allCars'])->name('allcars');

Route::view('why_choose_us', 'front.whychooseus')->name('why_choose_us');
Route::view('how_to_pay', 'front.howtopay')->name('how_to_pay');
Route::view('how_to_buy', 'front.howtobuy')->name('how_to_buy');
Route::get('faqs', [HomeController::class, 'faqs'])->name('faqs');
Route::view('export_information', 'front.exportinfo')->name('export_information');
Route::view('about', 'front.about')->name('about');
Route::view('global_offices', 'front.globaloffices')->name('global_offices');
Route::view('csr_policy', 'front.csr_policy')->name('csr_policy')->name('csr_policy');
Route::view('terms_and_services', 'front.terms_and_conditions')->name('terms_services');
Route::view('privacy_policy', 'front.privacy_policy')->name('privacy_policy');
Route::view('cookie', 'front.cookie')->name('cookie')->name('cookie');
Route::view('security_control', 'front.security_control')->name('security_control');
Route::view('basic_policy', 'front.basic_policy')->name('basic_policy');
Route::post('get_qoute', [ListingController::class, 'get_qoute'])->name('get_qoute');
Route::post('inquiry_form', [ListingController::class, 'inquiry_form'])->name('inquiry_form');
Route::get('location/{slug}', [HomeController::class, 'findlocation'])->name('location_find');
Route::get('model/{year}', [HomeController::class, 'find_model'])->name('find_model_year');
Route::view('contact', 'front.contact')->name('contact');
Route::get('all_reviews', [Homecontroller::class, 'allreviews'])->name('allreviews');
Route::view('liveoption', 'front.liveoption')->name('liveoption');
Route::view('how_we_deliver', 'front.how-we-deliver')->name('how-we-deliver');
Route::view('add-review', 'front.add_review')->name('add-review');
Route::post('submit-review', [HomeController::class, 'submitReview'])->name('submit-review');
Route::get('category/{slug}', [Homecontroller::class, 'cateogryFind'])->name('category');
Route::get('type/{slug}', [ListingController::class, 'findType'])->name('Find-type');
Route::post('car-data', [Homecontroller::class, 'CarData'])->name('car-data');


// Route::view('new-dashboard','front.customer-newdashboard.dashboard')->name('new-dashboard');
Route::view('all-invoice', 'front.customer-newdashboard.inovice')->name('all-inovice');
Route::view('verify-email', 'front.customer-newdashboard.verify_email')->name('verify-email');
Route::view('favorites', 'front.customer-newdashboard.favorites')->name('favorites');
Route::view('deposite', 'front.customer-newdashboard.deposite')->name('deposite');
Route::view('language-preference', 'front.customer-newdashboard.language_preference')->name('language-preference');
Route::view('track-shipment', 'front.customer-newdashboard.track')->name('track-shipment');
Route::view('create-order', 'front.customer-newdashboard.create_order')->name('create-order');
Route::view('shipping-information', 'front.customer-newdashboard.shipping_information')->name('shipping-information');
Route::view('car-detail', 'front.customer-newdashboard.car_detail')->name('car-detail');
Route::get('upload-proof', [CustomerControllerForFront::class, 'customeruploadpaidinvoice'])->name('upload-proof');

// Route::view('upload-proof', 'front.customer-newdashboard.upload_proof')->name('upload-proof');
Route::view('history', 'front.customer-newdashboard.history')->name('history');
Route::view('request-car', 'front.customer-newdashboard.request_car')->name('request-car');