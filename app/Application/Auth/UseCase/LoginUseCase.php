<?php

namespace App\Application\Auth\UseCase;

use App\Application\Auth\DTOs\LoginUserDTO;
use App\Infrastructure\Persistence\DAOs\UserDAO;
use App\Infrastructure\Persistence\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginUseCase
{
    private UserDAO $userDAO;
    public function __construct( UserDAO $userDAO){
        $this->userDAO = $userDAO;
    }

    public function userLogin(LoginUserDTO $dto): bool
    {
        return Auth::attempt([
            'email' => $dto->email,
            'password' => $dto->password
        ]);
    }
    public function StartSession(User $user) : void{
        session([
            'user_id' => $user->id,
            'user_email' => $user->email,
            'user_name' => $user->name,
            'user_role' => $user->role,
            'user_status' => $user->status,
            'profile_image' => $user->profile_image
        ]);
        if ($user->role == 'seller'){
            session([
                'role' => $user->seller->role,
                'status' => $user->seller->status
            ]);
        } // i will change it late to add more for session manangments

    }
    public function logout(){
        Auth::logout();
    }


}
