<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Quote;
use App\Models\Freight;
use App\Models\Insurance;
use App\Models\Inspection;
use App\Models\Category;
use App\Models\User;

class Listing extends Model
{
    protected $fillable = [
        'listing_name',
        'listing_slug',
        'listing_description',
        'listing_address',
        'listing_phone',
        'listing_email',
        'listing_website',
        'listing_map',
        'listing_price',
        'listing_exterior_color',
        'listing_interior_color',
        'listing_cylinder',
        'listing_fuel_type',
        'listing_transmission',
        'listing_engine_capacity',
        'listing_vin',
        'listing_body',
        'listing_seat',
        'listing_wheel',
        'listing_door',
        'listing_mileage',
        'listing_model_year',
        'listing_type',
        'listing_oh_monday',
        'listing_oh_tuesday',
        'listing_oh_wednesday',
        'listing_oh_thursday',
        'listing_oh_friday',
        'listing_oh_saturday',
        'listing_oh_sunday',
        'listing_featured_photo',
        'listing_brand_id',
        'listing_location_id',
        'user_id',
        'admin_id',
        'user_type',
        'seo_title',
        'seo_meta_description',
        'listing_status',
        'is_featured',
        'listing_stock_status',
        'listing_stock_id',
        'category_id',
        'is_new_arrival'
    ];

    public function rListingBrand() {
        return $this->belongsTo( ListingBrand::class, 'listing_brand_id' );
    }

    public function rListingLocation() {
        return $this->belongsTo( ListingLocation::class, 'listing_location_id' );
    }

    public function listingAminities() {
        return $this->hasMany( ListingAmenity::class,);
    }


    public function user() {
        return $this->belongsTo( User::class);
    }
    
    public function quotes()
    {
        return $this->hasMany(Quote::class, 'car_id');
    }

    public function freights()
    {
        return $this->hasMany(Freight::class, 'freight_id');
    }

    public function insurances()
    {
        return $this->hasMany(Insurance::class, 'insurance_id');
    }
    public function inspections()
    {
        return $this->hasMany(Inspection::class, 'inspection_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites', 'listing_id', 'user_id')->withTimestamps();
    }
}
