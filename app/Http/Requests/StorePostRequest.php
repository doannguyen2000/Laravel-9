<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|Email',
           
            'password' => [
                'required',
                'regex:/^[a-z0-9_\- ]+$/i',
                'min:6'
            ],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'email is required!',
            'email.Email' => 'email khong dung!',
            'password.required' => 'password is required!',
            'password.min' => 'password min!',
            'password.regex' => 'Password: Minimum 6 characters, including at least 1 letter and 1 number.'
        ];
    }
}
