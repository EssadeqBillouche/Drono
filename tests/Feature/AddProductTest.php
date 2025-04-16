<?php

namespace Tests\Feature;

use App\Infrastructure\Persistence\Models\Category;
use App\Infrastructure\Persistence\Models\Seller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddProductTest extends TestCase
{
    use RefreshDatabase;

    private Seller $seller;
    private Category $category;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seller = Seller::factory()->create();
        $this->category = Category::factory()->create();
    }

    public function test_it_can_create_a_product(): void
    {
        $response = $this->post('/products', [
            'seller_id' => $this->seller->id,
            'category_id' => $this->category->id,
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 99.99,
            'stock' => 10,
            'is_active' => true,
            'images' => 'test-image.jpg'
        ]);

        $response->assertStatus(302); // Redirect after success
        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'seller_id' => $this->seller->id
        ]);
    }

    public function test_it_validates_required_fields(): void
    {
        $response = $this->post('/products', []);

        $response->assertStatus(302) // Redirect back with errors
        ->assertSessionHasErrors([
            'seller_id',
            'category_id',
            'name',
            'price',
            'stock',
            'images'
        ]);
    }

    public function test_it_validates_numeric_fields(): void
    {
        $response = $this->post('/products', [
            'seller_id' => 'not-a-number',
            'category_id' => 'not-a-number',
            'name' => 'Test Product',
            'price' => 'not-a-number',
            'stock' => 'not-a-number'
        ]);

        $response->assertStatus(302) // Redirect back with errors
        ->assertSessionHasErrors([
            'seller_id',
            'category_id',
            'price',
            'stock'
        ]);
    }

    public function test_it_validates_existing_seller_and_category(): void
    {
        $response = $this->post('/products', [
            'seller_id' => 9999,
            'category_id' => 9999,
            'name' => 'Test Product',
            'price' => 99.99,
            'stock' => 10
        ]);

        $response->assertStatus(302) // Redirect back with errors
        ->assertSessionHasErrors([
            'seller_id',
            'category_id'
        ]);
    }
}
