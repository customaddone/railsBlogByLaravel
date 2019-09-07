@extends('layouts.layouts')

@section('header')
    @component('components.header')
    @endcomponent
@endsection

@section('main')
    <h1>{{ $entry->title }}</h1>
    <div class="toolbar"><a href="/entries/{{ $entry->id }}/edit">編集</a></div>
        <table class="attr">
            <tr>
                <th width="100">タイトル</th>
                <td>{{ $entry->title }}</td>
            </tr>
            <tr>
                <th>本文</th>
                <!-- !! !!でエスケープされなくなる（改行される）-->
                <td>{!!  $entry->body !!}</td>
            </tr>
            <tr>
                <th>登校日</th>
                <td>{{ $entry->posted_at }}</td>
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
