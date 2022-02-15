<?php
session_start();
// 変更id からname
$product_name = $_SESSION['product']['name'];
$amount_quantity = $_SESSION['product']['quantity'];
$price= $_SESSION['product']['price'];
$total_amount = $_SESSION['product']['total_amount'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- bootstrap ｃｓｓ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
</head>
<body>
    <?php for ($i=0; $i<count ($product_name); $i++) : ?>
        <table class="table">
            <tbody>
                <tr>
                    <td>商品名: <?php echo $product_name[$i]; ?></td>
                    <td>個数: <?php echo $amount_quantity[$i]; ?></td>
                    <td>値段: <?php echo $price[$i]; ?></td>    
                </tr>               
            </tbody>
        </table>
<?php endfor; ?> 
<!--アクションで完了画面へ -->
<form name ="form1" method="post" action="done.php">
    <h2>商品を確認後追加ボタンを押して下さい</h2>
    <input type="submit" value="発注する" name="confirm">
</form>
</body>
</html>


