<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */



    protected function redirectTo($request)
    {
        $guard = session('guard')??'admin';

        if (! $request->expectsJson()) {
            return route('cms.login', $guard, ['lang' => app()->getLocale()]);


            //  return route('cms.login' ,$guard, app()->getLocale()); //getLocale probably return empty value
        }
    }
}
