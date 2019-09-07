<img src="/storage/images/logo.gif" width="272px" height="48px">

<ul class="account-menu">
    @if(session('msg'))
    <span>{{ session('msg') }}|<a href="/hello/destroy">ログアウト</a></span>
    @endisset
</ul>

<nav class="menubar">
    <ul>
        <?php
            menu_link_to("TOP", "/hello");
            menu_link_to("ニュース", "/articles");
            menu_link_to("ブログ", "/entries");
            menu_link_to("会員名簿", "/members");
            menu_link_to("管理ページ", "");
        ?>
    </ul>
</nav>
