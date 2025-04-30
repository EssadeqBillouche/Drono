<?php

namespace App\Providers;

use App\Domain\Order\Repositories\OrderRepositoryInterface;
use App\Infrastructure\Persistence\DAOs\OrderDAO;
use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(OrderRepositoryInterface::class, OrderDAO::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
