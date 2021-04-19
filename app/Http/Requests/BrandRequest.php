<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        switch ($this->method()) {
            case 'PUT':
                $rules = [
                    'name'=> 'required|max:30|min:2',
                    'image' => 'required|image|max:10000|',
                    'description' => 'required|max:500|min:10'
                 
                ];
                break;
        
            default:
                $rules = [
                    'name'=> 'required|max:30|min:2|unique:brands,name',
                    'image' => 'required|image|max:10000|',
                    'description' => 'required|max:500|min:10'
                ];
                break;
        }
        
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên thương hiệu không được để trống',
            'name.max' => 'Tên thương hiệu không được quá 30 kí tự',
            'name.min' => 'Tên thương hiệu phải có ít nhất 2 kí tự',
            'name.unique' => 'Tên thương hiệu đã tồn tại, vui lòng nhập 1 tên khác',
            'image.required' =>  'Ảnh không được để trống',
            'image.image' => 'Tệp phải là ảnh',
            'image.max' =>'Ảnh có kích thước nhỏ hơn 10MB',
            'description.required' => 'Mô tả không được để trống',
            'description.max' => 'Mô tả không được quá 500 kí tự',
            'description.min' => 'Mô tả phải ít nhất 10 kí tự',
        ];
    }
}
