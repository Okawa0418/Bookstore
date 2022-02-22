<?php

try
{
    $staff_email=$_POST['email'];
    $staff_name=$_POST['name'];
    $staff_content=$_POST['content'];

    

    $staff_email=htmlspecialchars($staff_email,ENT_QUOTES,'UTF-8');
    $staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
    $staff_content=htmlspecialchars($staff_content,ENT_QUOTES,'UTF-8');
    
    // database 接続
    $dsn ='mysql:dbname=bookstore;host=localhost;charset=utf8';
    $user ='root';
    $password ='';
    $dbh =new PDO($dsn,$user,$password);
    $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // テーブルから全レコードを取得（引数：データベースのテーブル名、戻り値：全レコード）
    
        $sql = 'INSERT INTO customer(email,name,content) VALUES(?,?)';
        // 準備実行
        // $stmt = $dbh->query($sql);
        $stmt =$dbh->prepare($sql);
        $data[] =$staff_email;
        $data[] =$staff_name;
        $data[] =$staff_content;
        $stmt->execute($data);

        $dbh =null;        
     
        print $customer_name;
        print'さん投稿完了しました <br />';
    }
    catch(Exception $e)
    {
        print'ただいま障害により大変ご迷惑をお掛けしております';
        exit();
    }
?>
<a href ="index.php">トップに戻る</a>      

<!-- 予備コード -->
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
