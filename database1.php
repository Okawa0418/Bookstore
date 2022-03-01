<?php

class Database1 {

    // bookstoreデータベースに接続する
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

    // productテーブルから全レコードを降順に取得（引数：なし、戻り値：降順で全レコード）
    function getAllProductDesc() {
        $dbh = $this->dbConnect();
        // SQL準備
        $sql = 'SELECT * FROM product ORDER BY product_id DESC';
        // SQL実行
        $stmt = $dbh->query($sql);
        // SQLの結果を受け取る
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results; 
    }

    // productテーブルへデータを挿入する
    function createProduct($name, $price, $file_path, $category) {
        $dbh = $this->dbConnect();
        try {
            // データ挿入の為トランザクション開始
            $dbh->beginTransaction();
            $sql = 'INSERT INTO product (product_name, price, file_path, category) VALUES (:name, :price, :file_path, :category)';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':price', $price, PDO::PARAM_INT);
            $stmt->bindValue(':file_path', $file_path, PDO::PARAM_STR);
            $stmt->bindValue(':category', $category, PDO::PARAM_INT);
            // SQL実行
            $stmt->execute();
            // コミット
            $dbh->commit();
            // 商品追加完了画面へリダイレクト
            header('Location: view.html');
        } catch (PDOException $Exception) {
            // 処理を戻す
            $dbh->rollBack();
            print 'エラー:' . $Exception->getMessage();
            exit;
        }
    }

    // productテーブルから1つの商品のレコードを取得する（引数：product_id、返り値：$results）
    function getProductByProductId($product_id) {
        $dbh = $this->dbConnect();
        try {
            // SQL準備
            $sql = 'SELECT * FROM product WHERE product_id = :product_id';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':product_id', (int)$product_id, PDO::PARAM_INT);

            // SQL実行
            $stmt->execute();

            // 結果を取得
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e){
            echo 'Error:' . $e->getMessage();
            exit;
        }
        
    }

    // productテーブルから指定したcategoryの商品のレコードを降順で取得する（引数：ctg_id、返り値：$results）
    function getProductByCtgId($ctg_id) {
        $dbh = $this->dbConnect();
        // SQL準備
        $sql = 'SELECT * FROM product WHERE category = :ctg_id ORDER BY product_id DESC';
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
    
    

    // productテーブルからproduct_nameで検索する(引数：検索する文字列)
    function searchProduct($search) {
        $dbh = $this->dbConnect();
        // SQL準備
        $sql = "SELECT * 
                FROM product 
                WHERE product_name LIKE :search 
                ORDER BY product_id DESC";
        $stmt = $dbh->prepare($sql);
        // ワイルドカードを前後に使用し変数に再代入
        $search = '%' . $search . '%';
        // ワイルドカードを入れた変数をバインドする
        $stmt->bindValue(':search', $search, PDO::PARAM_STR);

        // SQL実行
        $stmt->execute();

        // 結果を取得
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    // 商品を削除する
    function deleteProductById($product_id) {
        $dbh = $this->dbConnect();
        // データを削除する為、トランザクション使用
        $dbh->beginTransaction();
        try {
            // SQL準備
            $sql = 'DELETE FROM product WHERE product_id = :product_id';
            $stmt = $dbh->prepare($sql);
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

    // 編集内容をデータベースに反映させる
    function updateProduct($product_id, $product_name, $price, $file_path, $category) {
        // データベース接続
        $dbh = $this->dbConnect();
        // データを更新する為、トランザクション使用
        $dbh->beginTransaction();
        try {
            // SQL準備
            $sql = 'UPDATE product SET 
                product_name = :product_name,
                price = :price,
                file_path = :file_path,
                category = :category
                WHERE product_id = :product_id';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindValue(':price', $price, PDO::PARAM_INT);
            $stmt->bindValue(':file_path', $file_path, PDO::PARAM_STR);
            $stmt->bindValue(':category', $category, PDO::PARAM_INT);
            $stmt->bindValue(':product_id', $product_id, PDO::PARAM_STR);
            // SQL実行
            $stmt->execute();
            $dbh->commit();
        } catch (PDOException $e) {
            $dbh->rollBack();
            echo 'データベースにアクセスできません！'.$e->getMessage();
            exit;
        }
    }

    
    // ページングで使用する↓

    // productテーブルのレコード数を数える
    // 必要ページ数を取得する
    function numberOfPages() {
        // データベース接続
        $dbh = $this->dbConnect();
        // SQL準備
        $sql = 'SELECT COUNT(*) AS count FROM product';
        $count = $dbh->prepare($sql);
        // SQL実行
        $count->execute();
        // 結果を取得
        $total_count = $count->fetch(PDO::FETCH_ASSOC);
        // 全レコード数を表示件数で割り、切り上げすることでページ数を取得する
        $pages = ceil($total_count['count'] / max_view);
        // 必要ページ数を返す
        return $pages;
    }


    // 表示に必要な分の商品レコードを取得（引数：現在のページ番号、返り値：ページに必要な商品のレコード）
    function getProductByPages($now) {
        // データベース接続
        $dbh = $this->dbConnect();
        // 降順LIMITで5つだけ取得
        $sql = "SELECT * FROM product ORDER BY product_id DESC LIMIT :start, :max ";
        $stmt = $dbh->prepare($sql);
        
        // ページによる条件分岐
        if ($now == 1) {
            // 1ページ目の場合
            $stmt->bindValue(":start", $now - 1, PDO::PARAM_INT);
            $stmt->bindValue(":max", max_view, PDO::PARAM_INT);
        } else {
            // 1ページ目以外の場合
            $stmt->bindValue(":start", ($now - 1) * 5, PDO::PARAM_INT);
            $stmt->bindValue(":max", max_view, PDO::PARAM_INT);
        }
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

}

  