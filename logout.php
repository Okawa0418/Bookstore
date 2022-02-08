<?php
session_start();
//セッションの中身をすべて削除
$_SESSION = array();
//セッションを破壊
session_destroy();
?>

<p>ログアウトしました。</p>
<a href="login.php">ログインへ</a>