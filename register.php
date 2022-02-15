<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
<!-- Bootstrap Javascript(jQuery含む) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<?php
require_once('database1.php');
session_start();

    $name=$_POST['user_name'];
    $mail=$_POST['mail_address'];
    $post=$_POST['post_address'];
    $tel=$_POST['tel'];

    $pass=password_hash($_POST['password'],PASSWORD_DEFAULT);

    $data1=new Database1();
    $dbh = $data1->dbConnect();

    $sql="SELECT*FROM user WHERE mail_address = :mail_address";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':mail_address', $mail);
    $stmt->execute();
    $member = $stmt->fetch();

if(empty($_POST['user_name'])){
        $_SESSION['msg'] = '※ユーザー名を入力してください。';
    }
if(empty($_POST['mail_address'])){
        $_SESSION['msg2'] = '※メールアドレスを入力してください。';
    }
if(empty($_POST['post_address'])){
        $_SESSION['msg3'] = '※住所を入力してください。';
  }
if(empty($_POST['tel'])){
    $_SESSION['msg4'] = '※電話番号を入力してください。';
}
if(empty($_POST['password'])){
      $_SESSION['msg5'] = '※パスワードを入力してください。';
      header('Location: signup.php');
}

if(isset($member['mail_address'])&&$member['mail_address']===$mail){
  $msg='<h2>同じメールアドレスが存在します。</h2>';
  $link='<a href="signup.php">戻る</a>';
  echo $msg;
  echo $link;
  }
else{
    $sql = "INSERT INTO user(user_name, mail_address, password,post_address,tel) VALUES (:user_name, :mail_address, :password,:post_address,:tel)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user_name', $name);
    $stmt->bindValue(':mail_address', $mail);
    $stmt->bindValue(':password', $pass);
    $stmt->bindValue(':post_address', $post);
    $stmt->bindValue(':tel', $tel);
    $stmt->execute();
    $done = '会員登録が完了しました';
    $link = '<a href="login_form.php">ログインページ</a>';
    echo "<h1>$done</h1>";
    echo $link;
}
?>