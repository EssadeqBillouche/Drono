<?php

namespace App\Presentation\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{
    public function createPaymentIntent(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $request->amount,
                'currency' => 'usd',
                'metadata' => [
                    'order_id' => $request->order_id ?? uniqid('order_')
                ],
            ]);

            return response()->json([
                'clientSecret' => $paymentIntent->client_secret
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
