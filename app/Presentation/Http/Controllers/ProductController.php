<?php

namespace App\Presentation\Http\Controllers;

use App\Application\Product\UseCase\AddProduct;
use App\Application\Product\UseCase\GetProductByCategoryIdUseCase;
use App\Application\Product\UseCase\GetProductUseCase;
use App\Infrastructure\Persistence\Models\seller as sellerModel;
use App\Presentation\Http\Requests\Product\AddProductRequest;

class ProductController extends Controller
{
    public function __construct(
        private AddProduct $addProductUseCase,
        private GetProductUseCase $getProductUseCase,
        private GetProductByCategoryIdUseCase $getProductByCategoryIdUseCase
    ) {}

    public function index()
    {
        $top5Seller = sellerModel::all()->take(5);
        $allproducts = $this->getProductUseCase->getAllProduct();
        $categories = $this->getProductUseCase->getAllCategories();
        return view('catalog', compact('allproducts', 'top5Seller', 'categories'));
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
    }
    public function showByCategoryId($id)
    {
        $product = $this->getProductByCategoryIdUseCase->execute($id);
        if ($product->isEmpty()) {
            return redirect()->route('catalog')->with('error', 'No products found for this category.');
        }
        return view('ProductDetails', compact('product'));
    }

}
