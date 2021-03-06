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
            // print"投稿完了しました ";
        }   catch(PDOException $Exception) {
                die('エラー:'. $Exception->getMessage());
       
        }
        try{
            $pdo->beginTransaction();
            $sql ="INSERT INTO quit (username,opinion)VALUES (:username,:opinion)";
            $stmh =$pdo->prepare($sql);
            $stmh->bindValue(':username',
                $_POST['username'],PDO::PARAM_STR);
            $stmh->bindValue(':opinion',
                $_POST['opinion'],PDO::PARAM_STR);
            $stmh->execute();
            $pdo->commit();
            // print"お問合せ内容".$stmh->rowCount()."投稿完了しました ";

        }catch (PDOException $Exception) {
            $pdo->rollBack();
        

            print"エラー:". $Exception->getMessage();
        }
    ?>   
</body>
</html>
<?php
    session_start();

    if(empty($_POST['username'])){
        $_SESSION['msg'] = '※名前を入力してください。';
        header('Location: quitform.php');
    } else{$_SESSION['username'] = $_POST['username'];
    }

    if(empty($_POST['opinion'])){
        $_SESSION['msg2'] = '※意見板を入力してください。';
        header('Location: quitform.php');
    } else{$_SESSION['opinion'] = $_POST['opinion'];
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿完了しました。ご利用誠にありがとうございました。</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <header>
        <a href="index.php"  style="color:inherit;text-decoration: none;">
        <h1>BOOK STORE</h1></a>
    </header>
</div>
<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><h2>投稿完了しました。ご利用誠にありがとうございました。</h2></a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
            </div>
        </nav>
    </div>    
</div>
<div class="container-fluid">    
    <h4>またのご利用をお待ちしております。</h4>
    <form action="index.php">
        <button type="submit" class="btn btn-secondary">商品一覧</button>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>