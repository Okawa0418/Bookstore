<?php
session_start();

// 購入商品情報がない場合
if (empty($_SESSION['product'])) {
    // エラーメッセージをセッションへ格納
    $_SESSION['msg'] = '商品を選択してください';
    // index.phpへリダイレクトする
    header('Location: index.php');
    exit;
}

// index.phpの各セッションに連結
$product_name = $_SESSION['product']['name'];
$amount_quantity = $_SESSION['product']['quantity'];
$price= $_SESSION['product']['price'];
$total_amount = $_SESSION['product']['total_amount'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- bootstrap ｃｓｓ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
</head>
<body>
<header>
    <h1>BOOK STORE</h1>
</header>
<h2>商品確認</h2>
<table class="table table-warning" >
<!-- <table class="table"> -->
    <!-- table分け名前列を分離 -->
    <thead>
        <tr>
            <th scope="col" class="text-light bg-dark">商品名</th>
            <th scope="col" class="text-light bg-dark">個数</th>
            <th scope="col" class="text-light bg-dark">値段</th>
        </tr>
    </thead>
    <!-- ループ各セッションの値を呼び出す -->
    <!-- <table class="table table-warning" > -->
    <?php for ($i=0; $i<count ($product_name); $i++) : ?>
        <thead>
            <tbody>
                <tr>
                    <th><?php echo $product_name[$i]; ?></th>
                    <th><?php echo $amount_quantity[$i]; ?></th>
                    <th><?php echo $price[$i]; ?></th>
                </tr>
            </tbody>
        </thead>
<?php endfor; ?>
</table>
<table class="table table-warning" >
<!-- <table class="table"> -->
    <!-- table分け名前列を分離 -->
    <thead>
        <tr>
            <th scope="col" class="text-light bg-dark">合計金額</th>
        </tr>
    </thead>
<?php for ($i=0; $i< 1; $i++) : ?>
        <thead>
            <tbody>
                <tr>
                    <th><?php echo $total_amount; ?></th>
                </tr>
            </tbody>
        </thead>
<?php endfor; ?>
</table>

<!--アクションで完了画面へ -->
<form name ="form1" method="post" action="done.php">
    <span class="text-light bg-dark">商品を確認後追加ボタンを押して下さい</span><br>
    <input type="submit" value="購入する" name="confirm" class="btn btn-primary mb-4">
</form>
</body>
</html>


