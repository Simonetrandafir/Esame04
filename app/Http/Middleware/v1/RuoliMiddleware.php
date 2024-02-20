<?php

namespace App\Http\Middleware\v1;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RuoliMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$requiredRuoli): Response
    {
        abort_if(0 === count(array_intersect($requiredRuoli, $request["ruoli"])),403 ,'MD_0001');
        return $next($request);
    }
}
