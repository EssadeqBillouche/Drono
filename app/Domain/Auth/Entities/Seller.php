<?php
namespace App\Domain\Auth\Entities;

use App\Domain\Auth\Entities\User;
use App\Domain\Auth\ValueObjects\Email;
use App\Domain\Auth\ValueObjects\Roles;
use App\Domain\Auth\ValueObjects\UserId;

class Seller extends User
{
    private string $storeName;
//    private string $storeImage;
    private string $storeBackgroundImage;

    public function __construct(UserId $id, Email $email, string $password, string $name, string $storeName, private string $storeImage, string $storeBackgroundImage, ?string $profileImage = null)
    {
        parent::__construct($id, $email, $password, $name, $profileImage);
        $this->storeName = $storeName;
        $this->storeBackgroundImage = $storeBackgroundImage;
    }

    public function getRole(): string
    {
        return Roles::SELLER;
    }

    // Seller-specific getters
    public function getStoreName(): string { return $this->storeName; }
    public function getStoreImage(): string { return $this->storeImage; }
    public function getStoreBackgroundImage(): string { return $this->storeBackgroundImage; }
}
