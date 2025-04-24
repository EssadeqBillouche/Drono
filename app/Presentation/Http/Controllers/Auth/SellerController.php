<?php

namespace App\Presentation\Http\Controllers\Auth;

use App\Application\Auth\UseCase\sellerRegisterUseCase;
use App\Presentation\Http\Controllers\Controller;
use App\Presentation\Http\Requests\Auth\RegisterSellerRequest;
use App\Presentation\Http\Requests\Auth\SellerRegisterRequest;
use Illuminate\Http\RedirectResponse;

class SellerController extends Controller
{

    public function __construct(
        private readonly sellerRegisterUseCase $registerSellerUseCase
    ) {}

    public function index(){
        return view('Seller.dashboard');
    }
    public function store(SellerRegisterRequest $request): RedirectResponse
    {
        try {
            $this->registerSellerUseCase->RegisterSeller($request->toDTO());
            return redirect()->route('login')->with('success', 'Registration successful!');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Seller registration failed: ' . $e->getMessage());
        }
    }
    public function orders(){
        return view('Seller.orders');
    }
    public function products(){
        return view('Seller.Products');
    }
}
