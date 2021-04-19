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
            'phone' => 'required|numeric|',
            'password' => 'required|max:10|min:5',
            'rePassword' =>'required|same:password',
            'address' => 'required|max: 100',
            'email' => 'required|email|unique:customers,email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không được để trống',
            'name.max' => 'Tên không được quá 30 kí tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.max' => 'Số điện thoại không được quá 10 số',
            'phone.numeric' => 'Bắt buộc là số',
            'password.required' => 'Mật khẩu không được để trống',
            'password.max' => 'Mật khẩu tối đa 10 kí tự',
            'password.min' => 'Mật khẩu ít nhất là 5 kí tự',
            'rePassword.required' => 'Mật khẩu không được để trống',
            'rePassword.same' => 'Mật khẩu nhập lại không khớp',
            'address.required' => 'Địa chỉ không được để trống',
            'address.max' => 'Địa chỉ không được quá 100 kí tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Sai định dạng, phải là ...@example.com',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập 1 email khác',
        ];
    }
}
