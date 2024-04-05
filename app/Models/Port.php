<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ListingLocation;


class Port extends Model
{
    use HasFactory;
    protected $table = 'ports';
    protected $fillable = [
        'name',
        'country_id'
    ];

    public function country()
    {
        return $this->belongsTo(ListingLocation::class,'country_id');
    }
}
