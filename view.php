<?php
require_once('database1.php');
// 送信された値のバリデーション
require_once('validate.php');
// 画像の保存
if (move_uploaded_file($tmp_path, $upload_dir . $save_filename)) {
    $file_path = $upload_dir . $save_filename;
}

$database = new Database1;
// productテーブルにデータを挿入
$database->createProduct();

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