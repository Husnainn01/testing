@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ HOME_ADVERTISEMENTS }}</h1>

    <form action="{{ route('admin_home_advertisement_update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="current_above_brand_1" value="{{ $adv_data->above_brand_1 }}">
        <input type="hidden" name="current_above_brand_2" value="{{ $adv_data->above_brand_2 }}">
        <input type="hidden" name="current_above_featured_listing_1" value="{{ $adv_data->above_featured_listing_1 }}">
        <input type="hidden" name="current_above_featured_listing_2" value="{{ $adv_data->above_featured_listing_2 }}">
        <input type="hidden" name="current_above_location_1" value="{{ $adv_data->above_location_1 }}">
        <input type="hidden" name="current_above_location_2" value="{{ $adv_data->above_location_2 }}">

        <div class="card shadow mb-4 t-left">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb_30">
                        <div class="form-group">
                            <label for="">First Advertisement</label>
                            <div>
                                <img src="{{ asset('uploads/advertisements/'.$adv_data->above_brand_1) }}" alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ CHANGE_PHOTO }}</label>
                            <div>
                                <input type="file" name="above_brand_1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ URL }}</label>
                            <input type="text" name="above_brand_1_url" class="form-control" value="{{ $adv_data->above_brand_1_url }}">
                            <input type="file" name="above_brand_2" hidden>
                            <input type="text" name="above_brand_2_url" class="form-control" value="{{ $adv_data->above_brand_2_url }}" hidden>
                            <select name="above_brand_status" hidden class="form-control">
                                <option value="Show" selected>{{ SHOW }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4 t-left">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb_30">
                        <div class="form-group">
                            <label for="">Second Advertisment</label>
                            <div>
                                <img src="{{ asset('uploads/advertisements/'.$adv_data->above_featured_listing_1) }}" alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ CHANGE_PHOTO }}</label>
                            <div>
                                <input type="file" name="above_featured_listing_1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ URL }}</label>
                            <input type="text" name="above_featured_listing_1_url" class="form-control" value="{{ $adv_data->above_featured_listing_1_url }}">
                            <img src="{{ asset('uploads/advertisements/'.$adv_data->above_featured_listing_2) }}"  hidden alt="">
                            <input type="file" name="above_featured_listing_2" hidden>
                            <select name="above_featured_listing_status" hidden class="form-control">
                                <option value="Show" selected >{{ SHOW }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4 t-left">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb_30">
                        <div class="form-group">
                            <label for="">Third Advertisement</label>
                            <div>
                                <img src="{{ asset('uploads/advertisements/'.$adv_data->above_location_1) }}" alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ CHANGE_PHOTO }}</label>
                            <div>
                                <input type="file" name="above_location_1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ URL }}</label>
                            <input type="text" name="above_location_1_url" class="form-control" value="{{ $adv_data->above_location_1_url }}">
                            <img src="{{ asset('uploads/advertisements/'.$adv_data->above_location_2) }}" hidden alt="">
                            <input type="file" name="above_location_2" hidden>
                            <input type="text" name="above_location_2_url" class="form-control" hidden value="{{ $adv_data->above_location_2_url }}">
                            <select name="above_location_status" hidden class="form-control">
                                <option value="Show" selected>{{ SHOW }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-block mb_50">{{ UPDATE }}</button>
    </form>

@endsection
