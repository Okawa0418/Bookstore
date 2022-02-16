<body>
    <header>
        <h1>リクエスト完了ページ</h1>
    </header>
    <main>
        <h2>リクエストありがとうございます！</h2>
<pre>

<?php
require_once('database1.php');
?>

<?php
$book=$_POST['book'];
$data1=new Database1();
$dbh = $data1->dbConnect();

try{
    $sql = "INSERT INTO newbook(product_name) VALUES (:book)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':book', $book);
} catch(PDOException $e){
echo 'DB接続エラー' . $e->getMessage();
}
?>
</pre>
</main>
</body>