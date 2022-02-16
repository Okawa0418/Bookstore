<?php
require_once('database1.php');
session_start();
 
/* 未ログイン状態ならトップへリダイレクト */
if (!isset($_SESSION['user_id'])) {
  header('Location: index.php');
  exit;
}
 
/* 退会処理 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  /* ログイン状態で、かつ退会ボタンを押した */
  if (isset($_SESSION['user_id']) && isset($_POST['is_delete']) && $_POST['is_delete'] === '1') {
    /* データベース接続 */
    $data1=new Database1();
    $dbh = $data1->dbConnect();
 
    /* 退会 */
    $stmt = $dbh->prepare('DELETE FROM user WHERE user_id = :user_id');
    $stmt->bindValue(1, $_SESSION['user_id']);
    $stmt->execute();
 
    session_destroy(); // セッションを破壊
 
    header('Location: index.php');
    exit;
  }
}
 
?>
 
<!DOCTYPE html>
 
<html>
  <head>
    <title>退会画面</title>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>退会画面</h1>
    <p>退会しますか？</p>
    <form action="./quit.php" method="POST">
      <input type="hidden" name="is_delete" value="1">
      <input type="submit" value="退会する">
    </form>
    <p><a href="/">トップに戻る</a></p>
  </body>
</html>