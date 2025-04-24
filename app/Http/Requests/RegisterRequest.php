<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:10',
            ],
            'password_confirmation' => 'required|same:password'
        ];

    }
    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be charachters',
            'name.min' => 'Name must be more than 3 charachters',
            'name.max' => 'Name must be less than 50 charachters',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Password is required',
            'password.string' => 'Password must be charachters',
            'password.min' => 'Password must be more than 8 charachters',
            'password.max' => 'Password must be less than 10 charachters',
            'password.confirmed' => 'The password confirmation is not right',
        ];
    }
}
