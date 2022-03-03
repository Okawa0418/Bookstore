<?php
require_once('database1.php');
require_once('cart_db.php');
session_start();


// ログインしてない場合
if (empty($_SESSION['user_id'])) {
    // エラーメッセージをセッションへ格納
    $_SESSION['msg'] = 'ログインしてください';
    // signup.phpへリダイレクトする
    header('Location: signup.php');
    exit;
}

// ログインしている場合
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $cart = new Cart;
    // ログインしている人のカート情報を取得
    $results = $cart->getCartByUserId($user_id);
    // カート内が空であった場合
    if (empty($results)) {
        $msg = 'カート内は空です';
    }
}

// 合計金額の初期化
$total_amount = 0;

// 合計金額の計算
for ($i=0; $i<count($results); $i++) {
    $total_amount += $results[$i]['price'] * $results[$i]['quantity'];
}

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
    <link rel="stylesheet" href="modal2.css">
</head>
<body>
<header>
    <a href="index.php"  style="color:inherit;text-decoration: none;"><h1>BOOK STORE</h1></a>
</header>
<h2>商品確認</h2>
<!-- カート内に商品がある（「空です」メッセージが入っていない）場合はtableを表示させる -->
<?php if (empty($msg)) : ?>
    <table class="table table-warning" >
    <!-- <table class="table"> -->
        <!-- table分け名前列を分離 -->
        <thead>
            <tr>
                <th scope="col" class="text-light bg-dark">商品名</th>
                <th scope="col" class="text-light bg-dark">数量</th>
                <th scope="col" class="text-light bg-dark">値段</th>
                <th scope="col" class="text-light bg-dark"></th>
            </tr>
        </thead>
        <!-- ループ各セッションの値を呼び出す -->
        <!-- <table class="table table-warning" > -->
        <?php for ($i=0; $i<count($results); $i++) : ?>
            <tbody>
                <tr>
                    <th><?php echo h($results[$i]['product_name']); ?></th>
                    <th><?php echo h($results[$i]['quantity']);  ?></th>
                    <th><?php echo h($results[$i]['price']);?></th>
                    <!-- 取り消しボタンで該当するカートの商品を削除 -->
                    <th>
                        <form action="cancel.php" method="post">
                            <input type="hidden" name="cart_id" value="<?=$results[$i]['id'];?>">
                            <button type="submit" name="cancel" class="btn btn-secondary">取消</button>
                        </form>
                    </th>
                </tr>
            </tbody>
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
        <tbody>
            <tr>
                <th><?php echo $total_amount; ?>円</th>
            </tr>
        </tbody>
    </table>
    <!--アクションで完了画面へ -->
    <form name ="form1" method="post" action="done.php">
        <span class="text-light bg-dark">商品購入ボタンを押してください</span><br>
        <input type="submit" value="購入する" name="confirm" class="btn btn-outline-danger">
    </form>
    <!--アクションでTop画面へ -->
    <form name ="form1" method="post" action="index.php">
        <span class="text-light bg-dark">他の商品も購入したい方はこちら</span><br>
        <input type="submit" value="買い物を続ける" name="continue" class="btn btn-outline-primary">
    </form>
<!-- カート内が空である（「空です」メッセージが入っている）場合 -->
<?php else : ?>
    <!-- tableでなくメッセージを表示 -->
    <h3><?= $msg; ?></h3>
    <!--アクションでTop画面へ -->
    <form name ="form1" method="post" action="index.php">
        <span class="text-light bg-dark">商品を購入したい方はこちら</span><br>
        <input type="submit" value="買い物を続ける" name="continue" class="btn btn-outline-primary">
    </form>
<?php endif ; ?>



<!-- 商品購入覧へ戻る -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-6">          
                <div class="card alert alert-warning" style="width: 35rem;">
                    <div class="card-body">
                        <h5 class="card-title">商品購入 機能</h5>
                        <h6 class="card-subtitle mb-2 text">基本的な操作だよ</h6>
                        <p class="card-text">商品履歴、検索覧をチェックしてみてくださいね。</p>
                        <!-- <a href="index.php" class="card-link">購入画面一覧へ</a> -->
                        <!-- 新規商品一覧の枠を作成したい -->
                        <!-- <a href="" class="card-link">新規商品一覧へ</a> -->
                        <!-- ボタンの実装 -->
                        <ul class="works_list">
                            <li class="works_item">
                                <div class="works_image">
                                    <div class="works_modal_open" data-modal-open="modal-1">
                                        <p>商品を購入の流れ</p>
                                        <div class="works_image_mask">
                                            <div class="mask_text">クリックで拡大</div>
                                        </div>
                                        <div class="works_modal_wrapper" data-modal="modal-1">
                                            <div class="works_modal_mask"></div>
                                                <div class="works_modal_window">
                                                    <div class="works_modal_content">
                                                        <h1>基本操作</h1>
                                                        <img src="photojp/list.png" width="700" height="200">
                                                        <p>1</p>
                                                        <img src="show.png" width="700" height="200">
                                                        <p>1</p>
                                                    </div>
                                                    <div class="works_modal_close">✖</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li> 
                        </ul>    
                    </div> 
                </div> 
            <div class="col-6">
                <div class="card alert alert-warning" style="width: 35rem;">
                    <div class="card-body">
                    <h5 class="card-title">購入後リクエストシート</h5>
                    <h6 class="card-subtitle mb-2 text">商品購入後にリクエストシートへ行こう</h6>
                    <p class="card-text">好きな本を記入して次回来店時にあなたの好きな本を購入できますよ</p>
                    <!-- ボタンの実装 -->
                    <li class="works_item">
                        <div class="works_image">
                            <div class="works_modal_open" data-modal-open="modal-2">
                                <p>リクエストシートとわ？</p>
                                <div class="works_image_mask">
                                    <div class="mask_text">クリックで拡大</div>
                                </div>
                            </div>
                            <div class="works_modal_wrapper" data-modal="modal-2">
                                <div class="works_modal_mask"></div>
                                    <div class="works_modal_window">
                                        <div class="works_modal_content">
                                            <h1>リクエストシート</h1>
                                            <img src="question.png" width="800" height="200">
                                            <p>あ</p>
                                            <img src="confirm.png" width="700" height="200">
                                            <p></p>
                                        </div>
                                        <div class="works_modal_close">✖</div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </li>
                </div>
            </div>
        </div>         
    </div>
    <!-- <a href="request.php" class="link-info">リクエストシートへ</a> -->
    <!-- 必要な際 -->
    <!-- <a href="#" class="card-link">お問い合わせフォーム</a> -->
    <!-- お問い合わせフォームを作成したい -->
    <h1 class="display-5 fw-bold text-white">Dark mode hero</h1>
        <!-- <p class="fs-5 mb-4">商品にお間違いはありませんか？再度商品確認をしてください。</p> -->
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <!-- お問い合わせフォーム作成時action 先記入 -->
            <form method="post" action="trouble.php">
                <input type="submit" value="質問ボット" name="confirm" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">
            </form>
        </div>
    </div>
    <!-- モーダル -->
    <script src="modal2.js"></script>
</footer>
</body>
</html>


