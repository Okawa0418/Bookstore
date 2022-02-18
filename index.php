<?php
    session_start();
    require_once('database1.php');

    
    $database = new Database1;

    // 1ページに5件表示させる
    define('max_view',5);

    //現在いるページのページ番号を取得
    if(!isset($_GET['page_id'])){
        // page_idに値がない場合（初めてこのページを開く場合）
        $now = 1;
    }else{
        // page_idに値が入っている場合
        $now = $_GET['page_id'];
    }

    // 表示必要な商品レコードを取得
    $allProduct = $database->getProductByPages($now);

    // 必要ページ数の取得
    $pages = $database->numberOfPages();


    // productテーブルから全ての商品を取得
    // $allProduct = $database->getAllRecord('product');

    // categoryテーブルから全レコード取得
    $allCategory = $database->getAllRecord('category');
    
    // セッション変数にエラーメッセージが格納されていた場合
    if (isset($_SESSION['msg'])) {
        // 変数へ代入
        $msg = $_SESSION['msg'];
        // エラーメッセージのセッション破棄
        unset($_SESSION['msg']);
    }

    // 検索欄に値が入って送信された場合
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        // 検索結果の配列array(2) { [0]=> array(2) { ["product_name"]=> string(18) "星の王子さま" ["price"]=> int(528) } [1]=> array(2) { ["product_name"]=> string(150) "あつまれ どうぶつの森 & ハッピーホームパラダイス・大型アップデート全対応 最終完全攻略本+究極超カタログ" ["price"]=> int(1980) } }
        $allProduct = $database->searchProduct($search);
    }

    // カテゴリー別を押したときの処理
    if (isset($_POST['category'])) {
        // ctg_idを受け取る
        $ctg_id = $_POST['category'];
        // productテーブルからcategoryが$ctg_idであるものを取得する
        $allProduct = $database->getProductByCtgId($ctg_id);
    }

    // 疑似ランダムなバイト文字列を生成
    $toke_byte = random_bytes(32);
    // バイナリデータを16進数に変換
    $token = bin2hex($toke_byte);
    // 生成したトークンをセッションに保存
    $_SESSION['token'] = $token;
  
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧画面</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <header>
        <h1>BOOK STORE</h1>
    </header>
    <!-- navbarここから -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand"><h2>商品一覧</h2></a>
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
                <!-- ログイン情報がない場合 -->
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login_form.php">ログイン</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">新規会員登録</a>
                    </li>
                <?php endif ; ?>
                
                <!-- カテゴリーのドロップダウンメニュー -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        カテゴリー
                    </a>
                    <!-- ドロップダウンの中身 -->
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <!-- カテゴリーをfor文で表示していく -->
                    <?php for ($i=0; $i<count($allCategory); $i++) : ?>
                        <!-- カテゴリー別にフォームを送信する -->
                        <form action="index.php" method="post">
                            <input type="hidden" name="category" value="<?=$allCategory[$i]['ctg_id']?>">
                            <li><button class="dropdown-item" type="submit"><?=$allCategory[$i]['variation']?></li>
                        </form>
                    <?php endfor ; ?>
                    </ul>
                </li>
            </ul>
            <!-- 検索フォーム -->
            <form class="d-flex" action="index.php" method="post">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <!-- 検索フォームここまで -->
            </div>
        </div>
    </nav>
    <!-- navbarここまで -->

    <!-- エラーメッセージの表示 -->
    <?php if (isset($msg)) : ?>
        <p>&#x26a0;<?= $msg; ?></p>
    <?php endif ; ?>
   
    <!-- bootstrap grid  -->
    <div class="container">
        <div class="row">
            <div class="col-8">
                <!-- 商品一覧の購入フォーム -->
                <form action="index2.php" method="post">
                    <!-- tableのレスポンシブクラスここから -->
                    <div class="table-responsive">
                        <!-- tableタグで商品一覧を表示 -->
                        <table class="table align-middle">
                            <!-- 項目 -->
                            <thead>
                            <tr>
                                <th>商品画像</th>
                                <th>商品名</th>
                                <th>価格</th>
                                <th>数量</th>
                                <th><!-- 購入ボタン -->
                                <button type="submit" class="btn btn-outline-secondary">購入する</button>
                                </th>
                            </tr>
                            </thead>
                            <!-- 商品名、価格、数量選択欄の表示 -->
                            <tbody>
                            <tr>
                                <!-- for文で商品テーブルのレコードを全て表示 -->
                                <?php for ($i=0; $i < count($allProduct); $i++) : ?>
                                <tr>
                                    <!-- 商品画像 -->
                                    <td><img src="<?= $allProduct[$i]['file_path']; ?>"width="100" height="150"></td>
                                    <!-- 商品名、価格 -->
                                    <td><?= $allProduct[$i]['product_name']; ?></td>
                                    <td><?= $allProduct[$i]['price']; ?></td>
                                    <td>
                                    <!-- 数量選択 -->
                                    <select id="select" name="quantity[<?= $i; ?>]">
                                        <!-- 0~50を表示させる -->
                                        <?php for ($j = 0; $j < 51; $j++) : ?>
                                            <option><?= $j ?></option>
                                        <?php endfor ; ?>
                                    </select>
                                    </td>
                                    <!-- product_idを送る -->
                                    <input type="hidden" name="product_id[<?= $i; ?>]" value="<?=$allProduct[$i]['product_id'];?>">
                                    <!-- 商品名を送る -->
                                    <input type="hidden" name="product_name[<?= $i; ?>]" value="<?=$allProduct[$i]['product_name'];?>">
                                    <!-- 金額送る -->
                                    <input type="hidden" name="price[<?= $i; ?>]" value="<?=$allProduct[$i]['price'];?>">
                                </tr>
                                <?php endfor ; ?>
                                <!-- トークンを送る -->
                                <input type="hidden" name="token" value="<?=$token?>">  
                            </tbody>
                        </table>
                        <!-- 商品一覧tableここまで -->
                    </div>
                    <!-- tableのレスポンシブクラスここまで -->
                </form>
                <!-- 購入フォームここまで -->
                <!-- ページネーション表示ここから -->
                <!-- 検索・カテゴリー別を押した場合はページネーションを表示させない -->
                <?php if (!isset($_POST['search']) && !isset($_POST['category'])) : ?>
                    <!-- ページネーションを表示 -->
                    <?php for ($i=1; $i <= $pages; $i++) : ?>
                        <?php if ($i == $now) : ?>
                            <span style='padding: 5px;'><?= $now; ?></span>
                        <?php else : ?>
                            <a href="index.php?page_id=<?= $i; ?>" style="padding: 5px;"><?= $i; ?></a>
                        <?php endif ; ?>
                    <?php endfor ; ?>
                <?php endif ; ?>
                <!-- ページネーション表示ここまで -->
            </div>
            <!-- col-8ここまで -->



            <!-- bootstrap API 実装 -->
            <div class="col-4">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">商品カート</span>
                        <span class="badge bg-primary rounded-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">商品</h6>
                                <small class="text-muted">本の概要</small>
                            </div>
                            <span class="text-muted">380円</span>
                        </li>
                    </ul>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <button type="submit" class="btn btn-secondary">今すぐ購入</button>
                        <img src="https://c.pxhere.com/photos/fe/bd/blur_close_up_handwriting_letters_old_photo_papers_photos_string-1527595.jpg!d" class="rounded mx-auto d-block" width="400" height="400" >  
                    </div>
                </div>
                <li style="list-style: none;"><a href="request.php">本のリクエストはこちら</a></li>
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <li style="list-style: none;"><a href="quit.php">退会</a></li>
                <?php endif ; ?>
            </div>
            <!-- col-4ここまで -->


        </div>
        <!-- rowここまで -->
    </div>
    <!-- containerここまで -->
    
    <script type="text/javascript" src="sample.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
