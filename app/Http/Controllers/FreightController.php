<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freight;
use App\Models\Insurance;
use App\Models\Inspection;
use App\Models\Listing;

use App\Models\Qoute;

class FreightController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }
    public function index()
    {
        $freights = Freight::all();
        return view("admin.freights.index", compact('freights'));
    }
    public function create()
    {
        return view("admin.freights.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'price' => 'required',
            'destination' => 'required',
        ]);
        $freight = Freight::create($request->all());
        if ($freight) {
            return redirect()->route('admin_freight_view')->with('success', SUCCESS_ACTION);
        }
        return redirect()->back()->with('error', "Something Went Wrong");
    }
    public function edit($id)
    {
        $id = (int)$id;
        $freight = Freight::findorFail($id);
        return view("admin.freights.edit", compact('freight'));
    }

    public function update(Request $request)
    {
        $id = (int)$request->input('id');
        $freight = Freight::findOrFail($id);

        $request->validate([
            'company' => 'required',
            'price' => 'required',
            'destination' => 'required',
        ]);

        $freight->company = $request->input('company');
        $freight->price = $request->input('price');
        $freight->destination = $request->input('destination');
        $freight->save();
        return redirect()->route('admin_freight_view')->with('success', 'Freight updated successfully');
    }

    public function delete($id)
    {
        $id = (int)$id;
        $Freight = Freight::findOrFail($id);
        $Freight->delete();
        return redirect()->route('admin_freight_view')->with('success', 'Freight deleted successfully');
    }

    public function show($id)
    {
        return view("admin.freights.show");
    }

    public function offer_index()
    {
        $offers = Qoute::all();
        return view("admin.offerManagment.index", compact('offers'));
    }

    public function offer_edit($id)
    {
        $id = (int)$id;
        $offer = Qoute::findorFail($id);
        $freights = Freight::all();
        $insurances = Insurance::all();
        $inspections = Inspection::all();
        return view("admin.offerManagment.edit", compact('offer', 'freights', 'insurances', 'inspections'));
    }

    public function offer_update(Request $request)
    {
        $id = (int)$request->input('id');
        $offer = Qoute::findOrFail($id);
        $offer->car_name = $request->car_name;
        $offer->fob_price = $request->fob_price;
        $offer->freight_id = $request->freight;
        $offer->insurance_id = $request->insurance;
        $offer->inspection_id = $request->inspection;
        $offer->total_price = $request->total_price;
        $offer->offer = $request->offer;
        $offer->status = $request->status ?? 'offered';
        $offer->remarks = $request->remarks;
        $offer->agreed_price = $request->agreed_price;
        $offer->save();
        $car = Listing::findorFail($offer->car_id);
        if ($offer->status !== "offered") {
            $car->listing_stock_status = $offer->status;
        }
        $car->save();
        return redirect()->route('admin_offer_managment_view')->with('success', 'offer updated successfully');
    }

    public function offer_delete($id)
    {
        $id = (int)$id;
        $qoute = Qoute::findOrFail($id);
        $qoute->shippingOrders()->delete();
        $qoute->delete();

        return redirect()->route('admin_offer_managment_view')->with('success', 'Offer and related records deleted successfully');
    }

    public function offer_show($id)
    {
        return view("admin.offerManagment.show");
    }
}
