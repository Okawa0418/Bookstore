<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>管理者ログインページ</title>
	<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<?php
    require_once('database1.php');    
    $data1=new Database1();
    $dbh = $data1->dbConnect();

    session_start();

	if(empty($_POST['password'])){
		$_SESSION['msg'] = '※パスワードを入力してください。';
		header('Location:');
	}
	if (isset($_SESSION['msg'])) {
		$msg = $_SESSION['msg'];
		unset($_SESSION['msg']);
		} 
?>

<body>
<div class="container">
	<div class="page-lock">
        <div class="page-logo">
    		<a class="brand" href="index.php">
    		<img src="BOOK STORE.jfif" alt="logo"/>
    		</a>
    	</div>
		<?php if (isset($msg)) : ?>
          <?= $msg; ?><br>
        <?php endif ; ?>
    	<div class="page-body">
    		<div class="lock-head">
    			 Locked
    		</div>
    		<div class="lock-body">
    			<form class="lock-form pull-left" action="manager_index.php" method="post">
    				<h4>管理者パスワードをご入力ください</h4>
    				<div class="form-group">
    					<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
    				</div>
    				<div class="form-actions">
    					<button type="submit" class="btn btn-success uppercase">Login</button>
    				</div>
    			</form>
    		</div>
    		<div class="lock-bottom">
    			<a href="index.php">戻る</a>
    		</div>
    	</div>
    </div>
</div>

<br><br>
<center>
<strong>Powered by くすりの窓口</strong>
</center>
<br><br>
</body>
</html>

<?php
        // 入力したメールアドレスと一致するデータベース内のメールアドレスを検索
        $pass = $_POST['password'];
        $stmt = $dbh->prepare("SELECT * FROM manager WHERE password = :password");
        $stmt->bindValue(':password', $pass);
        $stmt->execute();
        $member = $stmt->fetch();

        //指定したハッシュが入力したパスワードにマッチしているかチェック
        if (password_verify($_POST['password'], $member['password'])) {
            //データベースのユーザー情報をセッションに保存
            $_SESSION['user_id'] = $member['user_id'];
            $_SESSION['user_name'] = $member['user_name'];

		} else {
            echo '<h2>メールアドレスもしくはパスワードが間違っています。<h2>';
            echo '<a href="login_form.php">戻る</a>';
        }
?>