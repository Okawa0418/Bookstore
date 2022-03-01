<!-- cartテーブルへインサートする -->
<!-- インサートしたらconfirm.php画面で表示させる -->
<?php
require_once('database1.php');
require_once('cart_db.php');
session_start();

// トークンがセットされている場合
// かつ、セッションに入っているトークンと送信されてきたトークンが一致する場合
// またはセッション変数にカート情報が入っている場合
if (isset($_POST["token"]) 
    && $_POST["token"] === $_SESSION['token']
    || isset($_SESSION['cart'])) {

    // トークンの破棄
    unset($_SESSION['token']);
    // セッションの保存
    session_write_close();
    // セッションの再開
    session_start();


    if (isset($_POST['quantity'])) {
        // 送信された値を変数へ代入
        $quantity = $_POST['quantity'];
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];

        

        // 選択した数量が0だった場合
        if ($quantity == 0) {
            // セッションにエラーメッセージ代入
            $_SESSION['msg'] = '数量を選択してください';
            // リダイレクト先のURLを変数へ代入
            $url = 'show.php?product_id=' . $product_id;
            // show.phpへリダイレクト
            header('Location:' . $url);
            exit;
        }
    }
    

    // ログイン状態でない場合
    if (empty($_SESSION['user_id'])) {
        // セッションで値を保持してログイン画面へ遷移させる
        $_SESSION['cart']['quantity'] = $quantity;
        $_SESSION['cart']['product_id'] = $product_id;
        $_SESSION['cart']['product_name'] = $product_name;
        $_SESSION['cart']['price'] = $price;
        // signup.phpへ遷移
        header('Location: signup.php');
        exit;
    }

    // ログイン状態の場合
    // セッションで保持されているuser_idを変数へ代入
    $user_id = $_SESSION['user_id'];
    // セッション変数cartに値が入っている場合
    if (isset($_SESSION['cart'])) {
        // 各セッションの値を変数へ代入
        $quantity = $_SESSION['cart']['quantity'];
        $product_id = $_SESSION['cart']['product_id'];
        $product_name = $_SESSION['cart']['product_name'];
        $price = $_SESSION['cart']['price'];
        // cartセッションの破棄
        unset($_SESSION['cart']);
    }
    
    // cartテーブルへデータをインサートする
    $cart = new Cart;
    $cart->createCart($product_name, $price, $quantity, $product_id, $user_id);

    // カートへインサート後は購入確認画面へ遷移
    header('Location: confirm.php');
    exit;
} else {
    echo '不正アクセスです';
    exit;
}