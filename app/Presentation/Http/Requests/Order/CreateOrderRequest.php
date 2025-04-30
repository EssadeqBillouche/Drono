<?php

namespace App\Presentation\Http\Requests\Order;

use App\Application\Orders\DTOs\AddOrderDTO;
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

    public function toDTO(){
        return new AddOrderDTO(items: $this->order_itemsToArray(),
            shippingLatitude: $this->input('latitude'),
            shippingLongitude: $this->input('longitude'),
            clientId: 6,
            notes: $this->input('delivery_notes'),
        );

    }
    public function order_itemsToArray()
    {
        return json_decode($this->input('order_items'), true);
    }

}
