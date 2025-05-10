<?php
namespace App\Http\Requests\User;
use Illuminate\Foundation\Http\FormRequest;
class AddUserRequest extends FormRequest
{    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:10',
            ],
            'password_confirmation' => 'required|same:password',
            'city' => 'nullable|min:5|max:40|string',
            'address' => 'nullable|min:6|max:40|string',
            'phone' => 'nullable|regex:/^01[0125][0-9]{8}$/|unique:users,phone'
        ];
        if ($this->__isset('image')) {
            $rules['image'] = 'required|image';
        }

        return $rules; }
}
