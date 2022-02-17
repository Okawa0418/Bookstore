<?php
session_start();

// エラーメッセージが格納されている場合
if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>リクエスト一覧・商品追加画面</title>
</head>
<body>
    <h1>商品追加画面</h1>
    <!-- エラーメッセージ表示 -->
    <?php if (isset($msg)) : ?>
        <?= $msg; ?>
    <?php endif ; ?>
    <!-- フォームで追加商品情報をvalidate.phpへ送信 -->
    <form action="include.php" method="post">
        <label>
            商品idを記入してください:<br>
            <input type="number" name="id" value="">
        </label>
        <br>
        <input type="submit" name="searchid" value="検索">
    </form>
    
    <h1>リクエスト一覧を表示させる（idと商品名）</h1>
</body>
</html>
 