<!DOCTYPE html>
  <html lang="ja">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>リクエスト完了ページ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="invitation_done.css">
  </head>
  <header>
  <a href="index.php"  style="color:inherit;text-decoration: none;"><h1>BOOK STORE</h1></a>
  </header>
  <body>
    <!-- リクエスト完了　card -->
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card border-warning mb-3">
                    <img src="photojp/describetwoguys.jpg" class="card-img-top" alt="text-center">
                    <div class="card-body text-center">
                        <h5 class="card-title bg-warning">リクエスト完了ページ</h5>
                        <p class="fs-3">リクエストありがとうございました。</p>
                    </div>
                    <div class="card-body">
                        <a href="index.php" class="card-link-warning">商品購入画面</a>
                        <a href="logout.php" class="card-link-danger">ログアウト</a>
                    </div>
                </div>
                <div class="col-4">
                    <img src="photojp/light.jpg" width="600" height="300">
                </div>
            </div>
        </div>
    </body>
    </html>

  <?php
    require_once('database1.php');
    $data1=new Database1();
    $dbh = $data1->dbConnect();

    session_start();

    $email=$_POST['email'];
    $name=$_POST['name'];
    $book=$_POST['book'];
    $receive=$_POST['receive'];

    if(empty($_POST['email'])){
      $_SESSION['msg'] = '※メールアドレスを入力してください。';
      header('Location: invitation.php');
    }
    if(empty($_POST['name'])){
      $_SESSION['msg2'] = '※名前を入力してください。';
      header('Location: invitation.php');
    }
    if(empty($_POST['book'])){
      $_SESSION['msg3'] = '※本のタイトルを入力してください。';
      header('Location: invitation.php');
    }
    if(!in_array($receive, ['必要','不要'])){
      $_SESSION['msg4'] = '※要否を選択してください。';
      header('Location: invitation.php');
      exit;
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

            $msg = '<h2 style="color:white;">ログインしました。</h2>';

            if (!isset($_SESSION['product'])){
                echo $msg;
                echo '<h2><a href="index.php">トップページ</a></h2>';
        }   else{ echo $msg;
                echo '<h2><a href="confirm.php">購入画面</a></h2>';
        }
            exit();
        }   catch (PDOException $e) {
                echo 'データベースにアクセスできません！'.$e->getMessage();
        }
    }
?>
