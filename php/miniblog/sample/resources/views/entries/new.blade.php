@extends('layouts.layouts')

@section('header')
    @component('components.header')
    @endcomponent
@endsection

@section('main')
    <h1>ニュース記事の編集</h1>
    <a href="/entries">記事の詳細に戻る</a>
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
    <form action="/entries" method="post">
        {{ csrf_field() }}
        <table class="attr">
            <!-- リレーション用 -->
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <tr>
                <th>タイトル</th>
                <td><input type="text" name="title" size="20"></td>
            </tr>
            <tr>
                <th>本文</th>
                <td><textarea name="body" rows="10" cols="45"></textarea></td>
            </tr>
            <!-- 投稿日は入力されている状態にする -->
            <input type="hidden" name="posted_at" value="<?php echo date("Y/m/d H:i:s") ?>">
            <tr>
                <th>会員限定</th>
                <td><input type="text" name="status" value="draft"></td>
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
