<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SetUserLocale
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // تعيين اللغة بناءً على حقل 'lang' في المستخدم
            $locale = Auth::user()->lang; // تأكد من أن الحقل 'lang' موجود في جدول المستخدمين
            App::setLocale($locale);
        }else{
            App::setLocale('en');
        }

        return $next($request);
    }
}
