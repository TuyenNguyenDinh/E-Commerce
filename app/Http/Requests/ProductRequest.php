<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                    'name_product' => 'bail|required|max: 100|min:20',
                    'image1' => 'required|image|max:5000',
                    'image2' => 'required|image|max:5000',
                    'image3' => 'required|image|max:5000',
                    'image4' => 'required|image|max:5000',
                    'price' => 'required|numeric|between:1000,100000000|min:1',
                    'description' => 'required',
                    'attr1' => 'required',
                    'attr2' => 'required',
                    'attr3'=> 'required',

                ];
                break;

            default:
                $rules = [
                    'name_product' => 'bail|required|max: 100|min:20|unique:products',
                    'image1' => 'required|image|max:5000',
                    'image2' => 'required|image|max:5000',
                    'image3' => 'required|image|max:5000',
                    'image4' => 'required|image|max:5000',
                    'price' => 'required|numeric|between:1000,100000000|min:1',
                    'description' => 'required',
                    'attr1' => 'required',
                    'attr2' => 'required',
                    'attr3'=> 'required',
                ];
                break;
        }

        return $rules;
    }
    public function messages()
    {
        return [
            'name_product.required' => 'Tên không được để trống',
            'name_product.max' => 'Tên sản phẩm không được quá 100 kí tự',
            'name_product.min' => 'Tên sản phẩm phải ít nhất 20 kí tự',
            'name_product.unique' => 'Name product already exists',
            'image1.required' => 'Ảnh không được để trống',
            'image2.required' => 'Ảnh không được để trống',
            'image3.required' => 'Ảnh không được để trống',
            'image4.required' => 'Ảnh không được để trống',
            'image1.image' => 'Tệp phải là file ảnh',
            'image2.image' => 'Tệp phải là file ảnh',
            'image3.image' => 'Tệp phải là file ảnh',
            'image4.image' => 'Tệp phải là file ảnh',
            'image1.max' => 'Ảnh có dung lượng không quá 5MB',
            'image2.max' => 'Ảnh có dung lượng không quá 5MB',
            'image3.max' => 'Ảnh có dung lượng không quá 5MB',
            'image4.max' => 'Ảnh có dung lượng không quá 5MB',
            'price.required' => 'Giá không được để trống',
            'price.numeric' => 'Giá phải là số',
            'price.between' => 'Giá tiền phải trong khoảng từ 1000đ - 100.000.000đ',
            'price.min' => 'Giá tiền không được nhỏ hơn 1',
            'description.required' => 'Mô tả không được để trống',
            'attr1.required' => 'Attribute required',
            'attr2.required' => 'Attribute required',
            'attr3.required' => 'Attribute required',

        ];
    }
}
