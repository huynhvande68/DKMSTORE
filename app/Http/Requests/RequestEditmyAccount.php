<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestEditmyAccount extends FormRequest
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
            'email'          =>'bail|required|string|email:rfc,dns',
            'password'       =>'bail|required|confirmed|min:8',
            // 'image_ok'          => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'phonenumber'    => 'bail|required|numeric|min:0',
            'password_current'       =>'bail|required|min:8'
        ];    
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được bỏ trống ',            
            'name.min' => 'Tên tối thiểu 8 kí tự', 
            'name.max' => 'Tên tối đa 70 kí tự',                 
            'email.required' => 'Email không được để trống',
            'password.required' => 'Không được bỏ trống ô Password',
            'password.min' => 'Mật khẩu tối đa 8 kí tự',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng',
            // 'image_ok.required' => 'Không được bỏ trống',
            // 'image_ok.mimes' => ' Ảnh phải đúng các định dạng sau jpeg,jpg,png,gif',
            // 'image_ok.max' => 'Dung lượng ảnh tối đa 1GB',
            'phonenumber.required' => 'Không được bỏ trống',      
            'phonenumber.numeric' => 'Không đúng định dạng',      
            'password.required' => 'Không được bỏ trống ô Password',
            'password.min' => 'Mật khẩu tối đa 8 kí tự'
            
        ];
    }
}
