<?php

namespace App\Services;

use App\Models\Car;

class CarService
{
    public function getAllCars()
    {
        return Car::all(); 
    }

    public function getCarById($id)
    {
        return Car::findOrFail($id); 
    }
}
