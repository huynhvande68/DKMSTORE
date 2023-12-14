<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
            'name_product' => 'bail|required',
            'price_product' => 'bail|required|numeric',
            'feature_image_path'  => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'image_path' => 'bail|required|array',
            'category_id' => 'bail|required',
            'tags' => 'bail|required',
            'content' => 'bail|required'
        ];
    }

        public function messages()
    {
        return [
            'name_product.required' => 'Không được bỏ trống',
            'price_product.numeric' => 'Không đúng định dạng số',
            'content.required' => 'Không được bỏ trống',
            'tags.required' => 'Không được bỏ trống',
            'category_id.required' => 'Không được bỏ trống',
            'price_product.required' => 'Không được bỏ trống',
            'feature_image_path.required' => 'Không được bỏ trống',
            'image_path.required' => 'Không được bỏ trống',
            'feature_image_path.mimes' => ' Ảnh phải đúng các định dạng sau jpeg,jpg,png,gif',
            'image_path.max' => 'Dung lượng ảnh tối đa 1GB'
        ];
    }
}
