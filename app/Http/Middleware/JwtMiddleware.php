<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            if (! $user) {
                throw new HttpException(400, 'Usuário não encontrado!');
            }
        } catch (\Throwable $th) {
            if ($th instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json([
                    'message' => 'Token Inválido',
                ]);
            } elseif ($th instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json([
                    'message' => 'Token Expirado!',
                ]);
            } else {
                if ($th->getMessage() === 'Usuário não encontrado!') {
                    return response()->json([
                        'message' => 'Usuário não encontrado!',
                    ]);
                }
            }

            return response()->json([
                'message' => 'Token de autorização não encontrado!',
            ]);
        }

        return $next($request);
    }
}
