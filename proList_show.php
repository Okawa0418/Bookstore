<!-- 商品名、数量選択、かごに追加、購入ボタン表示 -->
<?php
session_start();
require_once('database1.php');

// 送信された商品idを受け取る
if (isset($_POST['product_id'])) {
    // 商品idを変数に代入
    $product_id = $_POST['product_id'];
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
$file_path = $product['file_path'];
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
    <!-- ヘッダー -->
<div class="container-fluid">
    <div class="row">
        <header style="background-color: white;">            
            <a href="manager_index.php"  style="color:inherit;text-decoration: none;">
                <h1>BOOK STORE</h1>
                <h2>Manager</h2>
            </a>
        </header>
    </div>
</div>
<!-- ナビバー -->
<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><h2>商品登録内容</h2></a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="manager_index.php">管理者Top</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="productList.php">商品リスト</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="userList.php">顧客リスト</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="takeform.php">リクエスト一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="include.php">商品追加フォーム</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>    
</div>
<!-- 商品の詳細表示 -->
<div class="container-fluid">  
    <!-- 商品情報カードここから -->
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?=$file_path?>" class="d-block mx-auto" style="width: 192px; height: 300px;" >
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <!-- 商品名 -->
                    <h5 class="card-title"><?= h($name); ?></h5>
                    <!-- 商品ID -->
                    <p class="card-text">商品ID：<br><?= $product_id; ?></p>
                    <!-- 価格 -->
                    <p class="card-text">価格：<br><?= $price; ?>円</p>
                    
                    <!-- カテゴリー表示 -->
                    <p class="card-text">
                        カテゴリー：<br>
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
                    
                    <!-- 削除ボタンを押した後の最終確認（「はい」「いいえ」ボタンの表示） -->
                    <?php if (isset($_POST['delete'])) : ?>
                        <p class="card-text">
                            本当に削除しますか？
                        </p>
                        <p class="card-text">
                            <!-- 「はい」ボタンで商品ID・file_pathを送信する -->
                            <form action="delete_product.php" method="post">
                                <input type="hidden" name="file_path" value="<?=$file_path?>">
                                <input type="hidden" name="product_id" value="<?=$product_id?>">
                                <!-- トークンを送る -->
                                <input type="hidden" name="token" value="<?= $token; ?>">
                                <button type="submit" name="yes" class="btn btn-outline-danger">はい</button>
                            </form>
                        </p>
                        <p class="card-text">
                            <!-- 「いいえ」ボタンで編集・削除ボタンを再表示する -->
                            <form action="proList_show.php" method="post" >
                                <input type="hidden" name="product_id" value="<?=$product_id?>">
                                <button type="submit" name="no" class="btn btn-outline-primary">いいえ</button>
                            </form>
                        </p>
                    <!-- 最初は編集・削除ボタンを表示 -->
                    <?php else : ?>                       
                        <!-- 編集ボタン -->
                        <p class="card-text">
                            <form action="up_product_form.php" method="post">
                                <input type="hidden" name="product_id" value="<?=$product_id?>">
                                <!-- トークンを送る -->
                                <input type="hidden" name="token" value="<?= $token; ?>">
                                <button type="submit" name="update" class="btn btn-outline-dark">編集</button>
                            </form>
                        </p>

                        <!-- 削除ボタン -->
                        <p class="card-text">
                            <form action="proList_show.php" method="post">
                                <input type="hidden" name="product_id" value="<?=$product_id?>">
                                <button type="submit" name="delete" class="btn btn-outline-warning">削除</button>
                            </form>
                        </p>
                    <?php endif ; ?>
                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                </div>
            </div>
        </div>
    </div>
    <!-- カードここまで -->

    <!-- 商品リストへ戻るボタン -->
    <form action="productList.php" type="get">
        <button type="submit" class="btn btn-primary">商品リストへ戻る</button> 
    </form>
</div>
</body>
</html>