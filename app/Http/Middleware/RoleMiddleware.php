<?php
namespace App\Http\Middleware;

use Closure;

/**
 * Class RoleMiddleware
 * @package App\Http\Middleware
 */
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param   String $role The role to check against, and see if the current user has that role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ($request->user() === null|| !$request->user()->hasRole($role)) {
            return redirect('/');
        }

        return $next($request);
    }
}
