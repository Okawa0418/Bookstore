<?php
    session_start();
    require_once('database1.php');

    // ログイン情報を持っていない場合
    if (empty($_SESSION['user_id'])) {
        // 商品一覧画面へリダイレクト
        header('Location: index.php');
        exit;
    }
    
    //購入商品の情報がある場合
    if (isset($_SESSION['product'])) {
        // for文を使用してpurchaseテーブルへインサートしていく（購入履歴）
        for ($i=0; $i < count($_SESSION['product']['id']); $i++) {
            // 購入履歴のテーブルへ挿入する
            $database = new Database1;
            // 商品名を取得
            $item_name = $database->getProductName($_SESSION['product']['id'][$i]);
            // 購入テーブルへインサート
            $database->createPurchase($item_name, $_SESSION['product']['id'][$i], $_SESSION['product']['quantity'][$i], $_SESSION['user_id']);
        }

        // 変数にメッセージを代入
        $msg = '購入ありがとうございます';

        // インサート後、商品のセッション情報を破棄する
        unset($_SESSION['product']);
        unset($_SESSION['total_amount']);

    }
    
    
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購入完了画面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <header>
        <a href="index.php"  style="color:inherit;text-decoration: none;">
        <h1>BOOK STORE</h1></a>
    </header>
</div>
<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><h2>購入完了</h2></a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
            </div>
        </nav>
    </div>    
</div>
<div class="container-fluid">    
    <h4>ご利用ありがとうございます。</h4>
    <p>商品を購入しました。</p>
    <form action="index.php">
        <button type="submit" class="btn btn-secondary">商品一覧へ</button>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>