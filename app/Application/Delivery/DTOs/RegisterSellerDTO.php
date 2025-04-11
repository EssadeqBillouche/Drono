<?php

namespace App\Application\Auth\DTOs;

use Illuminate\Http\UploadedFile;

readonly class RegisterSellerDTO
{
    public function __construct(
        public readonly string $fullName,
        public readonly string $email,
        public readonly string $storeName,
        public readonly string $password,
        public readonly string $storeProfileImage,
        public readonly string $storeBackgroundImage
    )
    {
    }
}
