<?php
session_start();
$mail = $_POST['mail_address'];
$dsn = "mysql:host=localhost; dbname=bookstore; charset=utf8";
$username = "root";
$password = "Rilakkuma1231";
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $msg = $e->getMessage();
}

$sql = "SELECT * FROM user WHERE mail_address = :mail_address";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':mail_address', $mail);
$stmt->execute();
$member = $stmt->fetch();

    //指定したハッシュがパスワードにマッチしているかチェック
    if (password_verify($_POST['password'], $member['password'])) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['user_id'] = $member['user_id'];
    $_SESSION['user_name'] = $member['user_name'];
    $msg = 'ログインしました。';
    $link = '<a href="confirm.php">購入画面</a>';
} else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login_form.php">戻る</a>';
}
?>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>