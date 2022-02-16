<?php
session_start();
// index.phpの各セッションに連結
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
<table class="table">
    <!-- table分け名前列を分離 -->
    <thead>
        <tr>
            <th scope="col" class="text-light bg-dark">(1):商品名</th>
            <th scope="col" class="text-light bg-dark">(2):個数</th>
            <th scope="col" class="text-light bg-dark">(3):値段</th>
            <th scope="col" class="text-light bg-dark">(4):合計金額</th>
        </tr>
    </thead>
    <!-- ループ各セッションの値を呼び出す -->
    <?php for ($i=0; $i<count ($product_name); $i++) : ?>
        <table class="table table-warning" >
            <tbody>
                <tr>
                    <th scope="row" class="text-light bg-dark">(1)</th>
                    <td><?php echo $product_name[$i]; ?></td>
                </tr>
                <tr>
                    <th scope="row" class="text-light bg-dark">(2)</th>
                    <td><?php echo $amount_quantity[$i]; ?></td>
                </tr>
                <tr>
                    <th scope="row" class="text-light bg-dark">(3)</th>
                    <td><?php echo $price[$i]; ?></td> 
                </tr>
                <tr>
                    <th scope="row" class="text-light bg-dark">(4)</th>
                    <td><?php echo $total_amount; ?></td>  
                </tr>               
            </tbody>
        </table>
<?php endfor; ?> 
<!--アクションで完了画面へ -->
<form name ="form1" method="post" action="done.php">
    <span class="text-light bg-dark">商品を確認後追加ボタンを押して下さい</span><br>
    <input type="submit" value="発注する" name="confirm" class="btn btn-primary mb-4">
</form>
</body>
</html>


