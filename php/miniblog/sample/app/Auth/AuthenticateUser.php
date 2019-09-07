<?php
// 厳格な型検査モードの指定構文です。
declare(strict_types=1);

namespace App\Auth;

use Illuminate\Contracts\Auth\Authenticatable;

// implements はインターフェース（抽象クラスの亜種）を呼び出すためのものです
class AuthenticateUser implements Authenticatable
{
    protected $attributes;

    // クラス生成の際にAuthenticateUser(任意の配列)を入れる
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    // ユーザーを識別するために利用する識別子（通常はプライマリーキー付きのカラム）を利用する
    public function getAuthIdentifierName() :string
    {
        return 'id';
    }
    
    // ユーザー特定が可能な値（$this->id）を返却する
    public function getAuthIdentifier()
    {
        return $this->attributes[$this->getAuthIdentifierName()];
    }

    // ユーザーのパスワードを返却する
    public function getAuthPassword() :string
    {
        return $this->attributes['password']
    }

    // 自動ログインに必要なトークンの値を返却する
    public function getRememberToken() :string
    {
        return $this->attributes[$this->getRememberTokenName()];
    }

    // $valueをトークンの値にセットする
    public function setRememberToken() :string
    {
        $this->attributes[$this->getRememberTokenName()] = $value;
    }

    // 今回は空白にする
    public function getRememberTokenName() :string
    {
        return "";
    }
}
