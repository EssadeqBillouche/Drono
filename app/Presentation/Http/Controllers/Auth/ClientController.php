<?php

namespace App\Presentation\Http\Controllers\Auth;

use App\Application\Auth\UseCase\ClientRegisterUseCase;
use App\Presentation\Http\Controllers\Controller;
use App\Presentation\Http\Requests\Auth\clientRegisterRequest;

class ClientController extends Controller
{
    public function __construct(
        private ClientRegisterUseCase $registerClientUseCase
    ) {}


    public function index()
    {
        return view('Client.ClientProfile');
    }

    public function store(clientRegisterRequest $request)
    {
        $dto = $request->toDTO();
        $client = $this->registerClientUseCase->RegisterClient($dto);
        return redirect()->route('ClientProfile')->with('success', 'Registration successful!');
    }

    public function show()
    {
        return view('Client.ClientProfile');
    }
}
