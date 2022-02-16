<?php
session_start();

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
</head>
<body>
    <div style="font-size:14px">新規本を追加してください</div>
    <!-- エラーメッセージ表示 -->
    <?php if (isset($msg)) : ?>
        <?= $msg; ?>
    <?php endif ; ?>
    <!-- フォームで追加商品情報をvalidate.phpへ送信 -->
    <form enctype="multipart/form-data" action="validate.php" method="post">
        <label>
            名前を記入してください:<br>
            <input type="text" name="name" value="">
        </label>
        <br>
        <label>
            値段を記入してください:<br>
            <input type="number" name="price" min="0" max="100000" value="">
        </label>
        <br>
        <label>
            画像を選択してください:<br>
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
            <input type="file" name="img" accept="images/*">
        </label>
        <br>
        <label>
            カテゴリーを選択してください:<br>
            <select name="category">
                <option value="">カテゴリーを選択</option>
                <option value="1">文学・評論・人文・思想</option>
                <option value="2">ビジネス・コンピュータ</option>
                <option value="3">生活・趣味・実用</option>
                <option value="4">教育・資格</option>
            </select>
        </label>
        <br>
        <input type="submit" name="submit" value="発注">
    </form>
    </div>
</body>
</html>
 