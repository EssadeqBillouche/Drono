<?php

namespace App\Presentation\Http\Controllers\Auth;

use App\Application\Auth\UseCase\ClientRegisterUseCase;
use App\Presentation\Http\Controllers\Controller;
use App\Presentation\Http\Requests\Auth\registerClientRequest;

class ClientController extends Controller
{
    public function __construct(
        private ClientRegisterUseCase $registerClientUseCase
    ) {}

    public function store(registerClientRequest $request)
    {
        $dto = $request->toDTO();
        $client = $this->registerClientUseCase->RegisterClient($dto);
        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }
}
