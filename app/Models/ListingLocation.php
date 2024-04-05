<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\Port;

class ListingLocation extends Model
{
    protected $fillable = [
        'listing_location_name',
        'listing_location_slug',
        'listing_location_photo',
        'seo_title',
        'seo_meta_description',
        'email'
    ];

    public function rListing()
    {
        return $this->hasMany(Listing::class, 'listing_location_id', 'id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'country_id');
    }

    public function port()
    {
        return $this->hasMany(Port::class, 'country_id');
    }
}