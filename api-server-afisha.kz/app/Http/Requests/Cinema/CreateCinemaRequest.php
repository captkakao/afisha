<?php

namespace App\Http\Requests\Cinema;

use Illuminate\Foundation\Http\FormRequest;

class CreateCinemaRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string', 'max:255'],
            'city_id' => ['required', 'exists:cities,id'],
        ];
    }
}
