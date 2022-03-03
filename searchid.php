<?php
session_start();
// データベース接続
require_once('database1.php');

$data1=new Database1();
$dbh = $data1->dbConnect();

// ＳＱＬ　文
$sql ='SELECT * FROM newbook';  
// ＳＱＬ実行文の準備
$stmt = $dbh->query($sql);
// *データベースからの結果を取取
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// エラーメッセージが格納されている場合
if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品追加画面</title>
    <!-- bootstrap ｃｓｓ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
</head>
<body>
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
					<a href="manager_login.php"><strong>管理者ログインページはこちら</strong></a>
				</p>
			</div><!--div center-->
		';
		exit();
	}
	// 不正遷移チェック ここまで ============================================================
?>
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
            <a class="navbar-brand" href="#"><h2>商品追加</h2></a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="manager_index.php">管理者Top</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="include.php">商品追加フォームへ</a>
                    </li>
                </ul>
            </div>
        </nav>
        </div>    
    </div>
    <div class="container">
        <div class="row">
            <h2>商品ID選択</h2>
            <!-- エラーメッセージ表示 -->
            <?php if (isset($msg)) : ?>
                <p><?= $msg; ?></p>
            <?php endif ; ?>
            <!-- フォームで追加商品情報をvalidate.phpへ送信 -->
            <form action="include.php" method="post">
                <div class="mb-3">
                    <label for="InputId" class="form-label">商品ID</label>
                    <input type="number" class="form-control" id="InputId" name="id" value="" aria-describedby="nameHelp">
                    <div id="nameHelp" class="form-text">追加したい商品IDを入力してください</div>
                </div>
                <div class="mb-3">
                    <button type="submit" name="searchid" class="btn btn-primary">追加する</button>
                </div>
                <!-- <label>
                    追加したい商品ID:
                    <input type="number" name="id" value="">
                </label>
                <br>
                <input type="submit" name="searchid" value="追加する"> -->
            </form>
        </div>
        <div class="row">
            <!-- リクエスト一覧を表示させる（idと商品名） -->
            <h3>リクエスト一覧</h3>
            <table class="table table-warning" >
                <!-- table分け名前列を分離 -->
                <thead>
                    <tr>
                        <th scope="col" class="text-light bg-dark">商品ID</th>
                        <th scope="col" class="text-light bg-dark">商品名</th>
                    </tr>
                </thead>
                <?php for ($i = 0; $i < count($results); $i++) : ?>    
                    <tbody>
                        <tr>
                            <th><?php echo  $results[$i]['product_id']; ?></th>
                            <td><?php echo  $results[$i]['product_name']; ?></th>
                        </tr>
                    </tbody>
                <?php endfor; ?>
            </table>
        </div>
    </div>
</body>
</html>
 