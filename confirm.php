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
    <span class="text-light bg-dark">商品購入ボタンを押してください</span><br>
    <input type="submit" value="購入する" name="confirm" class="btn btn-outline-danger">
</form>
<!-- 商品購入覧へ戻る -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-6">          
                <div class="card" style="width: 40rem;">
                    <div class="card-body">
                        <h5 class="card-title">新規商品</h5>
                        <h6 class="card-subtitle mb-2 text-muted">あつまれどうぶつの森完全攻略</h6>
                        <p class="card-text">新コンテンツ アイテム どうぶつ イベント 施設 情報満載</p>
                        <a href="index.php" class="card-link">購入画面一覧へ</a>
                        <!-- 新規商品一覧の枠を作成したい -->
                        <a href="" class="card-link">新規商品一覧へ</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card" style="width: 40rem;">
                    <div class="card-body">
                    <h5 class="card-title">アンケートシート</h5>
                    <h6 class="card-subtitle mb-2 text-muted">あなたの好きな本が次回購入できるかも</h6>
                    <p class="card-text">好きな本を記入して次回来店時にあなたの好きな本を購入しましょう</p>
                    <a href="#" class="card-link">アンケートへ</a>
                    <!-- 必要な際 -->
                    <!-- <a href="#" class="card-link">お問い合わせフォーム</a> -->
                </div>
            </div>
        </div>
    </div>
    
    <!-- お問い合わせフォームを作成したい -->
    <h1 class="display-5 fw-bold text-white">Dark mode hero</h1>
                    <!-- <p class="fs-5 mb-4">商品にお間違いはありませんか？再度商品確認をしてください。</p> -->
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <form method="post" action="index.php">
                            <input type="submit" value="商品購入ページへ戻る" name="confirm" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">
                        </form>
                        <!-- お問い合わせフォーム作成時action 先記入 -->
                        <form method="post" action="index.php">
                            <input type="submit" value="お問い合わせフォームへ" name="confirm" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">
                        </form>
                    </div>
                </div>
</footer>
</body>
</html>


