<!-- お気に入りに追加orお気に入り削除処理 -->
<?php
session_start();

require_once('database1.php');
require_once('favorite_db.php');

// 送信されたトークンが存在しないor一致していない場合
if (!isset($_POST['token']) 
    || $_SESSION['token'] !== $_POST['token']) {

    echo '不正アクセスです';
    exit;
}

// トークンの判定通過
// ユーザーIDと商品IDを変数へ代入
$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

// インスタンス生成
$favorite = new Favorite;

// 「お気に入りに追加」ボタンが押された場合
if (isset($_POST['add_favorite'])) {
    // favoriteテーブルへインサートしていく
    $favorite->addFavorite($user_id, $product_id);
}

// 「お気に入り取消」ボタンが押された場合
if (isset($_POST['delete_favorite'])) {
    // favoriteテーブルからデータ削除
    $favorite->deleteFavorite($user_id, $product_id);
}

// 元々見ていたshow.phpへ遷移
$url = 'show.php?product_id=' . $product_id;
header('Location: ' . $url);
exit;