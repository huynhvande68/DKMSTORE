<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestBlog extends FormRequest
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
            'name_blog'          =>'required|min:10|max:100',           
            'content'          => 'required|min:50|max:4000',
            'file_blog'         =>'mimes:jpeg,jpg,png,gif|required|max:10000,dimensions:max_width=400,max_height=200'
        ];    
    }
    public function messages()
    {
        return [
            'name_blog.required' => 'Tieu de không được để trống',   
            'file_blog.required' => 'Vui long chon anh dai dien',          
            'name_blog.min' => 'Tieu de không được it hon 10 ki tu',            
            'name_blog.max' => 'Tieu de không được vuot qua 100 ki tu',            
            'content.required' => 'Noi dung không được để trống',
            'content.min' => 'Noi dung không được it hon 50 ki tu',
            'content.max' => 'Noi dung không được vuot 2000 ki tu',
            'file_blog.max' => 'file khong duoc vuot qua 1GB',  
        ];
    }
}
