<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ListingLocation;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $fillable = [
        'name',
        'country_id'
    ];

    public function country()
    {
        return $this->belongsTo(ListingLocation::class,'country_id');
    }
}
