<?php

namespace App\Providers;

use App\Domain\Payment\Interfaces\PaymentServiceInterface;
use App\Infrastructure\External\StripePayment;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PaymentServiceInterface::class, StripePayment::class);
    }
}
