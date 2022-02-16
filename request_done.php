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

if(!empty($_POST['book'])){
    try{
      $sql  = 'INSERT INTO newbook(product_name) VALUES(:book)';
      $stmt = $dbh->prepare($sql);
  
      $stmt->bindParam(':book', $_POST['book'], PDO::PARAM_STR);
      $stmt->execute();
      $link2 = '<h1><a href="index.php">商品一覧画面</a></h1>';
      echo $link2;
      exit();
    } catch (PDOException $e) {
        echo 'データベースにアクセスできません！'.$e->getMessage();
    }
  }
?>
</pre>
</main>
</body>