<?php

namespace App\Presentation\Http\Controllers;


use App\Application\Orders\UseCase\CreateOrderUseCase;
use App\Presentation\Http\Requests\Order\CreateOrderRequest;

class OrderController extends Controller
{
    private CreateOrderUseCase $createOrderUseCase;
    public function __construct( CreateOrderUseCase $createOrderUseCase)
    {
        $this->createOrderUseCase = $createOrderUseCase;
    }
    public function create(CreateOrderRequest $request){
        $this->createOrderUseCase->execute($request->toDTO());
        return redirect()->route('ClientProfile')->with('success','Order created successfully');

    }
    public function show(){}
    public function index(){}

    public function confirmation(){

        return view('OrderConfirmation');
    }

}
