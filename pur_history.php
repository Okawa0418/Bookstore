<?php
require_once('database1.php');
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
    <title>購入履歴</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <header>
        <a href="index.php"  style="color:inherit;text-decoration: none;">
        <h1>BOOK STORE</h1></a>
    </header>
    <!-- navbarここから -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand"><h2>購入履歴</h2></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">ホーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="payment_history.php">お支払別</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbarここまで -->

    <div class="table-responsive">
    <table  class="table align-middle">
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
                    <td><?=h($results[$i]['item_name']);?></td>
                    <td><?=$results[$i]['quantity'];?></td>
                </tr>
            <?php endfor ; ?>
        </tbody>
    </table>
    </div>
</body>
</html>