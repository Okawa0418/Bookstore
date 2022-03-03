<html>
<head>
    <title>退会理由</title>
    <style>
    body{
        background-color: #FFCCFF;
    }
.container{
    background-color: whitesmoke;
    box-shadow: 1px 1px 2px 1px grey;
    padding: 50px 8px 20px 38px;
    margin-left: auto;
    margin-right: auto;
    width: 30em
    
}
.txt{
    width: 90%;
    height:5%;
    border:1px solid brown;
    border-radius: 05px;
    padding: 20px 15px 20px 15px;
    margin: 10px 0px 15px 0px;
}
p.img_center {
   text-align: center;
   opacity: 0.9;
}
    </style>
  </head> 
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="quit.css">
  </head>
  <body>
      <center><h1>よろしければ退会理由を教えてください。ご協力ありがとうございます</h1></center>
      <center><p>任意調査のため強制ではありません。下画面の商品ページボタンでトップ画面に戻ります。</p></center>

  <!-- form 追加 -->
  <div class="container">
      <form method="post" action="">
        <!-- ラジオボタン選択肢 -->
        <label>名前</label><br>
        <input type="text" class="txt" name="username" placeholder="名前を入力してください"/><br>

        <label>ご意見板</label><br>
        <input type="text" class="txt" name="opinion" placeholder="どんなことでも良いですご意見を頂ければ幸いです。"/><br>

        <label> 選択覧</label><br><br>
        <input type="radio"  name="question" value="1使用頻度が少なくなってきたため"/>1使用頻度が少なくなってきたため
        <!-- ラジオボタン選択肢 -->
        <br>
        <input type="radio" name="question" value="2他社サイトを使用するもしくは使用しているため"/>2他社サイトを使用するもしくは使用しているため
        <!-- ラジオボタン選択肢 -->
        <br>
        <input type="radio"  name="question" value="3利用するに当たり不便な箇所があるため"/>3利用するに当たり不便な箇所があるため
        <!-- ラジオボタン選択肢 -->
        <br>
        <input type="radio"  name="question" value="4金銭面の問題で退会を希望する"/>4金銭面の問題で退会を希望する
        <!-- 送信ボタン -->
        <br><br>
        <input type="submit" class="txt" name="insert" value="送信する"/>
      </form>
    </div>
    <!-- お問合せフォーム -->
    <footer>
        <div>
            <p class="img_center">
                <img src="describeschool.png" width="800" height="300" >
            </p>
            <center><h1>BOOKSTORE</h1></center>
            <div>
                <center><p class="lead mb-4">誠にありがとうございました。またのご利用お待ちしております。</p></center>
                <div>
                    <form method="post" action="index.php">
                       <center> <input type="submit" value="商品画面へ" name="index"></center>
                    </form>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
<?php

$connection= mysqli_connect("localhost", "root","Rilakkuma1231","bookstore");
$db = mysqli_select_db($connection,'bookstore');

if(isset($_POST['insert']))
{
    $username = $_POST['username'];
    $opinion = $_POST['opinion'];
    $question = $_POST['question'];

    $query = "INSERT INTO `quit` (`username`,`opinion`,`question`)VALUES('$username','$opinion','$question')";
    //左値 ローカルusername,pass 右SQL  
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        echo '<script type="text/javascript"> alert("投稿完了しました。この度はBOOKSTOREをご使用頂き誠にありがとうございました。またのご利用お待ちしております。")</script>';
    }
    else
    {
        echo '<script type="text/javascript"> alert("不具合対応中です誠に申し訳ございません")</script>';
    }
}
?>