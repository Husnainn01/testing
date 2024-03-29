<?php

namespace App\Models;

use App\Models\Listing;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Qoute;
use App\Models\Invoice;


class User extends Authenticatable
{
    use HasRoles;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'country',
        'address',
        'state',
        'city',
        'zip',
        'website',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'pinterest',
        'youtube',
        'photo',
        'banner',
        'password',
        'token',
        'status',
        'company_name',
        'address2'
    ];

    public function rPurchasePackage()
    {
        return $this->hasMany(PackagePurchase::class, 'user_id', 'id');
    }

    public function quotes()
    {
        return $this->hasMany(Qoute::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'user_id');
    }

    public function favorites()
    {
        return $this->belongsToMany(Listing::class, 'favorites', 'user_id', 'listing_id')->withTimestamps();
    }
    public function favorites_timestamp()
    {
        $threeDaysAgo = now()->subDays(3); // Get the datetime for three days ago

        return $this->belongsToMany(Listing::class, 'favorites', 'user_id', 'listing_id')
            ->where('favorites.updated_at', '>=', $threeDaysAgo)
            ->with(['rListingBrand', 'rListingLocation'])
            ->withTimestamps();
    }


    public function requestedCar()
    {
        return $this->hasMany(RequestedCar::class, 'user_id');
    }
}
