<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\Document;
use App\Models\Qoute;
use App\Models\ListingBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use DB;
use Auth;
use App\Models\ShippingOrder;
use App\Models\Invoice;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;
use Illuminate\Support\Facades\Log;

class ListingBrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function index()
    {
        $listing_brand = ListingBrand::orderBy('id', 'asc')->get();
        return view('admin.listing_brand_view', compact('listing_brand'));
    }
    public function admin_shippment_requests()
    {
        $shippment_requests = ShippingOrder::orderBy('id', 'desc')->get();
        return view('admin.shippment_requests_view', compact('shippment_requests'));
    }
    public function admin_upload_invoices()
    {
        $shippment_requests = ShippingOrder::orderBy('id', 'desc')->get();
        // dd($shippment_requests);
        return view('admin.upload_invoice_view', compact('shippment_requests'));
    }





    public function admin_shippment_show($id)
    {
        $shippment_request = ShippingOrder::findorFail(intval($id));
        $offer = Qoute::findorFail($shippment_request->offer_id);
        return view('admin.shippment_request_show', compact('shippment_request', 'offer'));
    }

    public function create()
    {
        $listing_brand = ListingBrand::get();
        return view('admin.listing_brand_create', compact('listing_brand'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'listing_brand_name' => 'required|unique:listing_brands',
            'listing_brand_slug' => 'unique:listing_brands',
            'listing_brand_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'listing_brand_name.required' => ERR_NAME_REQUIRED,
            'listing_brand_name.unique' => ERR_NAME_EXIST,
            'listing_brand_slug.unique' => ERR_SLUG_UNIQUE,
            'listing_brand_photo.required' => ERR_PHOTO_REQUIRED,
            'listing_brand_photo.image' => ERR_PHOTO_IMAGE,
            'listing_brand_photo.mimes' => ERR_PHOTO_JPG_PNG_GIF,
            'listing_brand_photo.max' => ERR_PHOTO_MAX
        ]);

        $statement = DB::select("SHOW TABLE STATUS LIKE 'listing_brands'");
        $ai_id = $statement[0]->Auto_increment;

        $ext = $request->file('listing_brand_photo')->extension();
        $rand_value = md5(mt_rand(11111111, 99999999));
        $final_name = $rand_value . '.' . $ext;
        $request->file('listing_brand_photo')->move(public_path('uploads/listing_brand_photos/'), $final_name);

        $listing_brand = new ListingBrand();
        $data = $request->only($listing_brand->getFillable());
        if (empty($data['listing_brand_slug'])) {
            unset($data['listing_brand_slug']);
            $data['listing_brand_slug'] = Str::slug($request->listing_brand_name);
        }

        if (preg_match('/\s/', $data['listing_brand_slug'])) {
            return Redirect()->back()->with('error', ERR_SLUG_WHITESPACE);
        }

        unset($data['listing_brand_photo']);
        $data['listing_brand_photo'] = $final_name;

        $listing_brand->fill($data)->save();

        return redirect()->route('admin_listing_brand_view')->with('success', SUCCESS_ACTION);
    }

    public function edit($id)
    {
        $listing_brand = ListingBrand::findOrFail($id);
        return view('admin.listing_brand_edit', compact('listing_brand'));
    }

    public function update(Request $request, $id)
    {

        if (env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $listing_brand = ListingBrand::findOrFail($id);
        $data = $request->only($listing_brand->getFillable());

        if ($request->hasFile('listing_brand_photo')) {

            $request->validate([
                'listing_brand_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ], [
                'listing_brand_photo.image' => ERR_PHOTO_IMAGE,
                'listing_brand_photo.mimes' => ERR_PHOTO_JPG_PNG_GIF,
                'listing_brand_photo.max' => ERR_PHOTO_MAX
            ]);

            // Uploading the file
            $ext = $request->file('listing_brand_photo')->extension();
            $rand_value = md5(mt_rand(11111111, 99999999));
            $final_name = $rand_value . '.' . $ext;
            $request->file('listing_brand_photo')->move(public_path('uploads/listing_brand_photos/'), $final_name);

            unset($data['listing_brand_photo']);
            $data['listing_brand_photo'] = $final_name;
        }

        $request->validate([
            'listing_brand_name'   =>  [
                'required',
                Rule::unique('listing_brands')->ignore($id),
            ],
            'listing_brand_slug'   =>  [
                Rule::unique('listing_brands')->ignore($id),
            ]
        ], [
            'listing_brand_name.required' => ERR_NAME_REQUIRED,
            'listing_brand_name.unique' => ERR_NAME_EXIST,
            'listing_brand_slug.unique' => ERR_SLUG_UNIQUE,
        ]);

        if (empty($data['listing_brand_slug'])) {
            unset($data['listing_brand_slug']);
            $data['listing_brand_slug'] = Str::slug($request->listing_brand_name);
        }

        if (preg_match('/\s/', $data['listing_brand_slug'])) {
            return Redirect()->back()->with('error', ERR_SLUG_WHITESPACE);
        }

        $listing_brand->fill($data)->save();

        return redirect()->route('admin_listing_brand_view')->with('success', SUCCESS_ACTION);
    }

    public function destroy($id)
    {
        $tot = Listing::where('listing_brand_id', $id)->count();
        if ($tot) {
            return Redirect()->back()->with('error', ERR_ITEM_DELETE);
        }
        $listing_brand = ListingBrand::findOrFail($id);
        $listing_brand->delete();
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }
    public function admin_shipping_documents_update(Request $request)
    {
        $offerId = intval($request->offer_id);
        $offer = Qoute::findOrFail($offerId);
        $offer->status = $request->offer_agreed_status;
        $offer->agreed_price = $request->offer_agreed_price;
        $offer->save();
        $shippmentId = intval($request->shippment_id);
        $shippment = ShippingOrder::findOrFail($shippmentId);
        $shippment->deregistration_service = $request->deregistration_service ? 1 :  0;
        $shippment->english_export_service = $request->english_export_service ? 1 :  0;
        $shippment->photo_service = $request->photo_service ? 1 :  0;
        $shippment->ss_custom_photo_service = $request->ss_custom_photo_service ? 1 :  0;
        $shippment->ss_custom_inspection_service = $request->ss_custom_inspection_service ? 1 :  0;
        $shippment->ss_custom_cleaning_service = $request->ss_custom_cleaning_service ? 1 :  0;
        $shippment->status = $request->shippment_request_status;
        $shippment->save();
        if ($shippment->status == 'approved') {
            $car_id = intval($offer->car->id);
            $car = Listing::findOrFail($car_id);
            $car->listing_stock_status = $request->offer_agreed_status;
            $car->save();

            Invoice::updateOrCreate(
                [
                    'shipping_order_id' => $shippmentId,
                ],
                [
                    'user_id' => $shippment->consignee_id ?? 1,
                    'car_name' => $offer->car->listing_name ?? '-',
                    'car_brand' => $offer->car->rListingBrand->listing_brand_name ?? '-',
                    'car_location' => $offer->car->rListingBrand->listing_brand_name ?? '-',
                    'car_status' => $car->listing_stock_status ?? 'in_stock',
                    'offer_price' => $offer->offer ?? 0,
                    'offer_status' => $offer->status ?? 'pending',
                    'agreed_price' => $offer->agreed_price ?? 0,
                    'remarks' => $offer->remarks ?? '-',
                    'service_type' => $shippment->service ?? 'roro',
                    'shipping_status' => $offer->status ?? 'pending',
                ]
            );
        }
        return redirect()->route('admin_shippment_requests')->withSuccess('Done');
    }
    // public function admin_modify_shipping_status(Request $request)
    // {
    //     $shippmentId = intval($request->shippingId);
    //     $shippment = ShippingOrder::findOrFail($shippmentId);
    //     $shippment->status = $request->newStatus;
    //     $shippment->save();

    //     // Return a JSON response with success and message data
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Status updated successfully',
    //     ]);
    // }
    public function admin_modify_shipping_status(Request $request)
    {


        // Get shipping ID and find the shipping order
        $shippmentId = intval($request->shippingId);
        $shippment = ShippingOrder::findOrFail($shippmentId);
        $action = $request->input('action');

        // if ($action && $action == 'delete') {

        //     $existingInvoicePath = $shippment->invoice_path;
        //     unlink($existingInvoicePath);
        //     $shippment->invoice_path = '';
        //     $shippment->save();
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Invoice deleted successfully',
        //     ]);
        // }

        // if ($action && $action == 'delete') {
        //     // Get the existing invoice path
        //     $existingInvoicePath = $shippment->invoice_path;
        //     // dd($existingInvoicePath);
        //     // Check if the invoice path is not empty and the file exists
        //     if (!empty($existingInvoicePath) && Storage::exists($existingInvoicePath)) {
        //         // Delete the file using the Storage facade
        //         dd($existingInvoicePath);
        //         Storage::delete($existingInvoicePath);

        //         // Update the invoice path in the database
        //         $shippment->invoice_path = '';
        //         $shippment->save();

        //         // Return a JSON response indicating success
        //         return response()->json([
        //             'success' => true,
        //             'message' => 'Invoice deleted successfully',
        //         ]);
        //     }
        // }



        if ($request->has('invoice_status')) {
            $shippment->invoice_status = $request->invoice_status;
            $shippment->save();
            return response()->json([
                'success' => true,
                'message' => 'Invoice Status updated successfully',
            ]);
        }

        // Update shipping status if newStatus field is present
        if ($request->has('newStatus')) {
            $shippment->status = $request->newStatus;
            $shippment->save();
            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully',
            ]);
        }

        // Handle file upload if invoiceFile field is present
        // if ($request->hasFile('invoiceFile')) {

        //     // Store the uploaded file in storage/app/invoices directory
        //     $directory = 'invoices';
        //     if (!Storage::exists($directory)) {
        //         Storage::makeDirectory($directory);
        //     }

        //     $file = $request->file('invoiceFile');
        //     $originalName = $shippment->id . '_' . $file->getClientOriginalName(); // Get the original name
        //     $file->storeAs('public/' . $directory, $originalName); // Store with original name
        //     $url = ('storage/' . $directory . '/' . $originalName);

        //     // Set the invoice path to the correct variable
        //     $shippment->invoice_path = $url;
        //     $shippment->save();

        //     // Return a JSON response with success and message data
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Invoice uploaded successfully ',
        //     ]);
        // }


        // if ($request->hasFile('invoiceFile')) {

        //     // Define the directory where invoices will be stored
        //     $directory = 'invoices';

        //     // Define the full path of the directory within the public directory
        //     $publicDirectory = public_path($directory);

        //     // Check if the directory exists, if not, create it
        //     if (!file_exists($publicDirectory)) {
        //         mkdir($publicDirectory, 0755, true); // Recursive directory creation
        //     }

        //     // Get the uploaded file
        //     $file = $request->file('invoiceFile');

        //     // Generate a unique name for the file
        //     $originalName = $shippment->id . '_' . $file->getClientOriginalName();

        //     // Store the file in the specified directory with the original name
        //     $file->move($publicDirectory, $originalName);

        //     // Get the URL of the stored file
        //     $url = url("$directory/$originalName");

        //     // Set the invoice path to the correct variable
        //     $shippment->invoice_path = $url;
        //     $shippment->save();

        //     // Return a JSON response with success and message data
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Invoice uploaded successfully ',
        //     ]);
        // }





        // Adding invoice
        if ($request->hasFile('invoiceFile')) {

            // Define the directory where invoices will be stored
            $directory = 'invoices';

            // Define the full path of the directory within the public directory
            $publicDirectory = public_path($directory);

            // Check if the directory exists, if not, create it
            if (!file_exists($publicDirectory)) {
                mkdir($publicDirectory, 0755, true); // Recursive directory creation
            }

            // Get the uploaded file
            $file = $request->file('invoiceFile');

            // Generate a unique name for the file
            $originalName = $shippment->id . '_' . $file->getClientOriginalName();

            // Store the file in the specified directory with the original name
            $file->move($publicDirectory, $originalName);

            // Get the relative path of the stored file
            $relativePath = "$directory/$originalName";

            // Set the invoice path to the correct variable (relative path)
            $shippment->invoice_path = $relativePath;
            $shippment->save();

            // Return a JSON response with success and message data
            return response()->json([
                'success' => true,
                'message' => 'Invoice uploaded successfully',
            ]);
        }

        // Deleting invoice
        // Deleting invoice
        if ($action && $action == 'delete') {
            // Get the existing invoice relative path
            $existingInvoicePath = $shippment->invoice_path;

            // Check if the invoice path is not empty
            if (!empty($existingInvoicePath)) {
                // Concatenate base URL with the relative path to form complete URL
                $completeUrl = url($existingInvoicePath);

                // Check if the file exists using Laravel's Storage facade
                if (Storage::exists($existingInvoicePath)) {
                    // Delete the file using the Storage facade
                    Storage::delete($existingInvoicePath);

                    // Update the invoice path in the database
                    $shippment->invoice_path = '';
                    $shippment->save();

                    // Return a JSON response indicating success
                    return response()->json([
                        'success' => true,
                        'message' => 'Invoice deleted successfully',
                    ]);
                } elseif (file_exists(public_path($existingInvoicePath))) {
                    // Check if the file exists using PHP's file_exists() function
                    unlink(public_path($existingInvoicePath));

                    // Update the invoice path in the database
                    $shippment->invoice_path = '';
                    $shippment->save();

                    // Return a JSON response indicating success
                    return response()->json([
                        'success' => true,
                        'message' => 'Invoice deleted successfully',
                    ]);
                } else {
                    // Return a JSON response indicating failure if the file doesn't exist
                    return response()->json([
                        'success' => false,
                        'message' => 'Invoice file not found or already deleted',
                    ], 404);
                }
            } else {
                // Return a JSON response indicating failure if the invoice path is empty
                return response()->json([
                    'success' => false,
                    'message' => 'Invoice file path is empty',
                ], 404);
            }
        }
    }

    public function view_shipment_document($id)
    {
        $shippment = ShippingOrder::findOrFail($id);
        $documents = $shippment->documents;
        return view('admin.view_shipment_document', compact('shippment', 'documents'));
    }
    public function download_shipment_document($id)
    {
        $document = Document::findOrFail($id);
        $filePath = $document->document_path;
        return Storage::download($filePath);
    }
    public function destroyShippingDocument(Document $document)
    {
        $document->delete();
        return redirect()->route('admin_shippment_requests')->with('success', 'Shipping document deleted successfully');
    }
    public function createShippingDocument($id)
    {
        return view('admin.shipping_documents.create', compact('id'));
    }

    public function storeShippingDocument(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'vessel_name' => 'required',
            'details' => 'required',
            'documents.*' => 'required|mimes:pdf|max:2048', // Maximum file size is 2MB for each file
        ]);

        $shippmentId = intval($request->input('shippment_id'));
        $status = $request->input('status'); // Assuming you have added the 'status' field in the form

        if ($request->has('documents') && is_array($request->input('documents'))) {
            foreach ($request->file('documents') as $file) {
                if ($file->isValid()) {
                    $extension = $file->getClientOriginalExtension(); // Get the original file extension
                    $fileName = uniqid() . '.' . $extension;
                    Storage::disk('public')->put($fileName, file_get_contents($file));

                    // Find the document with the same shippment_id and status
                    $existingDocument = Document::where('shipping_order_id', $shippmentId)
                        ->where('status', $status)
                        ->first();

                    if ($existingDocument) {
                        // If an existing document is found, delete the old file and replace it
                        Storage::disk('public')->delete($existingDocument->document_path); // Delete the old file
                        $existingDocument->document_path = 'public/' . $fileName; // Set the new file path
                        $existingDocument->details = $request->input('details');
                        $existingDocument->save();
                    } else {
                        // If no existing document is found, create a new one
                        $document = new Document();
                        $document->document_path = 'public/' . $fileName;
                        $document->details = $request->input('details');
                        $document->vessel_name = $request->input('vessel_name');
                        $document->shipping_order_id = $shippmentId;
                        $document->status = $status; // Set the status field
                        $document->save();
                    }
                }
            }
        }

        return redirect()->route('admin_shippment_requests')->with('success', 'Shipping document created/updated successfully');
    }
    // service
    public function serviceCreate(Request $request)
    {
        // Your code for displaying a form to create a new service goes here
        return view('admin.services.create');
    }

    // Store a new service (with "service" prefix)
    public function serviceStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
        ]);

        $service = Service::create($data);

        return redirect()->route('services.index');
    }

    // Retrieve all services (with "service" prefix)
    public function serviceIndex()
    {
        $services = Service::all();

        return view('admin.services.index', compact('services'));
    }

    // Retrieve a specific service (with "service" prefix)
    public function serviceShow(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    // Display a form to edit a service (with "service" prefix)
    public function serviceEdit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    // Update a service (with "service" prefix)
    public function serviceUpdate(Request $request, Service $service)
    {
        $data = $request->validate([
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
        ]);

        // Update only the 'description' and 'price' fields
        $service->fill($data);
        $service->save();

        return redirect()->route('services.index');
    }

    // Delete a service (with "service" prefix)
    public function serviceDestroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index');
    }
}