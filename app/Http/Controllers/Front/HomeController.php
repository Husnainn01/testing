<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\PageHomeItem;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\ListingBrand;
use App\Models\ListingLocation;
use App\Models\HomeAdvertisement;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Review;
use App\Models\Freight;
use App\Models\Insurance;
use App\Models\Inspection;
use App\Models\Slide;
use App\Models\Category;
use DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function addToFavorites(Request $request)
    {
        $listingId = $request->input('listingId');
        $user = auth()->user();
        $user->favorites()->syncWithoutDetaching([$listingId]);

        return response()->json(['message' => 'Listing added to favorites successfully']);
    }
    public function homedata()
    {
        $adv_home_data = HomeAdvertisement::where('id',1)->first();
        $countcars=Listing::all()->count();

    	$page_home_items = PageHomeItem::where('id',1)->first();

        $testimonials = Testimonial::get();

        $listing_brands = ListingBrand::orderBy('listing_brand_name','asc')->get();
        $listing_locations = ListingLocation::orderBy('listing_location_name','asc')->get();

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

        $orderwise_listing_locations = DB::select('SELECT *
                        FROM listing_locations as r1
                        LEFT JOIN (SELECT listing_location_id, count(*) as total
                            FROM listings as l
                            JOIN listing_locations as ll
                            ON l.listing_location_id = ll.id
                            GROUP BY listing_location_id
                            ORDER BY total DESC) as r2
                        ON r1.id = r2.listing_location_id
                        ORDER BY r2.total DESC');

        $listings = Listing::with('rListingBrand','rListingLocation')
            ->orderBy('created_at','dsc')
            ->where('listing_status','Active')
            ->where('is_featured','Yes')
            ->get();

        return view('front.index', compact('adv_home_data','page_home_items','orderwise_listing_brands','orderwise_listing_locations','listings','listing_brands','listing_locations','testimonials'));

    }
    function cateogryFind($slug){
        $slug_data=Category::where('category_slug',$slug)->first();
        $data=Listing::where('category_id',$slug_data->id)->get();
        return view('front.listing_result',compact('data'));
    }


    function CarData(Request $request){

        $models = Listing::where('listing_brand_id', $request->brand)
        ->groupBy('listing_model_year')
        ->pluck('listing_model_year');


        return response()->json($models->toArray());
    }
    function submitReview(Request $request){
        try {
            return back()->with('success','Your Review has been added');
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }

    }
    function index(){
        $brands=ListingBrand::all();
        $location=ListingLocation::all();
        $locations=ListingLocation::all();
        $carsdata=Listing::latest()->paginate(4);
        $clientreviews = Review::with('agent','listing')->take(2)->get();
        $most_popular_cars = Listing::where('is_featured','Yes')->orderBy('created_at','desc')->paginate(8, ['*'], 'mpc_page');
        $new_arrivals = Listing::where('is_new_arrival',1)->orderBy('created_at','desc')->paginate(8, ['*'], 'na_page');
        $faqs=Faq::all();
        // $advertisements = HomeAdvertisement::where('id',1)->first();
        return view('front.index',compact('new_arrivals','most_popular_cars','brands','locations','carsdata','clientreviews','faqs','location',));

    }
    public function findlocation($slug)
    {
        try {
            if (empty($slug)) {
                throw new \Exception('Slug is undefined or null.');
            }

            $location_slug = ListingLocation::where('listing_location_slug', $slug)->firstOrFail();
            $data = Listing::where('listing_location_id', $location_slug->id)->get();
            $freights = Freight::all();
            $insurances = Insurance::all();
            $inspection_certificates = Inspection::all();
            $location= ListingLocation::all();
            $modelYears = Listing::distinct()
                ->orderBy('listing_model_year', 'asc')
                ->pluck('listing_model_year');
            $slider = Slide::where('id',1)->first();
            $brands = ListingBrand::all();

            return view('front.listing_result', compact('brands','slider','modelYears','location', 'data', 'freights', 'insurances', 'inspection_certificates'));
        } catch (\Exception $e) {
            return view('front.index', ['error_message' => $e->getMessage()]);
        }
    }


    function find_model($year){
        $carsdata=Listing::where('listing_model_year',$year)->get();
        $brands=ListingBrand::all();
        $location=ListingLocation::all();
        $clientreviews=Review::all();

        return view('front.index',compact('brands','location','carsdata','clientreviews'));
    }
    public function allreviews(){
        $clientreviews=Review::all();
        return view('front.allreviews',compact('clientreviews'));
    }
    public function faqs(){
        $faqs=Faq::all();
        return view('front.faq',compact('faqs'));
    }
}
