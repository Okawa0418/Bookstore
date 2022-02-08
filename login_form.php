<h1>ログインページ</h1>
<form action="login.php" method="post">
    <div>
        <label>メールアドレス：</label>
        <!-- required=必須項目 -->
        <input type="text" name=mail_address required>
    </div>
    <div>
        <label>パスワード：</label>
        <input type="password" name="pass" required>
    </div>
    <input type="submit" value="ログイン">
</form>