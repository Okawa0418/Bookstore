<?php
session_start();
// 変更id からname
$product_name = $_SESSION['product']['name'];
$amount_quantity = $_SESSION['product']['quantity'];
$price= $_SESSION['product']['price'];
$total_amount = $_SESSION['product']['total_amount'];

// foreach pr
foreach ($product_name as $key => $name) {
    echo '<pre>';
    echo  $name;
    echo '<pre>';
}
foreach ($amount_quantity as $key => $value) {
    echo '<pre>';
    echo  $value;
    echo '<pre>';
}
foreach ($price as $key => $value) {
    echo '<pre>';
    echo  $value;
    echo '<pre>';
}
// foreach ($total_amount as $key => $value) {
//     echo '<pre>';
//     echo  $value;
//     echo '<pre>';
// }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>商品追加</title>
</head>
<body>
    <!--アクションで完了画面へ -->
<form name ="form1" method="post" action="done.php">
    <h2>商品を確認後追加ボタンを押して下さい</h2>
    <input type="submit" value="発注する" name="confirm">
</form>
</body>
</html>
<!--  -->
<!-- // session_start();
// $product_id = $_SESSION['product']['id'];
// $amount_quantity = $_SESSION['product']['quantity'];
// $total_amount = $_SESSION['product']['total_amount'];
// }
// バリューのみを入れる
// foreach ( $product_id as $product ) {
//     echo '<pre>';
//     echo $product;
//     echo '<pre>';
// }
// キーとバリューを入れる
// foreach ($amount_quantity as $key => $value) {
//     echo '<pre>';
//     echo $key . $value;
//     echo '<pre>';
// };
// 多次元配列を出す
// foreach( $_SESSION as $product ) {
//     foreach($product as $value){
//         echo '<pre>';
//         echo $value;
//         echo '<pre>';
//     }
// }

try {
    $dsn = 'mysql:host=localhost; dbname=bookstore; charset=utf8';
    $user = 'root';
    $password = 'Rilakkuma1231';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql =
        "SELECT product_name FROM product WHERE product_id = '" .
        $product_id .
        "'";
    $stmt = $dbh->query($sql);
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    print '只今障害が発生しております。<br><br>';
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}

session_regenerate_id(true);

if (isset($_SESSION['user_id']) === false) {
    print 'ログインして下さい' . '<br><br>';
    print "<a href='index.php'>Top画面へ</a>";
    exit();
}
// もしセッションがtrue場合ログアウト
if (isset($_SESSION['user_id']) === true) {
    print "<a href='logout.php'>ログアウト</a>";
    print '<br><br>';
}
?> -->

