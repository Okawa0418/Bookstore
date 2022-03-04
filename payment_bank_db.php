<?php

class PaymentBank extends Database1
{

    // payment_creditテーブルへインサートする
    public function createPaymentBank($name, $address, $b_name, $b_number, $b_cvv) {
        $dbh = $this->dbConnect();
        try {
            // データ挿入の為トランザクション開始
            $dbh->beginTransaction();
            $sql = 'INSERT INTO payment_bank (name, address, b_name, b_number, b_cvv)
                    VALUES (:name, :address, :b_name, :b_number, b_cvv)';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':address', $address, PDO::PARAM_STR);
            $stmt->bindValue(':b_name', $b_name, PDO::PARAM_STR);
            $stmt->bindValue(':b_number', $b_number, PDO::PARAM_INT);
            $stmt->bindValue(':b_cvv', $b_cvv, PDO::PARAM_STR);
            // SQL実行
            $stmt->execute();
            // コミット
            $dbh->commit();
        } catch (PDOException $Exception) {
            // 処理を戻す
            $dbh->rollBack();
            print 'エラー:' . $Exception->getMessage();
            exit;
        }
    }

    // 最新のレコードidを取得する
    public function getNewPaymentBank() {
        $dbh = $this->dbConnect();
        // SQL準備
        $sql = 'SELECT id FROM payment_bank ORDER BY id DESC LIMIT 1';
        // SQL実行
        $stmt = $dbh->query($sql);
        // SQLの結果を受け取る
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result; 
    }
}