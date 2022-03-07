<!-- 商品名、数量選択、かごに追加、購入ボタン表示 -->
<?php
session_start();
require_once('database1.php');
require_once('favorite_db.php');

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
$product_name = $product['product_name'];
$price = $product['price'];
$file_path =$product['file_path'];
$category = $product['category'];

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

// ログインしている場合はお気に入りテーブルから該当する商品があるか判定
// ログインIDと商品IDが一致するものがあるかどうか
// なければ$resultにfalseをいれる
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $favorite = new Favorite;
    $result = $favorite->judgeFavorite($user_id, $product_id);
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
    <!-- navbarのrowここから -->
    <div class="row">
        <!-- navbarここから -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">               
            <a class="navbar-brand"><h2>商品詳細</h2></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">ホーム</a>
                    </li>
                    <!-- ログイン情報がセッションで保持されている場合 -->
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">ログアウト</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pur_history.php">購入履歴</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="confirm.php">カートを見る</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="favorite_list.php">お気に入り</a>
                        </li>
                    <!-- ログイン情報がない場合 -->
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login_form.php">ログイン</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">新規会員登録</a>
                        </li>
                    <?php endif ; ?>

                    <li class="nav-item">
                        <a class="nav-link" href="describe.php">ご利用方法</a>
                    </li>
                    <li class="nav-item">
                    <!-- 本のリクエストページへ遷移するボタン -->
                        <form action="request.php" method="get">
                            <button type="submit" class="btn btn-info">本のリクエストはこちら</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <button type="button" id="js-btn" class="btn btn-secondary">詳細</button>
                        <!-- 詳細ボタン押した後の表示内容 -->
                        <div class="modal" id="js-modal">
                            <div class="modal-inner">
                                <!-- closeボタン -->
                                <div class="modal-close" id="js-close-btn">✖</div>
                                <!-- id -->
                                <div class="modal-contents" id="js-modal-content">
                                    <p>
                                        リクエストシートとは<br>
                                        お客様が購入したい本を記入していただくリクエストコーナーです。<br>
                                        1）メールアドレス、名前を記入した後本のタイトルを記入してください。<br>
                                        2）入荷時の連絡を希望される方は「必要」を選択ください。<br>
                                        3）記入された情報がお間違いのないよう確認した後送信ボタンを押してください。
                                    </p>
                                    <!-- 自分の保存データ挿入したい　スクリーンショットしたリクエストページ -->
                                    <img src="">
                                </div>
                            </div>
                        </div> 
                    </li>
                </ul>
            </div>                  
        </nav>
        <!-- navbarここまで -->
    </div>
    <!-- navbarのrowここまで -->
    <!-- エラーメッセージの表示 -->
    <?php if (isset($msg)) : ?>
        <p><?= $msg; ?></p>
    <?php endif ; ?>

    <!-- 商品情報 -->
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?=$file_path?>" style="width: 256px; height: 400px;" >
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <!-- 商品名 -->
                    <h5 class="card-title"><?= h($product_name); ?></h5>
                    <!-- カテゴリー -->
                    <p class="card-text">
                        カテゴリー：
                        <?php if ($category == 1) : ?>
                            文学・評論・人文・思想
                        <?php elseif ($category == 2) : ?>
                            ビジネス・コンピュータ
                        <?php elseif ($category == 3) : ?>
                            生活・趣味・実用
                        <?php else : ?>
                            教育・資格
                        <?php endif ; ?>
                    </p>
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
                        <input type="hidden" name="product_name" value="<?= $product_name; ?>">
                        <!-- 商品価格を送信 -->
                        <input type="hidden" name="price" value="<?= $price; ?>">
                        <!-- トークンを送る -->
                        <input type="hidden" name="token" value="<?= $token; ?>">
                        <!-- カートに追加ボタンでadd_cart.phpへ送信 -->
                        <button type="submit" class="btn btn-outline-danger">カートに追加</button> 
                    </form>
                    <!-- 数量選択フォーム終了 -->

                    <!-- お気に入りボタン開始（ボタンは場合分け） -->
                    <p class="card-text">
                        <!--ログインしていない場合 -->
                        <?php if (empty($_SESSION['user_id'])) : ?>
                            <!-- ボタンを押したらログイン画面へ遷移させ、ログイン後戻ってくる -->
                            <form action="login_form.php" method="post">
                                <input type="hidden" name="product_id" value="<?=$product_id?>">
                                <button type="submit" name="favorite" class="btn btn-outline-success">お気に入りに追加する</button>
                            </form>
                        <!--  ログイン状態でお気に入りに入っていない場合 -->
                        <?php elseif ($result == false) : ?>
                            <form action="favorite.php" method="post">
                                <!-- トークンを送る -->
                                <input type="hidden" name="token" value="<?= $token; ?>">
                                <input type="hidden" name="product_id" value="<?=$product_id?>">
                                <button type="submit" name="add_favorite"class="btn btn-outline-success">お気に入りに追加</button>
                            </form>
                        <!-- ログイン状態でお気に入りに入っている場合 -->
                        <?php else : ?>
                            <form action="favorite.php" method="post">
                                <!-- トークンを送る -->
                                <input type="hidden" name="token" value="<?= $token; ?>">
                                <input type="hidden" name="product_id" value="<?=$product_id?>">
                                <button type="submit" name="delete_favorite" class="btn btn-secondary btn-sm">お気に入り取消</button>
                            </form>
                        <?php endif ; ?>
                    </p>
                    <!-- お気に入りボタン終了 -->

                    <p class="card-text"><small class="text-muted">↑気になる商品はお気に入りへ追加しましょう</small></p>
                </div>
            </div>
        </div>
    </div>
    <!-- 戻るボタン -->
    <form action="index.php" type="get">
        <button type="submit" class="btn btn-primary">Topへ戻る</button> 
    </form>
</div>
</body>
</html>