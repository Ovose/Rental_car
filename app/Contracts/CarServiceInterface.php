<?php
namespace App\Contracts;

interface CarServiceInterface
{
    public function getAllCars();

    public function getCarById($id);
}

