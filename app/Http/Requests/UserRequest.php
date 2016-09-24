<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
     * 認證條件
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'confirmed|min:6',
            'password_confirmation' => 'min:6'
        ];
    }

    /**
     * 取得已定義驗證規則的錯誤訊息。
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '名稱是必填的',
            'email.required'  => '日期是必填的',
            'email.email'  => 'Email格式不符',
            'password.confirmed' => '兩次輸入的密碼不相同',
            'min:6' => '密碼必須大於六個字元',
        ];
    }
}
