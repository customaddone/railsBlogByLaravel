@extends('layouts.layouts')

@section('header')
    @component('components.header')
    @endcomponent
@endsection

@section('main')
    <h1>会員情報の編集</h1>
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
    <div class="toolbar"><a href="/members/{{ $item->id }}">会員の詳細に戻る</a>
    <form action="/members/{{ $item->id }}" method="post">
        {{ csrf_field() }}
        <!-- method_fieldでgetとpost以外の送信ができる -->
        {{ method_field('patch') }}
        <table class="attr">
            <input type="hidden" name="id" value="{{ $item->id }}">
            <tr>
                <th width="150">背番号</th>
                <td><input type="text" name="number" value="{{ $item->number }}"></td>
            </tr>
            <tr>
                <th>ユーザー名</th>
                <td><input type="text" name="name" value="{{ $item->name }}"></td>
            </tr>
            <tr>
                <th>氏名</th>
                <td><input type="text" name="full_name" value="{{ $item->full_name }}"></td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                  <input type="radio" name="sex" value="1"
                      <?php if ($item->sex == 1) { echo 'checked="checked"';} ?>>男
                  <input type="radio" name="sex" value="0"
                      <?php if ($item->sex == 0) { echo 'checked="checked"';} ?>>女
                </td>
            </tr>
            <tr>
                <th>誕生日</th>
                <td><input type="time" name="birthday" value="{{ $item->birthday }}"></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><input type="time" name="email" value="{{ $item->email }}"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="checkbox" name="administrator" value="1"
                    <?php if ($item->administrator == true) { echo 'checked="checked"';} ?>>管理者</td>
            </tr>
         </table>
        <div><input style="float: left;" type="submit" value="Update Member"></div>
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
