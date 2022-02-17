<?php
require_once('database1.php');
// 送信された値のバリデーション
require_once('validate.php');
// 送信された値を変数へ代入
$name = $_POST['name'];
$price = $_POST['price'];
$category = $_POST['category'];
// 画像の保存
if (move_uploaded_file($tmp_path, $upload_dir . $save_filename)) {
    $file_path = $upload_dir . $save_filename;
}

$database = new Database1;
// productテーブルにデータを挿入
$database->createProduct($name, $price, $file_path, $category);

// 挿入した商品のreceiveが1(連絡が必要)なら、emailに連絡する処理？？

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品追加完了画面</title>
</head>
<body>
    <h1>商品追加完了</h1>
    <h2>商品を追加しました。</h2>
    <a href="searchid.php">リクエスト一覧へ戻る</a>
</body>
</html>