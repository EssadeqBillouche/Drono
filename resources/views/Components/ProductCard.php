<?php

// ... other code

class ProductCard extends Component
{
    public ?array $products = null; // Allow null
    public ?object $product = null;   // Allow null

    public function __construct(?array $products = null, ?object $product = null)
    {
        $this->products = $products;
        $this->product = $product;
    }

    public function render()
    {
        return view('components.product-card');
    }
}
