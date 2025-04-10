<?php

namespace App\Presentation\Http\Controllers\Auth;

use App\Application\Auth\UseCase\sellerRegisterUseCase;
use App\Presentation\Http\Controllers\Controller;
use App\Presentation\Http\Requests\Auth\RegisterSellerRequest;
use Illuminate\Http\RedirectResponse;

class SellerController extends Controller
{

    public function __construct(
        private readonly sellerRegisterUseCase $registerSellerUseCase
    ) {}

    public function store(RegisterSellerRequest $request): RedirectResponse
    {
        try {
            $this->registerSellerUseCase->RegisterSeller($request->toDTO());
            return redirect()->route('SellerProfile')->with('success', 'Registration successful!');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Seller registration failed: ' . $e->getMessage());
        }
    }
}
