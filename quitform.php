<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <a href="index.php"  style="color:inherit;text-decoration: none;"><h1>BOOK STORE</h1></a>
    <link rel="stylesheet" href="quitform.css">
</head>
<body>
<?php
session_start();
    if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<?php
    if (isset($_SESSION['msg2'])) {
    $msg2 = $_SESSION['msg2'];
    unset($_SESSION['msg2']);
}

?>
    <center><h1>よろしければ退会理由を教えてください。ご協力ありがとうございます</h1></center>
    <center><p>任意調査のため強制ではありません。下画面の商品ページボタンで商品一覧に戻ります。</p></center>
<!-- form 追加 -->
    <div class="container">
        <form method="post" action="quitdone.php">
        <!-- ラジオボタン選択肢 -->
        <?php if (isset($msg)) : ?>
            <?= $msg; ?>
            <br>
        <?php endif ; ?>

        <?php if (isset($msg2)) : ?>
            <?= $msg2; ?>
            <br>
        <?php endif ; ?>
        <label>名前</label><br>
        <input type="text" class="txt" name="username" placeholder="名前を入力してください"/><br>
        <label>ご意見板</label><br>
        <input type="text" class="txt" name="opinion" placeholder="ご意見を頂ければ幸いです。"/><br>
        <input type="submit" class="txt" value="送信する"/>
        </form>
    </div>
<!-- お問合せフォーム -->
    <footer>
        <div>
            <p class="img_center">
                <img src="photojp/describeschool.png" width="800" height="300" >
            </p>
            <center><h1>BOOKSTORE</h1></center>
            <div>
                <center><p class="lead mb-4">誠にありがとうございました。またのご利用お待ちしております。</p></center>
                <div>
                    <form method="post" action="index.php">
                        <center> <input type="submit" value="商品一覧" name="index"></center>
                    </form>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
