<!-- 商品名、数量選択、かごに追加、購入ボタン表示 -->
<?php
session_start();
require_once('database1.php');

// 送信された商品idを受け取る
if (isset($_GET['product_id'])) {
    // 商品idを変数に代入
    $product_id = $_GET['product_id'];
} else {
    echo '不正アクセスです';
    exit;
}

// 商品idからproductテーブルで該当商品のレコードを取得する
$database = new Database1;
$product = $database->getProductByProductId($product_id);

// 取得した商品名・価格・画像パスを各変数に代入
$name = $product['product_name'];
$price = $product['price'];
$file_path =$product['file_path'];

// 疑似ランダムなバイト文字列を生成
$toke_byte = random_bytes(32);
// バイナリデータを16進数に変換
$token = bin2hex($toke_byte);
// 生成したトークンをセッションに保存
$_SESSION['token'] = $token;

function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

// セッションにエラーメッセージが入っていた場合
if (isset($_SESSION['msg'])) {
    // エラーメッセージを変数へ代入
    $msg = $_SESSION['msg'];
    // エラーメッセージのセッション破棄
    unset($_SESSION['msg']);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品詳細ページ</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <header style="background-color: white;">            
            <a href="index.php"  style="color:inherit;text-decoration: none;">
            <h1>BOOK STORE</h1></a>
        </header>
    </div>

    <!-- エラーメッセージの表示 -->
    <?php if (isset($msg)) : ?>
        <p>&#x26a0;<?= $msg; ?></p>
    <?php endif ; ?>

    <!-- 商品情報 -->
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?=$file_path?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <!-- 商品名 -->
                    <h5 class="card-title"><?= h($name); ?></h5>
                    <!-- 価格 -->
                    <p class="card-text">価格：<?= $price; ?>円</p>
                    <!-- 数量選択フォーム開始 -->
                    <form action="add_cart.php" method="post">
                        <!-- 数量選択表示 -->
                        <p class="card-text">
                            <label for="quantity" class="form-label">数量(冊)：</label>
                            <select  name="quantity"  id="quantity" class="form-select" style="width: 100px;">
                                <?php for ($i = 0; $i < 51; $i++) : ?>
                                    <option value="<?= $i; ?>"><?= $i ?></option>
                                <?php endfor ?>
                            </select> 
                            <div id="quantityHelp" class="form-text">カートに追加したい数量を選択してください</div>
                        </p>
                        <!-- 商品idを送信 -->
                        <input type="hidden" name="product_id" value="<?= $product_id; ?>">
                        <!-- 商品名を送信 -->
                        <input type="hidden" name="product_name" value="<?= $name; ?>">
                        <!-- 商品価格を送信 -->
                        <input type="hidden" name="price" value="<?= $price; ?>">
                        <!-- トークンを送る -->
                        <input type="hidden" name="token" value="<?= $token; ?>">
                        <!-- カートに追加ボタンでadd_cart.phpへ送信 -->
                        <button type="submit" class="btn btn-danger">カートに追加</button> 
                    </form>
                    <!-- 数量選択フォーム終了 -->
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
    <!-- 数量選択、カートに入れるボタン-->
</div>
</body>
</html>