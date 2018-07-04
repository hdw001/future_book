<?php

namespace App\Http\Middleware;

use Closure;

class checkUserLogin
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
        //判断是否没有登录
        if(!$request->session()->has('work_number')) {
            return redirect("/login");
        }
        return $next($request);
    }
}
