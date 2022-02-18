<?php
require_once('database1.php');

// purchaseテーブルに関連する処理
class Purchase extends Database1
{
    // ログインユーザーの購入履歴を取得する
    function getPurHistory($user_id) {
        $dbh = $this->dbConnect();
        // SQL準備
        $sql = 'SELECT * FROM purchase WHERE user_id = :user_id ORDER BY pur_time DESC';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':user_id', (int)$user_id, PDO::PARAM_INT);

        // SQL実行
        $stmt->execute();

        // 結果を取得
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 一致するidがあった場合
        if (isset($results)) {
            return $results;
        // なかった場合
        } else {
            return false;
        }
    }




}