<!DOCTYPE html>
<html>
  <head>
    <title>退会画面</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="quit.css">
  </head>

  <body>
    <header>
      <a href="index.php"  style="color:inherit;text-decoration: none;"><h1>BOOK STORE</h1></a>
    </header>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <h2><font color="white">退会画面</font></h2>
    </nav>
    <div class="row">
      <div class="col-4">
      <div class="container">
      <div class="card text-light bg-dark text-center" style="max-width:25rem">
          <div class="card-header bg-info mb-3 fs-1">本当に退会しますか？</div>
          <div class="card-body">
            <form action="./quit.php" method="POST">
              <input type="hidden" name="is_delete" value="1">
              <input type="submit" class="btn btn-info " value="退会する">
            </form><br>
            <a href="index.php" class="link-danger">トップに戻る</a>
          </div>
      </div>
    </div>
      </div>
      <div class="col-4 bg-dark text-center">
        <img src="photojp/sad.png" width="400" height="300">
      </div>
      <div class="col-4 bg-dark text-center">
        <img src="photojp/autom.jpg" width="400" height="300">
      </div>
    </div>
    </div>
    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold">BOOKSTORE</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">looking forward and looking back that's our life</p>
        </div>
    </div>
</body>
<?php
  require_once('database1.php');
  $data1=new Database1();
  $dbh = $data1->dbConnect();
  
  session_start();
 
    if (!isset($_SESSION['user_id'])) {
      header('Location: index.php');
      exit;
    }
 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // ログイン状態で退会ボタンを押下
      if (isset($_SESSION['user_id']) && isset($_POST['is_delete']) && $_POST['is_delete'] === '1') {
      
        $stmt = $dbh->prepare('DELETE FROM user WHERE user_id = :user_id');
        $stmt->bindValue(1, $_SESSION['user_id']);
        $stmt->execute();
      
        $stmt = $dbh->prepare('DELETE FROM purchase WHERE user_id = :user_id');
        $stmt->bindValue(1, $_SESSION['user_id']);
        $stmt->execute();
      
        session_destroy();
      
        header('Location: quitform.php');
        exit;
      }
    }
?>