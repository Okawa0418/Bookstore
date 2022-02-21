<?php

// 送信された値をチェック
// 送信された値が空だった場合
if (empty($_POST['product_id'])) {
    echo '不正アクセスです';
    exit;
}
// 送信された商品idを変数に代入
$product_id = $_POST['product_id'];

// データベースから商品idで検索して削除する
// ヒットする商品idがある場合は削除の処理を行う
// ない場合はエラーメッセージをセッションに格納し、searchid.phpへリダイレクト
