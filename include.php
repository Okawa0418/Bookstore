<!-- エラーメッセージの表示 -->
<?
    if(empty($_POST['name'])){
    // エラーメッセージをセッションに格納
    $_SESSION['msg'] = 'ユーザー名を入力してください。';
    // 登録画面に戻る
    header('Location: include.php');
    exit;

    // エラーメッセージ
    // $err=[];
    // バリデーション
    // if(!$=filter_input(INPUT_POST,'name')){
    // $err[]='名前を入力してください。';
    // }
    
    // if(!$=filter_input(INPUT_POST,'price')){
    // $err[]='値段を入力してください';
    // }
    ?>
<!-- // session_start();
// セッション変数にエラーメッセージが格納されていた場合
// if (isset($_SESSION['msg'])) {
// 変数へ代入
// $msg = $_SESSION['msg'];
// エラーメッセージのセッション破棄
// unset($_SESSION['msg']);
//  }
  -->
<!-- エラーメッセージの表示 -->


<!DOCTYPE html>
<html lang="en">
<head>
<!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> --> 
</head>
<!-- 新規リスト -->
<body>
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-md">
        <a class="navbar-brand" href="#">新規発注</a>
    </div>
</nav>
    <table class="table table-success table-striped">
    <tr>
            <th>新商品</th>
            <th>値段</th>
            <th>発注選択</th>
        </tr>
        <tr>
            <td>「気にしない」女はすべてうまくいかない</td>
            <td>1430円</td>
            <th><form action="" method="post">新規商品</td>
        </tr>
        <tr>
            <td>この顔と生きるということ</td>
            <td>1540円</td>
            <th><form action="" method="post">新規商品</td>
        </tr>
        <tr>
            <th>2030年すべてが「加速」する世界に備えよ</th>
            <th>2640円</th>
            <th><form action="" method="post">新規商品</td>
        </tr>
        <tr>
            <th>定年後に読みたい文庫100冊</th>
            <th>1012円</th>
            <th><form action="" method="post">準新規商品</td>
        </tr>
        <tr>
            <th>まなの本棚</th>
            <th>1540円</th>
            <th><form action="" method="post">新規商品</td>
        </tr>
        <tr>
            <th>強運の法則</th>
            <th>1650円</th>
            <th><form action="" method="post">新規商品</td>
        </tr>
        <tr>
            <th>7日間で突然頭が良くなる方法</th>
            <th>682円</th>
            <th><form action="" method="post">準新規商品</td>
        </tr>
    </table>
    < 発注実装 -->
    <div style="font-size:14px">新規本を追加してください</div>
    <form action="view.php" method="post">
        名前を記入してください:<br>
        <input type="text" name="name" value="">
        <br>
        値段を記入してください:<br>
        <input type="text" name="price" value="">
        <!-- <br> -->
        <input type="submit" name="submit" value="発注">
    </form>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
</body>
</html>

