<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\AuthorizationException;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $finded = false;
        $total = count($roles);
        $i = 0;

        while (!$finded && ($i < $total)) {
            if ($request->user()->isRol($roles[$i])) {
                $finded = true;
            }
            $i++;
        }

        if ($finded) {
            return $next($request);   
        }
        throw new AuthorizationException;
    }
}
