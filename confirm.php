<?php
try {
    $dsn = 'mysql:host=localhost; dbname=bookstore; charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM product';
    $stmt = $dbh->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    print '只今障害が発生しております。<br><br>';
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}

session_start();
$product_id = $_SESSION['product']['id'];
$amount_quantity = $_SESSION['product']['quantity'];
$total_sum = $_SESSION['sum'];

session_start();
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>商品購入</title>
</head>
<body>
商品確認画面
<h2>商品名</h2>
<?php echo $product_id; ?>
<h2>数量</h2>
<?php echo $amount_quantity; ?>
<h2>合計</h2>
<?php echo $total_sum; ?>
<!--アクションで完了画面へ -->
<from name ="form1" method="post" action="done.php">
 <input type="submit" value="注文を確定する" name="confirm">
</form>
</body>
</html>

