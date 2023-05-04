<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\ApiRequest;

class RegisterRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users|min:6',
            'password' => 'required|min:8|confirmed',
        ];
    }
}
