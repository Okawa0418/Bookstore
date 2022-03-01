<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <!-- モーダル -->
     <link rel="stylesheet" href="modal2.css">
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
        <a class="navbar-brand">質問コーナー</a>
        </div>
    </nav>
    <!--jumbotron  -->
    <div class="h-100 p-5 text-white bg-secondary rounded-3">
        <h2>BOOKSTOREに関するご質問にお答えするボットです。</h2>
        <p>お問い合わせフォームへお客様が行く前に問題が解決しなかった場合はお手数をおかけしますがお問い合わせフォームからお問合せください。</p>
        <form method="post" action="index.php">
            <input type="submit" value="商品画面へ" name="index" class="btn btn-warning btn-lg px-4 me-sm-3 fw-bold">
        </form>
    </div>
    <!--jumbotron end  -->
    <!--card  -->
    <!-- 質問リスト -->
    <li class="list-group-item">
        <!--card  -->
        <div class="card" style="width: 60rem;">
            <ul class="list-group list-group-flush">
                <!-- 文字 -->
                <h1>1)新規登録、ログイン、退会に関する質問</h1>
                    <p>各種お探しのリンクへ移動できます。以下の事にお困りの場合は詳細をクリックしてください。（クリックすると拡大されます）</p>
                <li class="list-group-item">
                    <a href="signup.php"class="link-success">新規登録</a>
                    <a href="login.php"class="link-warning">ログイン画面</a>
                    <a href=""class="link-info">退会</a>
                    <!-- <a href="include.php"class="link-primary">商品追加フォーム</a>
                    <a href="inquiry.php"class="link-secondary">お問合せリスト</a>
                    <a href="manager_logout.php"class="link-danger">ログアウト</a> -->
                    <ul class="works_list">
                        <li class="works_item">
                            <div class="works_image">
                                <div class="works_modal_open" data-modal-open="modal-1">
                                    <p>新規登録、ログイン、退会に関する詳細</p>
                                    <div class="works_image_mask">
                                        <div class="mask_text">クリックで拡大</div>
                                    </div>
                                    <div class="works_modal_wrapper" data-modal="modal-1">
                                        <div class="works_modal_mask"></div>
                                            <div class="works_modal_window">
                                                <div class="works_modal_content">
                                                    <!-- 中身内容変更 -->
                                                    <h1>登録画面</h1>
                                                    <p>会員登録しようとしたら、以下のエラーが出て登録できない。どうしてですか？
                                                    ※入力いただいたメールアドレスは既に会員登録済みです。別のメールアドレスでご登録ください。
                                                    ---------------
                                                    BOOKSTOREでは、同一メールアドレスで複数の会員登録をすることができません。
                                                    そのため、今回以前に該当のメールアドレスで会員登録がなされていると、同じメールアドレスでの新規登録がいただけません。該当のメールアドレスでログインの上ご利用いただくか、別のメールアドレスでの新規登録をお試しください。</p>
                                                    <h1>ログイン</h1>
                                                    <p>パスワードを忘れてしまった場合
                                                    ---------------
                                                    お手数ではございますが、こちらからパスワードの再設定をお願いいたします。
                                                    (誠に恐れ入りますが、サポートセンターではパスワードの管理は行っていません)</p>
                                                    <h1>退会</h1>
                                                    <p>退会したい
                                                    ---------------
                                                    マイページの「退会手続き」のページでお手続きください。
                                                    退会されますと、注文履歴が削除され、復元できません。ご注意ください。

                                                    なお、ご注文後、未引き取りの商品がある場合は、お受け取り確認後の退会手続きとなります。

                                                    また、最終ご注文品の店頭到着日から30日間は、商品お引き取り確認期間として、「会員情報の変更」ページからの退会手続きは制限させていただいております。

                                                    予めご了承ください。</p>
                                                <!-- ※linkで退会へ繋げる -->
                                                </div>
                                                <div class="works_modal_close">✖</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li> 
                    </ul>    
                </li>
                <li class="list-group-item">
        <!--card  -->
        <div class="card" style="width: 60rem;">
            <ul class="list-group list-group-flush">
                        <!-- 文字 -->
                <h1>2)クレジットカード使用について</h1>
                <p>ああ</p>
                <li class="list-group-item">
                    <ul class="works_list">
                        <li class="works_item">
                            <div class="works_image">
                                <div class="works_modal_open" data-modal-open="modal-2">
                                    <p>会員登録、ログイン、退会に関する質問</p>
                                    <div class="works_image_mask">
                                        <div class="mask_text">クリックで拡大</div>
                                    </div>
                                    <div class="works_modal_wrapper" data-modal="modal-2">
                                        <div class="works_modal_mask"></div>
                                            <div class="works_modal_window">
                                                <div class="works_modal_content">
                                                    <!-- 中身内容変更 -->
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
                            </div>
                        </li> 
                    </ul>    
                </li>
                <li class="list-group-item"><!--card  -->
        <div class="card" style="width: 60rem;">
            <ul class="list-group list-group-flush">
                        <!-- 文字 -->
                <h1>3）購入履歴について</h1>
                <p>ああ</p>
                <li class="list-group-item">
                    <ul class="works_list">
                        <li class="works_item">
                            <div class="works_image">
                                <div class="works_modal_open" data-modal-open="modal-3">
                                    <p>会員登録、ログイン、退会に関する質問</p>
                                    <div class="works_image_mask">
                                        <div class="mask_text">クリックで拡大</div>
                                    </div>
                                    <div class="works_modal_wrapper" data-modal="modal-3">
                                        <div class="works_modal_mask"></div>
                                            <div class="works_modal_window">
                                                <div class="works_modal_content">
                                                    <!-- 中身内容変更 -->
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
                            </div>
                        </li> 
                    </ul>    </li>
                <li class="list-group-item"><!--card  -->
        <div class="card" style="width: 60rem;">
            <ul class="list-group list-group-flush">
                        <!-- 文字 -->
                <h1>4)入荷日について</h1>
                <p>ああ</p>
                <li class="list-group-item">
                    <ul class="works_list">
                        <li class="works_item">
                            <div class="works_image">
                                <div class="works_modal_open" data-modal-open="modal-4">
                                    <p>会員登録、ログイン、退会に関する質問</p>
                                    <div class="works_image_mask">
                                        <div class="mask_text">クリックで拡大</div>
                                    </div>
                                    <div class="works_modal_wrapper" data-modal="modal-4">
                                        <div class="works_modal_mask"></div>
                                            <div class="works_modal_window">
                                                <div class="works_modal_content">
                                                    <!-- 中身内容変更 -->
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
                            </div>
                        </li> 
                    </ul>    </li>
                <li class="list-group-item"><!--card  -->
        <div class="card" style="width: 60rem;">
            <ul class="list-group list-group-flush">
                        <!-- 文字 -->
                <h1>5)利用規約について</h1>
                <p>ああ</p>
                <li class="list-group-item">
                    <ul class="works_list">
                        <li class="works_item">
                            <div class="works_image">
                                <div class="works_modal_open" data-modal-open="modal-5">
                                    <p>会員登録、ログイン、退会に関する質問</p>
                                    <div class="works_image_mask">
                                        <div class="mask_text">クリックで拡大</div>
                                    </div>
                                    <div class="works_modal_wrapper" data-modal="modal-5">
                                        <div class="works_modal_mask"></div>
                                            <div class="works_modal_window">
                                                <div class="works_modal_content">
                                                    <!-- 中身内容変更 -->
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
                            </div>
                        </li> 
                    </ul>    
                </li>
            </ul>
        </div>    
    </li>        
     <!--card end  -->
    <footer>
        <div class="px-4 py-5 my-5 text-center">
            <img class="d-block mx-auto mb-4" src="describe2.png"  width="800" height="400">
            <h1 class="display-5 fw-bold">BOOKSTORE</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">1)お手数ですが解決されなかった場合はこちらのお問い合わせフォームからご用件を投稿してください。恐れ入りますが返信には時間が掛かる場合がございますのでご了承ください。</p>
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