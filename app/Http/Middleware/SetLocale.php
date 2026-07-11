<?php
namespace App\Http\Middleware;
use Closure; use Illuminate\Http\Request;
use Illuminate\Support\Facades\{App, Session};
class SetLocale {
    public function handle(Request $request, Closure $next) {
        $locale = Session::get('locale', 'id');
        if (!in_array($locale, ['en','id','zh'])) $locale = 'id';
        App::setLocale($locale);
        return $next($request);
    }
}
