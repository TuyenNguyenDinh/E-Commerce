<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                    'name' => 'required|max:30|min:2',
                 
                ];
                break;
        
            default:
                $rules = [
                    'name'=> 'required|max:30|min:2|unique:categories,name',
                    
                ];
                break;
        }
        
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'The category name is required',
            'name.max' => 'The category name is no more than 30 characters',
            'name.min' => 'The category name minimum required is 2 characters',
            'name.unique' => 'The category name already exists, please enter another'
        ];
    }
}
