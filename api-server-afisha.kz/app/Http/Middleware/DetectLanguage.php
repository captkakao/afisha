<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DetectLanguage
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
        if ($locale = $request->header('Accept-Language')) {
            if (Language::where('code', $locale)->first())
                App::setLocale($request->header('Accept-Language'));
        }
        return $next($request);
    }
}
