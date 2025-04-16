<?php

namespace App\Presentation\Http\Controllers;

use App\Application\Product\UseCase\AddProduct;
use App\Presentation\Http\Requests\Product\AddProductRequest;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function __construct(
        private AddProduct $addProductUseCase
    ) {}

    public function index(){
        return view('Seller.products');
    }
    public function product(){
        return view('Seller.Products');
    }
    public function orders(){
        return view('Seller.orders');
    }
    public function store(AddProductRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $dto = $request->toDTO();
            $product = $this->addProductUseCase->execute($dto);

            return redirect()
                ->route('products.index')
                ->with('success', 'Product created successfully!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }}
