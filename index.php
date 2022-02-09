<?php
    session_start();
    require_once('database1.php');

    $database = new Database1;
    $allProduct = $database->getAllProduct();

    // セッション変数にエラーメッセージが格納されていた場合
    if (isset($_SESSION['msg'])) {
        // 変数へ代入
        $msg = $_SESSION['msg'];
        // エラーメッセージのセッション破棄
        unset($_SESSION['msg']);
    }
    
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧画面</title>
</head>
<body>
    <h1>商品一覧画面</h1>
    <?php if (isset($msg)) : ?>
        <?= $msg; ?>
    <?php endif ; ?>
    <table>
        <tr>
            <th>商品名</th>
            <th>価格</th>
            <th>数量</th>
            <th>購入ボタン</th>
        </tr>
    <!-- foreach文で商品テーブルのレコードを全て表示 -->
    <?php foreach ($allProduct as $result) : ?>
    <!-- 商品一覧の購入フォーム -->
    <form action="index2.php" method="post">
        <tr>
            <!-- 商品名、価格 -->
            <td><?= $result['product_name']; ?></td>
            <td><?= $result['price']; ?></td>
            <td>
            <!-- 数量選択 -->
            <select name="quantity">
                <!-- 0~50を表示させる -->
                <?php for ($i = 0; $i < 51; $i++) : ?>
                    <option><?= $i ?></option>
                 <?php endfor ; ?>
            </select>
            </td>
            <!-- product_idを送る -->
            <input type="hidden" name="product_id" value="<?=$result['product_id'];?>">
            <!-- 購入ボタン -->
            <td><input type="submit" name="buy" value="購入する"></td>
        </tr>
    </form>
    <?php endforeach ; ?>
    </table>
</body>
</html>