<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insurance;

class InsuranceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }
    public function index(){
        $insurances = Insurance::all();
        return view("admin.insurances.index",compact('insurances'));
    }
    public function create(){
        return view("admin.insurances.create");
    }
    public function store(Request $request){
        $insurance = Insurance::create($request->all());
        if($insurance)
        {
            return redirect()->route('admin_insurance_view')->with('success', SUCCESS_ACTION);
        }
        return redirect()->back()->with('error', "Something Went Wrong");

    }
    public function edit($id){
        $id=(int)$id;
        $insurance = Insurance::findorFail($id);
        return view("admin.insurances.edit",compact('insurance'));
    }
    
    public function update(Request $request){
        $id = (int)$request->input('id');
        $insurance = Insurance::findOrFail($id);
    
        $request->validate([
            'insurance_type' => 'required|in:whole_car,damage,container,ss_custom',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);
    
        $insurance->insurance_type = $request->input('insurance_type');
        $insurance->price = $request->input('price');
        $insurance->start_date = $request->input('start_date');
        $insurance->end_date = $request->input('end_date');
        $insurance->description = $request->input('description');
        $insurance->save();
        return redirect()->route('admin_insurance_view')->with('success', 'Insurance updated successfully');
    }

    public function delete($id)
    {
        $id = (int)$id;
        $insurance = Insurance::findOrFail($id);
        $insurance->delete();
        return redirect()->route('admin_insurance_view')->with('success', 'Insurance deleted successfully');
    }    

    public function show($id){
        return view("admin.insurances.show");
    }
}
