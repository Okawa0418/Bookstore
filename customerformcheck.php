<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム</title>
</head>
<body>
    <?php
        $db_user ="root";
        $db_pass ="Rilakkuma1231";
        $db_host ="localhost";
        $db_name ="bookstore";
        $db_type ="mysql";

        $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";

        try{
            $pdo = new PDO($dsn,$do_user,$db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            print"投稿完了しました <br>";
        }   catch(PDOException $Exception) {
                die('エラー:' .$Exception->getMessage());
        }
        
            $pdo->beginTransaction();
            $sql ="INSERT INTO customer (email,name,content)VALUES (:email,:name,:content)";
            $stmh =$pdo->prepare($sql);
            $stmh->bindValue(':email',
                $_POST['email'],PDO::PARAM_STR);
            $stmh->bindValue(':name',
                $_POST['name'],PDO::PARAM_STR);
            $stmh->bindValue(':content',
                $_POST['content'],PDO::PARAM_STR);
            $stmh->execute();
            $pdo->commit();
            print"データを".$stmh->rowCount()."投稿を完了しました <br>";

        // }catch (PDOEception $Exception) {
            // $pdo->rollBack();
        //     print"エラー:". $Exception->getMessage();
        // }
    ?>   
</body>
</html>
<!-- <body>
// このページまでがpostに値が挿入されている
$staff_email=$_POST['email'];
$staff_name=$_POST['name'];
$staff_content=$_POST['content'];
var_dump($staff_content);


$staff_email=htmlspecialchars($staff_email,ENT_QUOTES,'UTF-8');
$staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
$staff_content=htmlspecialchars($staff_content,ENT_QUOTES,'UTF-8');

if($staff_email=='')
{
    print'emailが登録されていません <br />';
}
if ($staff_name=='')
{
    print'名前が入力されていません <br />';  
}
else
{
    print'Webネーム:';
    print $staff_name;
    print'<br />';
}

if($staff_content=='')
{
    print'内容が入力されていません <br />';
}
// もしも入力に問題があった場合戻るボタン
if($staff_email=='' || $staff_name==''|| $staff_content='')
{
    print'<form>';
    print'<input type="button" onclick="history.back()" value="戻る">';
    print'</form>';
}
// もし入力に問題がない場合
else
{
    //　値の移動をさせるためセッションで繋げる
   
    print'<form method="post" action="customerformdone.php">';
    $_SESSION=['$staff_email'];
    $_SESSION=['$staff_name'];
    $_SESSION=['$staff_content'];
    print'<input type="button" onclick="history.back()" value="戻る">';
    print'<input type="submit" value="ok">';
    print'</form>';
}

?> -->
