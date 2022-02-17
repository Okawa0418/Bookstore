<?php
require_once('database1.php');
// newbookテーブルに関連する処理
class NewBook extends Database1
{
    // newBookテーブルでidから名前を検索する
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

    // newbookからレコードを削除する処理？？？
    function deleteNewBook($id) {

    }

}