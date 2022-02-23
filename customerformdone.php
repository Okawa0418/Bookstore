<?php
    //  customerformcheckのSESSION postの値がフォルダを移動すると値がNULL状態
    $staff_email= $_POST['email'];
    $staff_name = $_POST['name'];
    $staff_content = $_POST['content'];    
    // database 接続
    $dsn ='mysql:dbname=bookstore;host=localhost;charset=utf8';
    $user ='root';
    $password ='Rilakkuma1231';
    $dbh =new PDO($dsn,$user,$password);
    $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // VALUESの文字をデータに反映させたい
    $sql = "INSERT INTO customer(email,name,content) VALUES(:email,:name,:content)";
    $stmt=$dbh->prepare($sql);
    $data[]=$staff_email;
    $data[]=$staff_name;
    $data[]= $staff_content;
    // SQL実行
    $stmt->execute($data);
    // data 切断
    $dbh=null;
    // 投稿された場合nameから投稿完了
    print $staff_name;
    print'さん投稿完了しました。<br />';       
?>
<a href ="index.php">トップに戻る</a>      
<!-- ショートカットコード -->
<!-- require_once('database1.php');
// 送信された値のバリデーション

// 送信された値を変数へ代入
$email = $_POST['customer_email'];
$name = $_POST['customer_name'];
$content = $_POST['content'];

$database = new Database1;
// productテーブルにデータを挿入
$database->createCustomer($customer_email, $customer_name, $content);

// 挿入した商品のreceiveが1(連絡が必要)なら、emailに連絡する処理？？
 -->
