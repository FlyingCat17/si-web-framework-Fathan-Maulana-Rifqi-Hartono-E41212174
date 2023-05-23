<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        $controller = new Controller();
        return $request->expectsJson() ? null : route('week_6.auth.login-create');
        // return $request->expectsJson() ? null : $controller->redirectWithDanger('week_6.auth.login-create', 'Anda harus login terlebih dahulu');
    }
}
