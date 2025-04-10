<?php

namespace App\Providers;

use App\Domain\Auth\Repositories\UserRepositoryInterface;
use App\Infrastructure\Persistence\DAOs\UserDAO;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserDAO::class
        );
    }

    public function boot()
    {
        // Additional repository bindings can go here
    }
}
