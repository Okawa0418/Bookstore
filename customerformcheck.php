<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1>BOOK STORE</h1>
</head>
<body>
    <?php
        $db_user ="root";
        $db_pass ="Rilakkuma1231";
        $db_host ="localhost";
        $db_name ="bookstore";
        $db_type ="mysql";

        $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";

        try{
            $pdo = new PDO($dsn,$db_user,$db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            print"投稿完了しました <br>";
        }   catch(PDOException $Exception) {
                die('エラー:'. $Exception->getMessage());
       
        }
        try{
            $pdo->beginTransaction();
            $sql ="INSERT INTO customer (email,name,content)VALUES (:email,:name,:content)";
            $stmh =$pdo->prepare($sql);
            $stmh->bindValue(':email',
                $_POST['email'],PDO::PARAM_STR);
            $stmh->bindValue(':name',
                $_POST['name'],PDO::PARAM_STR);
            $stmh->bindValue(':content',
                $_POST['content'],PDO::PARAM_STR);
            $stmh->execute();
            $pdo->commit();
            print"データを".$stmh->rowCount()."投稿を完了しました <br>";

        }catch (PDOException $Exception) {
            $pdo->rollBack();
        

            print"エラー:". $Exception->getMessage();
        }
    ?>   
</body>
</html>
<?php
    session_start();

    if(empty($_POST['email'])){
        $_SESSION['msg'] = '※メールアドレスを入力してください。';
        header('Location: customerformadd.php');
    } else{$_SESSION['email'] = $_POST['email'];
    }

    if(empty($_POST['name'])){
        $_SESSION['msg1'] = '※名前を入力してください。';
        header('Location: customerformadd.php');
    }

    if(empty($_POST['content'])){
        $_SESSION['msg2'] = '※内容を入力してください。';
        header('Location: customerformadd.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">新規本リクエスト受付完了</h5>
    <p class="card-text">またのご利用を心からお待ちしております。</p>
    <a href="index.php" class="btn btn-primary">購入画面へ戻る</a>
  </div>
</div>
</body>
</html>