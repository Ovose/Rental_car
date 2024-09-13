<?php

namespace App\Http\Controllers;

use App\Services\CarService;

class CarController extends Controller
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function index()
    {
        $cars = $this->carService->getAllCars();
        return view('cars.index', compact('cars'));
    }

    public function show($id)
    {
        $car = $this->carService->getCarById($id);
        return view('cars.show', compact('car'));
        
    }
}
