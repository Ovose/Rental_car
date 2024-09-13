<?php

namespace App\Services;

use App\Models\Driver;
use Illuminate\Support\Facades\DB;

class DriverService
{
    public function getAllDrivers()
    {
        return DB::table('drivers')->get();
    }

    public function getDriverById($id)
    {
        return DB::table('drivers')->find($id);
    }

    public function createDriver(array $data)
    {
        return Driver::create([]);
    }

    public function updateDriver($id, array $data)
    {
        return DB::table('drivers')->where('id', $id)->update($data);
    }

    public function deleteDriver($id)
    {
        return DB::table('drivers')->where('id', $id)->delete();
    }
}
