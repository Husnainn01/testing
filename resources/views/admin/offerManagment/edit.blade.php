@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Offer Edit</h1>
    <h5>Edit</h5>
    <form action="{{ route('admin_offer_managment_update') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $offer->id }}">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="car_name">Car Name*</label>
                    <input type="text" class="form-control" name="car_name" value="{{$offer->car_name}}" required>
                </div>
                <div class="form-group">
                    <label for="fob_price">Fob Price*</label>
                    <input type="text" class="form-control" name="fob_price" value="{{$offer->fob_price}}" required max="999999">
                </div>
                <div class="form-group">
                    <label for="freight">Freight Destination</label>
                    <select name="freight" class ="form-control" id="freight">
                        @foreach($freights as $freight)
                            <option value="{{ $freight->id }}">{{ $freight->destination }} {{ $freight->price }}</option>
                        @endforeach    
                    </select>
                </div>
                <div class="form-group">
                    <label for="insurance">Insurance Type</label>
                    <select name="insurance" class="form-control" id="insurance">
                        @foreach($insurances as $insurance)
                            <option value="{{ $insurance->id }}">{{ $insurance->type }} {{ $insurance->price }}</option>
                        @endforeach    
                    </select>
                </div>
                <div class="form-group">
                    <label for="inspection">Inspection Certificate</label>
                    <select name="inspection" class="form-control" id="inspection">
                        @foreach($inspections as $inspection)
                            <option value="{{ $inspection->id }}">{{ $inspection->name }} {{ $inspection->price }}</option>
                        @endforeach    
                    </select>
                </div>
                <div class="form-group">
                    <label for="total_price">Total Price</label>
                    <input class="form-control" type="text" name="total_price" value="{{ $offer->total_price }}" max="999999">
                </div>
                <div class="form-group">
                    <label for="offer">Offer Price</label>
                    <input class="form-control" type="number" name="offer" value="{{ $offer->offer }}" max="99999">
                </div>
                <div class="form-group">
                    <label for="status">Offer Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="offered" disabled @if($offer->status==="offered") selected @endif >Pending</option>
                        <option value="reserved"  @if($offer->status==="reserved") selected @endif>Reserved</option>
                        <option value="sold"  @if($offer->status==="sold") selected @endif>Sold!</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="remarks">Remarks</label>
                    <textarea  class="form-control" name="remarks" id="remarks" cols="30" rows="10">{{$offer->remarks}}</textarea>
                </div>
                <div class="form-group">
                    <label for="agreed_price">Agreed Price</label>
                    <input class="form-control" type="number" name="agreed_price" value="{{ $offer->agreed_price }}" max="999999999999">
                </div>
                <button type="submit" class="btn btn-success">{{ SUBMIT }}</button>
            </div>
        </div>
    </form>
@endsection
