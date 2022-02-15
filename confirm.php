<?php
session_start();
// 変更id からname
$product_name = $_SESSION['product']['name'];
$amount_quantity = $_SESSION['product']['quantity'];
$price= $_SESSION['product']['price'];
$total_amount = $_SESSION['product']['total_amount'];

$product_name=array(
    array('' => '$name', '$product' => $name ),
    array('$product_name' => '$product','name' =>$product)
);
for ($i=0, $size = count($product_name); 
   $i< $size; ++$i) {
    $product_name[$i]
['name'] = mt_rand(product,name);
}      
?>
                  
<!-- // foreach pr
// foreach ($product_name as $key => $name) {
//     echo '<pre>';
//     echo  $name;
//     echo '<pre>';
// }
// foreach ($amount_quantity as $key => $value) {
//     echo '<pre>';
//     echo  $value;
//     echo '<pre>';
// }
// foreach ($price as $key => $value) {
//     echo '<pre>';
//     echo  $value;
//     echo '<pre>';
// }
// 出力されないforeach
// foreach ($total_amount as $key => $value) {
//     echo '<pre>';
//     echo  $value;
//     echo '<pre>';
// } -->





<!DOCTYPE html>
<html lang="en">
<head>
    <title>商品追加</title>
</head>
<body>
    <!--アクションで完了画面へ -->
<form name ="form1" method="post" action="done.php">
    <h2>商品を確認後追加ボタンを押して下さい</h2>
    <input type="submit" value="発注する" name="confirm">
</form>
</body>
</html> -->


