<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CanEnterDashboard
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
        $roleName=Auth::user()->role->name;
        if ($roleName == 'admin' or $roleName == 'superadmin') {
            return $next($request);
            }

            return redirect(url('/'));
    }
}
