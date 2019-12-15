<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Gbook extends FormRequest
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
            //
            'username'  => 'required',
            'content'  => 'required',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => '用户名不能为空',
            'content.required'  => '内容不能为空',
        ];
    }
}
