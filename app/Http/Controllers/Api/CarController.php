<?php

// не работает

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\JsonResponse;

class CarController extends Controller
{
    /**
     * Display a listing of the cars.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $cars = Car::all();
        return response()->json($cars);
    }
}
