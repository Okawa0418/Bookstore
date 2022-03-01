<!-- 商品をリストから削除する処理 -->
<?php
session_start();
require_once('database1.php');


// 送信されてきたトークンが一致する場合にデータ削除処理を実行
if (isset($_POST["token"]) 
    && $_POST["token"] === $_SESSION['token']) {

    // トークンの破棄
    unset($_SESSION['token']);
    // セッションの保存
    session_write_close();
    // セッションの再開
    session_start();

    // 送信された値を変数へ代入
    $product_id = $_POST['product_id'];
    $file_path = $_POST['file_path'];

    // 該当するfile_pathを削除する
    // 取得したファイルパスが存在している場合
    if (file_exists($file_path)) {
        // ファイル削除
        unlink($file_path);
    }

    // productテーブルの該当データを削除する
    $database = new Database1;
    $database->deleteProductById($product_id);

    $_SESSION['msg'] = 'ID番号「' . $product_id . '」を削除しました';
    header('Location: productList.php');
    exit;
}

// トークンが一致しない場合
echo '不正アクセスです';
exit;


