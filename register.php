<?php
// ファイルの取り込み

require_once("database2.php");

    // 登録されていなければinsert
    $sql = "INSERT INTO users(user_name, mail_address, pass) VALUES (:user_name, :mail_address, :pass)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user_name', $name);
    $stmt->bindValue(':mail_address', $mail);
    $stmt->bindValue(':password', $pass);
    $stmt->execute();
    $msg = '会員登録が完了しました';
    $link = '<a href="login.php">ログインページ</a>';

?>

<h1><?php echo $msg; ?></h1><!--メッセージの出力-->
<?php echo $link; ?>