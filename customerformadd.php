<!DOCTYPE html>
<html lang="ja">
<head>
    <a href="index.php"  style="color:inherit;text-decoration: none;"><h1>BOOK STORE</h1></a>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<?php
// 変数値確認
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
<?php
    if (isset($_SESSION['msg3'])) {
    $msg3 = $_SESSION['msg3'];
    unset($_SESSION['msg3']);
}
?>

<p class="fs-3">お問い合わせフォーム</p>
<form name ="form1" method="post" action="customerformcheck.php">
    <!--bootstrap  -->
    <div class="mb-3">
    <!-- message　エラー表示 -->
    <?php if (isset($msg)) : ?>
        <?= $msg; ?>
        <br>
    <?php endif ; ?>

    <?php if (isset($msg2)) : ?>
        <?= $msg2; ?>
        <br>
    <?php endif ; ?>

    <?php if (isset($msg3)) : ?>
        <?= $msg3; ?>
        <br>
        <?php endif ; ?>

    連絡先メールアドレス<br>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1">
    <br>
    <div class="mb-3">
    webネーム<br>
    <input type="text" name="name" class="form-control" id="exampleInputPassword1">
    <br>
    お問い合わせ内容<br>
    <input type="content"name='content' class="form-control" id="exampleInputPassword1" >
    <br>
    <input type="submit" class="btn btn-warning" value="問い合わせる" />
</form>
<footer>
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="photojp/describe2.png"  width="800" height="400">
        <h1 class="display-5 fw-bold">BOOKSTORE</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">お問合せありがとうございました。またのご利用お待ちしております。</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <form method="post" action="index.php">
                    <input type="submit" value="商品一覧" name="index" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">
                </form>
            </div>
        </div>
    </div>
</footer>
</body>
</html>