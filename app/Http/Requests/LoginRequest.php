<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'password' => 'required | min:4',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => ':attributeは必須です',
            'password.min' => ':attributeは4文字以上で入力してください'
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'パスワード',
        ];
    }
}
