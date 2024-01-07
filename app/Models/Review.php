<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'listing_id',
        'agent_id',
        'agent_type',
        'rating',
        'review',
        'location_id',
        'name'
    ];



    public function agent() {
        return $this->belongsTo( Admin::class, 'agent_id' );
    }

    public function listing() {
        return $this->belongsTo( Listing::class, 'listing_id' );
    }
    public function location() {
        return $this->belongsTo( ListingLocation::class, 'location_id' );
    }

}
