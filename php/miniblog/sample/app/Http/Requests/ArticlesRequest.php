<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // trueにしないとThis action is unauthorizedが出る
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
            'title' => 'required|max:80',
            'body' => 'required|max:2000',
            'released_at' => 'required|before:expired_at',
      ];
    }

    public function messages()
    {
        return [
          'title.required' => '背番号は必ず入力してください',
          'title.max' => 'タイトルは８０文字以内で入力してください',
          'body.required' => '本文は必ず入力してください',
          'body.max' => '本文は２０００文字以内で入力してください',
          'released_at.required' => '掲載開始日時は必ず入力してください',
          'released_at.before' => '掲載終了日時は掲載開始日時より新しい日時にしてください',
        ];
    }
}
