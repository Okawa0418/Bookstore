<body>
<header>
<h1>PHP</h1>
</header>
<main>
<h2>リクエストありがとうございます！</h2>
<pre>

<?php
require_once('database1.php');
?>

<?php

$data1=new Database1();
$dbh = $data1->dbConnect();

try{
$count = $db->exec('INSERT INTO newbook SET $_POST['book']' );
echo $count . "件のデータを登録しました！";
} catch(PDOException $e){
echo 'DB接続エラー' . $e->getMessage();
}
?>
</pre>
</main>
</body>