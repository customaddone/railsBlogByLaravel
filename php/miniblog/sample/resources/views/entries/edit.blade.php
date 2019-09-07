@extends('layouts.layouts')

@section('header')
    @component('components.header')
    @endcomponent
@endsection

@section('main')
    <h1>ブログ記事の編集</h1>
    <a href="/entries/{{ $entry->id }}">記事の詳細に戻る</a>
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
    <form action="/entries/{{ $entry->id }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <table class="attr">
            <!-- これ付けないとCall to a member function on null()が出る -->
            <input type="hidden" name="id" value="{{ $entry->id }}">
            <!-- $entry(オブジェクトつけるのを忘れるとundefinedが出る) -->
            <input type="hidden" name="user_id" value="{{ $entry->user_id }}">
            <tr>
                <th>タイトル</th>
                <td><input type="text" name="title" size="20" value="{{ $entry->title }}"></td>
            </tr>
            <tr>
                <th>本文</th>
                <td><textarea name="body"  rows="10" cols="45">{!!  $entry->body !!}</textarea></td>
            </tr>
            <input type="hidden" name="posted_at" value="<?php echo date("Y/m/d H:i:s") ?>">
            <tr>
                <th>状態</th>
                <td><input type="text" name="status" value="{{ $entry->status }}"></td>
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
