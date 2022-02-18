<body>
    <header>
        <h1>BOOK STORE</h1>
    </header>
        <h1>リクエスト完了ページ</h1>
    <main>
        <h2>リクエストありがとうございます！</h2>
    </main>
</body>

<?php
require_once('database1.php');
session_start();

$email=$_POST['email'];
$name=$_POST['name'];
$book=$_POST['book'];
$receive=$_POST['receive'];
$data1=new Database1();
$dbh = $data1->dbConnect();

if(empty($_POST['email'])){
  $_SESSION['msg'] = '※メールアドレスを入力してください。';
}
if(empty($_POST['name'])){
  $_SESSION['msg2'] = '※名前を入力してください。';
  header('Location: request.php');
}
if(empty($_POST['product_name'])){
  $_SESSION['msg3'] = '※本のタイトルを入力してください。';
}
else{
    try{
      $sql  = 'INSERT INTO newbook(email,name,product_name,receive) VALUES(:email,:name,:book,:receive)';
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
      $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
      $stmt->bindParam(':book', $_POST['book'], PDO::PARAM_STR);
      $stmt->bindParam(':receive', $_POST['receive'], PDO::PARAM_STR);
      $stmt->execute();
      $link2 = '<h1><a href="index.php">トップページ</a></h1>';
      echo $link2;
      exit();
    } catch (PDOException $e) {
        echo 'データベースにアクセスできません！'.$e->getMessage();
    }
  }
?>
