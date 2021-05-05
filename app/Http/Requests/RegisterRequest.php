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
            'name' => 'bail|required|max: 30',
            'phone' => 'required|max:11',
            'password' => 'required|max:10|min:5',
            'rePassword' =>'required|same:password',
            'email' => 'required|email|unique:customers,email',
            'address'=>'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required',
            'name.max' => 'The name is no more than 30 characters',
            'phone.required'=> 'The phone number is required',
            'phone.max' => 'The phone number is no more than 11 character',
            'phone.numeric' => 'The phone number must number format',
            'password.required' => 'The password is required',
            'password.max' => 'The password is no more than 10 characters',
            'password.min' => 'The password minimum required is 5 characters',
            'rePassword.required' => 'The password is required',
            'rePassword.same' => 'The password is not match',
            'email.required' => 'The email is required',
            'email.email' => 'Invalid format, it must be ...@example.com',
            'email.unique' => 'Email already exists, please enter another email',
            'address.required' => 'The address is required',
            'address.max' =>  'The address is no more than 100 characters'
        ];
    }
}
