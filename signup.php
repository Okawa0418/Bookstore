<h1>新規会員登録</h1>

<form action="register.php" method="post">
<div>
  <label>名前：</label>
  <input type="text" name="user_name" required>
</div>
<div>
  <label>メールアドレス：</label>
  <input type="text" name="mail_address" required>
</div>
<div>
  <label>住所：</label>
  <input type="text" name="post_address" required>
</div>
<div>
  <label>電話番号：</label>
  <input type="tel" name="tel" required>
</div>
<div>
  <label>パスワード：</label>
  <input type="password" name="password" required>
</div>
<input type="submit" value="新規登録（購入画面へ）">
</form>
<p>既に登録済みの方は<a href="login_form.php">こちら</a></p>