<!DOCTYPE html>
 
<html>
  <head>
    <title>退会画面</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
    <div class="container">
      <p>本当に退会しますか？</p>
        <form action="./quit.php" method="POST">
          <input type="hidden" name="is_delete" value="1">
          <input type="submit" class="btn btn-warning " value="退会する">
        </form><br>
      <p><a href="index.php">トップに戻る</a></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

<?php
  require_once('database1.php');
  session_start();
 
    if (!isset($_SESSION['user_id'])) {
      header('Location: index.php');
      exit;
    }
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_SESSION['user_id']) && isset($_POST['is_delete']) && $_POST['is_delete'] === '1') {
    
    $data1=new Database1();
    $dbh = $data1->dbConnect();
 
    $stmt = $dbh->prepare('DELETE FROM user WHERE user_id = :user_id');
    $stmt->bindValue(1, $_SESSION['user_id']);
    $stmt->execute();

    $stmt = $dbh->prepare('DELETE FROM purchase WHERE user_id = :user_id');
    $stmt->bindValue(1, $_SESSION['user_id']);
    $stmt->execute();

    session_destroy();
 
    header('Location: index.php');
    exit;
  }
}
?>