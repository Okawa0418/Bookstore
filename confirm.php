<?php
// / SQL準備

// $sql = 'SELECT * FROM product';

// // SQL実行

// $stmt = $dbh->query($sql);

// // SQLの結果を受け取る

// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// return $results;
// データベース連結
try {
    $dsn = 'mysql:host=localhost; dbname=bookstore; charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM product';
    $stmt = $dbh->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($results);
    exit();
} catch (Exception $e) {
    print '只今障害が発生しております。<br><br>';
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}
// 小川さん　データベース接続　（合計、数）
session_start();
$product_id = $_SESSION['product']['id'];
$amount_quantity = $_SESSION['product']['quantity'];
$total_sum = $_SESSION['sum'];

もしセッションがfalseな場合ログインで退出
  session_start();
  session_regenerate_id(true
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

//
// <?php
// foreach ($_POST['reserve'] as $reserve) {
//     print htmlspecialchars($reserve, ENT_QUOTES) . ' ';
// }

// if (isset($_POST['GiftA'])) {
//     print $_POST['GiftA'];
//     print '円のお釣りになりますご購入ありがとうございました。
//     新規登録して頂いたお客様にリッチ霧吹きをペレゼント。また無料でビニール袋とメンテナンス液を購入できます。';
// }

// if (isset($_POST['GiftB'])) {
//     print $_POST['GiftB'];
//     print '円のお釣りになりますご購入ありがとうございました。
//     新規登録して頂いたお客様にリッチ霧吹きをペレゼント。また無料でビニール袋とメンテナンス液を購入できます。';
// }
// if (isset($_POST['GiftC'])) {
//     print $_POST['GiftC'];
//     print '円のお釣りになりますご購入ありがとうございました。
//     新規登録して頂いたお客様にリッチ霧吹きをペレゼント。また無料でビニール袋とメンテナンス液を購入できます。';
// }

// if (isset($_POST['MoキャラA'])) {
//     print $_POST['MoキャラA'];
//     print '円のお釣りになりますご購入ありがとうございました。
//     新規登録して頂いたお客様にリッチ霧吹きをペレゼント。また無料でビニール袋とメンテナンス液を購入できます。';
// }

// if (isset($_POST['MoキャラB'])) {
//     print $_POST['MoキャラB'];
//     print '円のお釣りになりますご購入ありがとうございました。
//     新規登録して頂いたお客様にリッチ霧吹きをペレゼント。また無料でビニール袋とメンテナンス液を購入できます。';
// }

// if (isset($_POST['MoキャラC'])) {
//     print $_POST['MoキャラC'];
//     print '円のお釣りになりますご購入ありがとうございました。
//     新規登録して頂いたお客様にリッチ霧吹きをペレゼント。また無料でビニール袋とメンテナンス液を購入できます。';
// }

// if (isset($_POST['MoキャラD'])) {
//     print $_POST['MoキャラD'];
//     print '円のお釣りになりますご購入ありがとうございました。
//     新規登録して頂いたお客様にリッチ霧吹きをペレゼント。また無料でビニール袋とメンテナンス液を購入できます。';
// }

// if (isset($_POST['MoキャラE'])) {
//     print $_POST['MoキャラE'];
//     print '円のお釣りになりますご購入ありがとうございました。
//     新規登録して頂いたお客様にリッチ霧吹きをペレゼント。また無料でビニール袋とメンテナンス液を購入できます。';
// }

//h tag　購入ボタン実装予定
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

