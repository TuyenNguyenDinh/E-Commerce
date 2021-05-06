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
            'name_product.required' => 'The product name is required',
            'name_product.max' => 'The product name is no more than 100 characters',
            'name_product.min' => 'The product name minimum required is 20 characters',
            'name_product.unique' => 'The product name already exists, please enter another',
            'image1.required' => 'The image is required',
            'image2.required' => 'The image is required',
            'image3.required' => 'The image is required',
            'image4.required' => 'The image is required',
            'image1.image' => 'The file must image format',
            'image2.image' => 'The file must image format',
            'image3.image' => 'The file must image format',
            'image4.image' => 'The file must image format',
            'image1.max' => 'The file size is no more than 5MB',
            'image2.max' => 'The file size is no more than 5MB',
            'image3.max' => 'The file size is no more than 5MB',
            'image4.max' => 'The file size is no more than 5MB',
            'price.required' => 'The price is required',
            'price.numeric' => 'The price must number format',
            'price.between' => 'The price between 1000đ - 100.000.000đ',
            'price.min' => 'The price minimum required is 1đ',
            'description.required' => 'The product description is required',
            'attr1.required' => 'Attribute required',
            'attr2.required' => 'Attribute required',
            'attr3.required' => 'Attribute required',

        ];
    }
}
