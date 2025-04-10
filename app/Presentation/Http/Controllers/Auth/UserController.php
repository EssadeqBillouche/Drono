<?php

namespace App\Presentation\Http\Controllers\Auth;

use App\Application\Auth\DTOs\LoginUserDTO;
use App\Application\Auth\UseCase\LoginUseCase;
use App\Presentation\Http\Controllers\Controller;
use App\Presentation\Http\Requests\Auth\LoginRequest;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct(private LoginUseCase $loginUseCase){}

    public function login(LoginRequest $request)
    {
        $loginSuccess = $this->loginUseCase->login($request->toDTO());

        if ($loginSuccess) {
            $user = Auth::user();
            // Role-based redirection
            return match($user->role) {
                'admin' => Redirect::intended('/admin/dashboard'),
                'seller' => Redirect::intended('/seller/dashboard'),
                'client' => Redirect::intended('/client/dashboard'),
                default => Redirect::intended('/')
            };
        }

        return Redirect::back()->withErrors([
            'email' => 'Invalid credentials'
        ]);
    }
}
