<?php

namespace App\Presentation\Http\Controllers;

use App\Application\Orders\UseCase\CreateOrderUseCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Presentation\Http\Requests\Order\CreateOrderRequest;

class CheckoutController extends Controller
{
    protected $addOrderUseCase;

    public function __construct(CreateOrderUseCase $addOrderUseCase)
    {
        $this->addOrderUseCase = $addOrderUseCase;
    }

    public function processPayment(CreateOrderRequest $request)
    {
        try {
            // Set Stripe API key
            Stripe::setApiKey(env('STRIPE_SECRET'));

            // Calculate amount from order data
            $amount = (float) $request->input('order_total') * 100; // Convert to cents

            // Create a PaymentIntent
            $paymentIntent = PaymentIntent::create([
                'amount' => (int) $amount,
                'currency' => 'usd',
                'payment_method' => $request->input('payment_method_id'),
                'confirmation_method' => 'manual',
                'confirm' => true,
                'return_url' => route('order.confirmation', ['id' => uniqid('order_')]),
                'metadata' => [
                    'order_id' => uniqid('order_'),
                    'customer_email' => $request->input('email')
                ]
            ]);

            // Handle successful payment
            if ($paymentIntent->status === 'succeeded') {
                // Process the order
                $orderDTO = $request->toDTO();
                $order = $this->addOrderUseCase->execute($orderDTO);

                return response()->json([
                    'success' => true,
                    'redirect' => route('order.confirmation', ['id' => 11])
                ]);
            }

            // Handle authentication required
            if ($paymentIntent->status === 'requires_action' &&
                $paymentIntent->next_action->type === 'use_stripe_sdk') {
                return response()->json([
                    'requires_action' => true,
                    'payment_intent_client_secret' => $paymentIntent->client_secret
                ]);
            }

            // Payment failed
            return response()->json([
                'success' => false,
                'message' => 'Payment failed'
            ], 400);

        } catch (\Exception $e) {
            Log::error('Payment error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error processing payment: ' . $e->getMessage()
            ], 500);
        }
    }
    public function show(){
        return view('checkout');
    }
}
