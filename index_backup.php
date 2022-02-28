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

    // 疑似ランダムなバイト文字列を生成
    $toke_byte = random_bytes(32);
    // バイナリデータを16進数に変換
    $token = bin2hex($toke_byte);
    // 生成したトークンをセッションに保存
    $_SESSION['token'] = $token;

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
                    <h1>BOOK STORE</h1>
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
                            <!-- ログイン情報がない場合 -->
                            <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="login_form.php">ログイン</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="signup.php">新規会員登録</a>
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
    <div style="margin-top: 120px;">
        <!-- エラーメッセージの表示 -->
        <?php if (isset($msg)) : ?>
            <p>&#x26a0;<?= $msg; ?></p>
        <?php endif ; ?>
    
        <!-- bootstrap grid  -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <!-- 商品一覧の購入フォーム -->
                    <form action="index2.php" method="post">
                    <div align="right" class="sticky-top" style="top: 127px">
                        <button type="submit" class="btn btn-danger" style="width:100px;">購入する</button>
                    </div>
                        <!-- tableのレスポンシブクラスここから -->
                        <div class="overflow-auto" style="width:800px; height:1000px;">
                        <div class="table-responsive">
                            <!-- tableタグで商品一覧を表示 -->
                            <table class="table align-middle">
                                <!-- 項目 -->
                                <thead>                                 
                                    <tr>
                                        <th>商品画像</th>
                                        <th>商品名</th>
                                        <th>価格</th>
                                        <th>数量</th>
                                    </tr>
                                </thead>                          
                                <!-- 商品名、価格、数量選択欄の表示 -->
                                <tbody>
                                    <!-- for文で商品テーブルのレコードを全て表示 -->
                                    <?php for ($i=0; $i < count($allProduct); $i++) : ?>
                                    <tr>
                                        <!-- 商品画像 -->
                                        <td><img src="<?= $allProduct[$i]['file_path']; ?>"width="100" height="150"></td>
                                        <!-- 商品名、価格 -->
                                        <td><?= h($allProduct[$i]['product_name']); ?></td>
                                        <td><?= $allProduct[$i]['price']; ?></td>
                                        <td>
                                        <!-- $save_quantityに値が入っている場合 -->
                                        <?php if (isset($save_quantity)) : ?>
                                            <!-- $save_quantity[$i]が1以上だった場合 -->
                                            <?php if (1 <= $save_quantity[$i]) : ?>
                                                <!-- 数量選択 -->
                                                <select id="select_<?= $i; ?>" name="quantity[<?= $i; ?>]">
                                                    <!-- 0~50を表示させる -->
                                                    <?php for ($j = 0; $j < 51; $j++) : ?>
                                                        <!-- ループする数字と値がマッチするか判定 -->
                                                        <?php if ($j != $save_quantity[$i]) : ?>
                                                            <option value="<?= $j; ?>"><?= $j ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $j; ?>" selected><?= $j ?></option>
                                                        <?php endif ; ?>
                                                    <?php endfor ; ?>                       
                                                </select>
                                            <?php else : ?>
                                                <!-- 数量選択 -->
                                                <select id="select_<?= $i; ?>" name="quantity[<?= $i; ?>]">
                                                    <!-- 0~50を表示させる -->
                                                    <?php for ($j = 0; $j < 51; $j++) : ?>
                                                        <option value="<?= $j; ?>"><?= $j ?></option>
                                                    <?php endfor ; ?>                       
                                                </select>
                                            <?php endif ; ?>
                                        <!-- $save_quantityに値が入らない場合 -->
                                        <?php else : ?>
                                            <!-- 数量選択 -->
                                            <select id="select_<?= $i; ?>" name="quantity[<?= $i; ?>]">
                                                <!-- 0~50を表示させる -->
                                                <?php for ($j = 0; $j < 51; $j++) : ?>
                                                    <option value="<?= $j; ?>"><?= $j ?></option>
                                                <?php endfor ; ?>                       
                                            </select>
                                        <?php endif ; ?>
                                        </td>
                                        <!-- product_idを送る -->
                                        <input type="hidden" name="product_id[<?= $i; ?>]" value="<?=$allProduct[$i]['product_id'];?>" id="productId_<?= $i; ?>">
                                        <!-- 商品名を送る -->
                                        <input type="hidden" name="product_name[<?= $i; ?>]" value="<?=$allProduct[$i]['product_name'];?>" id="productName_<?= $i; ?>">
                                        <!-- 金額送る -->
                                        <input type="hidden" name="price[<?= $i; ?>]" value="<?=$allProduct[$i]['price'];?>" id="productPrice_<?= $i; ?>">
                                    </tr>
                                    <?php endfor ; ?>
                                    <!-- トークンを送る -->
                                    <input type="hidden" name="token" value="<?=$token?>">  
                                </tbody>
                            </table>
                            <!-- 商品一覧tableここまで -->
                        </div>
                        <!-- tableのレスポンシブクラスここまで -->
                        </div>
                    </form>
                    <!-- 購入フォームここまで -->
                </div>
                <!-- col-8ここまで -->

                <!-- 本のリクエストボタン・画像を配置 -->
                <div class="col-4">
                    <div class="mb-2">
                        <!-- 本のリクエストページへ遷移するボタン -->
                        <form action="request.php" method="get">
                            <button type="submit" class="btn btn-info" style="width:170px;">本のリクエストはこちら</button>
                        </form>
                    </div>
                    <!-- 画像 -->
                    <img src="https://blog.cd-j.net/wpcore/wp-content/uploads/4011491_s.jpg" width="300" height="300">
                    <img src="https://www.masterpeace.co.jp/wp-content/themes/masterpeace/img/common/download_img03.jpg" width="300" height="300">
                </div>
                <!-- col-4ここまで -->
            </div>
            <!-- rowここまで -->
            <!-- フッターここから -->
            <div class="row">
                <!-- フッター表示 -->
                <footer id="footer" class="border-top bg-light" style="height:130px;margin-top:100px;">
                    <ul>
                        <div class="mb-2">
                            <li style="list-style: none;"><a class="link-dark" href="request.php">本のリクエストはこちら</a>
                            <button type="button" id="js-btn">詳細</button>
                            <!-- ボタンの実装 -->
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
                        </div>
                        <div class="mb-2">
                            <li style="list-style: none;"><a class="link-dark" href="customerformadd.php">お問い合わせ</a></li>
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
    <!-- <?php $countElement = count($allProduct); ?>
    <script type="text/javascript">var countElement = "<?= $countElement ?>";</script>
    <script type="text/javascript" src="sample.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
