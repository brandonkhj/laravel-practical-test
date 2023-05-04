<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\ApiRequest;

class LoginRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users,email|min:6',
            'password' => 'required|min:8'
        ];
    }
}
