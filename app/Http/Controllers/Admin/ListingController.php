<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\ListingSocialItem;
use App\Models\ListingAdditionalFeature;
use App\Models\ListingPhoto;
use App\Models\ListingVideo;
use App\Models\ListingBrand;
use App\Models\ListingLocation;
use App\Models\ListingAmenity;
use App\Models\Amenity;
use App\Models\Review;
use App\Models\Transmission;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class ListingController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin:admin');
    }

    public function index() {
        $listing = Listing::with('rListingBrand','rListingLocation')->paginate(10);
        return view('admin.listing_view', compact('listing'));
    }

    public function create() {
        $listing = Listing::get();
        $listing_brand = ListingBrand::orderBy('id','asc')->get();
        $listing_location = ListingLocation::orderBy('id','asc')->get();
        $amenity = Amenity::orderBy('id','asc')->get();
        $categories = Category::all();
        $transmissions = Transmission::all();
        return view('admin.listing_create', compact('listing','listing_brand','listing_location','amenity','categories', 'transmissions'));
    }
    public function storing(){
        $listing=Listing::where('steering',$req->steering)->get();
        dd($listing);
    }

    public function store(Request $request) {
        $user_data = Auth::user();
        $request->validate([
            // 'listing_name' => 'required|unique:listings',
            'listing_name' => 'required',
            'listing_transmission' =>'required',
            'listing_body' =>'required',

            // 'listing_stock_id' => 'required',
            'listing_slug' => 'unique:listings',
            'listing_featured_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'listing_price' => 'required|numeric',
            'category_id' => 'required'
        ],[
            'listing_name.required' => ERR_NAME_REQUIRED,
            'listing_transmission.required' => 'Please Select transmisson',
            'listing_name.unique' => ERR_NAME_EXIST,
            'listing_slug.unique' => ERR_SLUG_UNIQUE,
            'listing_featured_photo.required' => ERR_PHOTO_REQUIRED,
            'listing_featured_photo.image' => ERR_PHOTO_IMAGE,
            'listing_featured_photo.mimes' => ERR_PHOTO_JPG_PNG_GIF,
            'listing_featured_photo.max' => ERR_PHOTO_MAX,
            'listing_price.required' => ERR_PRICE_REQUIRED,
            'listing_price.numeric' => ERR_PRICE_NUMERIC,
            'category_id' => 'Please Select Listing Category',
            'listing_body' => 'Please Select Listing Body'
        ]);

        $statement = DB::select("SHOW TABLE STATUS LIKE 'listings'");
        $ai_id = $statement[0]->Auto_increment;

        $rand_value = md5(mt_rand(11111111,99999999));
        $ext = $request->file('listing_featured_photo')->extension();
        $final_name = $rand_value.'.'.$ext;
        $request->file('listing_featured_photo')->move(public_path('uploads/listing_featured_photos'), $final_name);

        $obj = new Listing();
        $data = $request->only($obj->getFillable());
        if(empty($data['listing_slug'])) {
            unset($data['listing_slug']);
            $data['listing_slug'] = Str::slug($request->listing_name);
        }
        if(preg_match('/\s/',$data['listing_slug'])) {
            return Redirect()->back()->with('error', ERR_SLUG_WHITESPACE);
        }
        $data['listing_featured_photo'] = $final_name;
        $data['steering']=$request->steering;
        $data['user_id'] = 0;
        $data['listing_description'] = 'car';
        $data['admin_id'] = $user_data->id;
        $obj->fill($data)->save();
        $obj->listing_stock_id = $request->listing_stock_id;
        $obj->save();


        // Amenity
        if($request->amenity != '') {
            $arr_amenity = array();
            foreach($request->amenity as $item) {
                $arr_amenity[] = $item;
            }
            for($i=0;$i<count($arr_amenity);$i++) {
                $obj = new ListingAmenity;
                $obj->listing_id = $ai_id;
                $obj->amenity_id = $arr_amenity[$i];
                $obj->save();
            }
        }

        // Photo
        if($request->photo_list == '') {
            //echo 'No photo selected';
        } else {
            foreach($request->photo_list as $item) {
                $file_in_mb = $item->getSize()/1024/1024;
                $main_file_ext = $item->extension();
                $main_mime_type = $item->getMimeType();

                if( ($main_mime_type == 'image/jpeg' || $main_mime_type == 'image/png' || $main_mime_type == 'image/gif') && $file_in_mb <= 2 ) {
                    $rand_value = md5(mt_rand(11111111,99999999));
                    $final_photo_name = $rand_value.'.'.$main_file_ext;
                    $item->move(public_path('uploads/listing_photos'), $final_photo_name);

                    $obj = new ListingPhoto;
                    $obj->listing_id = $ai_id;
                    $obj->photo = $final_photo_name;
                    $obj->save();
                }
            }
        }


        // Video
        if($request->youtube_video_id[0] != '') {
            $arr_youtube_video_id = array();
            foreach($request->youtube_video_id as $item) {
                $arr_youtube_video_id[] = $item;
            }
            for($i=0;$i<count($arr_youtube_video_id);$i++) {
                if($arr_youtube_video_id[$i] != '') {
                    $obj = new ListingVideo;
                    $obj->listing_id = $ai_id;
                    $obj->youtube_video_id = $arr_youtube_video_id[$i];
                    $obj->save();
                }
            }
        }


        // Social Icons
        if($request->social_icon[0] != '') {
            $arr_social_icon = array();
            $arr_social_url = array();
            foreach($request->social_icon as $item) {
                $arr_social_icon[] = $item;
            }
            foreach($request->social_url as $item) {
                $arr_social_url[] = $item;
            }
            for($i=0;$i<count($arr_social_icon);$i++) {
                if( ($arr_social_icon[$i] != '') && ($arr_social_url[$i] != '') ) {
                    $obj = new ListingSocialItem;
                    $obj->listing_id = $ai_id;
                    $obj->social_icon = $arr_social_icon[$i];
                    $obj->social_url = $arr_social_url[$i];
                    $obj->save();
                }
            }
        }


        // Additional Features
        if($request->additional_feature_name[0] != '') {
            $arr_additional_feature_name = array();
            $arr_additional_feature_value = array();
            foreach($request->additional_feature_name as $item) {
                $arr_additional_feature_name[] = $item;
            }
            foreach($request->additional_feature_value as $item) {
                $arr_additional_feature_value[] = $item;
            }
            for($i=0;$i<count($arr_additional_feature_name);$i++) {
                if( ($arr_additional_feature_name[$i] != '') && ($arr_additional_feature_value[$i] != '') ) {
                    $obj = new ListingAdditionalFeature;
                    $obj->listing_id = $ai_id;
                    $obj->additional_feature_name = $arr_additional_feature_name[$i];
                    $obj->additional_feature_value = $arr_additional_feature_value[$i];
                    $obj->save();
                }
            }
        }
        return redirect()->route('admin_listing_view')->with('success', SUCCESS_ACTION);
    }

    public function edit($id) {
        // dd($id);
        $user_data = Auth::user();
        $listing = Listing::where('id', $id)->first();
        $listing_brand = ListingBrand::orderBy('id','asc')->get();
        $listing_location = ListingLocation::orderBy('id','asc')->get();
        $amenity = Amenity::orderBy('id','asc')->get();
        $transmissions = Transmission::all();
        $existing_amenities_array = array();
        $listing_amenities = ListingAmenity::where('listing_id',$id)->orderBy('id','asc')->get();
        foreach($listing_amenities as $row) {
            $existing_amenities_array[] = $row->amenity_id;
        }
        // $listing_photos = ListingPhoto::where('listing_id',$id)->orderBy('id','asc')->get();
        $listing_photos = ListingPhoto::where('listing_id', $id)->orderBy('order', 'asc')->get();
        $listing_videos = ListingVideo::where('listing_id',$id)->orderBy('id','asc')->get();
        $listing_additional_features = ListingAdditionalFeature::where('listing_id',$id)->orderBy('id','asc')->get();
        $listing_social_items = ListingSocialItem::where('listing_id',$id)->orderBy('id','asc')->get();
        $categories = Category::all();
        return view('admin.listing_edit', compact('listing','transmissions','listing_brand','listing_location','amenity','listing_photos','listing_videos','listing_additional_features','listing_social_items','listing_amenities','existing_amenities_array','categories'));
    }

    public function update_photo_order(Request $request)
    {
        // $listing_photos = ListingPhoto::where('listing_id', $id)->orderBy('order', 'asc')->get();
        $order = $request->input('order');
        $listingId = $request->input('listing_id');

        foreach ($order as $index => $photoId) {
            // Find the photo by its ID and update the order
            $photo = ListingPhoto::find($photoId);
            $photo->update(['order' => $index + 1]);
        }
        return response()->json(['message' => 'Photo order updated successfully']);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $obj = Listing::findOrFail($id);
        // dd($obj);
        $data = $request->only($obj->getFillable());
        // dd($data);
        // dd($request->hasFile('listing_featured_photo'));
        if($request->hasFile('listing_featured_photo')) {

            $request->validate([
                'listing_featured_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ],[
                'listing_featured_photo.image' => ERR_PHOTO_IMAGE,
                'listing_featured_photo.mimes' => ERR_PHOTO_JPG_PNG_GIF,
                'listing_featured_photo.max' => ERR_PHOTO_MAX,
                'category_id' => 'required'
            ]);

            // Uploading the file
            $ext = $request->file('listing_featured_photo')->extension();
            $rand_value = md5(mt_rand(11111111,99999999));
            $final_name = $rand_value.'.'.$ext;
            $request->file('listing_featured_photo')->move(public_path('uploads/listing_featured_photos/'), $final_name);

            unset($data['listing_featured_photo']);
            $data['listing_featured_photo'] = $final_name;
        }

        $request->validate([
            'listing_name'   =>  [
                'required'
            ],
            'listing_transmission' =>'required',
            'listing_body' =>'required',
            'listing_price' => 'required|numeric'
        ],[
            'listing_name.required' => ERR_NAME_REQUIRED,
            'listing_name.unique' => ERR_NAME_EXIST,
            'listing_slug.unique' => ERR_SLUG_UNIQUE,
            'listing_price.required' => ERR_PRICE_REQUIRED,
            'listing_price.numeric' => ERR_PRICE_NUMERIC,
            'category_id' => 'Please select listing category',
            'listing_body' => 'Please Select Listing Body'
        ]);
        if(empty($data['listing_slug'])) {
            unset($data['listing_slug']);
            $data['listing_slug'] = Str::slug($request->listing_name);
        }
        if(preg_match('/\s/',$data['listing_slug'])) {
            return Redirect()->back()->with('error', ERR_SLUG_WHITESPACE);
        }
        $data['listing_description'] = 'car';
        $obj->fill($data)->save();
        // $obj->listing_stock_id = $request->listing_stock_id;
        $obj->save();



        // Amenity
        $existing_amenities_array = array();
        $arr_amenity = array();
        $result1 = array();
        $result2 = array();

        $listing_amenities = ListingAmenity::where('listing_id',$id)->orderBy('id','asc')->get();
        foreach($listing_amenities as $row) {
            $existing_amenities_array[] = $row->amenity_id;
        }

        if($request->amenity != '') {
            foreach($request->amenity as $item) {
                $arr_amenity[] = $item;
            }
        }

        $result1 = array_values(array_diff($existing_amenities_array, $arr_amenity));
        if(!empty($result1)) {
            for($i=0;$i<count($result1);$i++) {
                ListingAmenity::where('listing_id', $id)
                    ->where('amenity_id', $result1[$i])
                    ->delete();
            }
        }

        $result2 = array_values(array_diff($arr_amenity,$existing_amenities_array));
        if(!empty($result2)) {
            for($i=0;$i<count($result2);$i++) {
                $obj = new ListingAmenity;
                $obj->listing_id = $id;
                $obj->amenity_id = $result2[$i];
                $obj->save();
            }
        }


        // Photo
        if($request->photo_list == '') {
            //echo 'No photo selected';
        } else {
            foreach($request->photo_list as $item) {
                $file_in_mb = $item->getSize()/1024/1024;
                $main_file_ext = $item->extension();
                $main_mime_type = $item->getMimeType();

                if( ($main_mime_type == 'image/jpeg' || $main_mime_type == 'image/png' || $main_mime_type == 'image/gif') && $file_in_mb <= 2 ) {
                    $rand_value = md5(mt_rand(11111111,99999999));
                    $final_photo_name = $rand_value.'.'.$main_file_ext;
                    $item->move(public_path('uploads/listing_photos'), $final_photo_name);

                    $obj = new ListingPhoto;
                    $obj->listing_id = $id;
                    $obj->photo = $final_photo_name;
                    $obj->save();
                }
            }
        }


        // Video
        if($request->youtube_video_id[0] != '') {
            $arr_youtube_video_id = array();
            foreach($request->youtube_video_id as $item) {
                $arr_youtube_video_id[] = $item;
            }
            for($i=0;$i<count($arr_youtube_video_id);$i++) {
                if($arr_youtube_video_id[$i] != '') {
                    $obj = new ListingVideo;
                    $obj->listing_id = $id;
                    $obj->youtube_video_id = $arr_youtube_video_id[$i];
                    $obj->save();
                }
            }
        }


        // Social Icons
        if($request->social_icon[0] != '')
        {
            $arr_social_icon = array();
            $arr_social_url = array();
            foreach($request->social_icon as $item) {
                $arr_social_icon[] = $item;
            }
            foreach($request->social_url as $item) {
                $arr_social_url[] = $item;
            }
            for($i=0;$i<count($arr_social_icon);$i++) {
                if( ($arr_social_icon[$i] != '') && ($arr_social_url[$i] != '') ) {
                    $obj = new ListingSocialItem;
                    $obj->listing_id = $id;
                    $obj->social_icon = $arr_social_icon[$i];
                    $obj->social_url = $arr_social_url[$i];
                    $obj->save();
                }
            }
        }

        // Additional Features
        if($request->additional_feature_name[0] != '') {
            $arr_additional_feature_name = array();
            $arr_additional_feature_value = array();
            foreach($request->additional_feature_name as $item) {
                $arr_additional_feature_name[] = $item;
            }
            foreach($request->additional_feature_value as $item) {
                $arr_additional_feature_value[] = $item;
            }
            for($i=0;$i<count($arr_additional_feature_name);$i++) {
                if( ($arr_additional_feature_name[$i] != '') && ($arr_additional_feature_value[$i] != '') ) {
                    $obj = new ListingAdditionalFeature;
                    $obj->listing_id = $id;
                    $obj->additional_feature_name = $arr_additional_feature_name[$i];
                    $obj->additional_feature_value = $arr_additional_feature_value[$i];
                    $obj->save();
                }
            }
        }

        // return redirect()->route('admin_listing_view')->with('success', SUCCESS_ACTION);


        //upon client request: redirect to same edit page
        $user_data = Auth::user();

        $listing = Listing::where('id', $id)->first();

        $listing_brand = ListingBrand::orderBy('id','asc')->get();
        $listing_location = ListingLocation::orderBy('id','asc')->get();
        $amenity = Amenity::orderBy('id','asc')->get();

        $existing_amenities_array = array();
        $listing_amenities = ListingAmenity::where('listing_id',$id)->orderBy('id','asc')->get();
        foreach($listing_amenities as $row) {
            $existing_amenities_array[] = $row->amenity_id;
        }

        $listing_photos = ListingPhoto::where('listing_id', $id)->orderBy('order', 'asc')->get();

        // $listing_photos = ListingPhoto::where('listing_id',$id)->orderBy('id','asc')->get();
        $listing_videos = ListingVideo::where('listing_id',$id)->orderBy('id','asc')->get();
        $listing_additional_features = ListingAdditionalFeature::where('listing_id',$id)->orderBy('id','asc')->get();

        $listing_social_items = ListingSocialItem::where('listing_id',$id)->orderBy('id','asc')->get();
        $categories = Category::all();
        $transmissions= Transmission::all();
        return view('admin.listing_edit', compact('listing','transmissions','listing_brand','listing_location','amenity','listing_photos','listing_videos','listing_additional_features','listing_social_items','listing_amenities','existing_amenities_array','categories'))->with('success', SUCCESS_ACTION);
    }

    public function destroy($id) {

        $listing = Listing::findOrFail($id);
        $listing->delete();

        ListingAmenity::where('listing_id', $id)->delete();
        ListingSocialItem::where('listing_id', $id)->delete();
        ListingVideo::where('listing_id', $id)->delete();
        ListingAdditionalFeature::where('listing_id', $id)->delete();

        $all_photos = ListingPhoto::where('listing_id',$id)->orderBy('order', 'asc')->get();
        // $all_photos = ListingPhoto::where('listing_id',$id)->get();
        // $listing_photos = ListingPhoto::where('listing_id', $id)->orderBy('order', 'asc')->get();

        ListingPhoto::where('listing_id', $id)->delete();

        // Success Message and redirect
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }


    public function delete_social_item($id) {

        // if(env('PROJECT_MODE') == 0) {
        //     return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        // }

        $listing_social_item = ListingSocialItem::findOrFail($id);
        $listing_social_item->delete();
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }

    public function delete_photo($id) {
        $listing_photo = ListingPhoto::findOrFail($id);
        $listing_photo->delete();
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }

    public function delete_video($id) {

        $listing_video = ListingVideo::findOrFail($id);
        $listing_video->delete();
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }

    public function delete_additional_feature($id) {
        $listing_additional_feature = ListingAdditionalFeature::findOrFail($id);
        $listing_additional_feature->delete();
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }

    public function change_status($id) {
        $listing = Listing::find($id);
        if($listing->listing_status == 'Active') {
            if(env('PROJECT_MODE') == 0) {
                $message=env('PROJECT_NOTIFICATION');
            } else {
                $listing->listing_status = 'Pending';
                $message=SUCCESS_ACTION;
                $listing->save();
            }
        } else {
            if(env('PROJECT_MODE') == 0) {
                $message=env('PROJECT_NOTIFICATION');
            } else {
                $listing->listing_status = 'Active';
                $message=SUCCESS_ACTION;
                $listing->save();
            }
        }
        return response()->json($message);
    }
    //
    public function listing_transmission_index()
    {
        $transmissions = Transmission::all();

        return view('transmission.index', compact('transmissions'));
    }

    public function listing_transmission_create()
    {
        return view('transmission.create');
    }

    // Store the transmission
    public function listing_transmission_store(Request $request)
    {
        $request->validate([
            'description' => 'required|max:255',
            // Add more validation rules as needed
        ]);

        Transmission::create($request->all());

        return redirect()->route('admin_listing_transmissions_index')
            ->with('success', 'Transmission added successfully.');
    }

    // Edit transmission
    public function listing_transmission_edit($transmissionId)
    {
        $transmission = Transmission::findOrFail($transmissionId);
        return view('transmission.edit', compact('transmission'));
    }

    // Update transmission
    public function listing_transmission_update(Request $request, $transmissionId)
    {
        $request->validate([
            'description' => 'required|max:255',
            // Add more validation rules as needed
        ]);

        $transmission = Transmission::findOrFail($transmissionId);
        $transmission->update($request->all());

        return redirect()->route('admin_listing_transmissions_index')
            ->with('success', 'Transmission updated successfully.');
    }

    // Delete transmission
    public function listing_transmission_destroy($transmissionId)
    {
        $transmission = Transmission::findOrFail($transmissionId);
        $transmission->delete();

        return redirect()->route('admin_listing_transmissions_index')
            ->with('success', 'Transmission deleted successfully.');
    }


    public function add_review(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'listing_id' => 'required|numeric',
            'rating' => 'required|numeric|min:1|max:5',
            'name_of_customer' => 'required|string|max:255',
            'country' => 'required',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $admin_data=Auth::user();
            $data=[
                'listing_id'=>$request->listing_id,
                'agent_id'=>$admin_data->id,
                'agent_type'=>'Customer',
                'rating'=>$request->rating,
                'name'=>$request->name_of_customer,
                'location_id'=>$request->country,
                'review'=>$request->description,
            ];
            Review::updateOrCreate(
                ['listing_id' => $request->listing_id],
                $data
            );
            return redirect()->back()->with('success', 'Review added successfully!');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

}
