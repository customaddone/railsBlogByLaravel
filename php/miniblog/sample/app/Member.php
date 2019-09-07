<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/* Controllerでの処理がややこしくなりそうだったらモデルに書きましょう
   Authenticatableは祖先にModelクラスを持ちます */
class Member extends Authenticatable
{
    /* 入力のガードを設定しておくもの
    　　モデルを作成する際にid値は入力の必要ないので、値なしでもいいようにする */
    protected $guarded = array('id');
    /* fillable ホワイトリスト（複数代入可）
    protected $table = 'members'; */
    // staticを書きましょう
    public static function translateCharacter($request)
    {
        // sex->$sexCharacter = というふうにオブジェクトのプロパティに値を入れる方法を取れないか？
        $sexCharacter = ($request->sex == 1) ? "男" : "女";
        $birthdayCharacter = date('Y年m月d日', strtotime($request->birthday));
        $administratorMark = ($request->administrator == true) ? "○" : "×";

        return [
          'sexCharacter' => $sexCharacter,
          'birthdayCharacter' => $birthdayCharacter,
          'administratorMark' => $administratorMark,
        ];
    }

    public static function getSearch($request)
    {
        $items = Member::where('name', 'like',  '%' . $request . "%")
            ->orWhere('full_name', 'like',  '%' . $request . '%')->get();
        return $items;
    }

}
