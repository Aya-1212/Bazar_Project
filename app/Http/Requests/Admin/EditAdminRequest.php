<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;
class EditAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email',
        ];
        if($this->__isset('password') && $this->__isset('password_confirmation') ){
        $rules['password'] = 'required|string|min:8|max:10|';
        $rules['password_confirmation'] = 'required|same:password';
        }
        return $rules;
    }
}
