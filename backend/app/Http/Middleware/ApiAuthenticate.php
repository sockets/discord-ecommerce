<?php
 
namespace App\Http\Middleware;
 
use Closure;
 
class ApiAuthenticate
{
    public function handle($request, Closure $next)
    {
        // Perform action
 
        return $next($request);
    }
}