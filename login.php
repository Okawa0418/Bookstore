<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<?php
    require_once('database1.php');
    $data1=new Database1();
    $dbh = $data1->dbConnect();
    session_start();
?>

<?php
    if(empty($_POST['mail_address'])){
        $_SESSION['msg'] = '※メールアドレスを入力してください。';
    }
    if(empty($_POST['password'])){
        $_SESSION['msg1'] = '※パスワードを入力してください。';
        header('Location: login_form.php');
    }

    $mail = $_POST['mail_address'];
    $sql = "SELECT * FROM user WHERE mail_address = :mail_address";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':mail_address', $mail);
    $stmt->execute();
    $member = $stmt->fetch();

    //指定したハッシュがパスワードにマッチしているかチェック
    if (isset($member['mail_address'])&&password_verify($_POST['password'], $member['password'])) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['user_id'] = $member['user_id'];
    $_SESSION['user_name'] = $member['user_name'];
    $msg = '<h2>ログインしました。</h2>';
    $link = '<h1><a href="confirm.php">購入画面</a></h1>';
    $link2 = '<h1><a href="index.php">トップページ</a></h1>';

    if (!isset($_SESSION['product'])){
        echo $msg;
        echo $link2;
    }    else{
            echo $msg;
            echo $link;
        }

} else {
    $msg = '<h2>メールアドレスもしくはパスワードが間違っています。<h2>';
    $link = '<a href="login_form.php">戻る</a>';
    echo $msg;
    echo $link;
}
?>