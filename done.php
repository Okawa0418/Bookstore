<?php
    session_start();
    require_once('database1.php');

    // ログイン情報を持っていない場合
    if (empty($_SESSION['user_id'])) {
        // 商品一覧画面へリダイレクト
        header('Location: index.php');
        exit;
    }
    
    // 商品を選択していない場合
    if (empty($_SESSION['product'])) {
        echo '商品を購入してください。';
        echo '<a href="index.php">商品一覧へ</a>';
        exit;
    }

    // 数量が0以外の商品をインサートしたい
    // まず、quantityで0を検索してインデックス番号を取得
    $zero_quantities = array_keys($_SESSION['product']['quantity'], '0');
    // インデックス番号と一致するid、数量、価格を配列内から削除する
    for ($i=0; $i < count($zero_quantities); $i++) {
        // idの配列から数量が0であるid要素を削除
        array_splice($_SESSION['product']['id'], $zero_quantities[$i], 1);
        // quantityの配列から数量が0であるid要素を削除
        array_splice($_SESSION['product']['quantity'], $zero_quantities[$i], 1);
        // priceの配列から数量が0であるid要素を削除
        array_splice($_SESSION['product']['price'], $zero_quantities[$i], 1);
    }
    // $_SESSION['product']の中身は数量0を抜いた配列になっている
    // 削除された状態でfor文を使用してインサートしていく
    for ($i=0; $i < count($_SESSION['product']['id']); $i++) {
        // 購入履歴のテーブルへ挿入する
        $database = new Database1;
        // 商品名を取得
        $item_name = $database->getProductName($_SESSION['product']['id'][$i]);
        // 購入テーブルへインサート
        $database->createPurchase($item_name, $_SESSION['product']['id'][$i], $_SESSION['product']['quantity'][$i], $_SESSION['user_id']);
    }

    // 商品のセッション情報を破棄する
    unset($_SESSION['product']);
    unset($_SESSION['total_amount']);

    
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