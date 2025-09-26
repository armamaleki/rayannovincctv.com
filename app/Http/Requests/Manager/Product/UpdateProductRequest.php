<?php

namespace App\Http\Requests\Manager\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => 'required|max:255',
//            "slug" => 'required|max:255|unique:products,slug',
            "slug" => [
                'required',
                'max:255',
                Rule::unique('products', 'slug')->ignore($this->product),
            ],
            "meta_title" => 'required|max:65',
            "meta_description" => 'required|max:155',
            "short_description" => 'required|max:255',
            "description" => 'nullable|string',
            "price" => 'nullable',
            "quantity" => 'nullable',
        ];
    }
}
