<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntriesRequest extends FormRequest
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
        // 特定の値のみを通す時はin:を使う
        return [
            'title' => 'required|max:80',
            'body' => 'required|max:2000',
            'status' => 'in:"draft","member_only","public"',
        ];
    }

    /* rulesアクションの中に書き込むとEntriesRequest does not existが出る
       EntriesRequesがsyntax errorで不成立になるため */
    public function messages()
    {
        return [
          'title.required' => '背番号は必ず入力してください',
          'title.max' => 'タイトルは８０文字以内で入力してください',
          'body.required' => '本文は必ず入力してください',
          'body.max' => '本文は２０００文字以内で入力してください',
          'status.in' => '状態は"draft"か"member_only"か"public"かのいずれかにしてください',
        ];
    }
}
