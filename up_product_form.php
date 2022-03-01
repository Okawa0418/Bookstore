<!-- productテーブルの内容をUPDATE -->
<?php
session_start();
require_once('database1.php');

// 編集するボタンから画面遷移してきた場合に編集フォームを表示
if (isset($_POST['update'])) {

    // 送信された値を変数へ代入
    $product_id = $_POST['product_id'];

    // 該当商品のレコードを取得
    $database = new Database1;
    $results = $database->getProductByProductId($product_id);

    $product_name = $results['product_name'];
    $price = $results['price'];
    $category = $results['category'];

} else {
    echo '不正アクセスです';
    exit;
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品編集画面</title>
    <!-- bootstrap ｃｓｓ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
</head>
<body>
    <!-- ヘッダー -->
    <div class="container-fluid">
        <header>
            <a href="manager_index.php"  style="color:inherit;text-decoration: none;">
                <h1>BOOK STORE</h1>
                <h2>Manager</h2>
            </a>
        </header>
    </div>
    <!-- ナビバー -->
    <div class="container-fluid">
        <div class="row">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><h2>商品編集</h2></a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="manager_index.php">管理者Top</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="productList.php">商品リスト</a>
                    </li>
                </ul>
            </div>
        </nav>  
        </div>       
    </div>
    <!-- 商品編集フォーム -->
    <div class="container-fluid">
        <form enctype="multipart/form-data" action="#" method="post">
            <div class="mb-3">
                <label for="InputName" class="form-label">商品名：</label>
                <!-- 商品名 -->
                <input type="text" class="form-control" id="InputName" name="name" value="<?= $product_name ?>" aria-describedby="nameHelp">
                <div id="nameHelp" class="form-text">商品の名前を編集してください</div>
            </div>
            <div class="mb-3">
                <label for="InputPrice" class="form-label">価格（円）：</label>
                <!-- 価格を記入後、バリデーションに引っかかった場合は記入していた価格を表示させる -->
                <input type="number" class="form-control" id="InputPrice" name="price" min="0" max="100000" value="<?= $price; ?>" aria-describedby="priceHelp">
                <div id="priceHelp" class="form-text">商品の単価を数字で入力してください</div>
            </div>
            <div class="mb-3">
                <label for="InputImg" class="form-label">画像：</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                <input type="file" class="form-control" id="InputImg" name="img" accept="images/*" aria-describedby="imgHelp">
                <div id="imgHelp" class="form-text">商品の画像を新たに選択してください</div>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">カテゴリーを選択してください：</label>
                <select name="category" value="" class="form-select" id="category" aria-describedby="categoryHelp">
                    <option value="">カテゴリーを選択</option>
                    <option value="1"
                    <?php 
                        if ($category == 1) {
                            echo 'selected';
                        }
                    ?>
                    >文学・評論・人文・思想</option>
                    <option value="2"
                    <?php 
                        if ($category == 2) {
                            echo 'selected';
                        }
                    ?>
                    >ビジネス・コンピュータ</option>
                    <option value="3"
                    <?php 
                        if ($category == 3) {
                            echo 'selected';
                        }
                    ?>>生活・趣味・実用</option>
                    <option value="4"
                    <?php 
                        if ($category == 4) {
                            echo 'selected';
                        }
                    ?>
                    >教育・資格</option>
                </select>
                <div id="categoryHelp" class="form-text">商品のカテゴリーを変更してください</div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">更新</button>
        </form>
    </div> 
</body>
</html>

