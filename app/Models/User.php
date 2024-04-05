<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Qoute;
use App\Models\Invoice;
use App\Models\Listing;
use App\Models\RequestedCar;


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
        'company_name'
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
    
    public function requestedCar()
    {
        return $this->hasMany(RequestedCar::class);
    }

}
