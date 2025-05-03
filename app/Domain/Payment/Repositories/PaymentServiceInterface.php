<?php

namespace App\Domain\Payment\Interfaces;

interface PaymentServiceInterface
{
    /**
     * Process a payment
     *
     * @param float $amount
     * @param string $currency
     * @param string $paymentMethodId
     * @param array $metadata
     * @return array
     */
    public function processPayment(float $amount, string $currency, string $paymentMethodId, array $metadata = []): array;
}
