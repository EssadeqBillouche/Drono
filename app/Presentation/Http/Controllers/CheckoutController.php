<?php

namespace App\Presentation\Http\Controllers;

class CheckoutController extends Controller
{
    public function __construct(){}
    public function show(){
        return view('checkout');
    }


}
