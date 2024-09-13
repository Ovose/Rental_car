<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Car::create([
            'make' => 'Toyota',
            'model' => 'Camry',
            'year' => 2021,
            'status' => 'available',
        ]);

        Car::create([
            'make' => 'Honda',
            'model' => 'Civic',
            'year' => 2022,
            'status' => 'available',
        ]);
    }
}
