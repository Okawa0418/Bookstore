<?php
    require_once('database1.php');

    $database = new Database1;
    $results = $database->getAllRecord('customer');
    
    function h($s) {
        return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品管理画面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <header>
            <a href="manager_index.php"  style="color:inherit;text-decoration: none;">
                <h1>BOOK STORE</h1>
                <h2>Manager</h2>
            </a>
        </header>
    </div>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#"><h2>お問合せリスト</h2></a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="manager_index.php">管理者Top</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="productList.php">商品リスト</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="userList.php">顧客リスト</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="takeform.php">リクエスト一覧</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="include.php">商品追加フォーム</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>    
    </div>
    <div class="container-fluid">
        <table class="table table-danger table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">名前</th>
                    <th scope="col">email</th>
                    <th scope="col">お問合せ内容</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($results); $i++) : ?>
                    <tr>
                        <th scope="row"><?= $results[$i]['customer_id'];?></th>
                        <td><?= $results[$i]['name'];?></td>
                        <td><?= $results[$i]['email'];?></td>
                        <td><?= $results[$i]['content'];?></td>
                        <td>
                        <form action="delete_inquiry.php" method="post">
                            <input type="hidden" name="customer_id" value="<?=  $results[$i]['customer_id']; ?>">
                            <button type="submit" name="delete">削除</button>
                        </form>
                    </td>
                    </tr>
                <?php endfor ; ?>
            </tbody>
        </table>
    </div>
</body>
</html>