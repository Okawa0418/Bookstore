<body>
    <header>
        <h1>リクエスト完了ページ</h1>
    </header>
    <main>
        <h2>リクエストありがとうございます！</h2>
    </main>
</body>

<?php
require_once('database1.php');
session_start();

$book=$_POST['book'];
$email=$_POST['email'];
$name=$_POST['name'];
$data1=new Database1();
$dbh = $data1->dbConnect();

if(empty($_POST['product_name'])){
  $_SESSION['msg'] = '※ユーザー名を入力してください。';
}
if(empty($_POST['email'])){
  $_SESSION['msg2'] = '※メールアドレスを入力してください。';
}
if(empty($_POST['name'])){
  $_SESSION['msg3'] = '※名前を入力してください。';
  header('Location: request.php');
}
else{
    try{
      $sql  = 'INSERT INTO newbook(product_name,email,name) VALUES(:book,:email,:name)';
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':book', $_POST['book'], PDO::PARAM_STR);
      $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
      $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
      $stmt->execute();
      $link2 = '<h1><a href="index.php">トップページ</a></h1>';
      echo $link2;
      exit();
    } catch (PDOException $e) {
        echo 'データベースにアクセスできません！'.$e->getMessage();
    }
  }
?>
