<!-- ユーザーIDと紐づくお気に入り商品を表示させる -->
<?php
session_start();

require_once('database1.php');
require_once('favorite_db.php');

// ログインしていない場合
if (empty($_SESSION['user_id'])) {
    // Top画面へ遷移させる
    header('Location: index.php');
    exit;
}


$user_id = $_SESSION['user_id'];

// インスタンス生成
$favorite = new Favorite;

// お気に入り商品IDの配列を取得
$product_id_array = $favorite->getFavoriteProductId($user_id);

// var_dump($product_id_array);
// exit;

// 商品情報の配列を用意
$productRecords = [];

// インスタンス生成
$database = new Database1;

// 商品IDでproductテーブルから検索してレコードを取得する
for ($i=0; $i < count($product_id_array); $i++) {
    $results = $database->getProductByProductId($product_id_array[$i]['product_id']);
    $productRecords[] = $results;
}

function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お気に入り画面</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="img.css">
</head>
<body>
    <!-- ヘッダー・ナビゲーションバーの固定 -->
    <div class='fixed-top'>
        <!-- ヘッダーとナビバーのコンテナここから -->
        <div class="container-fluid">
            <div class="row">
                <header style="background-color: white;">            
                    <h1>BOOK STORE</h1>
                </header>
            </div>
            <!-- navbarのrowここから -->
            <div class="row">
                <!-- navbarここから -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">               
                    <a class="navbar-brand"><h2>お気に入り</h2></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">ホーム</a>
                            </li>                         
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
                                <a class="nav-link" href="describe.php">ご利用方法</a>
                            </li>
                            <li class="nav-item">
                            <!-- 本のリクエストページへ遷移するボタン -->
                                <form action="invitation.php" method="get">
                                    <button type="submit" class="btn btn-info" style="width:140px;">本のリクエストはこちら</button>
                                </form>
                            </li>
                            <li class="nav-item">
                                <button type="button" id="js-btn" class="btn btn-secondary btn-sm" style="width: 45px;">詳細</button>
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
        </div>
        <!-- ヘッダーとナビバーのコンテナここまで -->
    </div>
    <!-- ヘッダー・ナビゲーションバーの固定ここまで -->

    <!-- ヘッダーとナビバーが重ならないようにmargin-topの指定 -->
    <div style="margin-top: 130px;">
        <!-- bootstrap grid  -->
        <div class="container-fluid">
            <div class="row">              
                <!-- cardのbootstrapここから -->
                <div class="row row-cols-1 row-cols-md-6 g-4">
                    <!-- for文でカードを繰り返し表示 -->
                    <?php for ($i=0; $i < count($productRecords); $i++) : ?>
                        <div class="col">
                            <a href="show.php?product_id=<?=$productRecords[$i]['product_id'];?>" class="card h-100">               
                                <img src="<?= $productRecords[$i]['file_path']; ?>" class="card-img-top">
                                <div class="card-body">
                                    <p class="card-text"><?= h($productRecords[$i]['product_name']); ?></p>                       
                                </div>                           
                            </a>  
                        </div>
                    <?php endfor ; ?>                 
                </div>
                <!-- cardのbootstrapここまで -->
            </div>
            <!-- rowここまで -->

        </div>
        <!-- container-fluidここまで -->
    </div>
    <!-- margin-topの指定ここまで -->
    <script src="img.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
