<?php

    namespace App\Presentation\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Log;
    use Stripe\Webhook;
    use Stripe\Exception\SignatureVerificationException;

    class StripeWebhookController extends Controller
    {
        /**
         * Handle Stripe webhook calls.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function handleWebhook(Request $request)
        {
            dd($request);
            // For development, log the event
            Log::info('Stripe webhook received', ['payload' => $request->all()]);

            // In development, you can bypass the signature verification
            if (app()->environment('local')) {
                return response()->json(['status' => 'success']);
            }

            // For production, verify the signature
            try {
                $event = Webhook::constructEvent(
                    $request->getContent(),
                    $request->header('Stripe-Signature'),
                    config('services.stripe.webhook.secret')
                );

                // Handle different event types
                switch ($event->type) {
                    case 'payment_intent.succeeded':
                        $paymentIntent = $event->data->object;
                        // Handle successful payment
                        break;
                    case 'payment_intent.payment_failed':
                        $paymentIntent = $event->data->object;
                        // Handle failed payment
                        break;
                    // Add other event types as needed
                }

                return response()->json(['status' => 'success']);
            } catch (SignatureVerificationException $e) {
                Log::error('Webhook signature verification failed.', ['error' => $e->getMessage()]);
                return response()->json(['error' => 'Webhook signature verification failed.'], 400);
            } catch (\Exception $e) {
                Log::error('Webhook error', ['error' => $e->getMessage()]);
                return response()->json(['error' => $e->getMessage()], 400);
            }
        }
    }
