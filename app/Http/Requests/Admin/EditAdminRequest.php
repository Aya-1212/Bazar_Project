<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditAdminRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email',
        ];
        if($this->__isset('password') && $this->__isset('password_confirmation') ){
        $rules['password'] = 'required|string|min:8|max:20';
        $rules['password_confirmation'] = 'required|same:password';
        }
        return $rules;
    }
}
