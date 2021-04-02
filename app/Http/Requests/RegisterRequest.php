<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['bail','required', 'max: 30'],
            'phone' => ['required', 'max: 11', 'numeric'],
            'password' => ['required', 'max: 10', 'confirmed'],
            'rePassword' => ['required', 'same:password'],
            'address' => ['required', 'max: 100'],
            'email' => ['required', 'email'],
        ];
    }
}
