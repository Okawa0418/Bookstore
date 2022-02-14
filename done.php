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

    // for文を使用してpurchaseテーブルへインサートしていく（購入履歴）
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