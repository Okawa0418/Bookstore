<?php

class PaymentCredit extends Database1
{

    // payment_creditテーブルへインサートする
    public function createPaymentCredit($name, $address, $cc_name, $cc_number, $cc_time, $cc_cvv, $total_amount, $user_id) {
        $dbh = $this->dbConnect();
        try {
            // データ挿入の為トランザクション開始
            $dbh->beginTransaction();
            $sql = 'INSERT INTO payment_credit (name, address, cc_name, cc_number, cc_time, cc_cvv, total_amount, user_id)
                    VALUES (:name, :address, :cc_name, :cc_number, :cc_time, :cc_cvv, , :total_amount, :user_id)';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':address', $address, PDO::PARAM_STR);
            $stmt->bindValue(':cc_name', $cc_name, PDO::PARAM_STR);
            $stmt->bindValue(':cc_number', $cc_number, PDO::PARAM_INT);
            $stmt->bindValue(':cc_time', $cc_time, PDO::PARAM_INT);
            $stmt->bindValue(':cc_cvv', $cc_cvv, PDO::PARAM_STR);
            $stmt->bindValue(':total_amount', $total_amount, PDO::PARAM_INT);
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
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
        $sql = 'SELECT id FROM payment_credit ORDER BY pur_time DESC LIMIT 1';
        // SQL実行
        $stmt = $dbh->query($sql);
        // SQLの結果を受け取る
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result; 
    }

    // user_idからレコードを降順に取得
    public function getCreditByUserId($user_id) {
        $dbh = $this->dbConnect();
        // SQL準備
        $sql = 'SELECT * FROM payment_credit WHERE user_id = :user_id ORDER BY pay_time DESC';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':user_id', (int)$user_id, PDO::PARAM_INT);

        // SQL実行
        $stmt->execute();

        // 結果を取得
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // 結果が空だった場合はfalseを返す
        if (empty($results)) {
            return false;
        }

        return $results;
    }
}