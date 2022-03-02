<?php
class Favorite extends Database1
{

    // 該当するレコードがあるかどうか（返り値：true/false）
    public function judgeFavorite($user_id, $product_id) {
        $dbh = $this->dbConnect();
        try {
            // SQL準備
            $sql = 'SELECT id FROM favorite 
                    WHERE user_id = :user_id
                    AND product_id = :product_id';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':user_id', (int)$user_id, PDO::PARAM_INT);
            $stmt->bindValue(':product_id', (int)$product_id, PDO::PARAM_INT);

            // SQL実行
            $stmt->execute();

            // 結果を取得
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // 結果が空だった場合
            if (empty($result)) {
                return false;
            } else {
                return true;
            }
            
        } catch (PDOException $e){
            echo 'Error:' . $e->getMessage();
            exit;
        }
    }

    // favoriteテーブルにデータを追加する処理
    public function addFavorite($user_id, $product_id) {
        $dbh = $this->dbConnect();
        try {
            // データ挿入の為トランザクション開始
            $dbh->beginTransaction();
            $sql = 'INSERT INTO favorite (user_id, product_id) 
                    VALUES (:user_id, :product_id)';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindValue(':product_id', $product_id, PDO::PARAM_INT);
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

    // favoriteテーブルのデータを削除する処理
    public function deleteFavorite($user_id, $product_id) {
        $dbh = $this->dbConnect();
        // データを削除する為、トランザクション使用
        $dbh->beginTransaction();
        try {
            // SQL準備
            $sql = 'DELETE FROM favorite
                    WHERE user_id = :user_id
                    AND product_id = :product_id';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindValue(':product_id', $product_id, PDO::PARAM_INT);
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