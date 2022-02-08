<?php
// データベース連結
try {
    $dsn = 'mysql:host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    print '只今障害が発生しております。<br><br>';
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}
// もしセッションがfalseな場合ログインで退出
session_start();
session_regenerate_id(true);

if (isset($_SESSION['']) === false) {
    print 'ログインして下さい' . '<br><br>';
    print "<a href='index.php'>Top画面へ</a>";
    exit();
}
// もしセッションがtrue場合ログアウト
if (isset($_SESSION['']) === true) {
    print $_SESSION['login.php'];
    print "<a href='logout.php'>ログアウト</a>";
    print '<br><br>';
}

//h tag　購入ボタン実装予定
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品購入</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<h1>お名前</h1>
<h1>価格</h1>
<h1>数量</h1>


</body>
</html>

