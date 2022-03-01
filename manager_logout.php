<?php
session_start();

// セッションを空にする
$_SESSION = array();

    if (ini_get("session.use_cookies")) {
        // 空のクッキーを送信
        setcookie(session_name(), '', time() - 42000, '/');
    }
    
session_destroy();

header('Location: manager_login.php');
?>		