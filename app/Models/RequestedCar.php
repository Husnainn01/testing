<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestedCar extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_name',
        'car_model',
        'year',
        'mileage',
        'engine',
        'transmission',
        'user_id'
    ];
}
