<?php
// データベース接続
require_once('database1.php');
$data1=new Database1();
$dbh = $data1->dbConnect();
session_start();


try {
    // ＳＱＬ　文
    $sql ='SELECT * FROM bookstore WHERE newbook=?';  
    $q= array('100');
    // ＳＱＬ実行文の準備
    $sth = $db->prepare($sql);
    // ＳＱＬ実行文実行
    $sth->execute($q);

    // *データベースからの結果を連想配列で受け取る
    $r = $sth->fetchAll(PDO::FETCH_ASSOC);

    // 接続エラー処理
 } catch(PDOExceptioin $e) {
        $ERROR[] = $e->getMessage();
    // ログイン情報がセッションで保持されている場合
    if (isset($_SESSION['item_name'])) {
        // 商品確認画面へ遷移
        header('Location:request_done.php ');
        exit;
    }
?>
