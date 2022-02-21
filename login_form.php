<!doctype html>
<html lang="ja">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
    <title>ログイン画面
    </title>
</head>
 
<body>
    <header>
    <a href="index.php"  style="color:inherit;text-decoration: none;"><h1>BOOK STORE</h1></a>
    </header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">おかえりなさい</a>
        <div class="collapse navbar-collapse">
        </div>
    </nav>    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<?php
session_start();
    if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<?php
    if (isset($_SESSION['msg1'])) {
    $msg1 = $_SESSION['msg1'];
    unset($_SESSION['msg1']);
}
?>

<form action="login.php" method="post">
<div class="container">

<!-- エラーメッセージの表示 -->
<?php if (isset($msg)) : ?>
  <?= $msg; ?>
  <br>
<?php endif ; ?>

<?php if (isset($msg1)) : ?>
  <?= $msg1; ?>
  <br><br>
<?php endif ; ?>

    <div>
        <label>メールアドレス：</label>
        <input type="email" name=mail_address placeholder="例）abc@bookstore.co.jp">
    </div>
    <div>
        <label>パスワード：</label>
        <input type="password" name="password" placeholder="例）1234abcd">
    </div>
    <br>
    <div class="row">
        <div class="col-md">
          <input type="submit" class="btn btn-success" value="ログイン">
        </div>
    </div>
</form>
<br>
<p>登録がまだお済みでない方は<a href="signup.php">こちら</a></p>
<form action="index.php">
    <input type="submit" class="btn btn-secondary" value="トップページ">
</form>
</div>
</body>
</html>