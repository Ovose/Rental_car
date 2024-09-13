<?php


namespace App\Services;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Support\Facades\Auth;

class RentalService
{
    public function getAvailableCars()
    {
        return Car::where('status', 'available')->get();
    }

    public function bookCar($userId, $carId, $startDate, $endDate)
    {
        $car = Car::findOrFail($carId);
    
        if ($car->status !== 'available') {
            return false; 
        }
    
        
        $rental = Rental::create([
            'user_id' => $userId,
            'car_id' => $carId,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => 'reserved', 
        ]);
    
        
        $car->status = 'reserved';
        $car->save();
    
        return $rental;
    }
    

    public function calculatePrice($carId, $startDate, $endDate)
    {
        $car = Car::findOrFail($carId);
        $startDate = new \DateTime($startDate);
        $endDate = new \DateTime($endDate);
        $interval = $startDate->diff($endDate);
        $days = $interval->days;

        return $days * $car->price_per_day;
    }
}
