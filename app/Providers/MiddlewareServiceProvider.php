<?php

namespace App\Providers;

use App\Presentation\Http\Middleware\RedirectIfAuthenticated;
use App\Presentation\Http\Middleware\RoleMiddleware;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class MiddlewareServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::aliasMiddleware('guest', RedirectIfAuthenticated::class);
        // Register the role middleware
        Route::aliasMiddleware('role', RoleMiddleware::class);
    }
}
