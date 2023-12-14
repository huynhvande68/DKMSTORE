<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPayment extends FormRequest
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
            'adders' => 'bail|required',
            'note' => 'bail|required',
           

           
        ];
    }

        public function messages()
    {
        return [
            'adders.required' => 'Không được bỏ trống',
            'note.required' => 'Không được bỏ trống',
           
        ];
    }
}
