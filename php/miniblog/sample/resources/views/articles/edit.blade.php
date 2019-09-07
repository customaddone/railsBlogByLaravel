@extends('layouts.layouts')

@section('header')
    @component('components.header')
    @endcomponent
@endsection

@section('main')
    <h1>ニュース記事の編集</h1>
    <a href="/articles/{{ $article->id }}">記事の詳細に戻る</a>
    @if (count($errors) > 0)
    <div class="errors">
        <h3>エラーがあります</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/articles/{{ $article->id }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <table class="attr">
            <!-- これ付けないとCall to a member function on null()が出る -->
            <input type="hidden" name="id" value="{{ $article->id }}">
            <tr>
                <th>タイトル</th>
                <td><input type="text" name="title" size="20" value="{{ $article->title }}"></td>
            </tr>
            <tr>
                <th>本文</th>
                <!-- textareaはvalue使えない（タグ(<textarea>)とタグの間に挟む　
                     editアクションにミドルウェアnewLineを実行し、<br />を別のタグにすることもできる。 -->
                <td><textarea name="body"  rows="10" cols="45">{!!  $article->body !!}</textarea></td>
            </tr>
            <tr>
                <th>掲載開始日時</th>
                <!-- スピナーでえへん -->
                <td><input type="datetime-local" name="released_at"
                  value="{{ $article->released_at }}"></td>
            </tr>
            <tr>
                <th>掲載終了日時</th>
                <td><input type="datetime-local" name="expired_at"
                  value="{{ $article->expired_at }}"></td>
            </tr>
            <tr>
                <th>会員限定</th>
                <td><input type="checkbox" name="member_only"
                   value="<?php ( $article->member_only == 0 ) ? '○': '×'; ?>"></td>
            </tr>
         </table>
        <div><input style="float: left;" type="submit" value="更新する"></div>
    </form>
@endsection

@section('sidebar')
    @component('components.sidebar')
    @endcomponent
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection
