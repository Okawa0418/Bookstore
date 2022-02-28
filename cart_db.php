<?php
require_once('database1.php');

class Cart extends Database1
{
    // cartテーブルへデータを挿入する
    public function createCart($product_name, $price, $quantity, $product_id, $user_id) {
        $dbh = $this->dbConnect();
        try {
            // データ挿入の為トランザクション開始
            $dbh->beginTransaction();
            // SQL準備
            $sql  = 'INSERT INTO cart (product_name, price, quantity, product_id, user_id) 
                        VALUES(:product_name, :price, :quantity, :product_id, :user_id)';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindValue(':price', $price, PDO::PARAM_INT);
            $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->bindValue(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            // SQL実行（データベースに投稿内容を入れる）
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

    // ログインしているユーザーのcartのレコードを取得（引数：user_id 戻り値：該当するレコードの配列）
    public function getCartByUserId($user_id) {
        $dbh = $this->dbConnect();
        // SQL準備
        $sql = 'SELECT * FROM cart WHERE user_id = :user_id ORDER BY id DESC';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':user_id', (int)$user_id, PDO::PARAM_INT);

        // SQL実行
        $stmt->execute();

        // 結果を取得
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;

    } 


}