@extends('layouts.layouts')

@section('header')
    @component('components.header')
    @endcomponent
@endsection

@section('main')
    <h1>会員の新規登録</h1>
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
    <form action="/members" method="post">
        {{ csrf_field() }}
        <table class="attr">
            <tr>
                <th width="150">背番号</th>
                <td><input type="text" name="number" value="{{ old('number') }}"></td>
            </tr>
            <tr>
                <th>ユーザー名</th>
                <td><input type="text" name="name" value="{{ old('name') }}"></td>
            </tr>
            <tr>
                <th>氏名</th>
                <td><input type="text" name="full_name" value="{{ old('full_name') }}"></td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                  <label><input type="radio" value="1" name="sex">男</label>
                  <label><input type="radio" value="0" name="sex">女</label>
                </td>
            </tr>
            <tr>
                <th>誕生日</th>
                <td><input type="time" name="birthday" value="{{ old('birthday') }}"></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><input type="time" name="email" value="{{ old('email') }}"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="checkbox" name="administrator" value="1">管理者</td>
            </tr>
         </table>
        <div><input style="float: left;" type="submit" value="Create Member"></div>
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
