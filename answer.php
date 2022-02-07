<?php

//answer.php

$question = $_POST['question']; //ラジオボタンの内容を受け取る
$answer = $_POST['answer']; //hiddenで送られた正解を受け取る

//結果の判定
if ($question == $answer) {
    $result = '正解!クイズに正解した君には霧吹きをあげちゃうぞ!';
} else {
    $result =
        '残念です。。正解はゴムの木だよインテリアには一番人気だぞ!クイズに答えてくれた君に霧吹きをプレゼント･･･';
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
 <title>簡易クイズプログラム - 結果</title>
</head>
<body>
 
 <h2>クイズの結果</h2>
<?php echo $result; ?>
 <h1>やったね!霧吹きがもらえたよ!
<img src="https://images-na.ssl-images-amazon.com/images/I/7162AYqGJvL._SL1500_.jpg" width="600px" height="600px">
<div>
 <a href="index.php" class="pagetop" >トップ画面へ戻る</a>
</div>
</body>
</html>