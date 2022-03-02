<?php
session_start();
require_once('inquiry_db.php');

if (empty($_POST['customer_id'])) {
    echo '不正アクセスです';
    exit;
}

$customer_id = $_POST['customer_id'];

$inquiry = new Inquiry;
// データベースに存在するＩＤかどうか
$result = $inquiry->getNameById($customer_id);
// 存在しなかった場合はエラーメッセージをセッションに格納しsearchid.phpへリダイレクト
if ($result == false) {
    $_SESSION['msg'] = '削除しようとした商品はＤＢ上に存在しません';
    header('Location: inquiry.php');
    exit;
}

// データベース上に商品idが存在している場合
// データベースから商品idで検索して削除する
$inquiry->deleteInquiry($customer_id);
header('Location: inquiry.php');
exit;
