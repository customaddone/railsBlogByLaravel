<?php

/* ビューコンポーザは、ビューをレンダリングする際に自動的に実行される処理を用意するための
　　部品です。ビューコンポーザではビューのオブジェクト(Viewクラス)が引数として渡され、それを
　　利用することでテンプレート側に必要な情報などを渡すことが出来ます。
　　ビジネスロジックを含んだ変数をビューに踏み込む為に使おう　*/
namespace App\Providers;

use Illuminate\Support\Facades\Auth;
// use Illminate\Support\Facades\View;を入れる（デフォでは入ってない）
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    /* ブート（アプリケーションが起動される際に割り込んで実行される処理です）
    　　サービスプロバイダの中にあります
    　　ブートの中にビューコンポーザを設定する処理を書き込めば、指定したビュー
    　　をレンダリングする際に自動的にコンポーザが呼び出されるようになります。*/
    public function boot()
    {
        // View::composerを作ったらconfig/app.phpに登録する
        View::composer(
            'layouts.layouts', function($view){
              $title = 'Morning Glory';
              $user_id = '';
              // ビューに変数が渡されているかは$view->変数で調べる
              if ($view->offsetExists('page_title')) {
                $title = $view->page_title. " - ". 'title';
              }

              $view->with('page_title', $title);
            }
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
