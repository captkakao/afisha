<?php

namespace App\Http\Requests\Hall;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHallRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'seat_config_example' => ['required', 'string', 'max:255'],
        ];
    }
}
