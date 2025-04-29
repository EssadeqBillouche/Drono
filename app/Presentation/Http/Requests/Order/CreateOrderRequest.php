<?php

namespace App\Presentation\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // You might want to add more sophisticated authorization logic here.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'street' => 'required|string',
            'apartment' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|string',
            'delivery_notes' => 'nullable|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'payment_method' => 'required|in:card,paypal,apple_pay',
//            'card_number' => 'required_if:payment_method,card|string|size:19', // Adjust size as needed
//            'expiry_date' => 'required_if:payment_method,card|string|size:5', // Adjust size as needed
//            'cvv' => 'required_if:payment_method,card|string|size:3|size:4', // Allow 3 or 4 digits
//            'name_on_card' => 'required_if:payment_method,card|string',
//            'terms_accepted' => 'required|accepted',
        ];
    }

//    public function messages()
//    {
//        return [
//            'card_number.size' => 'Card number must be 19 characters.',
//            'expiry_date.size' => 'Expiry date must be in MM/YY format.',
//            'cvv.size' => 'CVV must be 3 or 4 digits.',
//            'terms_accepted.accepted' => 'You must accept the terms and conditions.',
//        ];
//
//    }
}
