<?php

namespace App\Presentation\Http\Requests\Auth;

use App\Application\Auth\DTOs\RegisterClientDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class clientRegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow anyone to register
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'sometimes|in:client'
        ];
    }

    public function toDTO(): RegisterClientDTO
    {
        return new RegisterClientDTO(
            name: $this->input('name'),
            email: $this->input('email'),
            password: Hash::make($this->input('password')),
        );
    }
}
