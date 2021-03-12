<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminCheck
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
        if (!session()->has('LoggedAdmin') && $request->path() != 'admin/login') {
            return redirect('admin/login')->with('fail', 'Мора да се логирате како админ!');
        }
        return $next($request);
    }
}