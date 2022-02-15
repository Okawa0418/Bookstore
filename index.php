<?php
    session_start();
    require_once('database1.php');

    // productテーブルから全ての商品を取得
    $database = new Database1;
    $allProduct = $database->getAllRecord('product');

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
    <!-- エラーメッセージの表示 -->
    <?php if (isset($msg)) : ?>
        <p>&#x26a0;<?= $msg; ?></p>
    <?php endif ; ?>

    <!-- 商品一覧の購入フォーム -->
    <form action="index2.php" method="post">
    <div class="table-responsive">
    <!-- tableタグで商品一覧を表示 -->
    <table class="table align-middle">
        <!-- 項目 -->
        <thead>
        <tr>
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
                <!-- 商品名、価格 -->
                <td><?= $allProduct[$i]['product_name']; ?></td>
                <td><?= $allProduct[$i]['price']; ?></td>
                <td>
                <!-- 数量選択 -->
                <select name="quantity[<?= $i; ?>]">
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
    </div>
    </form>
    <!-- 購入フォームここまで -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>