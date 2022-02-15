<?php

class Database1 {

    // データベースに接続する
    function dbConnect() {
        $dsn = 'mysql:dbname=bookstore;host=localhost;charset=utf8';
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

    // テーブルから全レコードを取得（引数：データベースのテーブル名、戻り値：全レコード）
    function getAllRecord($table_name) {
        $dbh = $this->dbConnect();
        // SQL準備
        $sql = 'SELECT * FROM '.$table_name.'';
        // SQL実行
        $stmt = $dbh->query($sql);
        // SQLの結果を受け取る
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results; 
    }

    // productテーブルから1つの商品のレコードを取得する（引数：product_id、返り値：$results）
    function getProductByProductId($id) {
        $dbh = $this->dbConnect();
        // SQL準備
        $sql = 'SELECT * FROM product WHERE product_id = :id';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);

        // SQL実行
        $stmt->execute();

        // 結果を取得
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    // productテーブルから指定したcategoryの商品のレコードを取得する（引数：ctg_id、返り値：$results）
    function getProductByCtgId($ctg_id) {
        $dbh = $this->dbConnect();
        // SQL準備
        $sql = 'SELECT * FROM product WHERE category = :ctg_id';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':ctg_id', (int)$ctg_id, PDO::PARAM_INT);

        // SQL実行
        $stmt->execute();

        // 結果を取得
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    // productテーブルから特定の商品レコードの名前を取得する（引数：product_id、返り値：$product_name）
    function getProductName($id) {
        $results = $this->getProductByProductId($id);
        $product_name = $results['product_name'];
        return $product_name;
    }
    
    // 購入履歴をデータベースに挿入（purchaseテーブルに挿入）
    function createPurchase($item_name, $code_product, $quantity, $user_id) {
        $dbh = $this->dbConnect();
        // SQL準備
        $sql  = 'INSERT INTO purchase (item_name, code_product, quantity, user_id) 
                    VALUES(:item_name, :code_product, :quantity, :user_id)';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':item_name', $item_name, PDO::PARAM_STR);
        $stmt->bindValue(':code_product', $code_product, PDO::PARAM_INT);
        $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        // SQL実行（データベースに投稿内容を入れる）
        $stmt->execute();
    }

    // productテーブルからproduct_nameで検索する(引数：検索する文字列)
    function searchProduct($search) {
        $dbh = $this->dbConnect();
        // SQL準備
        $sql = "SELECT product_name, price 
                FROM product 
                WHERE product_name LIKE :search ";
        $stmt = $dbh->prepare($sql);
        // ワイルドカードを前後に使用し変数に再代入
        $search = '%' . $search . '%';
        // ワイルドカードを入れた変数をバインドする
        $stmt->bindValue(':search', $search, PDO::PARAM_STR);

        // SQL実行
        $stmt->execute();

        // 結果を取得
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($results);
        // exit;
        return $results;
    }

}

  