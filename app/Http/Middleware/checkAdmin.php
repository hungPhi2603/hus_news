<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->quyen == 2) {
            return $next($request);
        } else {
            return redirect('admin/login')->with('thongbao', 'Tài khoản không hợp lệ hoặc không có quyền');
        }
        
    }
}
