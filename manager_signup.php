<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>ユーザー登録画面</title>
</head>
 
<body>
    <header>
      <a href="index.php"  style="color:inherit;text-decoration: none;"><h1>BOOK STORE</h1></a>
    </header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
        <a class="navbar-brand" href="#">会員登録</a>
        <div class="collapse navbar-collapse justify-content-center">
        </div>
    </nav>    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

    <?php
    session_start();
        if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <?php
        if (isset($_SESSION['msg2'])) {
        $msg2 = $_SESSION['msg2'];
        unset($_SESSION['msg2']);
    }
    ?>

<body>
  <form action="register.php" method="post">
  <div class="container">

    <!-- エラーメッセージの表示 -->
    <?php if (isset($msg)) : ?>
      <?= $msg; ?><br>
    <?php endif ; ?>

    <?php if (isset($msg2)) : ?>
      <?= $msg2; ?><br>
    <?php endif ; ?>

    <div>
      <label>ユーザー名：</label>
      <input type="text" name="user_name" placeholder="例）山田太郎" value="<?php if( !empty($_SESSION['user_name']) ){ echo htmlspecialchars( $_SESSION['user_name'], ENT_QUOTES, 'UTF-8'); } ?>">
    </div>
    <div>
      <label>パスワード：</label>
      <input type="password" name="password" placeholder="例）abcd1234">
    </div><br>

    <div class="row">
        <div class="col-md">
          <input type="submit" class="btn btn-success" value="登録完了">
        </div>
    </div><br>
  </form>

  <p>既に登録済みの方は<a href="manager_login.php">こちら</a></p>
  <form action="manager_index.php">
      <input type="submit" class="btn btn-secondary" value="トップページ">
  </form>
</body>
</html>
