<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HeaderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /* ビューコンポーザで設定した値（宛先はコンポーネント）を親ビューに継承させる
        　　ことは無理らしい */
        View::composer(
            'entries.index', function($view){

              /* 作成者以外の編集・削除をブロックする用
                 セッションでuser_id送った方がキレイだと思う */
              $user_id = "";
              if (session()->has('msg'))
              {
                  $user_id = Auth::id();
              }

              $view->with('user_id', $user_id);
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
