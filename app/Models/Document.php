<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['vessel_name','document_path', 'details', 'status'];

    public function shippingOrder()
    {
        return $this->belongsTo(ShippingOrder::class);
    }
}
