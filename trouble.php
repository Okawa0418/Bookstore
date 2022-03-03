<!DOCTYPE html>
<html lang="ja">
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
                                                    解決しない場合大変ご迷惑をお掛けしてます下のお問い合わせリンク先に行きお問い合わせフォームの項目番号1を選択した後要件を記入してください。
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
                <p>クレジットカード決済は現在使用する事はできません</p>
                <li class="list-group-item">
                    <a href="customerformadd.php"class="link-primary">お問い合わせフォーム</a>
                    <ul class="works_list">
                        <li class="works_item">
                            <div class="works_image">
                                <div class="works_modal_open" data-modal-open="modal-2">
                                    <p>クレジットカード使用について</p>
                                    <div class="works_image_mask">
                                        <div class="mask_text">クリックで拡大</div>
                                    </div>
                                    <div class="works_modal_wrapper" data-modal="modal-2">
                                        <div class="works_modal_mask"></div>
                                            <div class="works_modal_window">
                                                <div class="works_modal_content">
                                                    <!-- 中身内容変更 -->
                                                    <h1>クレジット決済</h1>
                                                    <h1>クレジット決済の使用は現在行っていません。ご了承ください。
                                                        本サイトでは商品画面をで商品、数量を選択した後ボタンをクリックするだけで購入できます
                                                        解決しない場合大変ご迷惑をお掛けしてますが下のお問い合わせリンク先に行きクレジットカードの項目番号2を選択した後要件を記入してください。
                                                    </h1>
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
                <p>購入履歴についてのよくある質問</p>
                <li class="list-group-item">
                    <a href="pur_history.php"class="link-danger">購入履歴</a>
                    <ul class="works_list">
                        <li class="works_item">
                            <div class="works_image">
                                <div class="works_modal_open" data-modal-open="modal-3">
                                    <p>購入履歴</p>
                                    <div class="works_image_mask">
                                        <div class="mask_text">クリックで拡大</div>
                                    </div>
                                    <div class="works_modal_wrapper" data-modal="modal-3">
                                        <div class="works_modal_mask"></div>
                                            <div class="works_modal_window">
                                                <div class="works_modal_content">
                                                    <!-- 中身内容変更 -->
                                                    <h1>購入履歴について</h1>
                                                    <h1>購入履歴を反映するのに時間がかかる恐れがあります。解決しない場合大変ご迷惑をお掛けしてますが下のお問い合わせリンク先に行きお問い合わせフォームの項目番号3を選択した後エラーを記入してください。
                                                        なおお手数をおかけしますが返信には時間がかかる場合がございますのでご了承ください。
                                                    </h1>
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
                <p>ご希望日時の選択以外での入荷日はお客様の現在住所に左右される可能性があります</p>
                <li class="list-group-item">
                    <a href="customerformadd.php"class="link-primary">お問い合わせフォーム</a>
                    <a href="describe.php"class="link-secondary">ご利用説明</a>
                    <ul class="works_list">
                        <li class="works_item">
                            <div class="works_image">
                                <div class="works_modal_open" data-modal-open="modal-4">
                                    <p>入荷日</p>
                                    <div class="works_image_mask">
                                        <div class="mask_text">クリックで拡大</div>
                                    </div>
                                    <div class="works_modal_wrapper" data-modal="modal-4">
                                        <div class="works_modal_mask"></div>
                                            <div class="works_modal_window">
                                                <div class="works_modal_content">
                                                    <!-- 中身内容変更 -->
                                                    <h1>入荷日に関しまして万が一商品が一週間以上経過した場合でも届けられていない場合には以下の原因が考えられます
                                                        1）BOOKSTORE側の出荷間違い2）配達トラブル3)住所登録先の記載間違い   
                                                        大変申し訳ございません。1.2の場合はBOOKSTOREの出荷担当へお電話いてください 0534-7979-7979 
                                                    </h1>
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
                <p>BOOKSTORは会員登録無料で提供させていただいています。</p>
                <li class="list-group-item">
                        <a href="customerformadd.php"class="link-primary">お問い合わせフォーム</a>
                    <ul class="works_list">
                        <li class="works_item">
                            <div class="works_image">
                                <div class="works_modal_open" data-modal-open="modal-5">
                                    <p>ご利用規約</p>
                                    <div class="works_image_mask">
                                        <div class="mask_text">クリックで拡大</div>
                                    </div>
                                    <div class="works_modal_wrapper" data-modal="modal-5">
                                        <div class="works_modal_mask"></div>
                                            <div class="works_modal_window">
                                                <div class="works_modal_content">
                                                    <!-- 中身内容変更 -->
                                                    <h1>ご利用規約事項</h1>
                                                    <p>本規約は、株式会社くすりの窓口が運営するインターネットサイト「BOOKSTORE」の利用に関し、会員と、BOOKSTORE上で商品またはサービスを会員に提供する目的でBOOKSTORE上に仮想店舗を出店している者（以下「加盟書店」といいます）およびBOOKSTOREとの間に適用されるものとします。
                                                    入会）

                                                        BOOKSTORの会員になることを希望する個人、法人その他責任者の定めのある団体（以下「入会希望者」といいます）は、本規約の内容を理解し、その内容に拘束されることを承諾したうえで、入会登録画面においてトーハン所定の事項（以下「登録事項」といいます）をすべて届け出るものとします。なお、同一の入会希望者が複数の会員登録を行うことはできません。
                                                        会員登録手続は、前項の届け出に対するBOOKSTOREの承諾をもって完了するものとします。ただし、BOOKSTOREは、入会希望者が以下に定める事由のいずれかに該当することが判明した場合、入会希望者の入会を認めないことがあります。
                                                        ① 入会希望者が実在しないこと。

                                                        ② 入会希望者がすでに会員になっている場合。

                                                        ③ 入会希望者が過去に本規約違反等により、会員資格の停止処分を受けたことがあり、または、過去に本規約違反等で会員資格の抹消が行われたことがある場合。

                                                        ④ BOOKSTORに届け出た事項に虚偽、誤記または記入もれがあった場合。
                                                    </p>
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
            <img class="d-block mx-auto mb-4" src="photojp/describe2.png"  width="800" height="400">
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