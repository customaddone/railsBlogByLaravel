@extends('layouts.layouts')

@section('header')
    @component('components.header')
    @endcomponent
@endsection

@section('main')
    @foreach( $articles as $article)
        <h2>{{ $article->title }}</h2>
        <p>
           <p><?php echo str_limit( $article->body); ?></p>
           <a href="/articles/{{ $article->id }}">もっと読む</a>
        </p>
    @endforeach
@endsection

@section('sidebar')
    @component('components.sidebar')
    @endcomponent
@endsection

@section('header')
    @component('components.footer')
    @endcomponent
@endsection
