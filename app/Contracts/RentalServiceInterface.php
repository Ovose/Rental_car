<?php

namespace App\Contracts;

interface RentalServiceInterface
{
    public function getAvailableCars();
    public function bookCar($carId, $startDate, $endDate);
    public function calculatePrice($carId, $startDate, $endDate);
    public function validateRentalData($data); // Добавлен метод валидации
}
