<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAdminAccount extends FormRequest
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
            'name'          =>'bail|required|min:10|max:100',           
            'avatars'          => 'mimes:jpeg,jpg,png,gif|max:10000',
            'email'          =>'bail|required|string|email:rfc,dns|unique:users',
            'password'       =>'bail|required|min:8',
            'roles'          =>'required'
        ];    
    }
    public function messages()
    {
        return [
            'name.required' => 'Ten không được để trống',           
            'name.min' => 'Ten khong duoc it hon 10 ki tu',           
            'name.max' => 'Ten không duoc vuot qua 100 ki tu',      
            'password.required' => 'Mat khau không được để trống',      
            'password.min' => 'Mat khau khong duoc it hon 8 ki tu',  
            'roles.required' => 'chuc nang không được để trống',        
                
          
        ];
    }
}
