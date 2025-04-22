<?php

namespace App\Presentation\Http\Requests\Auth;

use App\Application\Auth\DTOs\LoginUserDTO;
use Illuminate\Foundation\Http\FormRequest;


class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow anyone to register as seller
    }

    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string'
        ];
    }

    public function toDTO(): LoginUserDTO
    {
        return new LoginUserDTO( email: $this->input('email'), password: $this->input('password'));
    }

}
