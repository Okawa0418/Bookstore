<!-- userテーブルの表示画面 -->
<?php
    require_once('database1.php');

    $database = new Database1;
    $results = $database->getAllRecord('user');

    function h($s) {
        return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
    }
    
?>

<!-- productテーブルの表示画面 -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user管理画面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php 
    session_start();
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
					<a href="manager_login.php"><strong>管理者ログインページはこちら</strong></a>
				</p>
			</div><!--div center-->
		';
		exit();
	}
	// 不正遷移チェック ここまで ============================================================
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <header>
                    <a href="manager_index.php"  style="color:inherit;text-decoration: none;">
                        <h1>BOOK STORE</h1>
                        <h2>Manager</h2>
                    </a>
                </header>
            </div>
            <div class="col-9">
                <div class="mt-4">
                    <img class="d-block mx-auto" src="imglayout/line_book.png">
                </div>  
            </div>
        </div> 
    </div>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#"><h2>顧客リスト</h2></a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="manager_index.php">管理者Top</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="productList.php">商品リスト</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="include.php">商品追加フォーム</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="takeform.php">リクエスト一覧</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="inquiry.php">お問い合わせリスト</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>    
    </div>
    <div class="container-fluid">
        <table class="table table-primary table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">名前</th>
                    <th scope="col">email</th>
                    <th scope="col">住所</th>
                    <th scope="col">Tel</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($results); $i++) : ?>
                    <tr>
                        <th scope="row"><?= $results[$i]['user_id'];?></th>
                        <td><?= h($results[$i]['user_name']);?></td>
                        <td><?= h($results[$i]['mail_address']);?></td>
                        <td><?= h($results[$i]['post_address']);?></td>
                        <td><?= h($results[$i]['tel']);?></td>
                    </tr>
                <?php endfor ; ?>
            </tbody>
        </table>
    </div>
</body>
</html>