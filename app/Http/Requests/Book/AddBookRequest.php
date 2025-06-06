<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class AddBookRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:500',
            'isbn_code'=> 'required|string|min:12',
            'image' => 'required|image',
            'description' => 'required|string|max:5000|min:10',
            'author' => 'string|required|min:3|max:50',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'price_after_discount' => 'nullable|numeric',
            'stock_quantity'=> 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'publisher_id' => 'required|exists:publishers,id', 
        ];
    }
}
