<?PHP

class data{

function database(){

    // フォームからの値をそれぞれ変数に代入
    $name=$_POST['user_name'];
    $mail=$_POST['mail_address'];
    $post=$_POST['post_address'];
    $tel=$_POST['tel'];
    // パスワードのハッシュ化
    $pass=password_hash($_POST['password'],PASSWORD_DEFAULT);
    
    // データベースへの接続
    $dsn="mysql:host=localhost; dbname=bookstore; charset=utf8";
    $username="root";
    $password="";

    // データベース接続エラーチェック
      // 例外が発生しうる処理（PDOのインスタンス化）
    try {
        $dbh = new PDO($dsn, $username, $password);

    // 例外発生時の処理
    } catch (PDOException $e) {
        $msg = $e->getMessage();
    }  

    // usersテーブルからメールアドレスが一致するものを検索
    $sql="SELECT*FROM user WHERE mail_address = :mail_address";

    // SQLの準備
    $stmt = $dbh->prepare($sql);

    // プレースホルダの値を設定
    $stmt->bindValue(':mail_address', $mail);

    // SQLを実行
    $stmt->execute();

    $member = $stmt->fetch();

}
}
$data=new data();
$data->database();
?>