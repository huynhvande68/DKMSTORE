<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegisterCustomer extends FormRequest
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
            'name'           =>'bail|required|max:70|min:8',
            'email'          =>'bail|required|string|email:rfc,dns|unique:customers',
            'password'       =>'bail|required|confirmed|min:8'
        ];    
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được bỏ trống ô FullName',            
            'name.min' => 'Tên tối thiểu 8 kí tự', 
            'name.max' => 'Tên tối đa 70 kí tự',         
            'email.unique' => 'Email đã tồn tại',
            'email.required' => 'Email không được để trống',
            'password.required' => 'Không được bỏ trống ô Password',
            'password.min' => 'Mật khẩu tối đa 8 kí tự',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng',
        ];
    }
}
