<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct() {
        return $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function respondWithToken($token) {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => 3600
        ], 200);
    }

    public function login() {
        $validator = Validator::make(request()->all(), [
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (! $token = auth()->attempt($validator->validate())) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me() {
        return response()->json(auth()->user());
    }

    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'Successfully logout']);
    }
}
