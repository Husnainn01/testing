<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Listing;
use App\Models\Freight;
use App\Models\Insurance;
use App\Models\ShippingOrder;


class Qoute extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_id',
        'car_name',
        'fob_price',
        'freight_id',
        'insurance_id',
        'inspection_id',
        'total_price',
        'offer',
        'name',
        'email',
        'phone_no',
        'country',
        'type',
        'gender',
        'car_company_email',
        'agreed_price',
        'user_id'
    ];

    public function car()
    {
        return $this->belongsTo(Listing::class, 'car_id');
    }
    public function freight()
    {
        return $this->belongsTo(Freight::class, 'freight_id');
    }
    public function insurance()
    {
        return $this->belongsTo(Insurance::class, 'insurance_id');
    }
    public function inspection()
    {
        return $this->belongsTo(Inspection::class, 'inspection_id');
    }
    public function shippingOrders()
    {
        return $this->belongsToMany(ShippingOrder::class, 'shipping_order_qoute');
    }
}
