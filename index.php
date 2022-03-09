<?php
    session_start();
    require_once('database1.php');

    $database = new Database1;
    // productテーブルから降順にデータを取得する
    $allProduct = $database->getAllProductDesc();

    // categoryテーブルから全レコード取得
    $allCategory = $database->getAllRecord('category');
    
    // セッション変数にエラーメッセージが格納されていた場合
    if (isset($_SESSION['msg'])) {
        // 変数へ代入
        $msg = $_SESSION['msg'];
        // エラーメッセージのセッション破棄
        unset($_SESSION['msg']);
    }

    // 検索した言葉がセッション変数に入っている場合
    if (isset($_SESSION['search_word'])) {
        $search = $_SESSION['search_word'];
        // 検索結果の配列
        $allProduct = $database->searchProduct($search);
        unset($_SESSION['search_word']);
    }

    // categoryセッションに値が入っていた場合の画面表示
    if (isset($_SESSION['category1'])) {
        // productテーブルからcategoryが1であるものを取得する
        $allProduct = $database->getProductByCtgId(1);
        unset($_SESSION['category1']);
    }

    if (isset($_SESSION['category2'])) {
        // productテーブルからcategoryが2であるものを取得する
        $allProduct = $database->getProductByCtgId(2);
        unset($_SESSION['category2']);
    }

    if (isset($_SESSION['category3'])) {
        // productテーブルからcategoryが3であるものを取得する
        $allProduct = $database->getProductByCtgId(3);
        unset($_SESSION['category3']);
    }

    if (isset($_SESSION['category4'])) {
        // productテーブルからcategoryが4であるものを取得する
        $allProduct = $database->getProductByCtgId(4);
        unset($_SESSION['category4']);
    }

    // 検索欄に値が入って送信された場合
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        // 検索結果の配列
        $allProduct = $database->searchProduct($search);
        // 検索した言葉をセッションで保持
        $_SESSION['search_word'] = $search;
    }

    // カテゴリー別を押したときの処理
    if (isset($_POST['category'])) {
        // ctg_idを受け取る
        $ctg_id = $_POST['category'];
        // productテーブルからcategoryが$ctg_idであるものを取得する
        $allProduct = $database->getProductByCtgId($ctg_id);
        // カテゴリー別表示させた場合各categoryセッションに入れる
        if ($ctg_id == 1) {
            $_SESSION['category1'] = $ctg_id;
        } elseif ($ctg_id == 2) {
            $_SESSION['category2'] = $ctg_id;
        } elseif ($ctg_id == 3) {
            $_SESSION['category3'] = $ctg_id;
        } else {
            $_SESSION['category4'] = $ctg_id;
        }
    }

    // 数量選択して購入画面へ遷移後、また商品選択へ戻ってきた場合
    if (isset($_SESSION['save_quantity'])) {
        // 数量のセッションを変数へ代入
        $save_quantity = $_SESSION['save_quantity'];
        // 数量セッションを破棄
        unset($_SESSION['save_quantity']);
    }

    function h($s) {
        return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
    }
  
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧画面</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="img.css">
</head>
<body>
    <!-- ヘッダー・ナビゲーションバーの固定 -->
    <div class='fixed-top'>
        <!-- ヘッダーとナビバーのコンテナここから -->
        <div class="container-fluid">
            <div class="row">
            <header style="background-color: white;">  
                <a href="index.php"  style="color:inherit;text-decoration: none;"><h1>BOOK STORE</h1></a>
            </header>
            </div>
            <!-- navbarのrowここから -->
            <div class="row">
                <!-- navbarここから -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">               
                    <a class="navbar-brand"><h2>商品一覧</h2></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">ホーム</a>
                            </li>
                            <!-- ログイン情報がセッションで保持されている場合 -->
                            <?php if (isset($_SESSION['user_id'])) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">ログアウト</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pur_history.php">購入履歴</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="confirm.php">カートを見る</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="favorite_list.php">お気に入り</a>
                                </li>
                            <!-- ログイン情報がない場合 -->
                            <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="login_form.php">ログイン</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="signon.php">新規会員登録</a>
                                </li>
                            <?php endif ; ?>
                            
                            <!-- カテゴリーのドロップダウンメニュー -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    カテゴリー
                                </a>
                                <!-- ドロップダウンの中身 -->
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- カテゴリーをfor文で表示していく -->
                                <?php for ($i=0; $i<count($allCategory); $i++) : ?>
                                    <!-- カテゴリー別にフォームを送信する -->
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="category" value="<?=$allCategory[$i]['ctg_id']?>">
                                        <li><button class="dropdown-item" type="submit"><?=$allCategory[$i]['variation']?></li>
                                    </form>
                                <?php endfor ; ?>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="describe.php">ご利用方法</a>
                            </li>
                            <li class="nav-item">
                            <!-- 本のリクエストページへ遷移するボタン -->
                                <form action="invitation.php" method="get">
                                    <button type="submit" class="btn btn-info" style="width:140px;">本のリクエストはこちら</button>
                                </form>
                            </li>
                            <li class="nav-item">
                                <button type="button" id="js-btn" class="btn btn-secondary btn-sm" style="width: 45px;">詳細</button>
                                <!-- 詳細ボタン押した後の表示内容 -->
                                <div class="modal" id="js-modal">
                                    <div class="modal-inner">
                                        <!-- closeボタン -->
                                        <div class="modal-close" id="js-close-btn">✖</div>
                                        <!-- id -->
                                        <div class="modal-contents" id="js-modal-content">
                                            <p>
                                                リクエストシートとは<br>
                                                お客様が購入したい本を記入していただくリクエストコーナーです。<br>
                                                1）メールアドレス、名前を記入した後本のタイトルを記入してください。<br>
                                                2）入荷時の連絡を希望される方は「必要」を選択ください。<br>
                                                3）記入された情報がお間違いのないよう確認した後送信ボタンを押してください。
                                            </p>
                                            <!-- 自分の保存データ挿入したい　スクリーンショットしたリクエストページ -->
                                            <img src="">
                                        </div>
                                    </div>
                                </div> 
                            </li>
                        </ul>
                        
                        <!-- 検索フォーム -->
                        <form class="d-flex" action="index.php" method="post">
                            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success" type="submit">Search</button>
                        </form>
                        <!-- 検索フォームここまで -->
                    </div>                  
                </nav>
                <!-- navbarここまで -->
            </div>
            <!-- navbarのrowここまで -->
        </div>
        <!-- ヘッダーとナビバーのコンテナここまで -->
    </div>
    <!-- ヘッダー・ナビゲーションバーの固定ここまで -->

    <!-- ヘッダーとナビバーが重ならないようにmargin-topの指定 -->
    <div style="margin-top: 130px;">
        <!-- 商品選択しない場合、エラーメッセージの表示 -->
        <?php if (isset($msg)) : ?>
            <p><?= $msg; ?></p>
        <?php endif ; ?>
    
        <!-- bootstrap grid  -->
        <div class="container-fluid">
            <div class="row">              
                <!-- cardのbootstrapここから -->
                <div class="row row-cols-1 row-cols-md-6 g-4">
                    <!-- for文でカードを繰り返し表示 -->
                    <?php for ($i=0; $i < count($allProduct); $i++) : ?>
                        <div class="col">
                            <a href="show.php?product_id=<?=$allProduct[$i]['product_id'];?>" class="card h-100">               
                                <img src="<?= $allProduct[$i]['file_path']; ?>" class="card-img-top">
                                <div class="card-body">
                                    <!-- バイト数40文字以降は・・・を表示させる -->
                                    <p class="card-text"><?= h(mb_strimwidth($allProduct[$i]['product_name'], 0, 40, '…', 'utf8')); ?></p>                       
                                </div>                           
                            </a>  
                        </div>
                    <?php endfor ; ?>                 
                </div>
                <!-- cardのbootstrapここまで -->
            </div>
            <!-- rowここまで -->

            <!-- フッターrowここから -->
            <div class="row">
                <!-- フッター表示 -->
                <footer id="footer" class="border-top bg-light" style="height:150px;margin-top:100px;">
                    <ul>
                        <div class="mb-2">
                            <li style="list-style: none;"><a class="link-dark" href="trouble.php">質問ボット</a></li>
                        </div>   
                        <div class="mb-2">
                            <li style="list-style: none;"><a class="link-dark" href="customerformadd.php">お問い合わせ</a></li>
                        </div>   
                        <div class="mb-2">
                            <li style="list-style: none;"><a class="link-dark" href="schedule.php">BOOK STOREスケジュール</a></li>
                        </div>  
                        <div class="mb-2">
                            <?php if (isset($_SESSION['user_id'])) : ?>
                                <li style="list-style: none;"><a class="link-dark" href="quit.php">退会する</a></li>
                            <?php endif ; ?>
                        </div>
                    </ul>
                </footer>
            </div>
            <!-- フッターここまで -->
        </div>
        <!-- container-fluidここまで -->
    </div>
    <!-- margin-topの指定ここまで -->
    <script src="img.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
