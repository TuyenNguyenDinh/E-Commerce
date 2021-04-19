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
            'name.required' => 'Tên danh mục không được để trống',
            'name.max' => 'Tên danh mục không được quá 30 kí tự',
            'name.min' => 'Tên danh mục phải có ít nhất 2 kí tự',
            'name.unique' => 'Tên danh mục đã tồn tại, vui lòng nhập 1 tên khác'
        ];
    }
}
