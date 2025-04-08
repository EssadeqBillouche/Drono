<?php

namespace App\Presentation\Http\Controllers\Auth;

use App\Application\Auth\UseCase\SellerRegisterUseCase;
use App\Presentation\Http\Controllers\Controller;
use App\Presentation\Http\Requests\Auth\registerSellerRequest;

class SellerController extends Controller
{
    private SellerRegisterUseCase $registerSellerUseCase;

    public function __construct(SellerRegisterUseCase $registerSellerUseCase)
    {
        $this->registerSellerUseCase = $registerSellerUseCase;
    }

    public function store(registerSellerRequest $request)
    {
        $dto = $request->toDTO();
        $seller = $this->registerSellerUseCase->RegisterSeller($dto);
        return redirect()->route('dashboard')->with('success', 'Registration successful!');

    }
}
