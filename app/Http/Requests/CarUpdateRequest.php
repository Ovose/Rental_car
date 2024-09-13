<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarupdateRequest extends FormRequest 
{
public function rules()
{
return [
    'make' => 'required|string|max:255',
    'model' => 'required|string|max:255',
    'year' => 'nullable|integer',
    'registration_number' => 'nullable|string|max:255',
    'price_per_day' => 'required|numeric',
];
}
}