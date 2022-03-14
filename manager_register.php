<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>管理者新規登録ページ</title>
	<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<?php
require_once('database1.php');
$data1=new Database1();
$dbh = $data1->dbConnect();

session_start();

    $name=$_POST['name'];
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);

    // 入力したメールアドレスと一致するデータベース内のメールアドレスを検索
    $sql="SELECT*FROM manager WHERE name = :name";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->execute();
    $member = $stmt->fetch();

    if(empty($_POST['name'])){
            $_SESSION['msg'] = '※管理者名を入力してください。';
            header('Location: manager_signup.php');
            exit;
        }

    if(empty($_POST['password'])){
            $_SESSION['msg2'] = '※パスワードを入力してください。';
            header('Location: manager_signup.php');
            exit;
        }
    if (!empty($_POST['password'])&&!preg_match("/\A[a-z\d]{8,100}+\z/i",$_POST['password'])){
            $_SESSION['msg3'] ='※パスワードは英数字8文字以上100文字以下にしてください。';
            header('Location: manager_signup.php');
            exit;
        }
    
    elseif(isset($member['name'])&&$member['name']===$name){
      echo '<h2>同じ管理者名が存在します。</h2>';
      echo '<a href="manager_signup.php">戻る</a>';
    }

    else{
        $sql = "INSERT INTO manager(name,password) VALUES (:name, :password)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        header('Location: manager_login.php');
    }
?>