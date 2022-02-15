<?php
 session_start();
 require_once('database1.php');
 
 // 商品テーブルから全ての商品を取得
 $database = new Database1;
 $allProduct = $database->getAllProduct('product');
}
?>
<!-- //  データベース接続 参照コード
//  $pdo = new PDO('mysql:charset=UTF;dbname=booksotre;host=localhost','username','password');
// SQL作成
// $stmt = $PDO->prepare("SELECT * FROM newbook WHERE id = :id");
// 登録するデータをセット -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
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
 

