<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCoupon extends FormRequest
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
            'coupon_name'           =>'bail|required|max:70|min:8',
            'coupon_number'          =>'bail|required|integer|max:500|min:1',
            'coupon_begin'           =>'bail|required',
            'coupon_end'                =>'bail|required',
            'coupon_select'            => 'bail|required|integer',
            'coupon_detail'             => 'bail|required',
        ];    
    }
    public function messages()
    {
        return [
            'coupon_name.required' => 'Không được bỏ trống ô FullName',    
            'coupon_name.min' => 'Tên tối thiểu 8 kí tự', 
            'coupon_name.max' => 'Tên tối đa 70 kí tự',                  
            'coupon_number.required' => 'Số lượng không được để trống',
            'coupon_number.integer' => 'Không đúng định dạng số ',
            'coupon_number.min' => 'Tên tối thiểu 1 kí tự', 
            'coupon_number.max' => 'Tên tối đa 500 kí tự',  
            'coupon_begin.required' => 'Không được để trống',
            'coupon_begin.date_format' => 'Không đúng định dạng',
            'coupon_end.required' => 'Không được để trống',
            'coupon_end.date_format' => 'Không được để trống',
            'coupon_select.required' => 'Không được bỏ trống ô này',  
            'coupon_detail.required' => 'Không được bỏ trống ô này',  
            'coupon_select.integer' => 'Không đúng định dạng số ',
            'coupon_detail.integer' => 'Không đúng định dạng số ',
            
        ];
    }
}
