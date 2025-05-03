<?php

        namespace App\Providers;

        use App\Domain\Payment\Interfaces\PaymentRepositoryInterface;
        use App\Domain\Payment\Interfaces\PaymentServiceInterface;
        use App\Infrastructure\External\StripePayment;
        use App\Infrastructure\Persistence\PaymentRepository;
        use Illuminate\Support\ServiceProvider;

        class PaymentServiceProvider extends ServiceProvider
        {
            public function register()
            {
                $this->app->bind(PaymentServiceInterface::class, StripePayment::class);
                $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
            }
        }
