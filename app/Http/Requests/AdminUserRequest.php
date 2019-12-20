<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUserRequest extends FormRequest
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

        $adminuser = $this->route('adminuser');

        if($adminuser){
            $rules = [
                'username'  => [
                    'required',
                    Rule::unique('admin_users', 'username')->ignore($adminuser->id)
                ],
                'password'  => 'same:password2',
            ];
        }else{
            $rules = [
                'username'  => [
                    'required',
                    Rule::unique('admin_users', 'username')
                ],
                'password'  => 'required|same:password2',
            ];
        }

        
        return $rules;
    }

    public function attributes()
    {
        return [
            'password2' => '确认密码',
        ];
    }
}
