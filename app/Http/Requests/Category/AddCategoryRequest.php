<?php
namespace App\Http\Requests\Category;
use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'title' => "required|string|min:4|max:50",
            'image' => 'required|image',
        ];
    }
}
