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
                <a href="productList.php"class="link-success">商品リスト</a>
            </li>
            <li class="list-group-item">
                <a href="userList.php"class="link-warning">顧客リスト</a>
            </li>
            <li class="list-group-item">
                <a href="takeform.php"class="link-info">リクエスト一覧</a>
            </li>
            <li class="list-group-item">
                <a href="include.php"class="link-primary">商品追加フォーム</a>
            </li>
            <li class="list-group-item">
                <a href="inquiry.php"class="link-secondary">お問合せリスト</a>
            </li>
            <li class="list-group-item">
                <a href="manager_logout.php"class="link-danger">ログアウト</a>
            </li>
        </ul>
    </div>
    <!--デザイン１  -->
    <footer>
        <div class="px-4 py-5 my-5 text-center"> 
            <h1 class="display-5 fw-bold">BOOKSTORE</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4 bg-warning bm-3">3時間超過労働している方へ）<br>しっかり休憩を取り体を休ませてください。<br>3分間体を伸ばしリラックスしましょう。<br>上から順番にストレッチをしていきましょう。<br>1)ゆっくりで大丈夫です<br>2)1項目一分間を目安に取り組みましょう。<br>今日もお疲れ様です。</p>
            </div>
        </div>
        <!-- スライド -->
        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
        <div class="carousel-inner ">
            <div class="carousel-item active">
            <img src="photojp/workout1.png" class="d-block w-100" alt="text-center">
            </div>
            <div class="carousel-item">
            <img src="photojp/workout2.png" class="d-block w-100" alt="text-center">
            </div>
            <div class="carousel-item">
            <img src="photojp/workout3.png" class="d-block w-100" alt="text-center">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>
