<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'make',
        'model',
        'year',
        'registration_number',
        'price_per_day',
        'status'
    ];
  
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

}
