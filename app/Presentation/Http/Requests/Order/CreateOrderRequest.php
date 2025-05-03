<?php

namespace App\Presentation\Http\Requests\Order;

use App\Application\Orders\DTOs\AddOrderDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
        ];
    }

    public function toDTO(){
        return new AddOrderDTO(items: $this->order_itemsToArray(),
            shippingLatitude: $this->input('latitude'),
            shippingLongitude: $this->input('longitude'),
            clientId: session()->get('sessionData.id'),
            notes: $this->input('delivery_notes'),
        );

    }
    public function order_itemsToArray()
    {
        return json_decode($this->input('order_items'), true);
    }

}
