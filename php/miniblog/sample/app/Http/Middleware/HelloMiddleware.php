<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/*  ミドルウェア　アクションの前と後でリクエスト、レスポンスの中身をいじって処理を挟めるよ
    ロジックを書いたらkernel.phpで登録することを忘れずに */
class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /* コントローラの前に処理を実行したい場合はreturn $nextの前に処理を書く
           認証されているかチェック */
        $response = $next($request);
        // session->hasでログインしているかどうか確認()
        if ($request->session()->has('msg'))
        {
          return $response;
        }

        return redirect('/hello');
    }
}
