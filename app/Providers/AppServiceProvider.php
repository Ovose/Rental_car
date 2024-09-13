<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\CarServiceInterface;
use App\Services\CarService;
use App\Contracts\RentalServiceInterface;
use App\Services\RentalService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CarServiceInterface::class, CarService::class);
        $this->app->bind(RentalServiceInterface::class, RentalService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
