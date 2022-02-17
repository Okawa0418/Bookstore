<?php
session_start();
require_once('function.php');

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
</head>
<body>
    <h1>商品追加画面</h1>
    <div style="font-size:14px">新規本を追加してください</div>
    <!-- エラーメッセージ表示 -->
    <?php if (isset($msg)) : ?>
        <?php foreach ($msg as $m) : ?>
            <p><?= $m; ?></p>
        <?php endforeach ; ?>
    <?php endif ; ?>
    <!-- フォームで追加商品情報をvalidate.phpへ送信 -->
    <form enctype="multipart/form-data" action="view.php" method="post">
        <label>
            商品名:<br>
            <input type="text" name="name" value="<?= $product_name; ?>">
        </label>
        <br>
        <label>
            値段を記入してください:<br>
            <input type="number" name="price" min="0" max="100000" value="">
        </label>
        <br>
        <label>
            画像を選択してください:<br>
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
            <input type="file" name="img" accept="images/*">
        </label>
        <br>
        <label>
            カテゴリーを選択してください:<br>
            <select name="category">
                <option value="">カテゴリーを選択</option>
                <option value="1">文学・評論・人文・思想</option>
                <option value="2">ビジネス・コンピュータ</option>
                <option value="3">生活・趣味・実用</option>
                <option value="4">教育・資格</option>
            </select>
        </label>
        <br>
        <input type="submit" name="submit" value="発注">
    </form>
    <a href="searchid.php">戻る</a>
</body>
</html>
 