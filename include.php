<?php
session_start();
require_once('newbook_db.php');

// 検索ボタンが押されるor送信後バリデーションに引っかかる場合
// idの検索ボタンが押された場合
if (isset($_POST['searchid'])) {
    // 送信された値を変数へ代入
    $id = $_POST['id'];
    // 送信された値のidでnewbookテーブルから検索
    // 商品名を取得して変数へ代入する
    $newbook = new NewBook;
    $result = $newbook->getNameById($id);
    // 検索して一致するidがなかった場合
    if ($result == false) {
        $_SESSION['msg'] = 'idに該当する商品がありません';
        header('Location: searchid.php');
        exit;
    // 該当商品があった場合
    } else {
        // 検索結果の商品名を変数へ代入
        $product_name = $result['product_name'];
    }
// 送信後のバリデーションに引っかかった場合
} elseif (isset($_SESSION['msg'])){
    // 変数に代入
    $msg = $_SESSION['msg'];
    // エラーメッセージのセッション破棄
    unset($_SESSION['msg']);
    // $product_nameの初期化
    $product_name = "";
} else {
    // $product_nameの初期化
    $product_name = "";
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品追加画面</title>
     <!-- bootstrap ｃｓｓ -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
</head>
<body>
    <div class="container-fluid">
        <header>
            <a href="manager_index.php"  style="color:inherit;text-decoration: none;">
                <h1>BOOK STORE</h1>
                <h2>Manager</h2>
            </a>
        </header>
    </div>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><h2>商品追加</h2></a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="manager_index.php">管理者Top</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="searchid.php">商品ID検索</a>
                    </li>
                </ul>
            </div>
        </nav>    
    </div>
    <div class="container-fluid">
        <!-- エラーメッセージ表示 -->
        <?php if (isset($msg)) : ?>
            <?php foreach ($msg as $m) : ?>
                <p><?= $m; ?></p>
            <?php endforeach ; ?>
        <?php endif ; ?>

        <!-- フォームで追加商品情報をvalidate.phpへ送信 -->
        <form enctype="multipart/form-data" action="view.php" method="post">
            <div class="mb-3">
                <label for="InputName" class="form-label">商品名</label>
                <input type="text" class="form-control" id="InputName" name="name" value="<?= $product_name; ?>" aria-describedby="nameHelp">
                <div id="nameHelp" class="form-text">追加したい商品の名前を入力してください</div>
            </div>
            <div class="mb-3">
                <label for="InputPrice" class="form-label">価格（円）</label>
                <input type="number" class="form-control" id="InputPrice" name="price" min="0" max="100000" value="" aria-describedby="priceHelp">
                <div id="priceHelp" class="form-text">追加したい商品の単価を数字で入力してください</div>
            </div>
            <div class="mb-3">
                <label for="InputImg" class="form-label">画像</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                <input type="file" class="form-control" id="InputImg" name="img" accept="images/*" aria-describedby="imgHelp">
                <div id="imgHelp" class="form-text">追加したい商品の画像を選択してください</div>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">カテゴリーを選択してください:</label>
                <select name="category" value="" class="form-select" id="category" aria-describedby="categoryHelp">
                    <option value="">カテゴリーを選択</option>
                    <option value="1">文学・評論・人文・思想</option>
                    <option value="2">ビジネス・コンピュータ</option>
                    <option value="3">生活・趣味・実用</option>
                    <option value="4">教育・資格</option>
                </select>
                <div id="categoryHelp" class="form-text">追加したい商品のカテゴリーを選択してください</div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">追加する</button>
        </form>
        <a href="searchid.php">商品ID検索画面へ戻る</a>
    <div class="container-fluid">
</body>
</html>
 