<?php

class Database1 {

    // データベースに接続する
    function dbConnect() {
        $dsn = 'mysql:dbname=bookstore;host=localhost';
        $user = 'root';
        $password = 'Rilakkuma1231';

        try{
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);    
        }catch (PDOException $e){
            echo 'Error:' . $e->getMessage();
            exit;
        };
        
        return $dbh;
    }

    // productテーブルから全投稿内容を取得していく（戻り値：全商品）
    function getAllProduct() {
        $dbh = dbConnect();
        // SQL準備
        $sql = 'SELECT * FROM product';
        // SQL実行
        $stmt = $dbh->query($sql);
        // SQLの結果を受け取る
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results; 
    }

    // productテーブルから特定のレコードを取得する（引数：product_id）
    function getProduct($id) {
        $dbh = dbConnect();
        // SQL準備
        $sql = 'SELECT * FROM product WHERE product_id = :id ';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);

        // SQL実行
        $stmt->execute();

        // 結果を取得
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        return $results;
    }

}

  