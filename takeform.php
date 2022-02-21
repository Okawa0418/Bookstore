
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
<html lang="ja">
<head>
    <!-- bootstrap ｃｓｓ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <header>
                <a href="manager_index.php"  style="color:inherit;text-decoration: none;">
                    <h1>BOOK STORE</h1>
                    <h2>Manager</h2>
                </a>
            </header>
        </div>
    </div>    
    <div class="container-fluid">
        <div class="row">
            <!-- Navbarここから -->
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#"><h2>商品リクエスト一覧</h2></a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="manager_index.php">管理者Top</a>
                    </li>
                    </ul>
                </div>
            </nav>    
            <!-- Navbarここまで -->
        </div>
    </div>
    <div class="container-fluid">    
        <table class="table table-warning" >
        <!-- table分け名前列を分離 -->
            <thead>
                <tr>
                    <th scope="col" class="text-light bg-dark">商品ID</th>
                    <th scope="col" class="text-light bg-dark">商品名</th>
                    <th scope="col" class="text-light bg-dark">email</th>
                    <th scope="col" class="text-light bg-dark">名前</th>
                </tr>
            </thead>    
            <tbody>
                <?php for ($i=0; $i< count($results); $i++) : ?>
                    <tr>
                        <th><?php echo  $results[$i]['product_id']; ?></th>
                        <td><?php echo  $results[$i]['product_name']; ?></td>
                        <td><?php echo  $results[$i]['email']; ?></td>
                        <td><?php echo  $results[$i]['name']; ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>   
        </table>
    </div>   
</body>
</html>
    





