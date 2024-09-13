<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with('car')->get(); // Получаем все аренды с информацией об автомобилях
        return response()->json($rentals);
    }

    public function show($id)
    {
        $rental = Rental::with('car')->find($id);

        if (!$rental) {
            return response()->json(['message' => 'Rental not found'], 404);
        }

        return response()->json($rental);
    }
}
