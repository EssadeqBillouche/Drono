<?php

namespace App\Application\Auth\UseCase;

use App\Application\Auth\DTOs\LoginUserDTO;
use App\Infrastructure\Persistence\DAOs\UserDAO;
use App\Infrastructure\Persistence\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginUseCase
{
    private UserDAO $userDAO;

    public function __construct(UserDAO $userDAO)
    {
        $this->userDAO = $userDAO;
    }

    /**
     * @throws AuthenticationException
     */
    public function login(LoginUserDTO $dto): ?User
    {
        $user = $this->userDAO->login($dto->email, $dto->password);
        if ($user) {
            $this->startSession($user);
        }
        return $user;
    }

    protected function startSession(User $user): void
    {
        $sessionData = [
            'user_id' => $user->id,
            'user_email' => $user->email,
            'user_name' => $user->name,
            'user_role' => $user->role,
            'user_status' => $user->status,
            'profile_image' => $user->profile_image
        ];

        if ($user->role === Roles::SELLER && $user->seller) {
            $sessionData['seller_role'] = $user->seller->role;
            $sessionData['seller_status'] = $user->seller->status;
        }

        session($sessionData);
    }

    public function logout(): void
    {
        try {
            Auth::logout();
            Session::flush();
            Session::regenerate();
        } catch (\Exception $e) {
            // Log the error
            throw new AuthenticationException('Logout failed: ' . $e->getMessage());
        }
    }
}
