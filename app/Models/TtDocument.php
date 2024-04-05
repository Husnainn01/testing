<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShippingOrder;

class TtDocument extends Model
{
    use HasFactory;
    protected $fillable = ['shipping_order_id', 'document_path', 'details'];

    public function shippingOrder()
    {
        return $this->belongsTo(ShippingOrder::class);
    }
}
