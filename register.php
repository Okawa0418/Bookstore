<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
<!-- Bootstrap Javascript(jQuery含む) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<?php
require_once('database1.php');
?>

<?php
if(empty($_POST['user_name'])){
  echo '名前は必須項目です。';
}
if(empty($_POST['mail_address'])){
    echo 'メールアドレスは必須項目です。';
  }
if(empty($_POST['post_address'])){
    echo '住所は必須項目です。';
  }
if(empty($_POST['tel'])){
    echo '電話番号は必須項目です。';
  }
if(empty($_POST['password'])){
    echo 'パスワードは必須項目です。';
  }
exit;
// ファイルの取り込み
    // フォームからの値をそれぞれ変数に代入
    $name=$_POST['user_name'];
    $mail=$_POST['mail_address'];
    $post=$_POST['post_address'];
    $tel=$_POST['tel'];
    // パスワードのハッシュ化
    $pass=password_hash($_POST['password'],PASSWORD_DEFAULT);

    // データベース接続
    $data1=new Database1();
    $dbh = $data1->dbConnect();

    // メールアドレスの重複チェック
    // userテーブルからメールアドレスが一致するものを検索
    $sql="SELECT*FROM user WHERE mail_address = :mail_address";
    // SQLの準備
    $stmt = $dbh->prepare($sql);
    // プレースホルダの値を設定
    $stmt->bindValue(':mail_address', $mail);
    // SQLを実行
    $stmt->execute();
    $member = $stmt->fetch();

    if($member['mail_address'] === $mail){
        $msg='同じメールアドレスが存在します。';
        $link='<a href="signup.php">戻る</a>';
    }else{
    // 登録されていなければinsert
    $sql = "INSERT INTO user(user_name, mail_address, password,post_address,tel) VALUES (:user_name, :mail_address, :password,:post_address,:tel)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user_name', $name);
    $stmt->bindValue(':mail_address', $mail);
    $stmt->bindValue(':password', $pass);
    $stmt->bindValue(':post_address', $post);
    $stmt->bindValue(':tel', $tel);
    $stmt->execute();
    $msg = '会員登録が完了しました';
    $link = '<a href="login_form.php">ログインページ</a>';
}
?>

<h1><?php echo $msg; ?></h1><!--メッセージの出力-->
<?php echo $link; ?>