<?php
    session_start();
    require_once('database1.php');
    require_once('cart_db.php');
    require_once('purchase_db.php');

    unset($_SESSION['category1']);
    unset($_SESSION['category2']);
    unset($_SESSION['category3']);
    unset($_SESSION['category4']);

    // ログインしていない場合
    if (empty($_SESSION['user_id'])) {
        // 商品一覧画面へリダイレクト
        header('Location: index.php');
        exit;
    }
    
    // ログインしている場合
    // user_idを変数へ代入
    $user_id = $_SESSION['user_id'];
    $cart = new Cart;
    // ログインしている人のカート情報を取得
    $results = $cart->getCartByUserId($user_id);
    // カート内が空であった場合
    if (empty($results)) {
        echo 'カートが空です';
        exit;
    }


    // カート内に商品が入っていた場合
    $purchase = new Purchase;
    // for文を使用してpurchaseテーブルへインサートしていく（購入履歴）
    for ($i=0; $i < count($results); $i++) {
        // 変数へ代入
        $product_name = $results[$i]['product_name'];
        $product_id = $results[$i]['product_id'];
        $quantity = $results[$i]['quantity'];
        // 購入テーブルへインサート
        $purchase->createPurchase($product_name, $product_id, $quantity, $user_id);
    }

    // カート内を削除する処理
    // ログインしているユーザーidに該当するレコードを削除
    $cart = new Cart;
    $cart->deleteCartByUserId($user_id);


    // 変数にメッセージを代入
    $msg = '購入ありがとうございます';

    // インサート後、商品のセッション情報を破棄する
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
    <form action="pur_history.php">
        <button type="submit" class="btn btn-success">商品履歴へ</button>
    </form>
    <form action="logout.php">
        <button type="submit" class="btn btn-danger">ログアウト</button>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>