<?php

class PaymentCredit extends Database1
{

    // payment_creditテーブルへインサートする
    public function createPaymentCredit($name, $address, $cc_name, $cc_number, $cc_time, $cc_cvv) {
        $dbh = $this->dbConnect();
        try {
            // データ挿入の為トランザクション開始
            $dbh->beginTransaction();
            $sql = 'INSERT INTO payment_credit (name, address, cc_name, cc_number, cc_time, cc_cvv)
                    VALUES (:name, :address, :cc_name, :cc_number, :cc_time, :cc_cvv)';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':address', $address, PDO::PARAM_STR);
            $stmt->bindValue(':cc_name', $cc_name, PDO::PARAM_STR);
            $stmt->bindValue(':cc_number', $cc_number, PDO::PARAM_INT);
            $stmt->bindValue(':cc_time', $cc_time, PDO::PARAM_INT);
            $stmt->bindValue(':cc_cvv', $cc_cvv, PDO::PARAM_STR);
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
    public function getNewPaymentCredit() {
        $dbh = $this->dbConnect();
        // SQL準備
        $sql = 'SELECT id FROM payment_credit ORDER BY id DESC LIMIT 1';
        // SQL実行
        $stmt = $dbh->query($sql);
        // SQLの結果を受け取る
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result; 
    }
}