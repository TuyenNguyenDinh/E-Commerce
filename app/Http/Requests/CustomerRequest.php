<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'changePhone' => 'required|max:11',
        ];
    }

    public function messages()
    {
        if (app()->getLocale() == 'en') {
            return [
                'changePhone.required' => 'Phone number required',
                'changePhone.max' => 'Phone number max: 11 number'
            ];
        }
        else{
            return [
                'changePhone.required' => 'Số điện thoại là bắt buộc',
                'changePhone.max' => 'Số điện thoại không được quá 11 số'
            ];
        }
    }
}
