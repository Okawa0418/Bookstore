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
header('Location: index.php');
?>