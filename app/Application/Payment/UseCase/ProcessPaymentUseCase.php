<?php

namespace App\Application\Payment\UseCase;

use App\Domain\Payment\Interfaces\PaymentServiceInterface;

class ProcessPaymentUseCase
{
    private $paymentService;

    public function __construct(PaymentServiceInterface $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function execute(float $amount, string $currency, string $paymentMethodId, array $metadata = []): array
    {
        return $this->paymentService->processPayment($amount, $currency, $paymentMethodId, $metadata);
    }
}
