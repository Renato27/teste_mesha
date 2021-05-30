<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
    public function login()
    {
        $credentials = request(['email', 'password']);

        $jwt = app(JWTAuth::class);

        $token = $jwt->attempt($credentials);

        return $token ?
            ['token' => $token] :
            response()->json([
                'error' => Lang::get('auth.failed'),
            ], 400);
    }

    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json([], 204);
    }

    public function me()
    {
        $user = Auth::guard('api')->user();

        return response()->json($user);
    }

    public function refresh()
    {
        $token = Auth::guard('api')->refresh();

        return ['token' => $token];
    }
}
