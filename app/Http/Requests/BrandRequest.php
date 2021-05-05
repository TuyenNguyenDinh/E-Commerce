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
            
                 
                ];
                break;
        
            default:
                $rules = [
                    'name'=> 'required|max:30|min:2|unique:brands,name',
                    'image' => 'required|image|max:10000|',
                ];
                break;
        }
        
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'The brand name is required',
            'name.max' => 'The brand name is no more than 30 characters',
            'name.min' => 'The brand name minimum required is 2 characters',
            'name.unique' => 'The brand name already exists, please enter another',
            'image.required' =>  'The image is required',
            'image.image' => 'The file must image format',
            'image.max' =>'The file size is no more than 10MB',
        ];
    }
}
