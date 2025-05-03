<?php

namespace App\Domain\Payment\Interfaces;

use App\Domain\Payment\Entity\Payment;

interface PaymentRepositoryInterface
{
    public function save(Payment $payment): void;
    public function findById(string $id): ?Payment;
    public function updateStatus(string $id, string $status): void;
}
