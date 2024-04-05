<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShippingOrder;
use App\Models\User;

class Invoice extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'shipping_order_id',
        'user_id',
        'car_name',
        'car_brand',
        'car_location',
        'car_status',
        'offer_price',
        'offer_status',
        'agreed_price',
        'remarks',
        'service_type',
        'shipping_status',
    ];

    public function shippingOrder()
    {
        return $this->belongsTo(ShippingOrder::class, 'shipping_order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
