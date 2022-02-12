<!-- バリデーション実装 -->
<?php

$name='';
$price='';

$errors =[];

if (isset($_POST)) {

    if(empty($_POST['product_id']))
{
       $errors[] ='名前は必須項目です';
}
if (empty($_POST['price'])) {
       $errors[] ='値段を入れてください';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h1>ヴァリデーション結果</h1>
    <?php if (empty($errors)):
?>
    <?php else: ?>
    <ul>
        <?php foreach ($errors as $msg): ?>
        <li><?=msg ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; >
</body>
</html>