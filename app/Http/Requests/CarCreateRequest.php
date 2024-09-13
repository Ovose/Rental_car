<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentalCreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ];
    }

    public function messages()
    {
        return [
            'car_id.required' => 'Выберите автомобиль.',
            'car_id.exists' => 'Выбранный автомобиль не существует.',
            'start_date.required' => 'Укажите дату начала.',
            'start_date.after_or_equal' => 'Дата начала должна быть сегодняшней или позднее.',
            'end_date.required' => 'Укажите дату окончания.',
            'end_date.after' => 'Дата окончания должна быть после даты начала.',
        ];
    }
}
