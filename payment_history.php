<?php
require_once('database1.php');
require_once('payment_credit_db.php');
require_once('payment_bank_db.php');
session_start();
// 購入履歴をデータベース（creditとbankテーブル）から取得する

// user_idを変数へ代入
$user_id = $_SESSION['user_id'];
// creditテーブルからログインしているユーザーidで検索して、レコード取得する
$credit = new PaymentCredit;
$c_results = $credit->getCreditByUserId($user_id);

if ($c_results == false) {
    $msg = '履歴なし';
}

// bankテーブルからログインしているユーザーIDで検索してレコードを取得する
$bank = new PaymentBank;
$b_results = $bank->getBankByUserId($user_id);

if ($b_results == false) {
    $msg2 = '履歴なし';
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
<div class="container-fluid">
    <div class="row">
        <header>
            <a href="index.php"  style="color:inherit;text-decoration: none;">
            <h1>BOOK STORE</h1></a>
        </header>
    </div>
    <div class="row">
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
                            <a class="nav-link active" aria-current="page" href="pur_history.php">商品別</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navbarここまで -->
    </div>
    <div class="row">
        <div class="col-6">
            <h3 class="mt-3">クレジットカード</h3>
             <!-- msgに値がある場合 -->
             <?php if (isset($msg)) : ?>
                <p>履歴なし</p>
            <?php else : ?>
                <div class="table-responsive">
                <table  class="table align-middle">
                    <thead>
                        <tr>
                            <th>日時</th>
                            <th>請求先氏名</th>
                            <th>請求先住所</th>
                            <th>お支払額(円)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- 購入履歴をfor文で表示 -->
                        <?php for ($i=0; $i<count($c_results); $i++) : ?>
                            <tr>
                                <td><?= $c_results[$i]['pay_time']; ?></td>
                                <td><?=h($c_results[$i]['name']);?></td>
                                <td><?=$c_results[$i]['address'];?></td>
                                <td><?=$c_results[$i]['total_amount'];?></td>
                            </tr>
                        <?php endfor ; ?>
                    </tbody>
                </table>
                </div>
            <?php endif ; ?>
        </div>
        <div class="col-6">
            <h3 class="mt-3">銀行口座</h3>
            <!-- msg2に値がある場合 -->
            <?php if (isset($msg2)) : ?>
                <p>履歴なし</p>
            <?php else : ?>
                <div class="table-responsive">
                    <table  class="table align-middle">
                        <thead>
                            <tr>
                                <th>日時</th>
                                <th>請求先氏名</th>
                                <th>請求先住所</th>
                                <th>お支払額(円)</th>
                            </tr>
                        </thead>
                        <tbody>                  
                            <!-- 購入履歴をfor文で表示 -->
                            <?php for ($i=0; $i<count($b_results); $i++) : ?>
                                <tr>
                                    <td><?= $b_results[$i]['pay_time']; ?></td>
                                    <td><?=h($b_results[$i]['name']);?></td>
                                    <td><?=$b_results[$i]['address'];?></td>
                                    <td><?=$b_results[$i]['total_amount'];?></td>
                                </tr>
                            <?php endfor ; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif ; ?>
        </div>
    </div>
</div>
</body>
</html>