<?php

namespace App\Filament\Resources\CarResource\Pages;

use App\Models\Car;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\CarResource;

class CreateCar extends CreateRecord
{
    protected static string $resource = CarResource::class;


    protected function handleRecordCreation(array $data): Model
    {
        return Car::create($data);
    }

    protected function afterSave(): void
    {
        $this->redirect(route('filament.resources.cars.index')); 
    }

}
