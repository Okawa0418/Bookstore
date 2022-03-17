<?php

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

    // 購入履歴をデータベースに挿入（purchaseテーブルに挿入）
    function createPurchase($item_name, $code_product, $quantity, $user_id, $payment, $pay_id) {
        $dbh = $this->dbConnect();
        try {
            // データ挿入の為トランザクション開始
            $dbh->beginTransaction();
            // SQL準備
            $sql  = 'INSERT INTO purchase (item_name, code_product, quantity, user_id, payment, pay_id) 
                        VALUES(:item_name, :code_product, :quantity, :user_id, :payment, :pay_id)';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':item_name', $item_name, PDO::PARAM_STR);
            $stmt->bindValue(':code_product', $code_product, PDO::PARAM_INT);
            $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindValue(':payment', $payment, PDO::PARAM_INT);
            $stmt->bindValue(':pay_id', $pay_id, PDO::PARAM_INT);
            // SQL実行（データベースに購入情報を挿入）
            $stmt->execute();
            // 処理確定
            $dbh->commit();
        } catch (PDOException $e){
            // 処理を戻す
            $dbh->rollBack();
            echo 'Error:' . $e->getMessage();
            exit;
        }
        
    }


}