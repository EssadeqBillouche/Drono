<?php

namespace App\Presentation\Http\Requests\Product;

use App\Application\Product\DTOs\UpdateProductDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'sellerId' => 'sometimes|integer',
            'categoryId' => 'sometimes|integer',
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric|min:0',
            'stock' => 'sometimes|integer|min:0',
            'isActive' => 'sometimes|boolean',
            'images' => 'sometimes|image',
        ];
    }

    public function toDTO(): UpdateProductDTO
    {
        $data = $this->validated();

        if ($this->hasFile('images')) {
            $data['images'] = Storage::putFile('product_images', $this->file('images'));
        }

        if (isset($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        return new UpdateProductDTO(...$data);
    }
}
