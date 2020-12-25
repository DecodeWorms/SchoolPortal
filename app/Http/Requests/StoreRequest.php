<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstName'=>'alpha',
            'lastName'=>'alpha',
            'gender'=>'alpha',
            'email'=>['email','unique:students,email'],
            'password'=>'alpha_num|min:6',           
            'class'=>'alpha_num',
            'parent_phone_number'=>'numeric',
            'image'=>'image'
        ];
    }
}
