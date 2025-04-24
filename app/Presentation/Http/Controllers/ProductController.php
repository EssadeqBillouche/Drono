<?php

namespace App\Presentation\Http\Controllers;

use App\Application\Product\UseCase\AddProduct;
use App\Application\Product\UseCase\GetProductUseCase;
use App\Presentation\Http\Requests\Product\AddProductRequest;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function __construct(
        private AddProduct $addProductUseCase, private GetProductUseCase $getProductUseCase
    ) {}

    public function index()
    {
        $products = [
            [
                'modal_id' => 'modal-headphones',
                'vendor' => [
                    'name' => 'Leaf Studios',
                    'image' => 'https://baseusonline.com/uploads/img/pi/171/171170697276/1711706972.jpg'
                ],
                'product' => [
                    'name' => 'Wireless Headphones',
                    'image' => 'https://baseusonline.com/uploads/img/pi/171/171170697276/immersivespatialaudioheadphones.jpg',
                    'category' => 'Electronics',
                    'description' => 'Premium noise-cancelling wireless headphones with 30-hour battery life. Features Bluetooth 5.0, touch controls, and built-in microphone for calls.'
                ],
                'pricing' => [
                    'current_price' => 129.99,
                    'original_price' => 179.99,
                    'save_amount' => 50
                ],
                'ratings' => [
                    'score' => 4.9,
                    'total_reviews' => 215
                ],
                'delivery' => [
                    'time' => '35 min',
                    'distance' => '4.5 miles',
                    'method' => 'Drono Express'
                ]
            ]

        ];

        $allproducts = $this->getProductUseCase->getAllProduct();
        dd($allproducts);

        return view('catalog', compact('products'));
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
