<?php
    session_start();
    require_once('database1.php');

    // 購入履歴のテーブルへ挿入する
    $database = new Database1;
    // 商品名を取得
    $item_name = $database->getProductName($_SESSION['product']['id']);
    $database->createPurchase($item_name, $_SESSION['product']['id'], $_SESSION['product']['quantity'], $_SESSION['id']);

    // 商品のセッション情報を破棄する
    
?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購入完了画面</title>
</head>
<body>
    <h1>購入完了</h1>
    <p>商品を購入しました。</p>
    <a href="index.php">商品一覧へ</a>
</body>
</html>