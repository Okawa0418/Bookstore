<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">質問コーナー</a>
        </div>
    </nav>
    <!--jumbotron  -->
    <div class="h-100 p-5 text-white bg-warning rounded-3">
          <h2>Change the background</h2>
          <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
          <button class="btn btn-outline-light" type="button">Example button</button>
    </div>
    <!--jumbotron end  -->
    <!--card  -->
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
            <li class="list-group-item">A third item</li>
            <li class="list-group-item">A third item</li>
            <li class="list-group-item">A third item</li>
            <li class="list-group-item">A third item</li>
        </ul>
        <div class="card-footer">
            Card footer
        </div>
    </div>
    <!--card end  -->
    <footer>
        <div class="px-4 py-5 my-5 text-center">
            <img class="d-block mx-auto mb-4" src="describe2.png"  width="800" height="400">
            <h1 class="display-5 fw-bold">BOOKSTORE</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">1)お支払い方法、注文内容の確認・変更・キャンセルについて2)会員登録・ログイン・退会について3)よくある質問</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <form method="post" action="customerformadd.php">
                        <input type="submit" value="お問い合わせ" name="confirm" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">
                    </form>
                    <form method="post" action="index.php">
                        <input type="submit" value="商品画面へ" name="index" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">
                    </form>
                </div>
            </div>
        </div>
    </footer>
<script src="modal2.js"></script>
</body>
</html>