<?php
    session_start();
    require_once('database1.php');
    require_once('cart_db.php');
    require_once('purchase_db.php');
    require_once('payment_credit_db.php');
    require_once('payment_bank_db.php');

    unset($_SESSION['category1']);
    unset($_SESSION['category2']);
    unset($_SESSION['category3']);
    unset($_SESSION['category4']);

    // ログインしていない場合
    if (empty($_SESSION['user_id'])) {
        // 商品一覧画面へリダイレクト
        header('Location: index.php');
        exit;
    }
    
    // user_idを変数へ代入
    $user_id = $_SESSION['user_id'];
    $cart = new Cart;
    // ログインしている人のカート情報を取得
    $results = $cart->getCartByUserId($user_id);

    // カート内が空であった場合（不正遷移）
    if (empty($results)) {
        echo '不正アクセスです';
        exit;
    }

    // クレジットカード決済だった場合
    if ($_SESSION['payment'] == 1) {
        $payment = 1;
        // セッション破棄
        unset($_SESSION['payment']);
        // クレジットのテーブルから最新のレコードIDを取得
        $payment_credit = new PaymentCredit;
        $result = $payment_credit->getNewPaymentCredit();
        $pay_id = $result['id'];
    }
    
    // 銀行口座決済だった場合
    if ($_SESSION['payment'] == 2) {
        $payment = 2;
        // セッション破棄
        unset($_SESSION['payment']);
        // 銀行口座のテーブルから最新のレコードIDを取得
        $payment_credit = new PaymentBank;
        $result = $payment_credit->getNewPaymentBank();
        $pay_id = $result['id'];
    }

    $purchase = new Purchase;
    // for文を使用してpurchaseテーブルへインサートしていく（購入履歴）
    for ($i=0; $i < count($results); $i++) {
        // 変数へ代入
        $product_name = $results[$i]['product_name'];
        $product_id = $results[$i]['product_id'];
        $quantity = $results[$i]['quantity'];
        // 購入テーブルへインサート
        $purchase->createPurchase($product_name, $product_id, $quantity, $user_id, $payment, $pay_id);
    }

    // カート内を削除する処理
    // ログインしているユーザーidに該当するレコードを削除
    $cart = new Cart;
    $cart->deleteCartByUserId($user_id);
    
    // 購入完了画面へ遷移
    header('Location: done_view.html');
    exit;

