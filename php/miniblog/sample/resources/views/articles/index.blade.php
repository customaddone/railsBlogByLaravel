@extends('layouts.layouts')

@section('header')
    @component('components.header')
    @endcomponent
@endsection

@section('main')
    <h1>ニュース記事一覧</h1>
    <a href="/articles/create" class="toolbar">新規作成</a>

    @isset($articles)
    <table class="list">
        <thead>
            <tr>
                <th>タイトル</th>
                <th>日時</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $articles as $article )
            <tr>
                <td><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></td>
                <td>{{ $article->released_at }}</td>
                <td>
                    <!-- 編集機能 -->
                    <a href="/articles/{{ $article->id }}/edit">編集</a>
                    <!-- 　削除機能 -->
                    <form action="/articles/{{ $article->id }}" id="form_{{ $article->id }}" method="post" style="display:inline">
                        <!-- 忘れないで -->
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <!-- hrefは#で構わない
                  　　　     　data-idはJavaScriptで変数.dataset.idとした際にこのaタグ要素を呼び出すためのもの -->
                        <a href="#" data-id="{{ $article->id }}" onclick="deletePost(this);">削除</a>
                    </form>
                    <script>
                        function deletePost(e) {
                            'use strict';

                            /* 確認に対し「OK」を押した場合（trueを返す)場合に実行 */
                            if (confirm('are you sure?')) {
                                　/* getElementByIdでform（Elementオブジェクト)を呼び出し、submitする */
                                document.getElementById('form_' + e.dataset.id).submit();
                            }
                        }
                    </script>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endisset
    {{ $articles->links() }}
@endsection

@section('sidebar')
    @component('components.sidebar')
    @endcomponent
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection
