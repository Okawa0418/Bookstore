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
    session_start();
        if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <?php
        if (isset($_SESSION['msg2'])) {
        $msg2 = $_SESSION['msg2'];
        unset($_SESSION['msg2']);
    }
    ?>
	<?php
        if (isset($_SESSION['msg3'])) {
        $msg3 = $_SESSION['msg3'];
        unset($_SESSION['msg3']);
    }
    ?>

<body>
<div class="container">
	<div class="page-lock">
        <div class="page-logo">
    		<a class="brand" href="manager_index.php">
    		<img src="BOOK STORE.jfif" alt="logo"/>
    		</a>
    	</div>
    	<div class="page-body">
    		<div class="lock-head">
    			 Signup
    		</div>
    		<div class="lock-body">
    			<form class="lock-form pull-left" action="manager_register.php" method="post">
						<?php if (isset($msg)) : ?>
							<font color="white" face="Yu Gothic Medium"><?= $msg; ?></font><br>
       					<?php endif ; ?>
						<?php if (isset($msg2)) : ?>
							<font color="white" face="Yu Gothic Medium"><?= $msg2; ?></font><br>
        				<?php endif ; ?>
						<?php if (isset($msg3)) : ?>
							<font color="white" face="Yu Gothic Medium"><?= $msg3; ?></font><br>
        				<?php endif ; ?>
					<div class="form-group">
    					<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="name" name="name"/>
    				</div>
    				<div class="form-group">
    					<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="password" name="password"/>
    				</div>
    				<div class="form-actions">
    					<button type="submit" class="btn btn-success uppercase">Signup</button>
    				</div>
    			</form>
    		</div>
    		<div class="lock-bottom">
			<font color="white" face="Yu Gothic Medium"><p>登録済みの方は<a href="manager_login.php">こちら</a></p></font>
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

<body>