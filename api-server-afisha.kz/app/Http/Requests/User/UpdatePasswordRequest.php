<?php

namespace App\Http\Requests\User;

use App\Rules\UserPassword;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => 'current_password',
            'new_password' => ['required', new UserPassword()],
        ];
    }
}
