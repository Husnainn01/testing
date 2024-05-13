<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ListingPageMessage;
use App\Mail\ListingPageReport;
use App\Models\EmailTemplate;
use App\Models\GeneralSetting;
use App\Models\Listing;
use App\Models\ListingAdditionalFeature;
use App\Models\ListingAmenity;
use App\Models\ListingBrand;
use App\Models\ListingLocation;
use App\Models\ListingPhoto;
use App\Models\ListingSocialItem;
use App\Models\ListingVideo;
use App\Models\Amenity;
use App\Models\PageListingBrandItem;
use App\Models\PageListingItem;
use App\Models\PageListingLocationItem;
use App\Models\Port;
use App\Models\Review;
use App\Models\Wishlist;
use App\Models\User;
use App\Models\Admin;
use App\Models\Freight;
use App\Models\Insurance;
use App\Models\Inspection;
use App\Models\Qoute;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Mail;

class ListingController extends Controller
{

    public function carfilter(Request $request)
    {
        // dd($request->all()); // Debugging line, can be removed later

        $listings = Listing::query();


        $fl_brand = "";
        $fl_min_year = "";
        $fl_max_year = "";
        $fl_steering = "";
        $fl_body_type = "";
        $fl_min_price = "";


        // Filter by brand
        if ($request->filled('brand')) {
            $listings->where('listing_brand_id', $request->brand);
            $fl_brand = $request->brand;
        }

        // Filter by model year
        if ($request->filled('model')) {
            $listings->where('listing_model_year', $request->model);
        }

        // Filter by year range
        if ($request->filled('year_from') && $request->filled('year_to')) {
            // Assuming you have a 'year' field in your listings table
            $listings->whereBetween('listing_model_year', [$request->year_from, $request->year_to]);
            $fl_min_year = $request->year_from;
            $fl_max_year = $request->year_to;
        }

        // Filter by steering
        if ($request->filled('steering')) {
            // Assuming you have a 'steering' field in your listings table
            $listings->where('steering', $request->steering);
            $fl_steering = $request->steering;
        }

        // Filter by body type
        if ($request->filled('bodytype')) {
            $listings->where('listing_type', $request->bodytype);
            $fl_body_type = $request->bodytype;
        }

        // Filter by price
        if ($request->filled('price')) {
            $listings->where('listing_price', '<=', $request->price);
            $fl_min_price = $request->price;
        }

        // Filter by location
        // Code for location filter if needed

        // Retrieve the listings
        $data = $listings->orderBy('created_at', 'desc')->get();
        // Return the view with the filtered data
        return view('front.listing_result', compact('data', 'fl_brand', 'fl_min_year', 'fl_max_year', 'fl_steering', 'fl_body_type', 'fl_min_price'));
    }

    //    public function carfilter(Request $request)
    //    {
    //        dd($request->all());
    //
    //        $listings = Listing::query();
    //
    //        if ($request->has('brand') && $request->input('brand') !== null) {
    //            $listings->where('listing_brand_id', $request->input('brand'));
    //        }
    //        if ($request->has('model') && $request->input('model') !== null) {
    //            $listings->where('listing_model_year', $request->input('model'));
    //        }
    //        if ($request->has('bodytype') && $request->input('bodytype') !== null) {
    //            $listings->where('listing_type', $request->input('bodytype'));
    //        }
    //        if ($request->has('location') && $request->input('location') !== null) {
    //            $listings->where('listing_location_id', $request->input('location'));
    //        }
    //
    //        if ($request->has('pricefrom') && $request->input('pricefrom' && $request->has('priceto') && $request->input('priceto') !== null)) {
    //            if ($request->has('pricefrom') && $request->has('priceto')) {
    //                $listings->whereBetween('listing_price', [$request->input('pricefrom'), $request->input('priceto')]);
    //            } elseif ($request->has('pricefrom')) {
    //                $listings->where('listing_price', '>=', $request->input('pricefrom'));
    //            } elseif ($request->has('priceto')) {
    //                $listings->where('listing_price', '<=', $request->input('priceto'));
    //            }
    //        }
    //
    //        $data = $listings->orderBy('created_at', 'desc')->get();
    //        // Process or return the $listings as needed
    //        return view('front.listing_result', compact('data'));
    //    }

    public function mainfilter(Request $request)

    {
        $listings = Listing::query();
        $fl_brand = "";
        $fl_doors = "";
        $fl_condition = "";
        $fl_status = "";
        $fl_steering = "";
        $fl_location = "";
        $fl_seats = "";
        $fl_body_type = "";
        $fl_fuel_type = "";
        $fl_transmission = "";
        $fl_colorItem = "";
        $fl_min_year = "";
        $fl_max_year = "";
        $fl_min_price = "";
        $fl_max_price = "";
        $fl_min_mileage = "";
        $fl_max_mileage = "";
        $fl_min_engine_capacity = "";
        $fl_max_engine_capacity = "";

        if ($request->has('brands') && $request->input('brands') !== null) {
            $listings->where('listing_brand_id', $request->input('brands'));
            $fl_brand = $request->input('brands');
        }

        if ($request->has('doors') && $request->input('doors') !== null) {
            $listings->where('listing_door', $request->input('doors'));
            $fl_doors = $request->input('doors');
        }

        if ($request->has('condition') && $request->input('condition') !== null) {
            $listings->where('listing_type', $request->input('condition'));
            $fl_condition = $request->input('condition');
        }
        if ($request->has('status') && $request->input('status') !== null) {
            $listings->where('listing_stock_status', $request->input('status'));
            $fl_status = $request->input('status');
        }

        if ($request->has('steering') && $request->input('steering') !== null) {
            $listings->where('steering', $request->input('location'));
            $fl_steering = $request->input('steering');
            $fl_location = $request->input('location');
        }
        if ($request->has('seats') && $request->input('seats') !== null) {
            $listings->where('listing_seat', $request->input('seats'));
            $fl_seats = $request->input('seats');
        }

        if ($request->has('body_type') && $request->input('body_type') !== null) {
            $listings->where('listing_body', $request->input('body_type'));
            $fl_body_type = $request->input('body_type');
        }


        if ($request->has('fuel_type') && $request->input('fuel_type') !== null) {
            $listings->where('listing_fuel_type', $request->input('fuel_type'));
            $fl_fuel_type = $request->input('fuel_type');
        }

        if ($request->has('transmission') && $request->input('transmission') !== null) {
            $listings->where('listing_transmission', $request->input('transmission'));
            $fl_transmission = $request->input('transmission');
        }

        if ($request->has('color') && $request->input('color') !== null) {
            $listings->where('listing_exterior_color', $request->input('color'));
            $fl_colorItem = $request->input('color');
        }

        if ($request->has('min_price') && $request->input('min_price') !== null && $request->has('max_price') && $request->input('max_price') !== null) {
            $listings = $listings->whereBetween('listing_price', [$request->input('min_price'), $request->input('max_price')]);
            $fl_min_price = $request->input('min_price');
            $fl_max_price = $request->input('max_price');
        }
        if ($request->has('from_year') && $request->input('from_year') !== null && $request->has('to_year') && $request->input('to_year') !== null) {
            $listings = $listings->whereBetween('listing_model_year', [$request->input('min_year'), $request->input('max_year')]);
            $min_year = $request->input('from_year');
            $max_year = $request->input('to_year');
        }

        if ($request->has('min_mileage') && $request->input('min_mileage') !== null && $request->has('max_mileage' && $request->input('max_mileage') !== null)) {
            $listings = $listings->whereBetween('listing_mileage', [$request->input('min_mileage'), $request->input('max_mileage')]);
            $min_mileage = $request->input('min_mileage');
            $max_mileage = $request->input('max_mileage');
        }


        if ($request->has('min_engine_capacity') && $request->input('min_engine_capacity') !== null && $request->has('max_engine_capacity') && $request->input('max_engine_capacity') !== null) {
            $listings = $listings->whereBetween('listing_mileage', [$request->input('min_engine_capacity'), $request->input('max_engine_capacity')]);
            $min_engine_capacity = $request->input('min_engine_capacity');
            $max_engine_capacity = $request->input('max_engine_capacity');
        }
        $data = $listings->orderBy('created_at', 'desc')->get();
        return view('front.listing_result', compact('data', 'fl_brand', 'fl_doors', 'fl_condition', 'fl_status', 'fl_steering', 'fl_location', 'fl_seats', 'fl_body_type', 'fl_fuel_type', 'fl_transmission', 'fl_min_year', 'fl_max_year', 'fl_min_price', 'fl_max_price', 'fl_min_mileage', 'fl_max_mileage', 'fl_min_engine_capacity', 'fl_max_engine_capacity', 'fl_colorItem'));
    }
    function allCars()
    {
        $data = Listing::all();
        return view('front.listing_result', compact('data'));
    }


    public function steeringtype($type)
    {
        $data = Listing::where('steering', $type)->get();
        return view('front.listing_result', compact('data'));
    }
    public function pricingtype($price1, $price2)
    {
        $data = Listing::whereBetween('listing_price', [$price1, $price2])->get();
        return view('front.listing_result', compact('data'));
    }

    public function brandsfilter($slug)
    {
        $slug_data = ListingBrand::where('listing_brand_slug', $slug)->first();
        $data = Listing::where('listing_brand_id', $slug_data->id)->get();
        return view('front.listing_result', compact('data'));
    }
    public function findType($slug)
    {

        $data = Listing::where('listing_body', $slug)->get();
        return view('front.listing_result', compact('data'));
    }
    public function index()
    {
        abort(404);
    }
    public function dialogbox(Request $request)
    {

        $brands = ListingBrand::all();
        $location = ListingLocation::all();
        $clientreviews = Review::all();
        $carsdata = Listing::where('listing_location_id', $request->location)->get();
        return view('front.index', compact('brands', 'location', 'carsdata', 'clientreviews'));
    }
    public function detail($slug)
    {
        $g_setting = GeneralSetting::where('id', 1)->first();
        $detail = Listing::with('rListingLocation', 'rListingBrand')
            ->where('listing_slug', $slug)
            ->first();

        // $listing_social_items = ListingSocialItem::where('listing_id', $detail->id)->get();
        $listing_social_items = ListingSocialItem::where('listing_id', $detail->id)->get();

        $listing_first_photos = ListingPhoto::where('listing_id', $detail->id)->orderBy('order', 'asc')->get();
        // $listing_first_photos = ListingPhoto::where('listing_id', $detail->id)->first();
        // $listing_photos = ListingPhoto::where('listing_id',$id)->orderBy('id','asc')->get();

        // $listing_photos = ListingPhoto::where('listing_id', $detail->id)->get();
        $listing_photos = ListingPhoto::where('listing_id', $detail->id)->orderBy('order', 'asc')->get();
        // $listing_photos = ListingPhoto::where('listing_id',$id)->orderBy('id','asc')->get();

        $listing_videos = ListingVideo::where('listing_id', $detail->id)->get();
        $listing_amenities = ListingAmenity::where('listing_id', $detail->id)->get();

        $listing_additional_features = ListingAdditionalFeature::where('listing_id', $detail->id)->get();
        $listing_brands = ListingBrand::orderBy('listing_brand_name', 'asc')->get();
        $listing_locations = ListingLocation::orderBy('listing_location_name', 'asc')->get();
        $listing_locations_car = ListingLocation::where('id', $detail->listing_location_id)->first();
        $listing_ports = Port::orderBy('id', 'asc')->get();
        $reviews = Review::where('listing_id', $detail->id)
            ->orderBy('id', 'asc')
            ->get();

        // Getting overall rating
        if ($reviews->isEmpty()) {
            $overall_rating = 0;
        } else {
            $total_number = 0;
            $count = 0;
            foreach ($reviews as $item) {
                $count++;
                $total_number = $total_number + $item->rating;
            }
            $overall_rating = $total_number / $count;
            if ($overall_rating > 0 && $overall_rating <= 1) {
                $overall_rating = 1;
            } elseif ($overall_rating > 1 && $overall_rating <= 1.5) {
                $overall_rating = 1.5;
            } elseif ($overall_rating > 1.5 && $overall_rating <= 2) {
                $overall_rating = 2;
            } elseif ($overall_rating > 2 && $overall_rating <= 2.5) {
                $overall_rating = 2.5;
            } elseif ($overall_rating > 2.5 && $overall_rating <= 3) {
                $overall_rating = 3;
            } elseif ($overall_rating > 3 && $overall_rating <= 3.5) {
                $overall_rating = 3.5;
            } elseif ($overall_rating > 3.5 && $overall_rating <= 4) {
                $overall_rating = 4;
            } elseif ($overall_rating > 4 && $overall_rating <= 4.5) {
                $overall_rating = 4.5;
            } elseif ($overall_rating > 4.5 && $overall_rating <= 5) {
                $overall_rating = 5;
            }
        }

        if ($detail->user_id == 0) {
            $agent_detail = Admin::where('id', $detail->admin_id)->first();
        } elseif ($detail->admin_id == 0) {
            $agent_detail = User::where('id', $detail->user_id)->first();
        }

        $current_auth_user_id = 0;
        if (Auth::user()) {
            $current_auth_user_id = Auth::user()->id;
        }

        // If he already given review for this item
        $already_given = 0;
        $already_given = Review::where('listing_id', $detail->id)
            ->where('agent_id', $current_auth_user_id)
            ->where('agent_type', 'Customer')
            ->count();

        $all_amenities = Amenity::orderBy('id', 'asc')->get();
        $freights = Freight::all();
        $insurances = Insurance::all();
        $inspection_certificates = Inspection::all();
        return view('front.listing_detail', compact('inspection_certificates', 'insurances', 'freights', 'detail', 'listing_locations_car', 'listing_first_photos', 'listing_ports', 'g_setting', 'listing_social_items', 'listing_photos', 'listing_videos', 'listing_amenities', 'listing_additional_features', 'listing_brands', 'listing_locations', 'agent_detail', 'reviews', 'current_auth_user_id', 'already_given', 'overall_rating', 'all_amenities', 'detail'));
    }

    public function brand_all()
    {
        $g_setting = GeneralSetting::where('id', 1)->first();
        $listing_brand_page_data = PageListingBrandItem::where('id', 1)->first();
        $orderwise_listing_brands = DB::select('SELECT *
                        FROM listing_brands as r1
                        LEFT JOIN (SELECT listing_brand_id, count(*) as total
                            FROM listings as l
                            JOIN listing_brands as lc
                            ON l.listing_brand_id = lc.id
                            GROUP BY listing_brand_id
                            ORDER BY total DESC) as r2
                        ON r1.id = r2.listing_brand_id
                        ORDER BY r2.total DESC');
        return view('front.listing_brands', compact('g_setting', 'listing_brand_page_data', 'orderwise_listing_brands'));
    }

    public function brand_detail($slug)
    {
        $g_setting = GeneralSetting::where('id', 1)->first();
        $listing_brand_page_data = PageListingBrandItem::where('id', 1)->first();
        $listing_brand_detail = ListingBrand::where('listing_brand_slug', $slug)->first();
        $listing_items = Listing::with('rListingBrand', 'rListingLocation')->where('listing_brand_id', $listing_brand_detail->id)->paginate(15);
        return view('front.listing_brand_detail', compact('g_setting', 'listing_brand_detail', 'listing_items', 'listing_brand_page_data'));
    }

    public function location_all()
    {
        $g_setting = GeneralSetting::where('id', 1)->first();
        $listing_location_page_data = PageListingLocationItem::where('id', 1)->first();
        $orderwise_listing_locations = DB::select('SELECT *
                        FROM listing_locations as r1
                        LEFT JOIN (SELECT listing_location_id, count(*) as total
                            FROM listings as l
                            JOIN listing_brands as lc
                            ON l.listing_location_id = lc.id
                            GROUP BY listing_location_id
                            ORDER BY total DESC) as r2
                        ON r1.id = r2.listing_location_id
                        ORDER BY r2.total DESC');

        return view('front.listing_locations', compact('g_setting', 'listing_location_page_data', 'orderwise_listing_locations'));
    }

    public function location_detail($slug)
    {
        $g_setting = GeneralSetting::where('id', 1)->first();
        $listing_location_page_data = PageListingLocationItem::where('id', 1)->first();
        $listing_location_detail = ListingLocation::where('listing_location_slug', $slug)->first();
        session()->put('country', $listing_location_detail->listing_location_name);
        $listing_items = Listing::with('rListingBrand', 'rListingLocation')->where('listing_location_id', $listing_location_detail->id)->paginate(15);
        return view('front.listing_location_detail', compact('g_setting', 'listing_location_detail', 'listing_items', 'listing_location_page_data'));
    }

    public function agent_detail($type, $id)
    {
        $g_setting = GeneralSetting::where('id', 1)->first();

        if ($type == 'admin') {
            $agent_detail = Admin::where('id', $id)->first();
            $all_listings = Listing::with('rListingBrand', 'rListingLocation')
                ->where('admin_id', $id)
                ->where('listing_status', 'Active')
                ->get();
        } else {
            $agent_detail = User::where('id', $id)->first();
            $all_listings = Listing::with('rListingBrand', 'rListingLocation')
                ->where('user_id', $id)
                ->where('listing_status', 'Active')
                ->get();
        }
        return view('front.listing_agent_detail', compact('g_setting', 'agent_detail', 'all_listings'));
    }

    public function listing_result(Request $request)
    {
        $g_setting = GeneralSetting::where('id', 1)->first();
        $listing_page_data = PageListingItem::where('id', 1)->first();
        $listing_brands = ListingBrand::get();
        $listing_locations = ListingLocation::get();
        $amenities = Amenity::get();

        // Breaking Urls
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $actual_link_len = strlen($actual_link);

        $first_part = url()->current();
        $first_part_len = strlen($first_part);

        $all_brand = [];
        $all_location = [];
        $all_amenity = [];

        $aa = substr($actual_link, ($first_part_len + 1), ($actual_link_len - 1));
        $arr = explode('&', $aa);


        if ($request->amenity) {
            $listings = Listing::whereHas('listingAminities', function ($query) use ($request) {
                $sortArr = [];
                if ($request->amenity) {
                    foreach ($request->amenity as $amnty) {
                        $sortArr[] = $amnty;
                    }
                    $query->whereIn('amenity_id', $sortArr);
                }
            })->with('user')->orderBy('id', 'desc');
        } else {
            $listings = Listing::with('user')->orderBy('id', 'desc');
        }

        if ($request->location) {
            $location_arr = $request->location;
            $listings = $listings->whereIn('listing_location_id', $location_arr);
        }

        if ($request->brand) {
            $brand_arr = $request->brand;
            $listings = $listings->whereIn('listing_brand_id', $brand_arr);
        }


        if ($request->listing_type) {
            if ($request->listing_type == 'New Car') {
                $listings = $listings->where('listing_type', 'New Car');
            }
            if ($request->listing_type == 'Used Car') {
                $listings = $listings->where('listing_type', 'Used Car');
            }
        }

        if ($request->text) {
            $listings = $listings->where('listing_name', 'LIKE', '%' . $request->text . '%');
        }

        $listings = $listings->paginate(20);
        $listings = $listings->appends($request->all());

        $data = $this->getData();

        return view('front.listing_result', $data, compact('g_setting', 'listing_page_data', 'listing_brands', 'listing_locations', 'amenities', 'all_brand', 'all_location', 'all_amenity', 'listings'));
    }
    private function getData()
    {
        $location = ListingLocation::all();
        $modelYears = Listing::distinct()->orderBy('listing_model_year', 'asc')->pluck('listing_model_year');
        $slider = Slide::where('id', 1)->first();
        $brands = ListingBrand::all();
        $freights = Freight::all();
        $insurances = Insurance::all();
        $inspection_certificates = Inspection::all();
        $fueltype = Listing::distinct()->orderBy('listing_fuel_type', 'asc')->pluck('listing_fuel_type');
        $seat = Listing::distinct()->orderBy('listing_seat', 'asc')->pluck('listing_seat');
        $body = Listing::distinct()->orderBy('listing_body', 'asc')->pluck('listing_body');
        $price = Listing::distinct()->orderBy('listing_price', 'asc')->pluck('listing_price');
        $enginecapacity = Listing::distinct()->orderBy('listing_engine_capacity', 'asc')->pluck('listing_engine_capacity');
        $color = Listing::distinct()->orderBy('listing_exterior_color', 'asc')->pluck('listing_exterior_color');
        $mileage = Listing::distinct()->orderBy('listing_mileage', 'asc')->pluck('listing_mileage');
        $door = Listing::distinct()->orderBy('listing_door', 'asc')->pluck('listing_door');
        $listing_stock = Listing::count();

        $userdata = Auth::user();

        return compact(
            'location',
            'modelYears',
            'slider',
            'brands',
            'freights',
            'insurances',
            'inspection_certificates',
            'fueltype',
            'seat',
            'body',
            'price',
            'enginecapacity',
            'color',
            'mileage',
            'door',
            'listing_stock',
            'userdata'
        );
    }
    public function search_listing(Request $request)
    {



        if ($request->amenity) {
            $listings = Listing::whereHas('listingAminities', function ($query) use ($request) {
                $sortArr = [];
                if ($request->amenity) {
                    foreach ($request->amenity as $amnty) {
                        $sortArr[] = $amnty;
                    }
                    $query->whereIn('amenity_id', $sortArr);
                }
            })->with('user')->orderBy('id', 'desc');
        } else {
            $data = Listing::with('user')->orderBy('id', 'desc');
        }

        if ($request->location) {
            $location_arr = $request->location;
            $data = $data->whereIn('listing_location_id', $location_arr);
        }

        if ($request->brand) {
            $brand_arr = $request->brand;
            $data = $data->whereIn('listing_brand_id', $brand_arr);
        }


        if ($request->listing_type) {
            if ($request->listing_type == 'New Car') {
                $data = $data->where('listing_type', 'New Car');
            }
            if ($request->listing_type == 'Used Car') {
                $data = $data->where('listing_type', 'Used Car');
            }
        }

        if ($request->text) {
            $data = $data->where('listing_name', 'LIKE', '%' . $request->text . '%');
        }

        $data = $data->paginate(20);
        $data = $data->appends($request->all());



        return view('front.listing_result', compact('data'));
    }


    public function search_listing_result(Request $request)
    {
        if ($request->amenity) {
            $listings = Listing::whereHas('listingAminities', function ($query) use ($request) {
                $sortArr = [];
                if ($request->amenity) {
                    foreach ($request->amenity as $amnty) {
                        $sortArr[] = $amnty;
                    }
                    $query->whereIn('amenity_id', $sortArr);
                }
            })->with('user')->orderBy('id', 'desc');
        } else {
            $listings = Listing::with('user')->orderBy('id', 'desc');
        }

        if ($request->location) {
            if ($request->location[0] != null) {
                $location_arr = $request->location;
                $listings = $listings->whereIn('listing_location_id', $location_arr);
            }
        }

        if ($request->brand) {
            if ($request->brand[0] != null) {
                $brand_arr = $request->brand;
                $listings = $listings->whereIn('listing_brand_id', $brand_arr);
            }
        }

        if ($request->listing_type) {
            if ($request->listing_type == 'New Car') {
                $listings = $listings->where('listing_type', 'New Car');
            }
            if ($request->listing_type == 'Used Car') {
                $listings = $listings->where('listing_type', 'Used Car');
            }
        }

        if ($request->text) {
            $listings = $listings->where('listing_name', 'LIKE', '%' . $request->text . '%');
        }
        $listings = $listings->where('listing_status', 'Active');
        $listings = $listings->paginate(20);
        $listings = $listings->appends($request->all());


        return view('front.ajax_search_listing', compact('listings'));
    }

    public function send_message(Request $request)
    {
        if (env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $g_setting = GeneralSetting::where('id', 1)->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ], [
            'name.required' => ERR_NAME_RREQUIRED,
            'email.required' => ERR_EMAIL_REQUIRED,
            'email.email' => ERR_EMAIL_INVALID,
            'message.required' => ERR_MESSAGE_REQUIRED
        ]);

        if ($g_setting->google_recaptcha_status == 'Show') {
            $request->validate([
                'g-recaptcha-response' => 'required'
            ], [
                'g-recaptcha-response.required' => ERR_RECAPTCHA_REQUIRED
            ]);
        }

        $listing_name = $request->listing_name;
        $listing_url = '<a href="' . url('listing/' . $request->listing_slug) . '">' . url('listing/' . $request->listing_slug) . '</a>';
        $agent_name = $request->agent_name;

        // Send Email
        $email_template_data = EmailTemplate::where('id', 9)->first();
        $subject = $email_template_data->et_subject;
        $message = $email_template_data->et_content;

        $message = str_replace('[[agent_name]]', $agent_name, $message);
        $message = str_replace('[[listing_name]]', $listing_name, $message);
        $message = str_replace('[[listing_url]]', $listing_url, $message);
        $message = str_replace('[[name]]', $request->name, $message);
        $message = str_replace('[[email]]', $request->email, $message);
        $message = str_replace('[[phone]]', $request->phone, $message);
        $message = str_replace('[[message]]', $request->message, $message);

        Mail::to($request->agent_email)->send(new ListingPageMessage($subject, $message));

        return redirect()->back()->with('success', SUCCESS_MESSAGE_SENT);
    }

    public function report_listing(Request $request)
    {
        if (env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $g_setting = GeneralSetting::where('id', 1)->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ], [
            'name.required' => ERR_NAME_REQUIRED,
            'email.required' => ERR_EMAIL_REQUIRED,
            'email.email' => ERR_EMAIL_INVALID,
            'message.required' => ERR_MESSAGE_REQUIRED,
        ]);

        if ($g_setting->google_recaptcha_status == 'Show') {
            $request->validate([
                'g-recaptcha-response' => 'required'
            ], [
                'g-recaptcha-response.required' => ERR_RECAPTCHA_REQUIRED
            ]);
        }

        $listing_name = $request->listing_name;
        $listing_url = '<a href="' . url('listing/' . $request->listing_slug) . '">' . url('listing/' . $request->listing_slug) . '</a>';

        // Send Email
        $email_template_data = EmailTemplate::where('id', 10)->first();
        $subject = $email_template_data->et_subject;
        $message = $email_template_data->et_content;

        $message = str_replace('[[listing_name]]', $listing_name, $message);
        $message = str_replace('[[listing_url]]', $listing_url, $message);
        $message = str_replace('[[name]]', $request->name, $message);
        $message = str_replace('[[email]]', $request->email, $message);
        $message = str_replace('[[phone]]', $request->phone, $message);
        $message = str_replace('[[message]]', $request->message, $message);

        $admin_data = Admin::where('id', 1)->first();

        Mail::to($admin_data->email)->send(new ListingPageReport($subject, $message));

        return redirect()->back()->with('success', SUCCESS_REPORT_SENT);
    }

    public function wishlist_add($id)
    {
        if (env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        if (Auth::user() == null) {
            return redirect()->back()->with('error', ERR_LOGIN_FIRST);
        }

        $check_previous = Wishlist::where('listing_id', $id)->count();
        if ($check_previous > 0) {
            return redirect()->back()->with('error', ERR_ALREADY_TO_WISHLIST);
        }

        $user_data = Auth::user();

        $obj = new Wishlist;
        $obj->user_id = $user_data->id;
        $obj->listing_id = $id;
        $obj->save();

        return redirect()->back()->with('success', SUCCESS_WISHLIST_ADD);
    }

    public function get_qoute(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('customer_login')->with('success', 'Please login to continue');
        }
        $car = Listing::findorFail(intval($request->car_id));
        $FOB_price = floatval($car->listing_price) ?? 0;
        $car_name = $car->listing_name;
        $total = 0;
        $total += $FOB_price;
        $data = new Qoute();
        $data->fob_price = $FOB_price;
        $data->car_id = $car->id;
        $data->offer = floatval($request->offer) ?? 0;
        $data->name = $request->name ?? '-';
        $data->email = $request->email ?? '-';
        $data->phone_no = $request->phone_no ?? '-';
        $data->country = $request->country ?? '-';
        // $data->agreed_price=floatval($request->agreed_price) ?? 0;
        $data->type = 'individual';
        $data->car_name = $car_name ?? '-';
        $data->user_id = Auth::user()->id;
        if ($request->freight) {
            $freight = Freight::findorFail(intval($request->freight));
            $total += floatval($freight->price);
            $data->freight_id = floatval($freight->id);
        }
        // dd($total);
        if ($request->insurance) {
            $insurance = Insurance::findorFail(intval($request->insurance));
            $data->insurance_id = $insurance->id;
            $total += floatval($insurance->price);
        }
        if ($request->inspection_certificate) {
            $inspection = Inspection::findorFail(intval($request->inspection_certificate));
            $data->inspection_id = $inspection->id;
            $total += floatval($inspection->price);
        }
        $data->total_price = $total;
        $data->save();
        //
        if (isset($car->rListingLocation)) {
            if (isset($car->rListingLocation->email)) {
                $emailData = [
                    'FOB_price' => $FOB_price,
                    'offer' => floatval($request->offer) ?? 0,
                    'name' => $request->name ?? '-',
                    'email' => $request->email ?? '-',
                    'phone_no' => $request->phone_no ?? '-',
                    'country' => $request->country ?? '-',
                    'type' => 'individual',
                    'car_name' => $car_name ?? '-',
                    'total_price' => $data->total_price ?? '-'
                    // Include other data fields as needed
                ];

                $emailContent = "FOB Price: {$emailData['FOB_price']}\n"
                    . "Offer: {$emailData['offer']}\n"
                    . "Name: {$emailData['name']}\n"
                    . "Email: {$emailData['email']}\n"
                    . "Phone No: {$emailData['phone_no']}\n"
                    . "Country: {$emailData['country']}\n"
                    . "Type: {$emailData['type']}\n"
                    . "Car Name: {$emailData['car_name']}\n"
                    . "Total Price: {$emailData['total_price']}\n";

                // Send the email
                Mail::raw($emailContent, function ($message) use ($car) {
                    $message->to($car->rListingLocation->email);
                });
            }
        }
        return redirect()->route('front.home')->with('success', 'Your Offer has been Received');
    }
    public function inquiry_form(Request $req)
    {
        dd($req->input());
    }
}
