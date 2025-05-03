document.addEventListener('DOMContentLoaded', function() {
                    // Initialize Stripe
                    const stripe = Stripe(stripeKey);
                    const elements = stripe.elements();

                    // Create card element
                    const cardElement = elements.create('card');
                    cardElement.mount('#card-element');

                    // Handle form submission
                    const form = document.getElementById('checkout-form');
                    const submitButton = form.querySelector('button[type="submit"]');

                    form.addEventListener('submit', async function(event) {
                        event.preventDefault();

                        // Disable button to prevent multiple submissions
                        submitButton.disabled = true;
                        submitButton.innerHTML = '<svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Processing...';

                        try {
                            // Create payment method
                            const {paymentMethod, error} = await stripe.createPaymentMethod({
                                type: 'card',
                                card: cardElement,
                                billing_details: {
                                    name: form.first_name.value + ' ' + form.last_name.value,
                                    email: form.email.value,
                                    phone: form.phone.value,
                                    address: {
                                        line1: form.street.value,
                                        city: form.city.value,
                                        state: form.state.value,
                                        postal_code: form.zip.value,
                                        country: 'US'  // Change as needed
                                    }
                                }
                            });

                            if (error) {
                                showError(error.message);
                                submitButton.disabled = false;
                                submitButton.innerHTML = 'Complete Order <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>';
                                return;
                            }

                            // Submit the form with payment method ID
                            const hiddenInput = document.createElement('input');
                            hiddenInput.setAttribute('type', 'hidden');
                            hiddenInput.setAttribute('name', 'payment_method_id');
                            hiddenInput.setAttribute('value', paymentMethod.id);
                            form.appendChild(hiddenInput);

                            // Send to server
                            const formData = new FormData(form);
                            const response = await fetch('/checkout/process-payment', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    'Accept': 'application/json'
                                },
                                body: formData
                            });

                            const jsonResponse = await response.json();

                            // Handle requires authentication
                            if (jsonResponse.requires_action) {
                                const {paymentIntent, error} = await stripe.handleCardAction(
                                    jsonResponse.payment_intent_client_secret
                                );

                                if (error) {
                                    showError('Payment authentication failed.');
                                } else {
                                    // Payment processed successfully - redirect to confirmation page
                                    window.location.href = jsonResponse.redirect;
                                }
                            } else if (jsonResponse.success) {
                                // Payment successful - redirect to confirmation
                                window.location.href = jsonResponse.redirect;
                            } else {
                                showError(jsonResponse.message || 'Payment failed. Please try again.');
                            }

                        } catch (error) {
                            showError('An unexpected error occurred. Please try again.');
                            console.error(error);
                        }

                        submitButton.disabled = false;
                        submitButton.innerHTML = 'Complete Order <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>';
                    });

                    function showError(message) {
                        const errorContainer = document.getElementById('payment-errors') ||
                            document.createElement('div');

                        if (!document.getElementById('payment-errors')) {
                            errorContainer.id = 'payment-errors';
                            errorContainer.className = 'bg-red-50 border border-red-400 text-red-700 px-4 py-3 rounded mb-4';
                            const submitButton = form.querySelector('button[type="submit"]');
                            submitButton.parentNode.insertBefore(errorContainer, submitButton);
                        }

                        errorContainer.innerHTML = `
                            <div class="flex">
                                <div class="py-1">
                                    <svg class="h-6 w-6 text-red-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm">${message}</p>
                                </div>
                            </div>`;
                    }
                });
