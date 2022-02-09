<!doctype html>
<html lang="ja">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
    <title>ユーザー登録画面</title>
</head>
 
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">新規会員登録</a>
        <div class="collapse navbar-collapse justify-content-center">
        </div>
    </nav>    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

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
        <div class="row">
            <div class="col-md">
          <input type="submit" class="btn btn-warning" value="新規登録(購入画面へ)">
            </div>
        </div>
    </div>
  
</form>
<p>既に登録済みの方は<a href="login_form.php">こちら</a></p>