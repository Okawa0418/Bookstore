
<?php
 
// データベース接続
require_once('database1.php');
$data1=new Database1();
$dbh = $data1->dbConnect();
session_start();



// ＳＱＬ　文
$sql ='SELECT * FROM newbook';  
// ＳＱＬ実行文の準備
$stmt = $dbh->query($sql);
// *データベースからの結果を取取
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);



    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- bootstrap ｃｓｓ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
</head>
<body>
<table class="table table-warning" >
<!-- <table class="table"> -->
    <!-- table分け名前列を分離 -->
    <thead>
        <tr>
            <th scope="col" class="text-light bg-dark">商品ID</th>
            <th scope="col" class="text-light bg-dark">商品名</th>
        </tr>
    </thead>
        <?php for ($i=0; $i< count($results); $i++) : ?>    
        <thead>
            <tbody>
                <tr>
                    <th><?php echo  $results[$i]['product_id']; ?></th>
                    <th><?php echo  $results[$i]['product_name']; ?></th>
                </tr>
            </tbody>
        </thead>
<?php endfor; ?>
</table>
</body>
</html>
    





