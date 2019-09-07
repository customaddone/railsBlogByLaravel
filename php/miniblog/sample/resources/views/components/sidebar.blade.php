<!-- サイドバーに表示します -->
@include('components.login')

<h2>最新のニュース</h2>
    <ul>
        <!-- サイドの記事呼び出しはビューコンポーザでやった
             スコープはArticles.phpで書いてビューコンポーザで呼んでいる -->
        @foreach( $sideArticles as $article )
            <li><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></li>
        @endforeach
    </ul>

<h2>会員のブログ</h2>
    <ul>
        @foreach( $sideEntries as $entry )
            <!-- リレーションを使いましょう
                 userの後ろに()いらない -->
            <li><a href="/entries/{{ $entry->id }}">{{ $entry->title }}
                </a>    by  {{ $entry->user->name }}</li>
        @endforeach
    </ul>
