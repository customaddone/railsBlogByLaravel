<h2>ログイン</h2>
<!-- 絶対パスにしないと編集画面から移動できない　なんか短く出来ない？ -->
<form class="login_form" action="http://localhost:8000/hello/auth" method="post">
    {{ csrf_field() }}
    <div>
        <label>email:</label>
        <input type="text" name="authEmail">
    </div>
    <div>
        <label>pass :</label>
        <input type="password" name="password">
    </div>
    <div>
        <input type="submit" value="ログイン">
    </div>
</form>
