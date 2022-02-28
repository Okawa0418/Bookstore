<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="modal2.css">
</head>
<body>
    <!-- As a link -->
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="describe.jpg">BOOKSTORE</a>
    </div>
    </nav>
    <!-- As a heading -->
    <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">ご利用方法</span>
    </div>
</nav>
<!--ジャンボトロン  -->
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
        <div style ="text-aligh:center">
            <img src ="describe.jpg" width="600" height="400">
        </div>
        <h1 class="display-4 fw-normal">ようこそ!たくさんの本があなたを待っている!</h1>
        <p class="lead fw-normal">簡単、便利、使いやすさを重視したBOOKSTOREが登場。</p>
        <a class="btn btn-outline-secondary" href="">Coming soon</a>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>
<!--ジャンボトロンEND  -->
<!-- カード -->
<div class="container">
  <div class="row">
        <div class="col">
        <!-- 1 of 2 -->
            <div class="card">
                <h5 class="card-header">商品ページ基本操作</h5>
                <div class="card-body">
                    <h5 class="card-title">商品選択から購入まで</h5>
                    <p class="card-text">サイトで商品を受け取る。クレジットがなくてもOK! 支払いワンクリックでOK!</p>
                    <ul class="works_list">
                        <li class="works_item">
                            <div class="works_image">
                                <div class="works_modal_open" data-modal-open="modal-3">
                                    <p>商品を購入の流れ</p>
                                    <div class="works_image_mask">
                                        <div class="mask_text">クリックで拡大</div>
                                    </div>
                                    <div class="works_modal_wrapper" data-modal="modal-3">
                                        <div class="works_modal_mask"></div>
                                        <div class="works_modal_window">
                                            <div class="works_modal_content">
                                                <h1>基本操作</h1>
                                                <img src="list.png" width="700" height="200">
                                                <p>1</p>
                                                <img src="show.png" width="700" height="200">
                                                <p>1</p>
                                            </div>
                                            <div class="works_modal_close">✖</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>       
                    </ul>
                </div>
            </div>
        </div>
    <!-- 2 of 2 -->
    <div class="col">
        <div class="card">
        <h5 class="card-header">豊富な品揃え</h5>
            <div class="card-body">
                <h5 class="card-title">くすりの窓口最大級の在庫</h5>
                <p class="card-text">予約リストであなたの好きな本を購入できます</p>
                </div>
                <li class="works_item">
                    <div class="works_image">
                        <div class="works_modal_open" data-modal-open="modal-2">
                            <p>リクエストシートとわ？</p>
                            <div class="works_image_mask">
                                <div class="mask_text">クリックで拡大</div>
                            </div>
                        </div>
                        <div class="works_modal_wrapper" data-modal="modal-2">
                            <div class="works_modal_mask"></div>
                                <div class="works_modal_window">
                                    <div class="works_modal_content">
                                        <h1>リクエストシート</h1>
                                        <img src="question.png" width="800" height="200">
                                        <p>あ</p>
                                        <img src="confirm.png" width="700" height="200">
                                        <p></p>
                                    </div>
                                    <div class="works_modal_close">✖</div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </li>
            </div>
        </div>
    </div>
</div>
<!-- end 2 of 2 -->
<!-- 1 of 3 -->
<div class="row">
    <div class="col">
        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
        <div class="card-header">新規登録はこちら</div>
            <div class="card-body">
                <h5 class="card-title">BOOKSTOREを使ってみよう</h5>
                <p class="card-text">最短5分で簡単登録人気NO1のBOOKSTORE。</p>
            </div>
        </div>
    </div>
        <!-- 1 of 3 -->
    <div class="col">
        <div class="card text-dark bg-warning mb-3" style="max-width: 18rem;">
            <div class="card-header">商品画面</div>
            <div class="card-body">
                <h5 class="card-title">さー始めよう</h5>
                <p class="card-text">幅広いジャンルの本があります幅広いジャンルの本があります</p>
            </div>
        </div>
    </div>
    <!-- 1 of 3 -->
    <div class="col">
        <div class="card text-dark bg-info mb-3" style="max-width: 18rem;">
        <div class="card-header">商品画面</div>
            <div class="card-body">
                <h5 class="card-title">さー始めよう</h5>
                <p class="card-text">さー始めよう幅広いジャンルの本があります。さーはじめよう世界はあなたを</p>
            </div>
        </div>
    </div>
    <!-- 1 of 3 -->
</div>
<!-- お問合せフォーム -->
<footer>
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="describetwoguys.jpg"  width="800" height="400">
        <h1 class="display-5 fw-bold">Centered hero</h1>
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