<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKSTORE管理者Top</title>
    <!-- bootstrap ｃｓｓ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
</head>
<?php session_start(); ?>
<?php 
	//=======================================================================================
	// 不正遷移チェック
	//=======================================================================================
	//* 直接のページのアクセスを禁止する。 正しいセッションフラグを持っていない場合
	if(!isset($_SESSION['manager_id'])){
		echo '
			<div align="center">
				<h1>不正遷移です。</h1>
				<p style="color : red;">
					このページの直接アクセスは禁止されています。
				</p>
				<p>誠にご面倒をおかけしますが、管理者ログインページから入力をお願い致します</p>
				<p>
					<a href="manager_login.php"><strong>『管理者ログインページ』はこちら</strong></a>
				</p>
			</div><!--div center-->
		';
		exit();
	}
	// 不正遷移チェック ここまで ============================================================
?>
<body>
    <div class="container-fluid">
        <header>
            <a href="manager_index.php"  style="color:inherit;text-decoration: none;">
                <h1>BOOK STORE</h1>
                <h2>Manager</h2>
            </a>
        </header>
    </div>
    <div class="container-fluid">
        <div class="row">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><h2>管理者Top</h2></a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
            </div>
        </nav>
        </div>    
    </div>
    <div class="container-fluid">
        <ul class="list-group">
            <li class="list-group-item">
                <a href="productList.php">商品リスト</a>
            </li>
            <li class="list-group-item">
                <a href="userList.php">顧客リスト</a>
            </li>
            <li class="list-group-item">
                <a href="takeform.php">リクエスト一覧</a>
            </li>
            <li class="list-group-item">
                <a href="include.php">商品追加フォーム</a>
            </li>
            <li class="list-group-item">
                <a href="manager_logout.php">ログアウト</a>
            </li>
        </ul>
    </div>
</body>
</html>