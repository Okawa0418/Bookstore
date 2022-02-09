<?php
// 購入ボタンを押した後の処理

session_start();
require_once('database1.php');

// 購入するボタンを押した場合
if (isset($_POST['buy'])) {
    // 商品のidと数量をセッションで保持する
    $_SESSION['product']['id'] = $_POST['product_id'];
    $_SESSION['product']['quantity'] = $_POST['quantity'];

    // バリデーション
    // 購入の数量が0の場合
    if ($_SESSION['product']['quantity'] == 0) {
        // 商品のセッションを破棄
        unset($_SESSION['product']);
        // エラーメッセージをセッションに格納
        $_SESSION['msg'] = '商品を選択してください。';
        header('Location: index.php');
        exit;
    } else {
        // 商品が選択された場合 
        // エラーメッセージを破棄
        unset($_SESSION['msg']);
        // 特定の商品レコードを取得
        $database = new Database1;
        $result = $database->getProductByProductId($_POST['product_id']);
        // 配列の価格のみ取得し変数へ代入
        $price = $result['price'];
        // 合計金額を計算
        $sum = $_POST['quantity'] * $price;
        // 合計金額をセッション変数へ代入
        $_SESSION['sum'] = $sum;
       
        // ログイン情報がセッションで保持されている場合
        if (isset($_SESSION['user_id'])) {
            header('Location: confirm.php');
            exit;
        }

        // signup.phpへ遷移
        header('Location: signup.php');
        exit;

    }
    
}