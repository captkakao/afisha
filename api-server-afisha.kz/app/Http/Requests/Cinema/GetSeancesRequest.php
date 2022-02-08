<?php

namespace App\Http\Requests\Cinema;

use Illuminate\Foundation\Http\FormRequest;

class GetSeancesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'datetime' => ['required', 'date_format:Y-m-d H:i:s'],
        ];
    }
}
