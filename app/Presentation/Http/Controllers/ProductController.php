<?php

namespace App\Presentation\Http\Controllers;

use App\Application\Product\UseCase\AddProduct;
use App\Application\Product\UseCase\GetProductUseCase;
use App\Infrastructure\Persistence\Models\seller as sellerModel;
use App\Presentation\Http\Requests\Product\AddProductRequest;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function __construct(
        private AddProduct $addProductUseCase, private GetProductUseCase $getProductUseCase
    ) {}

    public function index()
    {
        dd(session()->all());
        $top5Seller = sellerModel::all()->take(5);
        $allproducts = $this->getProductUseCase->getAllProduct();
        return view('catalog', compact('allproducts', 'top5Seller'));
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
