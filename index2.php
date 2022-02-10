<?php
// 購入ボタンを押した後の処理

session_start();
require_once('database1.php');

// 購入するボタンを押した場合
if (isset($_POST['buy'])) {
    // 数量の合計
    $sum = array_sum($_POST['quantity']);

    // バリデーション
    // 購入の数量合計が0の場合
    if ($sum === 0) {
        // エラーメッセージをセッションに格納
        $_SESSION['msg'] = '商品を選択してください。';
        // 商品一覧に戻る
        header('Location: index.php');
        exit;
    }

    // 商品が選択された場合 

    // 合計金額の計算の準備
    // 商品の金額をキーとした数量の配列を作成
    $price_quantities = array_combine($_POST['price'], $_POST['quantity']);
    
    // 合計金額の計算
    $total_amount = 0;
    foreach ($price_quantities as $price => $quantity) {
        $total_amount += $price * $quantity; 
    }

    // 商品のidと数量をセッションで保持する
    // 商品idの配列
    $_SESSION['product']['id'] = $_POST['product_id'];
    // 商品数量の配列
    $_SESSION['product']['quantity'] = $_POST['quantity'];
    // 商品各々の金額の配列
    $_SESSION['product']['price'] = $_POST['price'];
    // 合計金額
    $_SESSION['product']['total_amount'] = $total_amount;

    // ログイン情報がセッションで保持されている場合
    if (isset($_SESSION['user_id'])) {
        // 商品確認画面へ遷移
        header('Location: confirm.php');
        exit;
    }

    // ログインしていない場合はsignup.phpへ遷移
    header('Location: signup.php');
    exit;

}