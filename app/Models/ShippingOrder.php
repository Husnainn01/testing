<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OptionService;
use App\Models\Qoute;
use App\Models\Invoice;
use App\Models\TtDocument;

class ShippingOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'offer_ids',
        'service',
        'country',
        'city',
        'container_port',
        'consignee_tab',
        'receiver_tab',
        'consignee_id',
        'default_name',
        'default_company_name',
        'default_email',
        'default_phone_number',
        'default_phone_2',
        'default_address',
        'receiver_id',
        'receiver_default_name',
        'receiver_default_company_name',
        'receiver_default_email',
        'receiver_default_phone_number',
        'receiver_default_phone_2',
        'receiver_default_address',
        'deregistration_service',
        'english_export_service',
        'photo_service',
        'ss_custom_photo_service',
        'ss_custom_inspection_service',
        'ss_custom_cleaning_service',
        'status'
    ];

    public function offers()
    {
        return $this->belongsToMany(Qoute::class, 'shipping_order_qoute');
    }

    public function country_selected()
    {
        return $this->belongsTo(ListingLocation::class, 'country');
    }

    public function city_selected()
    {
        return $this->belongsTo(City::class, 'city');
    }

    public function port_selected()
    {
        return $this->belongsTo(Port::class, 'container_port');
    }

    public function optionServices()
    {
        return $this->belongsToMany(OptionService::class, 'shipping_order_option_service');
    }
    
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
    public function tt_documents()
    {
        return $this->hasMany(TtDocument::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'shipping_order_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($shippingOrder) {
            $shippingOrder->shipping_id = 'ss-' . $shippingOrder->id;
        });
    }

}
