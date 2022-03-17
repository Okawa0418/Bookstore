<?php
    session_start();
    require_once('database1.php');

    $database = new Database1;
    $results = $database->getAllRecord('payment_credit,product');

    // 商品削除後のメッセージが入っている場合
    if (isset($_SESSION['msg'])) {
        // 変数へ代入
        $msg = $_SESSION['msg'];
        // セッション初期化
        unset($_SESSION['msg']);
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
    <title>商品管理画面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php if (isset($msg)) : ?>
            <p><?=$msg?></p>
        <?php endif ; ?>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">商品名</th>
                    <th scope="col">住所</th>
                    <th scope="col">クレジット番号</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($results); $i++) : ?>
                    <tr>
                        <th><?= $results[$i]['product_name'];?></th>
                        <td><?= h($results[$i]['address']);?></td>
                        <td><?= $results[$i]['cc_number'];?></td>
                        <td>
                            <?php if ($results[$i]['product'] == 1) : ?>
                                
                            <?php elseif ($results[$i]['payment_credit'] == 2) : ?>
                                
                            <?php elseif ($results[$i]['payment_credit'] == 3) : ?>
                                                                     
                            <?php endif ; ?>
                        </td>
                    </tr>
                <?php endfor ; ?>
                