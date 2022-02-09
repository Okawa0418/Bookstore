<?php
    session_start();
    require_once('database1.php');

    $database = new Database1;
    $results = $database->getAllProduct();

    // 購入するボタンを押した場合
    if (isset($_POST['buy'])) {
        // priceをkeyとした価格の配列を取得
        $result = $database->getPriceByProductId($_POST['product_id']);
        // 配列の価格のみ取得し変数へ代入
        $price = $result['price'];
        // 合計金額を計算
        $sum = $_POST['quantity'] * $price;
        // 合計金額をセッション変数へ代入
        $_SESSION['sum'] = $sum;
        // 商品のidと数量をセッションで保持する
        $_SESSION['product']['id'] = $_POST['product_id'];
        $_SESSION['product']['quantity'] = $_POST['quantity'];
       
        // ログイン情報がセッションで保持されている場合
        if (isset($_SESSION['id'])) {
            header('Location: confirm.php');
            exit;
        }

        // signup.phpへ遷移
        header('Location: signup.php');
        exit;
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
    <table>
        <tr>
            <th>商品名</th>
            <th>価格</th>
            <th>数量</th>
            <th>購入ボタン</th>
        </tr>
    <!-- 商品一覧の購入フォーム -->
    <form action="index.php" method="post">
    <!-- foreach文で商品テーブルのレコードを全て表示 -->
    <?php foreach ($results as $result) : ?>
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
    <?php endforeach ; ?>
    </form>
    </table>
</body>
</html>