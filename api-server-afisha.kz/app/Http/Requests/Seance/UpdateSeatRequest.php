<?php

namespace App\Http\Requests\Seance;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSeatRequest extends FormRequest
{
    public function rules()
    {
        return [
            'seat_config' => ['required', 'string', 'max:255'],
        ];
    }
}
