<?php

namespace App\Http\Controllers;

use App\Services\CarService;

class HomeController extends Controller
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function index()
    {
        $cars = $this->carService->getAllCars();
        return view('home', compact('cars'));
    }
}
