@extends('layouts.layouts')

@section('header')
    @component('components.header')
    @endcomponent
@endsection

@section('main')
    <h1>ニュース記事の編集</h1>
    <a href="/articles">記事の詳細に戻る</a>
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
    <form action="/articles" method="post">
        {{ csrf_field() }}
        <table class="attr">
            <tr>
                <th>タイトル</th>
                <td><input type="text" name="title" size="20"></td>
            </tr>
            <tr>
                <th>本文</th>
                <td><textarea name="body" rows="10" cols="45"></textarea></td>
            </tr>
            <tr>
                <th>掲載開始日時</th>
                <!-- スピナーでえへん -->
                <td><input type="datetime-local" name="released_at"
                  value="<?php echo date("Y/m/d H:i:s",strtotime("now")); ?>"></td>
            </tr>
            <tr>
                <th>掲載終了日時</th>
                <td><input type="datetime-local" name="expired_at"
                  value="<?php echo date("Y/m/d H:i:s",strtotime("+8 day")); ?>"></td>
            </tr>
            <tr>
                <th>会員限定</th>
                <td><input type="checkbox" name="member_only" value="1"></td>
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
