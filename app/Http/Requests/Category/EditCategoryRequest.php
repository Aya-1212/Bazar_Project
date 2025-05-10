<?php
namespace App\Http\Requests\Category;
use Illuminate\Foundation\Http\FormRequest;
class EditCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        $rules = [
            "title" => "required|string|max:30|min:6",
        ];
        if($this->__isset('image')){
            $rules['image'] = 'required|image';
        }
        return $rules ;
    }
}
