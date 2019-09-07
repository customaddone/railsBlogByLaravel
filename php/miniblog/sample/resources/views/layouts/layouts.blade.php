<html>
<head>
  <title>{{ $page_title }}</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<!-- コメントにアットマーク付きの変数を入れるとエラーが出ます
 親ビューで子ビューから呼び出される枠を書き込む -->
<body>
  <div class="container">
    <header>
      @yield('header')
    </header>
    <main>
      @yield('main')
    </main>
    <aside class="sidebar">
      @yield('sidebar')
    </aside>
    <footer>
      @yield('footer')
    </footer>
  </div>
</body>
</html>
