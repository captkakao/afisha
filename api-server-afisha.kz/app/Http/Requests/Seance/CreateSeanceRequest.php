<?php

namespace App\Http\Requests\Seance;

use Illuminate\Foundation\Http\FormRequest;

class CreateSeanceRequest extends FormRequest
{
    public function rules()
    {
        return [
            'price_adult' => ['nullable', 'digits_between:0,1000000'],
            'price_kid' => ['nullable', 'digits_between:0,1000000'],
            'price_student' => ['nullable', 'digits_between:0,1000000'],
            'price_vip' => ['nullable', 'digits_between:0,1000000'],
            'show_time' => ['required', 'date'],
            'movie_id' => ['required', 'exists:movies,id'],
            'hall_id' => ['required', 'exists:halls,id'],
        ];
    }
}
