@extends('layouts.layouts')

@section('header')
    @component('components.header')
    @endcomponent
@endsection

@section('main')
    <h1>{{ $article->title }}</h1>
    <div class="toolbar"><a href="/articles/{{ $article->id }}/edit">編集</a></div>
        <table class="attr">
            <tr>
                <th width="100">タイトル</th>
                <td>{{ $article->title }}</td>
            </tr>
            <tr>
                <th>本文</th>
                <!-- !! !!でエスケープされなくなる（改行される）-->
                <td>{!!  $article->body !!}</td>
            </tr>
            <tr>
                <th>掲載開始日時</th>
                <td>{{ $article->released_at }}</td>
            </tr>
            <tr>
                <th>掲載終了日時</th>
                <td>{{ $article->expired_at }}</td>
            </tr>
            <tr>
                <th>会員限定</th>
                <td><?php echo ( $article->member_only == 0 ) ? '○' : '×'; ?></td>
            </tr>
        </table>
@endsection

@section('sidebar')
    @component('components.sidebar')
    @endcomponent
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection
