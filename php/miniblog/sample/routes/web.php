<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', 'HelloController@index');

/* laravelでもCRUDの基本的なアクセスを一式セットでルーティングしてくれるresourceメソッドがある
　　このミドルウェアはログイン認証確認用
   なぜかmiddleware(HelloMiddleware::class)だと繋がらないぞ */
Route::resource('members', 'MembersController')->
  middleware('hello');
// searchはresourceではルーティングされていなかった。
Route::post('members/search', 'MembersController@search');
/* authコマンドで追加されたルート
   これはAuthファサードを通じてIllminate\Routing\RouterインスタンスのAuthメソッドを呼び出す
   ルートがいくつか追加されます */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
// ログイン用
Route::post('hello/auth', 'HelloController@postAuth');
// ログアウト用
Route::get('hello/destroy', 'HelloController@postDestroy');
// 記事作成用
Route::resource('articles', 'ArticlesController')->
  middleware('hello');
// 会員限定ブログ用
Route::resource('entries', 'EntriesController');
