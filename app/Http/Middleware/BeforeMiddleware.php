<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class BeforeMiddleware
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
        //开启sql执行记录
        DB::enableQueryLog();
        return $next($request);
    }
}
