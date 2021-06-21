<?php

namespace App\Http\Middleware;

use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Facades\JWTAuth;

use Closure;

class ApiProtected extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $exception) {
            if ($exception instanceof TokenInvalidException){
                return response()->json(['status' => 'Token é inválido']);
            }else if ($exception instanceof TokenExpiredException){
                return response()->json(['status' => 'O token está expirado']);
            }else{
                return response()->json(['status' => 'Token de autorização não encontrado']);
            }
        }
        return $next($request);
    }
}
