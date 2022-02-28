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

	if (isset($_SESSION['msg'])) {
		$msg = $_SESSION['msg'];
		unset($_SESSION['msg']);
		} 
	if (isset($_SESSION['msg2'])) {
		$msg2 = $_SESSION['msg2'];
		unset($_SESSION['msg2']);
		} 
	
	// $_SESSION['page-logo']=1;
?>

<body>
<div class="container">
	<div class="page-lock">
        <div class="page-logo">
    		<a class="brand">
    		<img src="BOOK STORE.jfif" alt="logo"/>
    		</a>
    	</div>
    	<div class="page-body">
    		<div class="lock-head">
    			 Locked
    		</div>
    		<div class="lock-body">
    			<form class="lock-form pull-left" action="manager_login_done.php" method="post">
						<?php if (isset($msg)) : ?>
							<font color="white" face="Yu Gothic Medium"><?= $msg; ?></font><br>
       					<?php endif ; ?>
						<?php if (isset($msg2)) : ?>
							<font color="white" face="Yu Gothic Medium"><?= $msg2; ?></font><br>
        				<?php endif ; ?>
					<div class="form-group">
    					<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="name" name="name"/ value="<?php if( !empty($_SESSION['name']) ){ echo htmlspecialchars( $_SESSION['name'], ENT_QUOTES, 'UTF-8'); } ?>">
    				</div>
    				<div class="form-group">
    					<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="password" name="password"/>
    				</div>
    				<div class="form-actions">
    					<button type="submit" class="btn btn-success uppercase">Login</button>
    				</div>
    			</form>
    		</div>
    		<div class="lock-bottom">
			<font color="white" face="Yu Gothic Medium"><p>登録がまだお済みでない方は<a href="manager_signup.php">こちら</a></p></font>
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