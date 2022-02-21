<?php
require_once('database1.php');
// newbookテーブルに関連する処理
class NewBook extends Database1
{
    // newBookテーブルでidからレコードを検索する
    function getNameById($id) {
        $dbh = $this->dbConnect();
        // SQL準備
        $sql = 'SELECT product_name FROM newbook WHERE product_id = :id';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);

        // SQL実行
        $stmt->execute();

        // 結果を取得
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // 一致するidがあった場合
        if (isset($result)) {
            return $result;
        // なかった場合
        } else {
            return false;
        }
        
    }

    // newbookから指定したidのレコードを削除する処理
    function deleteNewBook($product_id) {
        $dbh = $this->dbConnect();
        // データを削除する為、トランザクション使用
        $dbh->beginTransaction();
        try{
            // SQL準備
            $sql = 'DELETE FROM newbook WHERE product_id = :product_id';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':product_id', (int)$product_id, PDO::PARAM_INT);
            // SQL実行
            $stmt->execute();
            // 処理完了
            $dbh->commit(); 
        } catch (PDOEexeption $e) {
            // 処理を戻す
            $dbh->rollBack();
            echo 'データベースにアクセスできません！'.$e->getMessage();
            exit;
        }
    }

}