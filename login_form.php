<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="login_form.css">
    <title>ログイン画面</title>
</head>
 
<body>
    <header>
        <a href="index.php"  style="color:inherit;text-decoration: none;"><h1>BOOK STORE</h1></a>
    </header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">ログイン画面へようこそ</a>
        <div class="collapse navbar-collapse">
        </div>
    </nav>    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

<?php
    session_start();

    // お気に入りに追加ボタンから遷移してきた場合
    if (isset($_POST['favorite'])) {
        // セッションで遷移してきた場所を保持
        $_SESSION['favorite'] = $_POST['favorite'];
        $_SESSION['product_id'] = $_POST['product_id'];
        $msg = 'お気に入り機能を使用する際はログインしてください';
    }

    if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
    } 
    if (isset($_SESSION['msg1'])) {
    $msg1 = $_SESSION['msg1'];
    unset($_SESSION['msg1']);
    }
?>

<body>

    <div class="container">
    <form action="login.php" method="post">

        <!-- エラーメッセージの表示 -->
        <?php if (isset($msg)) : ?>
          <?= $msg; ?><br>
        <?php endif ; ?>
        
        <?php if (isset($msg1)) : ?>
          <?= $msg1; ?><br><br>
        <?php endif ; ?>
        
        <div>
            <label>メールアドレス：</label>
            <input type="email" name=mail_address placeholder="例）abc@bookstore.co.jp"  value="<?php if( !empty($_SESSION['mail_address']) ){ echo htmlspecialchars( $_SESSION['mail_address'], ENT_QUOTES, 'UTF-8'); } ?>">
        </div>
        <div>
            <label>パスワード：</label>
            <input type="password" name="password" placeholder="例）abcd1234">
        </div><br>
        <div class="row">
            <div class="col-md">
              <input type="submit" class="btn btn-success" value="ログイン">
            </div>
        </div>
    </form><br>

    <p>登録がまだお済みでない方は<a href="signon.php">こちら</a></p>

    <form action="index.php">
        <input type="submit" class="btn btn-secondary" value="トップページ">
    </form>
    </div>
</body>
</html>
<!-- デザイン -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="photojp/dublin.jpg"  width="800" height="400">
        <h1 class="display-5 fw-bold">BOOKSTORE</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">looking forward and looking back that's our life</p>
        </div>
    </div>
</body>
</html>