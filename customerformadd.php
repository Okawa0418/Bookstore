<!DOCTYPE html>
<html lang="en">
<head>
    <title>お問い合わせフォーム</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
 <?php
     if (isset($_SESSION['msg3'])) {
     $msg3 = $_SESSION['msg3'];
     unset($_SESSION['msg3']);
 }
 ?>
<div>お問い合わせフォーム</div>
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
<input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
<br>
<div class="mb-3">
webネーム<br>
<input type="text" name="name" class="form-control" id="exampleInputPassword1">
<br>
お問い合わせ内容<br>
<input type="text" name="content" class="form-control" id="exampleInputPassword1">
<br>
<input type="submit" value="問い合わせる" />
</form>

</body>
</html>