<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FilamentAuthenticator extends \Filament\Http\Middleware\Authenticate
{
    protected function redirectTo($request): string
    {
        return route('login');
    }
}
