<?php
    session_start();
    require_once('database1.php');
    // テーブル２か所から値を取得
    $database = new Database1;
    $results = $database->getAllRecord('payment_credit,product');

    // 商品削除後のメッセージが入っている場合
    if (isset($_SESSION['msg'])) {
        // 変数へ代入
        $msg = $_SESSION['msg'];
        // セッション初期化
        unset($_SESSION['msg']);
    }
    
    // function h($s) {
    //     return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
    // }
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
<!-- 商品別のユーザー属性(送り先)取得ー　（商品、住所、クレジット番号） -->
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
                    <td><?= $results[$i]['address'];?></td>
                    <td><?= $results[$i]['cc_number'];?></td>
                    <td>
                        <?php if ($results[$i]['product']) : ?>      
                        <?php elseif ($results[$i]['payment_credit']) : ?>                            
                        <?php elseif ($results[$i]['payment_credit']) : ?>                                                                    
                        <?php endif ; ?>
                    </td>
                </tr>
            <?php endfor ; ?>
        </tbody>
    </table>  
</body>
<!-- 売上計算表 -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php計算表</title>
</head>
<body>
    <h1>計算結果表</h1>
    <table border="1">
        <tr>
            <th>学生番号</th><th>社会</th><th>理科</th>
        </tr>
        <tr>
            <td>1</td><td>58</td><td>68</td>
        </tr>
        <tr>
            <td>2</td><td>45</td><td>56</td>
        </tr>
        <tr>
            <td>3</td><td>41</td><td>45</td>
        </tr>
        <tr>
            <td>4</td><td>54</td><td>15</td>
        </tr>
        <tr>
            <td>5</td><td>46</td><td>87</td>
        </tr>
    </table>
</body>
</html>
                