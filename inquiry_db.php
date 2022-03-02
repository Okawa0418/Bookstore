<?php
require_once('database1.php');
class Inquiry extends Database1
{
    function getNameById($id) {
        $dbh = $this->dbConnect();
        $sql = 'SELECT name FROM customer WHERE customer_id = :id';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (isset($result)) {
            return $result;
        } else {
            return false;
        }
        
    }

    // newbookから指定したidのレコードを削除する処理
    function deleteInquiry($customer_id) {
        $dbh = $this->dbConnect();
        $dbh->beginTransaction();
        try{
            $sql = 'DELETE FROM customer WHERE customer_id = :customer_id';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':customer_id', (int)$customer_id, PDO::PARAM_INT);
            $stmt->execute();
            $dbh->commit(); 
        } catch (PDOEexeption $e) {
            $dbh->rollBack();
            echo 'データベースにアクセスできません！'.$e->getMessage();
            exit;
        }
    }

}