<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateUser extends FormRequest
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
        $rules = [
            'name' => 'required|min:3|max:255|string',
            'email' => [
                'email',
                'required',
                Rule::unique('users')->ignore($this->user)
            ],
            'password' => 'required|min:3|max:15',
            'image' => 'nullable|image|max:1024'
        ];

        if ($this->method('PUT')) {

            $rules['password'] = [
                'nullable',
                'min:4',
                'max:100'
            ];

            $rules['images'] = [
                'nullable', 
                'image',
                'max:1024'
            ];
        }

        return $rules;
    }
}
