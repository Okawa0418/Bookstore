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


function h($s) {

    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");

}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- bootstrap ｃｓｓ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <!-- モーダル -->
    <link rel="stylesheet" href="img.css">
</head>
<body>
<header>
    <a href="index.php"  style="color:inherit;text-decoration: none;"><h1>BOOK STORE</h1></a>
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
                    <th><?php echo h($product_name[$i]); ?></th>
                    <th><?php echo h($amount_quantity[$i]);  ?></th>
                    <th><?php echo h($price[$i]);?></th>
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
                <div class="card alert alert-warning" style="width: 40rem;">
                    <div class="card-body">
                        <h5 class="card-title">商品購入 機能</h5>
                        <h6 class="card-subtitle mb-2 text">基本的な操作だよ</h6>
                        <p class="card-text">商品履歴、検索覧をチェックしてみてくださいね。</p>
                        <!-- <a href="index.php" class="card-link">購入画面一覧へ</a> -->
                        <!-- 新規商品一覧の枠を作成したい -->
                        <!-- <a href="" class="card-link">新規商品一覧へ</a> -->
                        <!-- ボタンの実装 -->
                        <button type="button" class="btn btn-dark" id="js-btn">詳細を見る </button>
                        <a href="index.php" class="link-info">商品購入ページへ戻る</a>
                        <div class="modal" id="js-modal">
                            <div class="modal-inner">
                                <!-- closeボタン -->
                                <div class="modal-close" id="js-close-btn"></div>
                                <!-- id -->
                                <div class="modal-contents" id="js-modal-content">
                                    （1）購入後に購入履歴にてお客様が購入した商品を確認する事ができます。（2)ワード検索が可能です。（3）商品一覧の商品はお客様がリクエストした商品も反映されます。（リクエストの詳細はこちらのページにて確認できます)
                                    <!-- 自分の保存データ挿入したい　スクリーンショットしたリクエストページ -->
                                    <img src="confirm.png" width="450" height="450">
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card alert alert-warning" style="width: 40rem;">
                    <div class="card-body">
                    <h5 class="card-title">リクエストシート</h5>
                    <h6 class="card-subtitle mb-2 text">あなたの好きな本が次回購入できるかも</h6>
                    <p class="card-text">好きな本を記入して次回来店時にあなたの好きな本を購入しましょう</p>
                    <button type="button" class="btn btn btn-dark" id="js-btn">詳細を見る </button>
                        <!-- ボタンの実装 -->
                        <div class="modal" id="js-modal">
                            <div class="modal-inner">
                                <!-- closeボタン -->
                                <div class="modal-close" id="js-close-btn"></div>
                                <!-- id -->
                                <div class="modal-contents" id="js-modal-content">
                                    リクエストシートとわ
                                    お客様が購入したい本を記入していただくリクエストコーナーです。1）メールアドレス、名前を記入した後本のタイトルを記入してください。2）入荷時の連絡を希望される方は選択覧に必要ボタンを押してください。以下の情報がお間違いのないよう確認した後送信ボタンを押してください。
                                    <!-- 自分の保存データ挿入したい　スクリーンショットしたリクエストページ -->
                                    <img src="question.png" width="400" height="400">
                                </div>
                            </div>
                        </div> 
                    <a href="request.php" class="link-info">リクエストシートへ</a>
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
            <!-- お問い合わせフォーム作成時action 先記入 -->
            <form method="post" action="customerformadd.php">
                <input type="submit" value="お問い合わせ" name="confirm" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">
            </form>
        </div>
    </div>
    <!-- モーダル -->
    <script src="img.js"></script>
</footer>
</body>
</html>


