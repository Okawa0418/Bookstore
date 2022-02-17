<?php
session_start();
// セッションを空にする
$_SESSION = array();
// セッションIDを保存する際にクッキーを使用している場合
if (ini_get("session.use_cookies")) {
    // 空のクッキーを送信する
    setcookie(session_name(), '', time() - 42000, '/');
}
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログアウト画面</title>
</head>
<body>
    <header>
        <h1>BOOK STORE</h1>
    </header>
    <h1>ログアウト完了</h1>
    <h2>ログアウトしました。</h2>
    <a href="index.php">トップページ</a>
</body>
</html>