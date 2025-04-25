<?php

namespace App\Presentation\Http\Requests\Product;

use App\Application\Product\DTOs\AddProductDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AddProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'isActive' => 'required|boolean',
            'image' => 'required|image', // Assuming 'images' is now a file upload
        ];
    }


    public function toDTO(): AddProductDTO
    {
        $imagePath = Storage::disk('public')->putFile('products', $this->file('image'));

        return new AddProductDTO(
            sellerId: auth()->id(),
            categoryId: $this->validated('category_id'),
            name: $this->validated('name'),
            slug: Str::slug($this->validated('name')),
            description: $this->validated('description'),
            price: $this->validated('price'),
            stock: $this->validated('stock'),
            isActive: $this->validated('isActive'),
            images: $imagePath
        );
    }


}
