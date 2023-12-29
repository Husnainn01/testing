<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspection;

class InspectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }
    public function index(){
        $inspections = Inspection::all();
        return view("admin.inspections.index",compact('inspections'));
    }
    public function create(){
        return view("admin.inspections.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            'insurance_type' => 'required',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'description' => 'required',
        ]);

        $inspection = Inspection::create($request->all());

        if ($inspection) {
            return redirect()->route('admin_inspection_view')->with('success', SUCCESS_ACTION);
        }

        return redirect()->back()->with('error', "Something Went Wrong");
    }
    public function edit($id){
        $id=(int)$id;
        $inspection = Inspection::findorFail($id);
        return view("admin.inspections.edit",compact('inspection'));
    }
    
    public function update(Request $request){
        $id = (int)$request->input('id');
        $inspection = Inspection::findOrFail($id);
    
        $request->validate([
            'name' => 'required',
            'inspection_type' => 'required|in:default,ss_custom',
            'price' => 'required|numeric'
        ]);
    
        $inspection->name = $request->input('name');
        $inspection->inspection_type = $request->input('inspection_type');
        $inspection->price = $request->input('price');
        $inspection->save();
        return redirect()->route('admin_inspection_view')->with('success', 'inspection updated successfully');
    }

    public function delete($id)
    {
        $id = (int)$id;
        $inspection = Inspection::findOrFail($id);
        $inspection->delete();
        return redirect()->route('admin_inspection_view')->with('success', 'inspection deleted successfully');
    }    

    public function show($id){
        return view("admin.inspections.show");
    }

}
