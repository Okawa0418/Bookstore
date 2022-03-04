<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- modal -->
    <link rel="stylesheet" href="modal2.css">
    <!-- 位置、画像 -->
    <link rel="stylesheet" href="describe.css">
</head>
<body>
    <!-- As a link -->
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid bg-warning mb-3">
        <a href="index.php"  style="color:inherit;text-decoration: none;"><h1>BOOK STORE</h1></a>
    </div>
    </nav>
    <!-- As a heading -->
    <nav class="navbar navbar-light bg-light">
    <div class="container-fluid bg-danger mb-3">
        <span class="navbar-brand mb-0 h1">ご利用方法</span>
    </div>
</nav>
<!--ジャンボトロン  -->
<div class="row">
    <div class="col-8">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
            <div class="box">
                <img src ="photojp/describe.jpg" width="600" height="400">
                <h2>BOOKSTOREへようこそ</h2>
            </div>
            <p>便利、使いやすい ブックストアで本を購入しましょう。本の世界へLet's go </p>
        </div>
    </div>
    <div class="col-4">
        <iframe width="350" height="300" src="https://www.youtube.com/embed/7Qp5vcuMIlk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <iframe width="350" height="300" src="https://www.youtube.com/embed/CZmu6YWtI58" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
<!-- card -->
<div class="container">
  <div class="row">
        <div class="col">
        <!-- 1 of 2 -->
            <div class="card border-secondary mb-3">
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
                                                <img src="photojp/list.png" width="600" height="450">
                                                <p>1）商品名 2)数量　値段  3)購入ボタン　4) リクエストシート詳細　5）お問い合わせフォーム</p>
                                            </div>
                                            <div class="works_modal_close"></div>
                                            <!-- pagination -->
                                            <!-- <nav aria-label="...">
                                                <ul class="pagination">
                                                    <li class="page-item disabled">
                                                    <a class="page-link">Previous</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item active" aria-current="page">
                                                    <a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                    <a class="page-link" href="#">Next</a>
                                                    </li>
                                                </ul>
                                                </nav> -->
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
        <div class="card border-secondary mb-3">
        <h5 class="card-header">豊富な品揃え</h5>
            <div class="card-body">
                <h5 class="card-title">くすりの窓口最大級の在庫</h5>
                <p class="card-text">予約リストであなたの好きな本を購入できます。あなたの好きな本が購入でききますよ。予約リストでお好きな本のタイトルを記入しましょう。</p>
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
                                        <img src="photojp/question.png" width="800" height="400">
                                        <p>お客様の購入したい本をリクエストシートに記載後購入する事ができるシステムです。本のタイトル名の欄に著者も含めて記載してください。また入荷時の連絡をご希望の方は選択覧がありますのでチェックをしてください。</p>
                                        <!-- <img src="confirm.png" width="700" height="200"> -->
                                        <!-- <p></p> -->
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
        <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
        <div class="card-header">新規登録はこちら</div>
            <div class="card-body">
                <h5 class="card-title">BOOKSTOREを使ってみよう</h5>
                <p class="card-text">最短5分で簡単登録人気NO1のBOOKSTORE。</p>
                <form method="post" action="signup.php">
                    <input type="submit" value="クリック" name="index" class="btn btn-outline-dark">
                </form>
            </div>
        </div>
    </div>
        <!-- 1 of 3 -->
    <div class="col">
        <div class="card text-white bg-warning mb-3" style="max-width: 20rem;">
            <div class="card-header">商品画面</div>
            <div class="card-body">
                <h5 class="card-title">さー始めよう</h5>
                <p class="card-text">幅広いジャンルの本があります幅広いジャンルの本があります</p>
                <form method="post" action="index.php">
                    <input type="submit" value="クリック" name="index" class="btn btn-outline-dark">
                </form>
            </div>
        </div>
    </div>
    <!-- 1 of 3 -->
    <div class="col">
        <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
        <div class="card-header">リクエストシート</div>
            <div class="card-body">
                <h5 class="card-title">あなたの好きな本は何ですか？</h5>
                <p class="card-text">予約リクエストを記入してあなたの好きな本を購入しましょう。</p>
                <form method="post" action="request.php">
                    <input type="submit" value="クリック" name="index" class="btn btn-outline-dark">
                </form>
            </div>
        </div>
    </div>
    <!-- 1 of 3 -->
</div>
<!-- お問合せフォーム -->
<footer>
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="photojp/describetwoguys.jpg"  width="800" height="400">
        <h1 class="display-5 fw-bold">BOOKSTORE</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">1)お支払い方法、注文内容の確認・変更・キャンセルについて2)会員登録・ログイン・退会について3)よくある質問</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <form method="post" action="trouble.php">
                    <input type="submit" value="質問ボット" name="confirm" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">
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