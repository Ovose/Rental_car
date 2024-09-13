<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class UserService
{
    public function getAllUsers()
    {
        return DB::table('users')->get();
    }

    public function getUserById($id)
    {
        return DB::table('users')->find($id);
    }

    public function createUser(array $data)
    {
        return DB::table('users')->insert($data);
    }

    public function updateUser($id, array $data)
    {
        return DB::table('users')->where('id', $id)->update($data);
    }

    public function deleteUser($id)
    {
        return DB::table('users')->where('id', $id)->delete();
    }
}
