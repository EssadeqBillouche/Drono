<?php

namespace App\Presentation\Http\Controllers;


use App\Presentation\Http\Requests\Order\CreateOrderRequest;

class OrderController extends Controller
{
    public function __construct()
    {
    }
    public function create( CreateOrderRequest $request){

        dd($request->all());

    }
    public function show(){}
    public function index(){}

}
