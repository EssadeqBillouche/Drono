<?php

namespace App\Presentation\Http\Controllers;


use App\Application\Orders\UseCase\CreateOrderUseCase;
use App\Application\Orders\UseCase\GetUserOrdersUseCase;
use App\Presentation\Http\Requests\Order\CreateOrderRequest;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    private CreateOrderUseCase $createOrderUseCase;
    private GetUserOrdersUseCase $getUserOrdersUseCase;
    public function __construct( CreateOrderUseCase $createOrderUseCase,
                                 GetUserOrdersUseCase $getUserOrdersUseCase)
    {
        $this->getUserOrdersUseCase = $getUserOrdersUseCase;
        $this->createOrderUseCase = $createOrderUseCase;
    }
    public function create(CreateOrderRequest $request): RedirectResponse
    {
        $this->createOrderUseCase->execute($request->toDTO());
        return redirect()->route('ClientProfile')->with('success','Order created successfully');

    }
    public function History(){
        $orders = $this->getUserOrdersUseCase->execute();
        return view('OrderHistory', ['orders' => $orders]);

    }
    public function index(){}

    public function confirmation( int $orderId){

        return view('OrderConfirmation');
    }

}
