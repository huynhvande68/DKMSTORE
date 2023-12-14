<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSchedule extends FormRequest
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
           'customer' => 'required|',
           'title' => 'required|string|max:100',
           'daystart' => 'required|date|after:now',
           'dayend' => 'required|date|after_or_equal:daystart',
           'content' =>'required|'
        ];    
    }
    public function messages()
    {
        return [
           
       
        ];
    }
}
