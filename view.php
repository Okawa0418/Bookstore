<?php
// エラーメッセージ
$err = [];
// バリデーション
if (!($name = filter_input(INPUT_POST, 'name'))) {
    $err[] = '名前を記入してください';
}
if (!($price = filter_input(INPUT_POST, 'price'))) {
    $err[] = '値段を記入してください';
}

if (count($err) === 0) {
    // 発注処理
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<?php
// var_dump($_POST);
// exit();
$db_user = 'root';
$db_pass = 'Rilakkuma1231';
$db_host = 'localhost';
$db_name = 'bookstore';
$db_type = 'mysql';

$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    print '接続しました <br>';
} catch (PDOException $Exception) {
    die('エラー:' . $Exception->getMessage());
}
try {
    $pdo->beginTransaction();
    $sql = 'INSERT INTO product (product_name,price)VALUES(:name,:price)';
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
    $stmh->bindValue(':price', $_POST['price'], PDO::PARAM_INT);
    $stmh->execute();
    $pdo->commit();
    print 'データを' . $stmh->rowCount() . '件、挿入しました。<br>';
} catch (PDOException $Exception) {
    $pdo->rollBack();
    print 'エラー:' . $Exception->getMessage();
}

// $if (count($err) > 0):
// $foreach ($err as $e):
// $endforeach;
// $else:
// $endif;
?>
</body>
</html>