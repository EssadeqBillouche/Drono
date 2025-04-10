<?php

namespace App\Presentation\Http\Requests\Auth;


namespace App\Presentation\Http\Requests\Auth;

use App\Application\Auth\DTOs\LoginUserDTO;
use App\Application\Auth\DTOs\RegisterSellerDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow anyone to register as seller
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|email',
        ];
    }

    public function toDTO(): LoginUserDTO
    {
        return new LoginUserDTO( email: $this->input('email'), password: $this->input('password'));
    }

}
