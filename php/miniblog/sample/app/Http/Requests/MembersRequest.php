<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

// MembersRequestの中のコードにエラーがあれば class ~~MembersRequest does not existになる
class MembersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // trueに書き換える
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    // バリデーションルールはFormRequestに書きましょう
    public function rules()
    {
        return [
            'number' => 'required|integer|between:0,100',
            // 配列にした場合　|　は使えない
            // Rule::unique(テーブル名)->ignore($this->input("id"))で重複チェック
            'name' => ['required','alpha_num','between:2,20','regex:/\A[A-Za-z][A-Za-z0-9]*\z/',
                       Rule::unique("members")->ignore($this->input("id")),],
            'full_name' => 'required|max:20',
            // メールのバリデーションをあとでやろう（email_validatorを使う）
        ];
    }

    public function messages()
    {
        return [
          'number.required' => '背番号は必ず入力してください',
          'number.integer' => '背番号には数字を入力してください',
          'number.between' => '背番号には0から100までの数字を入力してください',
          'name.required' => 'メンバー名は必ず入力してください',
          'name.alpha_num' => 'メンバー名には英数字を入力してください',
          'name.between' => 'メンバー名は２文字以上２０文字以内で入力してください',
          'name.regex:/\A[A-Za-z][A-Za-z0-9]*\z/' => 'メンバー名は必ずアルファベットで初めてください',
          'name.unique' => '名前は他の人と重複しないようにしてください',
          'full_name.required' => '名前は必ず入力してください',
          'full_name.max' => '名前は２０文字以内で入力してください',
        ];
    }
}
