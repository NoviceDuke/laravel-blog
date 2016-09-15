<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
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
            'title' => 'required',
            'date' => 'required',
            'content' => 'required',
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
            'title.required' => '標題是必填的',
            'date.required'  => '日期是必填的',
            'content.required' => '文章內容是必填的',
        ];
    }
}
