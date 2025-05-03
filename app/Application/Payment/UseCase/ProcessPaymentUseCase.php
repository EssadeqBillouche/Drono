<?php

        namespace App\Application\Payment\UseCase;

        use App\Domain\Payment\Entity\Payment;
        use App\Domain\Payment\Interfaces\PaymentRepositoryInterface;
        use App\Domain\Payment\Interfaces\PaymentServiceInterface;

        class ProcessPaymentUseCase
        {
            private $paymentService;
            private $paymentRepository;

            public function __construct(
                PaymentServiceInterface $paymentService,
                PaymentRepositoryInterface $paymentRepository
            ) {
                $this->paymentService = $paymentService;
                $this->paymentRepository = $paymentRepository;
            }

            public function execute(float $amount, string $currency, string $paymentMethodId, array $metadata = []): array
            {
                $result = $this->paymentService->processPayment($amount, $currency, $paymentMethodId, $metadata);

                if (isset($result['payment_id'])) {
                    $payment = new Payment(
                        $result['payment_id'],
                        $amount,
                        $currency,
                        $result['status'] ?? 'unknown',
                        'stripe',
                        $metadata['order_id'] ?? null
                    );

                    $this->paymentRepository->save($payment);
                }

                return $result;
            }
        }
