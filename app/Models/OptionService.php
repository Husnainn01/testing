<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShippingOrder;

class OptionService extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price'
    ];
    public function shippingOrders()
    {
        return $this->belongsToMany(ShippingOrder::class, 'shipping_order_option_service');
    }

}
