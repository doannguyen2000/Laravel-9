<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
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
            'file' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg',
                'mimetypes:image/jpeg,image/png,image/jpg',
                'max:2048',
            ],

            'name' => [
                'required',
                'min:10'
            ],
            'email' => 'required|Email',
            'password' => [
                'required',
                'regex:/^[a-z0-9_\- ]+$/i',
                'min:6'
            ],
            'role' => 'required'
        ];
    }
}
