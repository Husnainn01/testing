<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestedCar extends Model
{
    use HasFactory;
    protected $fillable = [
        'transmission', 'engine', 'mileage', 'year', 'car_model', 'user_id', 'car_name'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
