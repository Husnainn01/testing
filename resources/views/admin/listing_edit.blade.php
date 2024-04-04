@extends('admin.app_admin')
@section('admin_content')
<style>
 
.upload__inputfile {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
}

.upload__btn {
  display: inline-block;
  font-weight: 600;
  color: #fff;
  text-align: center;
  min-width: 116px;
  padding: 5px;
  transition: all 0.3s ease;
  cursor: pointer;
  border: 2px solid #731718;
  background-color: #731718;
  border-radius: 10px;
  line-height: 26px;
  font-size: 14px;
}

.upload__btn-box {
  margin-bottom: 10px;
}

.upload__img-wrap {
  display: flex;
  flex-wrap: wrap;
  margin: 0 -10px;
}

.upload__img-box {
  width: 200px;
  padding: 0 10px;
  margin-bottom: 12px;
}

.upload__img-close {
  width: 24px;
  height: 24px;
  border-radius: 50%;
  background-color: rgba(0, 0, 0, 0.5);
  position: absolute;
  top: 10px;
  right: 10px;
  text-align: center;
  line-height: 24px;
  z-index: 1;
  cursor: pointer;
}

.upload__img-close:after {
  content: '\2716';
  font-size: 14px;
  color: white;
}

.img-bg {
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  position: relative;
  padding-bottom: 100%;
}

</style>
<h1 class="h3 mb-3 text-gray-800">{{ EDIT_LISTING }}</h1>
    <form action="{{ route('admin_listing_update',$listing->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="current_photo" value="{{ $listing->listing_featured_photo }}">

        <div class="card shadow mb-4 t-left">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin_listing_view') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ VIEW_ALL }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="p1_tab" data-toggle="pill" href="#p1" role="tab" aria-controls="p1" aria-selected="true">{{ MAIN_SECTION }}</a>
                            <a class="nav-link" id="p10_tab" data-toggle="pill" href="#p10" role="tab" aria-controls="p10" aria-selected="false">{{ FEATURES }}</a>
                            <!-- <a class="nav-link" id="p2_tab" data-toggle="pill" href="#p2" role="tab" aria-controls="p2" aria-selected="false">{{ OPENING_HOUR }}</a> -->
                            <a class="nav-link" id="p3_tab" data-toggle="pill" href="#p3" role="tab" aria-controls="p3" aria-selected="false">{{ SOCIAL_MEDIA }}</a>
                            <a class="nav-link" id="p4_tab" data-toggle="pill" href="#p4" role="tab" aria-controls="p4" aria-selected="false">{{ AMENITY }}</a>
                            <a class="nav-link" id="p5_tab" data-toggle="pill" href="#p5" role="tab" aria-controls="p5" aria-selected="false">{{ PHOTO_GALLERY }}</a>
                            <a class="nav-link" id="p6_tab" data-toggle="pill" href="#p6" role="tab" aria-controls="p6" aria-selected="false">{{ VIDEO_GALLERY }}</a>
                            <a class="nav-link" id="p7_tab" data-toggle="pill" href="#p7" role="tab" aria-controls="p7" aria-selected="false">{{ ADDITIONAL_FEATURES }}</a>
                            <a class="nav-link" id="p8_tab" data-toggle="pill" href="#p8" role="tab" aria-controls="p8" aria-selected="false">{{ SEO }}</a>
                            <a class="nav-link" id="p9_tab" data-toggle="pill" href="#p9" role="tab" aria-controls="p9" aria-selected="false">{{ STATUS_AND_FEATURED }}</a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content" id="v-pills-tabContent">

                            <!-- Tab 1 -->
                            <div class="tab-pane fade show active" id="p1" role="tabpanel" aria-labelledby="p1_tab">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">{{ NAME }} *</label>
                                            <input type="text" name="listing_name" class="form-control" value="{{ $listing->listing_name }}" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Listing Category *</label>
                                            <select class="form-control" name="category_id" id="category_id">
                                                @foreach($categories as $cat)
                                                    <option value="{{ $cat->id }}" @if($listing->category_id === $cat->id ) selected @endif>{{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="listing_stock_status">Stock Status</label>
                                            <select class="form-control" name="listing_stock_status" id="listing_stock_status">
                                                <option disabled>Select</option>
                                                <option value="in_stock" @if($listing->listing_stock_status == 'in_stock') selected @endif>In Stock</option>
                                                <option value="sold" @if($listing->listing_stock_status == 'sold') selected @endif>Sold</option>
                                                <option value="reserved" @if($listing->listing_stock_status == 'reserved') selected @endif>Reserved</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">STOCK ID</label>
                                            <input type="text" name="listing_stock_id" class="form-control" value="{{ $listing->listing_stock_id }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">{{ SLUG }}</label>
                                            <input type="text" name="listing_slug" class="form-control" value="{{ $listing->listing_slug }}">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">STOCK ID</label>
                                            <input type="text" name="listing_stock_id" class="form-control" value="{{ $listing->listing_stock_id }}">
                                        </div>
                                    </div> -->

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ LISTING_BRAND }}</label>
                                            <select name="listing_brand_id" class="form-control select2">
                                                @foreach($listing_brand as $row)
                                                <option value="{{ $row->id }}" @if($row->id == $listing->listing_brand_id) selected @endif>{{ $row->listing_brand_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ LISTING_LOCATION }}</label>
                                            <select name="listing_location_id" class="form-control select2">
                                                @foreach($listing_location as $row)
                                                <option value="{{ $row->id }}" @if($row->id == $listing->listing_location_id) selected @endif>{{ $row->listing_location_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
         <!--                            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ ADDRESS }}</label>
                                            <textarea name="listing_address" class="form-control h_70" cols="30" rows="10">{{ $listing->listing_address }}</textarea>
                                        </div>
                                    </div> -->
         <!--                            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ PHONE }}</label>
                                            <textarea name="listing_phone" class="form-control h_70" cols="30" rows="10">{{ $listing->listing_phone }}</textarea>
                                        </div>
                                    </div> -->
             <!--                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ EMAIL }}</label>
                                            <textarea name="listing_email" class="form-control h_70" cols="30" rows="10">{{ $listing->listing_email }}</textarea>
                                        </div>
                                    </div> -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ MAP_IFRAME_CODE }}</label>
                                            <textarea name="listing_map" class="form-control h_70" cols="30" rows="10">{{ $listing->listing_map }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="listing_website" class="form-control" value="{{ $listing->listing_website }}">
                                </div>


                            </div>
                            <!-- // Tab 1 -->



                            <!-- Tab 10 -->
                            <div class="tab-pane fade" id="p10" role="tabpanel" aria-labelledby="p10_tab">

                                <h4 class="heading-in-tab">{{ FEATURES }}</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ PRICE }} *</label>
                                            <input type="number" name="listing_price" class="form-control" value="{{ $listing->listing_price }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ TYPE }}</label>
                                            <select name="listing_type" class="form-control">
                                                <option value="New Car" @if($listing->listing_type == 'New Car') selected @endif>{{ NEW_CAR }}</option>
                                                <option value="Used Car" @if($listing->listing_type == 'Used Car') selected @endif>{{ USED_CAR }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ EXTERIOR_COLOR }}</label>
                                            <input type="text" name="listing_exterior_color" class="form-control" value="{{ $listing->listing_exterior_color }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ INTERIOR_COLOR }}</label>
                                            <input type="text" name="listing_interior_color" class="form-control" value="{{ $listing->listing_interior_color }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ CYLINDER }}</label>
                                            <input type="text" name="listing_cylinder" class="form-control" value="{{ $listing->listing_cylinder }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ FUEL_TYPE }}</label>
                                            <input type="text" name="listing_fuel_type" class="form-control" value="{{ $listing->listing_fuel_type }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ TRANSMISSION }}</label>
                                            <select name="listing_transmission" class="form-control" id="listing_transmission">
                                                <option disabled value=""selected>Select Transmission</option>
                                                @foreach($transmissions as $transmission)
                                                    <option value="{{$transmission->name}}" @if($listing->listing_transmission === $transmission->name) selected @endif>{{ $transmission->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ ENGINE_CAPACITY }}</label>
                                            <input type="text" name="listing_engine_capacity" class="form-control" value="{{ $listing->listing_engine_capacity }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ VIN }}</label>
                                            <input type="text" name="listing_vin" class="form-control" value="{{ $listing->listing_vin }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ BODY }}</label>
                                            <select class="form-control" name="listing_body" id="listing_body">
                                                <option value="">Select Body</option>
                                                <option @if($listing->listing_body === 'sedan') selected @endif value="sedan">Sedan</option>
                                                <option @if($listing->listing_body === 'coupe') selected @endif value="coupe">Coupe</option>
                                                <option @if($listing->listing_body === 'hatchback') selected @endif value="hatchback">Hatchback</option>
                                                <option @if($listing->listing_body === 'stationwagon') selected @endif value="stationwagon">Station Wagon</option>
                                                <option @if($listing->listing_body === 'suv') selected @endif value="suv">Suv</option>
                                                <option @if($listing->listing_body === 'pickup') selected @endif value="pickup">Pickup</option>
                                                <option @if($listing->listing_body === 'van') selected @endif value="van">Van</option>
                                                <option @if($listing->listing_body === 'minivan') selected @endif value="minivan">Minivan</option>
                                                <option @if($listing->listing_body === 'wagon') selected @endif value="wagon">Wagon</option>
                                                <option @if($listing->listing_body === 'convertible') selected @endif value="convertible">Convertible</option>
                                                <option @if($listing->listing_body === 'bus') selected @endif value="bus">Bus</option>
                                                <option @if($listing->listing_body === 'truck') selected @endif value="truck">Truck</option>
                                                <option @if($listing->listing_body === 'heavyequipment') selected @endif value="heavyequipment">Heavy Equipment</option>
                                                
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ SEAT }}</label>
                                            <input type="text" name="listing_seat" class="form-control" value="{{ $listing->listing_seat }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ WHEEL }}</label>
                                            <input type="text" name="listing_wheel" class="form-control" value="{{ $listing->listing_wheel }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ DOOR }}</label>
                                            <input type="text" name="listing_door" class="form-control" value="{{ $listing->listing_door }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ MILEAGE }}</label>
                                            <input type="text" name="listing_mileage" class="form-control" value="{{ $listing->listing_mileage }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ MODEL_YEAR }}</label>
                                            <input type="text" name="listing_model_year" class="form-control" value="{{ $listing->listing_model_year }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Tab 10 -->



                            <!-- Tab 2 -->
                            <!-- <div class="tab-pane fade" id="p2" role="tabpanel" aria-labelledby="p2_tab">

                                <h4 class="heading-in-tab">{{ OPENING_HOUR }}</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ MONDAY }}</label>
                                            <input type="text" name="listing_oh_monday" class="form-control" value="{{ $listing->listing_oh_monday }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ TUESDAY }}</label>
                                            <input type="text" name="listing_oh_tuesday" class="form-control" value="{{ $listing->listing_oh_tuesday }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ WEDNESDAY }}</label>
                                            <input type="text" name="listing_oh_wednesday" class="form-control" value="{{ $listing->listing_oh_wednesday }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ THURSDAY }}</label>
                                            <input type="text" name="listing_oh_thursday" class="form-control" value="{{ $listing->listing_oh_thursday }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ FRIDAY }}</label>
                                            <input type="text" name="listing_oh_friday" class="form-control" value="{{ $listing->listing_oh_friday }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ SATURDAY }}</label>
                                            <input type="text" name="listing_oh_saturday" class="form-control" value="{{ $listing->listing_oh_saturday }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ SUNDAY }}</label>
                                            <input type="text" name="listing_oh_sunday" class="form-control" value="{{ $listing->listing_oh_sunday }}">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- // Tab 2 -->



                            <!-- Tab 3 -->
                            <div class="tab-pane fade" id="p3" role="tabpanel" aria-labelledby="p3_tab">

                                <h4 class="heading-in-tab">{{ EXISTING_SOCIAL_MEDIA }}</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                @foreach($listing_social_items as $row)
                                                <tr>
                                                    <td>
                                                        @if($row->social_icon == 'Facebook')
                                                        @php $icon_code = 'fab fa-facebook-f'; @endphp

                                                        @elseif($row->social_icon == 'Twitter')
                                                        @php $icon_code = 'fab fa-twitter'; @endphp

                                                        @elseif($row->social_icon == 'LinkedIn')
                                                        @php $icon_code = 'fab fa-linkedin-in'; @endphp

                                                        @elseif($row->social_icon == 'YouTube')
                                                        @php $icon_code = 'fab fa-youtube'; @endphp

                                                        @elseif($row->social_icon == 'Pinterest')
                                                        @php $icon_code = 'fab fa-pinterest-p'; @endphp

                                                        @elseif($row->social_icon == 'GooglePlus')
                                                        @php $icon_code = 'fab fa-google-plus-g'; @endphp

                                                        @elseif($row->social_icon == 'Instagram')
                                                        @php $icon_code = 'fab fa-instagram'; @endphp

                                                        @endif
                                                        <i class="{{ $icon_code }}"></i>
                                                    </td>
                                                    <td>{{ $row->social_url }}</td>
                                                    <td>
                                                        <a href="{{ route('admin_listing_delete_social_item',$row->id) }}" class="badge badge-danger fz-14 mt_5" onClick="return confirm('{{ ARE_YOU_SURE }}');">{{ DELETE }}</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <h4 class="heading-in-tab mt_30">{{ NEW_SOCIAL_MEDIA }}</h4>
                                <div class="social_item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <select name="social_icon[]" class="form-control">
                                                    <option value="Facebook">{{ FACEBOOK }}</option>
                                                    <option value="Twitter">{{ TWITTER }}</option>
                                                    <option value="LinkedIn">{{ LINKEDIN }}</option>
                                                    <option value="YouTube">{{ YOUTUBE }}</option>
                                                    <option value="Pinterest">{{ PINTEREST }}</option>
                                                    <option value="GooglePlus">{{ GOOGLE_PLUS }}</option>
                                                    <option value="Instagram">{{ INSTAGRAM }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="social_url[]" class="form-control" placeholder="{{ URL }}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="btn btn-success add_social_more"><i class="fas fa-plus"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Tab 3 -->


                            <!-- Tab 4 -->
                            <div class="tab-pane fade" id="p4" role="tabpanel" aria-labelledby="p4_tab">

                                <h4 class="heading-in-tab">{{ AMENITY }}</h4>
                                <div class="row">
                                    @php $i=0; @endphp
                                    @foreach($amenity as $row)
                                    @php $i++; @endphp
                                    <div class="col-md-4">
                                        <div class="form-check mb_10">
                                            <input class="form-check-input" name="amenity[]" type="checkbox" value="{{ $row->id }}" id="amenities{{ $i }}" @if(in_array($row->id,$existing_amenities_array)) checked @endif>
                                            <label class="form-check-label" for="amenities{{ $i }}">
                                                {{ $row->amenity_name }}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- // Tab 4 -->



                            <!-- Tab 5 -->
                           <div class="tab-pane fade" id="p5" role="tabpanel" aria-labelledby="p5_tab">
                                <div class="form-group">
                                    <label for="">{{ EXISTING_FEATURED_PHOTO }} *</label>
                                    <div>
                                        <img src="{{ asset('uploads/listing_featured_photos/'.$listing->listing_featured_photo) }}" class="w_200" alt="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">{{ CHANGE_FEATURED_PHOTO }} *</label>
                                    <div>
                                        <input type="file" name="listing_featured_photo">
                                    </div>
                                </div>
                                <h4 class="heading-in-tab">{{ EXISTING_PHOTOS }}</h4> 
                                <div class="row" id="sortable-container">
                                    <meta name="csrf-token" content="{{ csrf_token() }}">

                                    @foreach($listing_photos as $row)
                                        <div class="col-md-3" data-image-id="{{ $row->id }}">
                                            <div class="form-group draggable-item">
                                                <div>
                                                    <img src="{{ asset('uploads/listing_photos/'.$row->photo) }}" class="w_100_p" alt=""><br>
                                                    <input type="hidden" class="image-id" value="{{ $row->id }}">
                                                    <input type="hidden" class="listing-id" value="{{ $row->listing_id }}">
                                                    <a href="{{ route('admin_listing_delete_photo', $row->id) }}" class="badge badge-danger fz-14 mt_5" onClick="return confirm('{{ ARE_YOU_SURE }}');">{{ DELETE }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
      
                                            <!--                            <div class="row" id="image-list">
                                            @foreach($listing_photos as $index => $row)
                                                <div class="col-md-3 draggable" draggable="true" data-id="{{ $row->id }}" data-index="{{ $index }}">
                                                    <div class="form-group">
                                                        <div>
                                                            <img src="{{ asset('uploads/listing_photos/'.$row->photo) }}" class="w_100_p" alt="">
                                                            <br>
                                                            <a href="{{ route('admin_listing_delete_photo', $row->id) }}" class="badge badge-danger fz-14 mt-5" onClick="return confirm('{{ __('Are you sure?') }}');">{{ __('Delete') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        
                                        <script>
                                        // Get the element that we want to make draggable
                                        var dragSrcEl = null;
                                        
                                        function handleDragStart(e) {
                                            // Target (this) element is the source node.
                                            dragSrcEl = this;
                                        
                                            e.dataTransfer.effectAllowed = 'move';
                                            e.dataTransfer.setData('text/html', this.innerHTML);
                                        }
                                        
                                        function handleDragOver(e) {
                                            if (e.preventDefault) {
                                                e.preventDefault(); // Necessary. Allows us to drop.
                                            }
                                        
                                            e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.
                                        
                                            return false;
                                        }
                                        
                                        function handleDrop(e) {
                                            // this/e.target is current target element.
                                            if (e.stopPropagation) {
                                                e.stopPropagation(); // Stops some browsers from redirecting.
                                            }
                                        
                                            // Don't do anything if dropping the same column we're dragging.
                                            if (dragSrcEl != this) {
                                                // Set the source column's HTML to the HTML of the column dropped on.
                                                dragSrcEl.innerHTML = this.innerHTML;
                                                this.innerHTML = e.dataTransfer.getData('text/html');
                                            }
                                        
                                            return false;
                                        }
                                        
                                        function handleDragEnd(e) {
                                            // this/e.target is the source node.
                                            var cols = document.querySelectorAll('.draggable');
                                            [].forEach.call(cols, function (col) {
                                                col.classList.remove('over');
                                            });
                                        }
                                        
                                        var cols = document.querySelectorAll('.draggable');
                                        [].forEach.call(cols, function(col) {
                                            col.addEventListener('dragstart', handleDragStart, false);
                                            col.addEventListener('dragover', handleDragOver, false);
                                            col.addEventListener('drop', handleDrop, false);
                                            col.addEventListener('dragend', handleDragEnd, false);
                                        });
                                        </script>
                                        
                                                                        -->
                                                                        
                                <h4 class="heading-in-tab mt_30">{{ NEW_PHOTOS }}</h4>
                                <div class="upload__box">
                                    <div class="upload__btn-box">
                                      <label class="upload__btn px-5">
                                        Upload images +
                                        <input type="file" multiple="" data-max_length="20" name="photo_list[]" class="upload__inputfile">
                                      </label>
                                    </div>
                                    <div class="upload__img-wrap"></div>
                                  </div>
                            </div>
                            <!-- // Tab 5 -->


                            <!-- Tab 6 -->
                            <div class="tab-pane fade" id="p6" role="tabpanel" aria-labelledby="p6_tab">

                                <h4 class="heading-in-tab">{{ EXISTING_VIDEOS }}</h4>
                                <div class="row">
                                    @foreach($listing_videos as $row)
                                    <div class="col-md-4 existing-video">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $row->youtube_video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        <br>
                                        <a href="{{ route('admin_listing_delete_video',$row->id) }}" class="badge badge-danger fz-14 mt_5" onClick="return confirm('{{ ARE_YOU_SURE }}');">{{ DELETE }}</a>
                                    </div>
                                    @endforeach
                                </div>

                                <h4 class="heading-in-tab mt_30">{{ NEW_VIDEOS }}</h4>
                                <div class="video_item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="text" name="youtube_video_id[]" class="form-control" placeholder="{{ YOUTUBE_VIDEO_ID }}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="btn btn-success add_video_more"><i class="fas fa-plus"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Tab 6 -->


                            <!-- Tab 7 -->
                            <div class="tab-pane fade" id="p7" role="tabpanel" aria-labelledby="p7_tab">

                                <h4 class="heading-in-tab">{{ EXISTING_ADDITIONAL_FEATURES }}</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                            @foreach($listing_additional_features as $row)
                                                <tr>
                                                    <td>{{ $row->additional_feature_name }}</td>
                                                    <td>{{ $row->additional_feature_value }}</td>
                                                    <td>
                                                        <a href="{{ route('admin_listing_delete_additional_feature',$row->id) }}" class="badge badge-danger fz-14 mt_5" onClick="return confirm('{{ ARE_YOU_SURE }}');">{{ DELETE }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="heading-in-tab mt_30">{{ NEW_ADDITIONAL_FEATURES }}</h4>
                                <div class="additional_feature_item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="text" name="additional_feature_name[]" class="form-control" placeholder="{{ NAME }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="additional_feature_value[]" class="form-control" placeholder="{{ VALUE }}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="btn btn-success add_additional_feature_more"><i class="fas fa-plus"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Tab 7 -->


                            <!-- Tab 8 -->
                            <div class="tab-pane fade" id="p8" role="tabpanel" aria-labelledby="p8_tab">
                                <div class="form-group">
                                    <label for="">{{ TITLE }}</label>
                                    <input type="text" name="seo_title" class="form-control" value="{{ $listing->seo_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ META_DESCRIPTION }}</label>
                                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $listing->seo_meta_description }}</textarea>
                                </div>
                            </div>
                            <!-- // Tab 8 -->


                            <!-- Tab 9 -->
                            <div class="tab-pane fade" id="p9" role="tabpanel" aria-labelledby="p9_tab">
                                <div class="row">
                                    <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">{{ STATUS }}</label>
                                        <select name="listing_status" class="form-control">
                                            <option value="Active" @if($listing->listing_status=='Active') selected @endif>{{ ACTIVE }}</option>
                                            <option value="Pending" @if($listing->listing_status=='Pending') selected @endif>{{ PENDING }}</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">{{ QUESTION_IS_FEATURED }}</label>
                                            <select name="is_featured" class="form-control">
                                                <option value="Yes" @if($listing->is_featured=='Yes') selected @endif>{{ YES }}</option>
                                                <option value="No" @if($listing->is_featured=='No') selected @endif>{{ NO }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="is_new_arrival">New arrival</label>
                                            <select name="is_new_arrival" class="form-control">
                                                <option value="1" @if($listing->is_new_arrival == 1) selected @endif>YES</option>
                                                <option value="0" @if($listing->is_new_arrival == 0) selected @endif>NO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Tab 9 -->

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-success btn-block mb_40">{{ UPDATE }}</button>
    </form>


<div class="d_n">
	<div id="add_social">
		<div class="delete_social">
			<div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <select name="social_icon[]" class="form-control">
                            <option value="Facebook">{{ FACEBOOK }}</option>
                            <option value="Twitter">{{ TWITTER }}</option>
                            <option value="LinkedIn">{{ LINKEDIN }}</option>
                            <option value="YouTube">{{ YOUTUBE }}</option>
                            <option value="Pinterest">{{ PINTEREST }}</option>
                            <option value="GooglePlus">{{ GOOGLE_PLUS }}</option>
                            <option value="Instagram">{{ INSTAGRAM }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="social_url[]" class="form-control" placeholder="{{ URL }}">
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="btn btn-danger remove_social_more"><i class="fas fa-minus"></i></div>
                </div>
			</div>
		</div>
	</div>
</div>


<div class="d_n">
	<div id="add_photo">
		<div class="delete_photo">
			<div class="row">
				<div class="col-md-5">
                    <div class="form-group">
                        <div>
                            <input type="file" name="photo_list[]">
                        </div>
                    </div>
				</div>
				<div class="col-md-1">
                    <div class="btn btn-danger remove_photo_more"><i class="fas fa-minus"></i></div>
                </div>
			</div>
		</div>
	</div>
</div>


<div class="d_n">
	<div id="add_video">
		<div class="delete_video">
			<div class="row">
				<div class="col-md-5">
                    <div class="form-group">
                        <input type="text" name="youtube_video_id[]" class="form-control" placeholder="{{ YOUTUBE_VIDEO_ID }}">
                    </div>
				</div>
				<div class="col-md-1">
                    <div class="btn btn-danger remove_video_more"><i class="fas fa-minus"></i></div>
                </div>
			</div>
		</div>
	</div>
</div>


<div class="d_n">
	<div id="add_additional_feature">
		<div class="delete_additional_feature">
			<div class="row">
				<div class="col-md-5">
                    <div class="form-group">
                        <input type="text" name="additional_feature_name[]" class="form-control" placeholder="{{ NAME }}">
                    </div>
				</div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="additional_feature_value[]" class="form-control" placeholder="{{ VALUE }}">
                    </div>
				</div>
				<div class="col-md-1">
                    <div class="btn btn-danger remove_additional_feature_more"><i class="fas fa-minus"></i></div>
                </div>
			</div>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var sortable = new Sortable(document.getElementById('sortable-container'), {
            animation: 150,
            ghostClass: 'sortable-ghost',
            onUpdate: function (evt) {
                var order = [];
                var listingId = null;
                var items = document.querySelectorAll('#sortable-container .draggable-item');
                items.forEach(function (item) {
                    var imageId = item.querySelector('.image-id').value;
                    order.push(imageId);
                    listingId = item.querySelector('.listing-id').value;
                });
                var csrfToken = document.querySelector('meta[name="csrf-token"]').content;
                $.ajax({
                    url: '{{ route('admin_update_photo_order') }}',
                    type: 'POST',
                    data: {
                        order: order,
                        listing_id: listingId,
                        _token: csrfToken 
                    },
                    success: function (response) {
                        console.log(response);
                    }
                });
            }
        });
    });
</script>
<script>
    jQuery(document).ready(function () {
    ImgUpload();
    });

    function ImgUpload() {
    var imgWrap = "";
    var imgArray = [];

    $('.upload__inputfile').each(function () {
        $(this).on('change', function (e) {
        imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
        var maxLength = $(this).attr('data-max_length');

        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        var iterator = 0;
        filesArr.forEach(function (f, index) {

            if (!f.type.match('image.*')) {
            return;
            }

            if (imgArray.length > maxLength) {
            return false
            } else {
            var len = 0;
            for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i] !== undefined) {
                len++;
                }
            }
            if (len > maxLength) {
                return false;
            } else {
                imgArray.push(f);

                var reader = new FileReader();
                reader.onload = function (e) {
                var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                imgWrap.append(html);
                iterator++;
                }
                reader.readAsDataURL(f);
            }
            }
        });
        });
    });

    $('body').on('click', ".upload__img-close", function (e) {
        var file = $(this).parent().data("file");
        for (var i = 0; i < imgArray.length; i++) {
        if (imgArray[i].name === file) {
            imgArray.splice(i, 1);
            break;
        }
        }
        $(this).parent().parent().remove();
    });
    }
</script>
@endsection
