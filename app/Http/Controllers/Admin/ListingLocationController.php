<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\ListingLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use DB;
use Auth;
use App\Models\City;
use App\Models\Port;
use App\Models\OptionService;

class ListingLocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function index()
    {
        $listing_location = ListingLocation::orderBy('id', 'asc')->get();
        return view('admin.listing_location_view', compact('listing_location'));
    }

    public function create()
    {
        $listing_location = ListingLocation::get();
        return view('admin.listing_location_create', compact('listing_location'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'listing_location_name' => 'required|unique:listing_locations',
            'listing_location_slug' => 'unique:listing_locations',
            'listing_location_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'listing_location_name.required' => ERR_NAME_REQUIRED,
            'listing_location_name.unique' => ERR_NAME_EXIST,
            'listing_location_slug.unique' => ERR_SLUG_UNIQUE,
            'listing_location_photo.required' => ERR_PHOTO_REQUIRED,
            'listing_location_photo.image' => ERR_PHOTO_IMAGE,
            'listing_location_photo.mimes' => ERR_PHOTO_JPG_PNG_GIF,
            'listing_location_photo.max' => ERR_PHOTO_MAX
        ]);

        $statement = DB::select("SHOW TABLE STATUS LIKE 'listing_locations'");
        $ai_id = $statement[0]->Auto_increment;

        $ext = $request->file('listing_location_photo')->extension();
        $rand_value = md5(mt_rand(11111111, 99999999));
        $final_name = $rand_value . '.' . $ext;
        $request->file('listing_location_photo')->move(public_path('uploads/listing_location_photos/'), $final_name);

        $listing_location = new ListingLocation();
        $data = $request->only($listing_location->getFillable());
        if (empty($data['listing_location_slug'])) {
            unset($data['listing_location_slug']);
            $data['listing_location_slug'] = Str::slug($request->listing_location_name);
        }

        if (preg_match('/\s/', $data['listing_location_slug'])) {
            return Redirect()->back()->with('error', ERR_SLUG_WHITESPACE);
        }

        unset($data['listing_location_photo']);
        $data['listing_location_photo'] = $final_name;

        $listing_location->fill($data)->save();

        return redirect()->route('admin_listing_location_view')->with('success', SUCCESS_ACTION);
    }

    public function edit($id)
    {
        $listing_location = ListingLocation::findOrFail($id);
        return view('admin.listing_location_edit', compact('listing_location'));
    }

    public function update(Request $request, $id)
    {
        $listing_location = ListingLocation::findOrFail($id);
        $data = $request->only($listing_location->getFillable());

        if ($request->hasFile('listing_location_photo')) {

            $request->validate([
                'listing_location_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ], [
                'listing_location_photo.image' => ERR_PHOTO_IMAGE,
                'listing_location_photo.mimes' => ERR_PHOTO_JPG_PNG_GIF,
                'listing_location_photo.max' => ERR_PHOTO_MAX
            ]);
            // Uploading the file
            $ext = $request->file('listing_location_photo')->extension();
            $rand_value = md5(mt_rand(11111111, 99999999));
            $final_name = $rand_value . '.' . $ext;
            $request->file('listing_location_photo')->move(public_path('uploads/listing_location_photos/'), $final_name);

            unset($data['listing_location_photo']);
            $data['listing_location_photo'] = $final_name;
        }

        $request->validate([
            'listing_location_name'   =>  [
                'required',
                Rule::unique('listing_locations')->ignore($id),
            ],
            'listing_location_slug'   =>  [
                Rule::unique('listing_locations')->ignore($id),
            ]
        ], [
            'listing_location_name.required' => ERR_NAME_REQUIRED,
            'listing_location_name.unique' => ERR_NAME_EXIST,
            'listing_location_slug.unique' => ERR_SLUG_UNIQUE,
        ]);

        if (empty($data['listing_location_slug'])) {
            unset($data['listing_location_slug']);
            $data['listing_location_slug'] = Str::slug($request->listing_location_name);
        }

        if (preg_match('/\s/', $data['listing_location_slug'])) {
            return Redirect()->back()->with('error', ERR_SLUG_WHITESPACE);
        }

        $listing_location->fill($data)->save();

        return redirect()->route('admin_listing_location_view')->with('success', SUCCESS_ACTION);
    }

    public function destroy($id)
    {


        $tot = Listing::where('listing_location_id', $id)->count();
        if ($tot) {
            return Redirect()->back()->with('error', ERR_ITEM_DELETE);
        }

        $listing_location = ListingLocation::findOrFail($id);
        $listing_location->delete();

        // Success Message and redirect
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }

    // city
    public function city_index()
    {
        $listing_cities = City::orderBy('id', 'asc')->get();
        return view('admin.city.listing_city_view', compact('listing_cities'));
    }

    public function city_create()
    {
        $countries = ListingLocation::get();
        return view('admin.city.listing_city_create', compact('countries'));
    }

    public function city_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'country_id' => 'required|unique:cities'
        ]);
        $cityData = $request->all();
        $listing_city = new City();
        $listing_city->fill($cityData);
        $listing_city->save();
        return redirect()->route('admin_listing_city_view')->with('success', SUCCESS_ACTION);
    }

    public function city_edit($id)
    {
        $listing_city = City::findOrFail($id);
        $countries = ListingLocation::get();
        return view('admin.city.listing_city_edit', compact('listing_city', 'countries'));
    }

    public function city_update(Request $request, $id)
    {
        // Find the city by its ID
        $listing_city = City::findOrFail($id);

        // Validate the request data
        $request->validate([
            'name' => 'required',
            'country_id' => 'required|unique:cities,id,' . $id, // Ensure the uniqueness rule excludes the current city
        ]);

        $cityData = $request->all();

        // Update the city model with the new data
        $listing_city->fill($cityData);
        $listing_city->save();

        return redirect()->route('admin_listing_city_view')->with('success', SUCCESS_ACTION);
    }

    public function city_destroy($id)
    {
        $listing_city = City::findOrFail($id);
        $listing_city->delete();
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }
    // port
    public function port_index()
    {
        $listing_ports = Port::orderBy('id', 'asc')->get();
        return view('admin.port.listing_port_view', compact('listing_ports'));
    }

    public function port_create()
    {
        $countries = ListingLocation::get();
        return view('admin.port.listing_port_create', compact('countries'));
    }

    public function port_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'country_id' => 'required'
        ]);
        $portyData = $request->all();
        $listing_port = new Port();
        $listing_port->fill($portyData);
        $listing_port->save();
        return redirect()->route('admin_listing_port_view')->with('success', SUCCESS_ACTION);
    }

    public function port_edit($id)
    {
        $listing_port = Port::findOrFail($id);
        $countries = ListingLocation::get();
        return view('admin.port.listing_port_edit', compact('listing_port', 'countries'));
    }

    public function port_update(Request $request, $id)
    {
        $listing_port = Port::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            // 'country_id' => 'required|unique:cities,id,' . $id, // Ensure the uniqueness rule excludes the current city
            'country_id' => 'required', // Ensure the uniqueness rule excludes the current city
        ]);
        $portData = $request->all();
        $listing_port->fill($portData);
        $listing_port->save();
        return redirect()->route('admin_listing_port_view')->with('success', SUCCESS_ACTION);
    }

    public function port_destroy($id)
    {
        $listing_port = Port::findOrFail($id);
        $listing_port->delete();
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }
    // option services
    public function option_service_index()
    {
        $option_services = OptionService::orderBy('id', 'asc')->get();
        return view('admin.option_service.listing_option_service_view', compact('option_services'));
    }

    public function option_service_create()
    {
        return view('admin.option_service.listing_option_service_create');
    }

    public function option_service_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        $optionService = new OptionService($request->all());
        $optionService->save();
        return redirect()
            ->route('admin_listing_option_service_view')
            ->with('success', 'Option service created successfully');
    }

    public function option_service_edit($id)
    {
        $optionService = OptionService::findOrFail($id);
        return view('admin.option_service.listing_option_service_edit', compact('optionService'));
    }
    public function option_service_update(Request $request, $id)
    {
        $optionService = OptionService::findOrFail($id);
        $rules = [
            'name' => 'required',
            'price' => 'required'
        ];
        $request->validate($rules);
        $optionService->update($request->all());
        return redirect()
            ->route('admin_listing_option_service_view')
            ->with('success', 'Option service updated successfully');
    }

    public function option_service_destroy($id)
    {
        $optionService = OptionService::findOrFail($id);
        $optionService->delete();
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }
}
