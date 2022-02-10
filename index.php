<?php
    session_start();
    require_once('database1.php');

    $database = new Database1;
    $allProduct = $database->getAllProduct();

    // セッション変数にエラーメッセージが格納されていた場合
    if (isset($_SESSION['msg'])) {
        // 変数へ代入
        $msg = $_SESSION['msg'];
        // エラーメッセージのセッション破棄
        unset($_SESSION['msg']);
    }

    // 検索欄に値が入って送信された場合
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        // 検索結果の配列array(2) { [0]=> array(2) { ["product_name"]=> string(18) "星の王子さま" ["price"]=> int(528) } [1]=> array(2) { ["product_name"]=> string(150) "あつまれ どうぶつの森 & ハッピーホームパラダイス・大型アップデート全対応 最終完全攻略本+究極超カタログ" ["price"]=> int(1980) } }
        $allProduct = $database->searchProduct($search);
    }


   

    
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧画面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <header>
        <h1>BOOK STORE</h1>
        <a href="index.php">ホーム</a>
        <!-- ログイン情報がセッションで保持されている場合 -->
        <?php if (isset($_SESSION['user_id'])) : ?>
            <a href="logout.php">ログアウト</a>
        <?php else : ?>
            <a href="login_form.php">ログイン</a>
            <a href="signup.php">新規会員登録</a>
        <?php endif ; ?>
    </header>
    
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    
    <div class="container-fluid">
        <a class="navbar-brand"><h2>商品一覧画面</h2></a>
        <form class="d-flex" action="index.php" method="post">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
   
    </nav>
    
    <!-- エラーメッセージの表示 -->
    <?php if (isset($msg)) : ?>
        <?= $msg; ?>
    <?php endif ; ?>
    <table>
        <tr>
            <th>商品名</th>
            <th>価格</th>
            <th>数量</th>
        </tr>
    
    <!-- 商品一覧の購入フォーム -->
    <form action="index2.php" method="post">
        <!-- for文で商品テーブルのレコードを全て表示 -->
        <?php for ($i=0; $i < count($allProduct); $i++) : ?>
        <tr>
            <!-- 商品名、価格 -->
            <td><?= $allProduct[$i]['product_name']; ?></td>
            <td><?= $allProduct[$i]['price']; ?></td>
            <td>
            <!-- 数量選択 -->
            <select name="quantity[<?= $i; ?>]">
                <!-- 0~50を表示させる -->
                <?php for ($j = 0; $j < 51; $j++) : ?>
                    <option><?= $j ?></option>
                <?php endfor ; ?>
            </select>
            </td>
            <!-- product_idを送る -->
            <input type="hidden" name="product_id[<?= $i; ?>]" value="<?=$allProduct[$i]['product_id'];?>">
            <!-- 金額も送る -->
            <input type="hidden" name="price[<?= $i; ?>]" value="<?=$allProduct[$i]['price'];?>">
        </tr>
        <?php endfor ; ?>
            <!-- 購入ボタン -->
            <td><input type="submit" name="buy" value="購入する"></td>
        </form>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>