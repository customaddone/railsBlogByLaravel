@extends('layouts.layouts')

@section('header')
    @component('components.header')
    @endcomponent
@endsection

@section('main')
<h1>ブログ記事一覧</h1>
@if(session('msg'))
<a href="/entries/create" class="toolbar">新規作成</a>
@endif

@isset($entries)
<table class="list">
    <thead>
        <tr>
            <th>タイトル</th>
            <th>日時</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $entries as $entry )
        <tr>
            <td><a href="/entries/{{ $entry->id }}">{{ $entry->title }}</a></td>
            <td>{{ $entry->posted_at }}</td>
            <td>
                <!-- 編集機能 -->
                @if( $entry->user_id == $user_id )
                <a href="/entries/{{ $entry->id }}/edit">編集</a>
                <!-- 　削除機能 -->
                <form action="/entries/{{ $entry->id }}" id="form_{{ $entry->id }}" method="post" style="display:inline">
                    <!-- 忘れないで -->
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <!-- hrefは#で構わない
              　　　     　data-idはJavaScriptで変数.dataset.idとした際にこのaタグ要素を呼び出すためのもの -->
                    <a href="#" data-id="{{ $entry->id }}" onclick="deletePost(this);">削除</a>
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
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endisset
@endsection

@section('sidebar')
    @component('components.sidebar')
    @endcomponent
@endsection

@section('header')
    @component('components.footer')
    @endcomponent
@endsection
