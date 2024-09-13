<?php

namespace App\Http\Controllers;

// не используется 

class ProtectedController extends Controller
{
    public function showProtectedData()
    {
        
        return response()->json([
            'data' => 'Это защищенные данные',
        ]);
    }
}
