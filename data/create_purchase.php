<?php

require_once('../database1.php');

$data = new Database1;
// データベースに接続
$dbh = $data->dbConnect();

// まず商品名の配列を作成する
$sql = "SELECT product_name FROM product";
$stmt = $dbh->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 商品名の配列を準備
$product_names = [];

// for文で商品名の配列を作成
for ($i=0; $i < count($products); $i++) {
    $product_names[] = $products[$i]['product_name'];
}

// 購入履歴にテストデータをインサートしていく

$sql = "INSERT INTO purchase (item_name, code_product, quantity, user_id, payment, pay_id)";