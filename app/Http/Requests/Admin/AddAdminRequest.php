<?php
namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;
class AddAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:admins,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:10',
            ],
            'password_confirmation' => 'required|same:password'
        ];
    }
}
