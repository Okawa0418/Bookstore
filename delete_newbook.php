<?php
session_start();
require_once('newbook_db.php');

// 送信された値をチェック
// 送信された値が空だった場合
if (empty($_POST['product_id'])) {
    echo '不正アクセスです';
    exit;
}
// 送信された商品idを変数に代入
$product_id = $_POST['product_id'];

$newbook = new NewBook;
// データベースに存在するＩＤかどうか
$result = $newbook->getNameById($product_id);
// 存在しなかった場合はエラーメッセージをセッションに格納しtakeform.phpへリダイレクト
if ($result == false) {
    $_SESSION['msg'] = '削除しようとした商品は存在しません';
    header('Location: takeform.php');
    exit;
}

// データベース上に商品idが存在している場合
// データベースから商品idで検索して削除する
$newbook->deleteNewBook($product_id);
// セッションでメッセージを保持
$_SESSION['msg'] = 'ID「' . $product_id . '」を削除しました';
header('Location: takeform.php');
exit;
