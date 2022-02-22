<?php
// 購入ボタンを押した後の処理

session_start();

// POSTでtokenの項目名で送信されているかどうか
// セッションに保存された値と一致する場合
if (isset($_POST["token"]) 
    && $_POST["token"] === $_SESSION['token']) {

    // トークンの破棄
    unset($_SESSION['token']);
    // セッションの保存
    session_write_close();
    // セッションの再開
    session_start();

    // $_SESSION['save_quantity'] = $_POST['quantity'];
    
    // 数量の合計
    $sum = array_sum($_POST['quantity']);

    // バリデーション
    // 購入の数量合計が0またはnullの場合
    if ($sum === 0 || $sum == null) {
        // エラーメッセージをセッションに格納
        $_SESSION['msg'] = '商品を選択してください';
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

    // 配列内で数量が0のものを削除する
    // 数量が0のインデックス番号を取得する
    $zero_quantities = array_keys($_POST['quantity'], '0');

    // インデックス番号と一致するid、数量、価格を配列内から削除する
    for ($i=0; $i < count($zero_quantities); $i++) {
        // idの配列から数量が0であるid要素を削除
        unset($_POST['product_id'][$zero_quantities[$i]]);
        // 商品名の配列から数量が0である要素を削除
        unset($_POST['product_name'][$zero_quantities[$i]]);
        // quantityの配列から数量が0である数量要素を削除
        unset($_POST['quantity'][$zero_quantities[$i]]);
        // priceの配列から数量が0である価格要素を削除
        unset($_POST['price'][$zero_quantities[$i]]);
    }

    // 商品のid、数量、各価格、合計金額をセッションで保持する
    // 削除されたインデックス番号を詰めてからセッション変数へ代入
    // 商品idの配列
    $_SESSION['product']['id'] = array_values($_POST['product_id']);
    // 商品数量の配列
    $_SESSION['product']['quantity'] = array_values($_POST['quantity']);
    // 商品各々の金額の配列
    $_SESSION['product']['price'] = array_values($_POST['price']);
    // 商品名の配列
    $_SESSION['product']['name'] = array_values($_POST['product_name']);
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

exit('不正なリクエストです');
