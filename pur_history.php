<?php
require_once('purchase_db.php');
session_start();
// 購入履歴をデータベースから取得する
// purchaseテーブルからログインしているユーザーidで検索して、取得する
$user_id = $_SESSION['user_id'];
$purchase = new Purchase;
$results = $purchase->getPurHistory($user_id);

if ($results == false) {
    $msg = '履歴なし';
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購入履歴</title>
</head>
<body>
    <header>
        <h1>BOOK STORE</h1>
    </header>
    <h2>購入履歴</h2>
    <table>
        <thead>
            <tr>
                <th>日時</th>
                <th>購入商品</th>
                <th>数量</th>
            </tr>
        </thead>
        <tbody>
            <!-- 購入履歴をfor文で表示 -->
            <?php for ($i=0; $i<count($results); $i++) : ?>
                <tr>
                    <td><?= $results[$i]['pur_time']; ?></td>
                    <td><?=$results[$i]['item_name'];?></td>
                    <td><?=$results[$i]['quantity'];?></td>
                </tr>
            <?php endfor ; ?>
        </tbody>
    </table>
    
</body>
</html>