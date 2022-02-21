<?php
try
{
    $email_address = $_POST['email_address'];
    $customer_name = $_POST['customer_name'];
    $customer_name = $_POST['customer_name'];
    
    // productテーブルにデータを挿入
    $data1=new Database1();
    $dbh = $data1->dbConnect();
    // テーブルから全レコードを取得（引数：データベースのテーブル名、戻り値：全レコード）
        $sql = 'INSERT INTO '.$table_name.'';
        // 準備実行
        $stmt = $dbh->query($sql);
    
        $dbh=null;

        print $customer_name;
        print'さん投稿完了しました <br />';

}
catch(Exception $e)
{
    print'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}
?>
<a href ="index.php">トップに戻る</a>      
