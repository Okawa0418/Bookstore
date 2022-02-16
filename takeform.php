<?php
// DB接続ファイルの読み込み
require_once ('database1.php');
     // DB接続関数呼び出し
     dbConnect();
        $dsn = 'mysql:dbname=bookstore;host=localhost;charset=utf8';
        $user = 'root';
        $password = 'Rilakkuma1231';
    // testテーブルからデータを取得
     
        // SQL準備
        $sql = 'SELECT * FROM newbook';
        // SQL実行
        $stmt = $dbh->query($sql);
        // SQLの結果を受け取る
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results; 
    // DB切断
    $pdo = null;
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<h1>新規リスト</h1>
    <?php foreach($results as $item): ?>
        <p><?= $item ?></p>
    <?php endforeach; ?>
    <div style="font-size:14px">新規本を追加してください</div>
        <form action="view.php" method="post">
            <!-- 名前を記入してください:<br> -->
            <input type="text" name="name" value="">
            <br>
            <!-- 値段を記入してください:<br> -->
            <input type="text" name="price" value="">
            <!-- <br> -->
            <input type="submit" name="submit" value="発注">
        </form>
    </div>
</body>
</html>