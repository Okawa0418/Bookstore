<?php
    session_start();
    require_once('database1.php');

    $database = new Database1;
    $results = $database->getAllRecord('product');

    // 商品削除後のメッセージが入っている場合
    if (isset($_SESSION['msg'])) {
        // 変数へ代入
        $msg = $_SESSION['msg'];
        // セッション初期化
        unset($_SESSION['msg']);
    }
    
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
    <title>商品管理画面</title>
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
        </header>
    </div>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#"><h2>商品リスト</h2></a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="manager_index.php">管理者Top</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="userList.php">顧客リスト</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="takeform.php">リクエスト一覧</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="include.php">商品追加フォーム</a>
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
        <!-- 削除後のメッセージが入っている場合 -->
        <?php if (isset($msg)) : ?>
            <p><?=$msg?></p>
        <?php endif ; ?>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">商品名</th>
                    <th scope="col">価格</th>
                    <th scope="col">カテゴリー</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($results); $i++) : ?>
                    <tr>
                        <th scope="row"><?= $results[$i]['product_id'];?></th>
                        <td><?= h($results[$i]['product_name']);?></td>
                        <td><?= $results[$i]['price'];?></td>
                        <td>
                            <?php if ($results[$i]['category'] == 1) : ?>
                                文学・評論・人文・思想
                            <?php elseif ($results[$i]['category'] == 2) : ?>
                                ビジネス・コンピュータ
                            <?php elseif ($results[$i]['category'] == 3) : ?>
                                生活・趣味・実用
                            <?php else : ?>
                                教育・資格
                            <?php endif ; ?>
                        </td>
                        <td>
                            <form action="proList_show.php" method="post">
                                <input type="hidden" name="product_id" value="<?=$results[$i]['product_id']?>">
                                <button type="submit" class="btn btn-secondary btn-sm">詳細</button>
                            </form>                           
                        </td>
                    </tr>
                <?php endfor ; ?>
            </tbody>
        </table>
    </div>
</body>
</html>