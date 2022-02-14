<?PHP

class data{

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     
    <!-- Bootstrap Javascript(jQuery含む) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
?>

<?php

// エラーメッセージ
$err = [];

// バリデーション
if(!$username=filter_input(INPUT_POST,'user_name')){
  $err[]='ユーザ名を記入してください。';
}
if(!$email=filter_input(INPUT_POST,'mail_address')){
  $err[]='メールアドレスを記入してください。';
}
$password=filter_input(INPUT_POST,'password'){
// 正規表現
if (!preg_match("/\A[a-z\d]{8,100}+\z/i",$password)){
  $err[]='パスワードは英数字8文字以上100文字以下にしてください。';
}
$password_conf=filter_input(INPUT_POST,'password_conf');
if($password !== $password_conf){
  $err[]='確認用パスワードと異なっています。';
}
if (count($err)===0){
  // ユーザを登録する処理
}

?>

<?php
// ユーザーネームが空の場合
if(empty($_POST['user_name'])){
        // エラーメッセージをセッションに格納
        $_SESSION['msg'] = 'ユーザー名を入力してください。';
        // 登録画面に戻る
        header('Location: signup.php');
        exit;
    }
?>

<?php
    // セッション変数にエラーメッセージが格納されていた場合
    if (isset($_SESSION['msg'])) {
      var_dump($_SESSION);
      exit;
      // 変数へ代入
      $msg = $_SESSION['msg'];
  }
?>
<?php if (isset($msg)) : ?>
        <?= $msg; ?>
    <?php endif ; ?>



    <h1><?php echo $done; ?></h1><!--メッセージの出力-->
<?php echo $link; ?>

<?php
    if (isset($_SESSION['msg6'])) {
    $msg6 = $_SESSION['msg6'];
    unset($_SESSION['msg6']);
}
?>
<?php if (isset($msg6)) : ?>
  <?= $msg6; ?>
  <br><br>
<?php endif ; ?>

if (!empty($_POST['password'])&&!preg_match("/\A[a-z\d]{8,100}+\z/i",$password)){
  $_SESSION['msg6'] ='パスワードは英数字8文字以上100文字以下にしてください。';
  header('Location: signup.php');
}