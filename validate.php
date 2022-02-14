<!-- バリデーション実装 -->
<?php
// session_start();
// var_dump($_POST);
// exit;
if(empty($_POST['value'])){
    // エラーメッセージをセッションに格納
    $_SESSION['msg'] = 'ユーザー名を入力してください。';
    // 登録画面に戻る
    header('Location: include.php');
    exit;
}
        // セッション変数にエラーメッセージが格納されていた場合
    // if (isset($_SESSION['msg'])) {
        // 変数へ代入
        // $msg = $_SESSION['msg'];
        // エラーメッセージのセッション破棄
        // unset($_SESSION['msg']);
    // }
    // エラーメッセージ
    // $err=[];
    // バリデーション
    // if(!$value=filter_input(INPUT_POST,'name')){
    // $err[]='名前を入力してください。';
    // }
    
    // if(!$value=filter_input(INPUT_POST,'price')){
    // $err[]='値段を入力してください';
    // }
?> 
</body>
</html>