<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterWrite extends FormRequest
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
            'title' => 'required|max:255',
            'desc' => 'required|max:255',
            'sort' => 'numeric',    //数字
        ];
    }
    
    //自定义属性名
    public function attributes()
    {
        return [
            'desc'  => '简介',
            'sort'  => '排序',
        ];
    }
}
