<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Exceptions\HttpException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Throwable;

class Authorization
{

    public function __construct(private Route $route)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $authorization = $request->header("Authorization");
 
        if ($authorization) {
            $bearer = str_replace("Bearer ", "", $authorization);
            if ($bearer) {
                try {
            
                    $jwt = JWT::decode($bearer, new Key(getenv("JWTKEY"), "HS256"));

                } catch (Throwable) {
                    throw new HttpException("Token de autenticação invalido!", 422);

                }

                if($jwt->expire > time()){
                    return $next($request);
                }
            }
        }

        throw new HttpException("Token de autenticaçao expirado!", 401);
    }
}
