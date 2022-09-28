<?php

namespace App\Http\Middleware;

use Closure;
use Laravel\Lumen\Http\Request;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {   
        
        $action = $next($request);
        echo "MiddleWare Rodando\n";
        return $action;
    }
}
