<?php

namespace App\Presentation\Http\Requests\Auth;

use App\Application\Auth\DTOs\RegisterSellerDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SellerRegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow anyone to register as seller
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'store_name' => 'required|string|max:255|unique:sellers,store_name',
            'store_image' => 'required|image|max:5120', // 5MB max
            'store_background_image' => 'nullable|image|max:5120',
            'role' => 'sometimes|in:seller' // Optional role validation
        ];
    }

    public function toDTO(): RegisterSellerDTO
    {
        $profileImagePath = $this->storeImage($this->file('store_image'), 'sellers/profile');
        $backgroundImagePath = $this->storeImage($this->file('store_image'), 'sellers/background');

        return new RegisterSellerDTO(
            fullName: $this->input('name'),
            email: $this->input('email'),
            storeName: $this->input('store_name'),
            password: $this->input('password'),
            storeProfileImage: $profileImagePath,
            storeBackgroundImage: $backgroundImagePath
        );
    }
    private function storeImage($file, string $directory): string
    {
        $path = $file->store($directory, 'public');
        return Storage::url($path);
    }
}
