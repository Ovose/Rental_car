<?php

namespace App\Http\Controllers;

use App\Services\RentalService;
use App\Models\Rental;
use App\Http\Requests\RentalCreateRequest;
use App\Http\Requests\RentalUpdateRequest;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    protected $rentalService;

    public function __construct(RentalService $rentalService)
    {
        $this->rentalService = $rentalService;
    }

    
    public function index()
    {
        $cars = $this->rentalService->getAvailableCars();
        $rentals = Rental::where('user_id', auth()->id())->with('car')->get();

        return view('rentals.index', compact('cars', 'rentals'));
    }

    public function create()
    {
        $cars = $this->rentalService->getAvailableCars();

        return view('rentals.create', compact('cars'));
    }

  
    public function store(RentalCreateRequest $request)
    {
        $this->rentalService->bookCar(auth()->id(), $request->car_id, $request->start_date, $request->end_date);

        return redirect()->route('rentals.index');
    }

  
    public function show($id)
    {
        $rental = Rental::findOrFail($id);

        return view('rentals.show', compact('rental'));
    }

   
    public function update(RentalUpdateRequest $request, $id)
    {
        $rental = Rental::findOrFail($id);
        $rental->update($request->all());

        return redirect()->route('rentals.index');
    }

 
    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->delete();

        return redirect()->route('rentals.index');
    }

    public function calculatePrice(Request $request)
    {
        $carId = $request->input('car_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        
        $price = $this->rentalService->calculatePrice($carId, $startDate, $endDate);

        return response()->json(['price' => $price]);
    }
}
