<?php

namespace App\Http\Requests\Auth;

use App\Rules\UserPassword;
use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', new UserPassword()],
        ];
    }
}
