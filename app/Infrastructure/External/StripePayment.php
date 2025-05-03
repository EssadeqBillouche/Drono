<?php

    namespace App\Infrastructure\External;

    use App\Domain\Payment\Interfaces\PaymentServiceInterface;
    use Stripe\Stripe;
    use Stripe\PaymentIntent;
    use Stripe\Exception\ApiErrorException;

    class StripePayment implements PaymentServiceInterface
    {
        public function __construct()
        {
            Stripe::setApiKey(env('STRIPE_SECRET'));
        }

        public function processPayment(float $amount, string $currency, string $paymentMethodId, array $metadata = []): array
        {
            try {
                $paymentIntent = PaymentIntent::create([
                    'amount' => (int) ($amount * 100), // Convert to cents
                    'currency' => $currency,
                    'payment_method' => $paymentMethodId,
                    'confirmation_method' => 'manual',
                    'confirm' => true,
                    'metadata' => $metadata,
                ]);

                if ($paymentIntent->status === 'succeeded') {
                    return [
                        'success' => true,
                        'payment_id' => $paymentIntent->id,
                        'status' => $paymentIntent->status
                    ];
                }

                if ($paymentIntent->status === 'requires_action' &&
                    $paymentIntent->next_action->type === 'use_stripe_sdk') {
                    return [
                        'requires_action' => true,
                        'payment_intent_client_secret' => $paymentIntent->client_secret,
                        'payment_id' => $paymentIntent->id
                    ];
                }

                return [
                    'success' => false,
                    'message' => 'Payment processing failed',
                    'status' => $paymentIntent->status
                ];
            } catch (ApiErrorException $e) {
                return [
                    'success' => false,
                    'message' => $e->getMessage(),
                    'code' => $e->getStripeCode()
                ];
            }
        }
    }
