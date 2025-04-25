<?php

namespace App\Infrastructure\Persistence\DAOs;

use App\Domain\Product\Entities\Product;
use App\Domain\Product\Repositories\ProductRepositoryInterface;
use App\Infrastructure\Persistence\Models\Product as ProductModel;
use App\Domain\Product\ValueObjects\Price;
use App\Domain\Product\ValueObjects\Stock;
use App\Domain\Product\ValueObjects\Image;
use Exception;
use http\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\DB;

class ProductDAO implements ProductRepositoryInterface
{
    /**
     * @throws Exception
     */
    public function save(Product $product): Product
    {
        try {
            $model = ProductModel::create([
                'seller_id' => $product->getSellerId(),
                'category_id' => $product->getCategoryId(),
                'name' => $product->getName(),
                'slug' => $product->getSlug(),
                'description' => $product->getDescription(),
                'price' => $product->getPrice()->getValue(),
                'stock' => $product->getStock()->getValue(),
                'is_active' => $product->isActive(),
                'images' => $product->getImages()->getValue(),
                'rating' => $product->getRating(),
                'total_reviews' => $product->getTotalReviews()
            ]);

        } catch (\Exception $e) {
            throw new \Exception('Database operation failed: ' . $e->getMessage());
        }

        return new Product(
            $model->id,
            $model->seller_id,
            $model->category_id,
            $model->name,
            $model->slug,
            $model->description,
            new Price($model->price),
            new Stock($model->stock),
            $model->is_active,
            new Image($model->images),
            $model->rating,
            $model->total_reviews
        );
    }


    public function delete(int $productId): bool
    {
        return true;
    }

    public function findById(int $productId): ?Product
    {
        try {
            $model = ProductModel::find($productId);
            if (!$model) {
                return null;
            }
            return new Product(
                $model->id,
                $model->seller_id,
                $model->category_id,
                $model->name,
                $model->slug,
                $model->description,
                new Price($model->price),
                new Stock($model->stock),
                $model->is_active,
                new Image($model->images),
                $model->rating,
                $model->total_reviews
            );
        } catch (\Exception $e) {
            throw new \Exception('Failed to find product: ' . $e->getMessage());
        }
    }
    public function update(Product $product, int $productId): Product
    {
        if ($product->getId() !== $productId) {
            throw new InvalidArgumentException('Product ID mismatch');
        }

        $productModel = ProductModel::findOrFail($productId);

        $productModel->update([
            'name' => $product->getName(),
            'description' => $product->getDescription(),
            'price' => $product->getPrice()->getValue(),
            'stock' => $product->getStock()->getValue(),
            'is_active' => $product->isActive(),
            'images' => $product->getImages()->getValue(),
            'rating' => $product->getRating(),
            'total_reviews' => $product->getTotalReviews()
        ]);
        return Product::fromArray($productModel->fresh()->toArray());
    }
    public function all(){
        $query = DB::table('products')
            ->select(
                'products.*',
                'sellers.*',
                'sellers.store_profile',
                'categories.name as category_name'
            )
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->join('categories', 'products.category_id', '=', 'categories.id');

        // Debug the query
        \Log::info($query->toSql());
        \Log::info($query->getBindings());

        return $query->get();
    }
}

