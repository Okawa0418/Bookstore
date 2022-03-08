<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録完了画面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
</head>

<body>
    <header>
    <a href="index.php"  style="color:inherit;text-decoration: none;"><h1>BOOK STORE</h1></a>
    </header>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

<?php
require_once('database1.php');
$data1=new Database1();
$dbh = $data1->dbConnect();

session_start();

    $name=$_POST['user_name'];
    $mail=$_POST['mail_address'];
    $post=$_POST['post_address'];
    $tel=$_POST['tel'];
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);

    // 入力したメールアドレスと一致するデータベース内のメールアドレスを検索
    $sql="SELECT*FROM user WHERE mail_address = :mail_address";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':mail_address', $mail);
    $stmt->execute();
    $member = $stmt->fetch();

    if(empty($_POST['user_name'])){
            $_SESSION['msg'] = '※ユーザー名を入力してください。';
            header('Location: signon.php');
        }
        else{$_SESSION['user_name'] = $_POST['user_name'];}
    if(empty($_POST['mail_address'])){
            $_SESSION['msg2'] = '※メールアドレスを入力してください。';
            header('Location: signon.php');
        }
        else{$_SESSION['mail_address'] = $_POST['mail_address'];}
    if(empty($_POST['post_address'])){
            $_SESSION['msg3'] = '※住所を入力してください。';
            header('Location: signon.php');
        }
        else{$_SESSION['post_address'] = $_POST['post_address'];}
    if(empty($_POST['tel'])){
            $_SESSION['msg4'] = '※電話番号を入力してください。';
            header('Location: signon.php');
        }
        else{$_SESSION['tel'] = $_POST['tel'];}
    if(empty($_POST['password'])){
            $_SESSION['msg5'] = '※パスワードを入力してください。';
            header('Location: signon.php');
            exit;
        }
    if (!empty($_POST['password'])&&!preg_match("/\A[a-z\d]{8,100}+\z/i",$_POST['password'])){
            $_SESSION['msg6'] ='※パスワードは英数字8文字以上100文字以下にしてください。';
            header('Location: signon.php');
            exit;
        }
    
    // 入力されたメールアドレスとデータベースに存在するメールアドレスが一致した場合
    elseif(isset($member['mail_address'])&&$member['mail_address']===$mail){
      echo '<h2>同じメールアドレスが存在します。</h2>';
      echo '<a href="signon.php">戻る</a>';
    }

    else{
        $sql = "INSERT INTO user(user_name, mail_address, password,post_address,tel) VALUES (:user_name, :mail_address, :password,:post_address,:tel)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':user_name', $name);
        $stmt->bindValue(':mail_address', $mail);
        $stmt->bindValue(':password', $password);
        $stmt->bindValue(':post_address', $post);
        $stmt->bindValue(':tel', $tel);
        $stmt->execute();
        echo '<h1>会員登録が完了しました</h1>';
        echo '<a href="describe.php" class="link-warning">ご利用方法</a>';
        echo '<form method="post" action="login_form.php">
        <input type="submit" value="ログインページ" name="login" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">
        </form>';
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <footer>
        <div class="px-4 py-5 my-5 text-center">
            <img class="d-block mx-auto mb-4" src="photojp/describetwoguys.jpg"  width="800" height="400">
            <h1 class="display-5 fw-bold">BOOKSTORE</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">BOOKSTOREへようこそ!素敵な本に出会えますように</p>
            </div>
        </div>
    </footer>
</body>
</html>