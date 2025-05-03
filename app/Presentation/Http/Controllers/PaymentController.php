<?php

                namespace App\Presentation\Http\Controllers;

                use App\Application\Payment\UseCase\ProcessPaymentUseCase;
                use Illuminate\Http\Request;
                use Illuminate\Support\Facades\Log;

                class PaymentController extends Controller
                {
                    private $processPaymentUseCase;

                    public function __construct(ProcessPaymentUseCase $processPaymentUseCase)
                    {
                        $this->processPaymentUseCase = $processPaymentUseCase;
                    }

                    public function process(Request $request)
                    {
                        try {
                            $request->validate([
                                'payment_method_id' => 'required|string',
                                'amount' => 'required|numeric|min:0.01',
                                'currency' => 'sometimes|string|size:3',
                                'order_id' => 'sometimes|string',
                                'email' => 'sometimes|email'
                            ]);

                            $amount = (float) $request->input('amount');
                            $paymentMethodId = $request->input('payment_method_id');
                            $currency = $request->input('currency', 'usd');

                            $metadata = [
                                'email' => $request->input('email'),
                                'order_id' => $request->input('order_id')
                            ];

                            $result = $this->processPaymentUseCase->execute(
                                $amount,
                                $currency,
                                $paymentMethodId,
                                $metadata
                            );

                            if (isset($result['success']) && $result['success']) {
                                return response()->json([
                                    'success' => true,
                                    'payment_id' => $result['payment_id'],
                                    'message' => 'Payment processed successfully'
                                ]);
                            }

                            if (isset($result['requires_action'])) {
                                return response()->json([
                                    'requires_action' => true,
                                    'payment_intent_client_secret' => $result['payment_intent_client_secret']
                                ]);
                            }

                            return response()->json([
                                'success' => false,
                                'message' => $result['message'] ?? 'Payment processing failed'
                            ], 400);

                        } catch (\Exception $e) {
                            Log::error('Payment error: ' . $e->getMessage());
                            return response()->json([
                                'success' => false,
                                'message' => 'Error processing payment: ' . $e->getMessage()
                            ], 500);
                        }
                    }
                }
