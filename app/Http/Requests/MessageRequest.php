<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'name' => ['required','max:50'],
            'message' => ['required','max:200'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attributeは必須です',
            'name.max' => ':attributeは50文字以下で入力してください',
            'message.required' => ':attributeは必須です',
            'message.max' => ':attributeは200文字以下で入力してください',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名前',
            'message' => 'ひとことメッセージ',
        ];
    }
}
