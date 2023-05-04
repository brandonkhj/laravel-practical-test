<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\UserResource;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class UserApiController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {
            User::create([
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
        } catch (\Throwable $th) {
            report($th);

            throw new HttpResponseException(response()->json([
                'message' => 'server error',
                'status' => 500,
            ], 500));
        }

        return response()->json([
            'status' => 200,
            'message' => 'success',
        ]);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $auth = Auth::attempt(credentials: $credentials);

        if ($auth === false) {
            throw new HttpResponseException(response()->json([
                'message' => 'invalid credentials',
                'status' => 403,
            ], 403));
        }

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => UserResource::make($user),
            'token' => $user->createToken('User-Token')->plainTextToken,
        ]);
    }
}
