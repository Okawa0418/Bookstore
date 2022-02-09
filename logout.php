<?php
session_start();
// ログアウト処理
// セッションを空にする
$_SESSION = array();
// セッションを切断するにはセッションクッキーも削除する。
// セッションIDを保存する際にクッキーを使用している場合
if (ini_get("session.use_cookies")) {
    // 空のクッキーを送信する（有効期限は過去の値、ecサイト全体のクッキーについて破棄する）
    setcookie(session_name(), '', time() - 42000, '/');
}
// セッションを破棄
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
    <h1>ログアウト完了</h1>
    <h2>ログアウトしました。</h2>
    <a href="index.php">商品一覧へ</a>
</body>
</html>