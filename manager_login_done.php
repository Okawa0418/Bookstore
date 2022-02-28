<?php
    require_once('database1.php');    
    $data1=new Database1();
    $dbh = $data1->dbConnect();

    session_start();
    
        if(empty($_POST['name'])){
            $_SESSION['msg'] = '※管理者名を入力してください。';
            header('Location: manager_login.php');
        } else{$_SESSION['name'] = $_POST['name'];
        }

        if(empty($_POST['password'])){
            $_SESSION['msg2'] = '※パスワードを入力してください。';
            header('Location: manager_login.php');
        }

        $name = $_POST['name'];
        $stmt = $dbh->prepare("SELECT * FROM manager WHERE name = :name");
        $stmt->bindValue(':name', $name);
        $stmt->execute();
        $member = $stmt->fetch();

        if (isset($member['name'])&&$_POST['password']==$member['password']) {
            $_SESSION['user_id'] = $member['user_id'];
            $_SESSION['name'] = $member['name'];
            header('Location: manager_index.php');

		} else {
            echo '<font face="Yu Gothic Medium"><h2>メールアドレスもしくはパスワードが間違っています。<h2></font>';
            echo '<font face="Yu Gothic Medium"><a href="manager_login.php">戻る</a></font>';
        }
?>