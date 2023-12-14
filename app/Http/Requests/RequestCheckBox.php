<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCheckBox extends FormRequest
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
            'customer'          =>'required',           
            'coupon'          => 'required'
        ];    
    }
    public function messages()
    {
        return [
            'customer.required' => 'khong duoc bo trong danh sach',            
            'coupon.required' => 'khong duoc bo trong chuong trinh giam gia',            
        
        ];
    }
}
