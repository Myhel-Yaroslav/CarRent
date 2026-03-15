<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    // Перевірка прав доступу адміністратора
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Перенаправлення звичайних користувачів на каталог
        return redirect()->route('cars.index')->with('error', 'Доступ заборонено.');
    }
}