<!-- productテーブルのUPDATE処理 -->
<?php

// 送信されてきたトークンが一致する場合にデータ削除処理を実行
if (isset($_POST["token"]) 
    && $_POST["token"] === $_SESSION['token']) {

    // トークンの破棄
    unset($_SESSION['token']);
    // セッションの保存
    session_write_close();
    // セッションの再開
    session_start();

    // 画像が送信された場合はその画像のfile_path生成してupdateする
    if (isset($_FILE))
    // 画像が送信されなかった場合はfile_pathを除きupdateする



    $_SESSION['msg'] = 'ID番号「' . $product_id . '」を編集しました';
    header('Location: productList.php');

}