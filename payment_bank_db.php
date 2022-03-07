<?php

class PaymentBank extends Database1
{

    // payment_bankテーブルへインサートする
    public function createPaymentBank($name, $address, $b_name, $b_number, $b_cvv, $total_amount, $user_id) {
        $dbh = $this->dbConnect();
        try {
            // データ挿入の為トランザクション開始
            $dbh->beginTransaction();
            $sql = 'INSERT INTO payment_bank (name, address, b_name, b_number, b_cvv, total_amount, user_id)
                    VALUES (:name, :address, :b_name, :b_number, :b_cvv, :total_amount, :user_id)';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':address', $address, PDO::PARAM_STR);
            $stmt->bindValue(':b_name', $b_name, PDO::PARAM_STR);
            $stmt->bindValue(':b_number', $b_number, PDO::PARAM_INT);
            $stmt->bindValue(':b_cvv', $b_cvv, PDO::PARAM_STR);
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

    // user_idからレコードを降順に取得
    public function getBankByUserId($user_id) {
        $dbh = $this->dbConnect();
        // SQL準備
        $sql = 'SELECT * FROM payment_bank WHERE user_id = :user_id ORDER BY pay_time DESC';
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