<?php
// payment.phpから送信された値のバリデーション実装
session_start();
require_once('database1.php');
require_once('payment_credit_db.php');
require_once('payment_bank_db.php');

// ユーザー情報がない場合
if (empty($_SESSION['user_id'])) {
    echo '不正アクセスです';
    exit;
}

// ユーザーIDを変数へ代入
$user_id = $_SESSION['user_id'];

// トークンがセットされていない、またはセッションに入っているトークンと送信されてきたトークンが一致しない場合
if (!isset($_POST["token"]) || $_POST["token"] !== $_SESSION['token']) {
    echo '不正アクセスです';
    exit;
}

// トークンが正しい場合
// トークンの破棄
unset($_SESSION['token']);
// セッションの保存
session_write_close();
// セッションの再開
session_start();

// 送信されてきた値がない場合
if (empty($_POST['name']) || empty($_POST['address'])) {
    echo '不正アクセスです';
    exit;
}

// 送信された送り先の値を変数へ代入
$name = $_POST['name'];
$address = $_POST['address'];

// クレジットカード決済だった場合
if ($_POST['rs'] == '1') {
    // クレジットカード決済であることをセッション変数で保持
    $_SESSION['payment'] = 1; 
    // 値を変数へ代入
    $cc_name = $_POST['cc_name'];
    $cc_number = $_POST['cc_number'];
    $cc_time = $_POST['cc_time'];
    $cc_cvv = $_POST['cc_cvv'];

    // カード情報のバリデーション
    // 名義（大文字半角アルファベット 姓名の間にスペース）
    if (!preg_match('/^[A-Z]+\s[A-Z]+\z/', $cc_name)) {
        $_SESSION['msg'] = '※カード名義は大文字半角アルファベット、姓名の間にスペースを入れてください';
        header('Location: payment.php');
        exit;
    }

    // カード名義は60文字まで
    if (60 < mb_strlen($cc_name, 'UTF-8')) {
        $_SESSION['msg'] = '※カード名義の文字数は60文字以内にしてください';
        header('Location: payment.php');
        exit;
    }

    // カード番号(VISA/MasterCard/American Express/Diners Club/Discover/JCB)
    // 許容例）4111111111111000
    if (!preg_match('/^(4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|6(?:011|5[0-9]{2})[0-9]{12}|^(?:2131|1800|35\d{3})\d{11}$)$/', $cc_number)) {
        // エラー
        $_SESSION['msg'] = '※正しいカード番号を入力してください';
        header('Location: payment.php');
        exit;
    }

    // カード有効期限（MMYY）
    if (! preg_match('/^([0-9]{2})([0-9]{2})\z/', $cc_time, $matches)) {
        // エラー
        $_SESSION['msg'] = '※有効期限を正しく記入してください';
        header('Location: payment.php');
        exit;
    } else {
        // 最初の([0-9]{2})にマッチしている数字（月）
        $month = $matches[1];
        // 次の([0-9]{2})にマッチいている数字を20●●に変更する（年）
        $year = sprintf('20%s', $matches[2]);
        
        // 日付妥当性
        if (!checkdate($month, 1, $year)) {
            // エラー
            $_SESSION['msg'] = '※有効期限を正しく記入してください';
            header('Location: payment.php');
            exit;
        }
        // カードの有効期限範タイムスタンプ
        $expiration = mktime(0, 0, 0, $month, 1, $year); 
        // 本日のタイムスタンプ
        $today = mktime(0, 0, 0, date('m'), 1, date('Y'));
        // 過去の有効期限であった場合
        if ($expiration < $today) {
            // エラー
            $_SESSION['msg'] = '※カード有効期限が切れています';
            header('Location: payment.php');
            exit;
        }
        // 未来の場合（有効期限は最長10年程度？）
        $future = mktime(0, 0, 0, date('m'), 1, date('Y') + 10);
        if ($expiration > $future) {
            // エラー
            $_SESSION['msg'] = '※有効期限を正しく記入してください';
            header('Location: payment.php');
            exit;
        }
    }
    
    // セキュリティコード（3～4桁の数字）
    if (!preg_match('/^[0-9]{3,4}\z/', $cc_cvv)) {
        // エラー
        $_SESSION['msg'] = '※セキュリティコードを正しく記入してください';
        header('Location: payment.php');
        exit;
    }

    // カード情報のバリデーションを通過
    // 送信された合計金額を変数へ代入
    $total_amount = $_SESSION['total_amount'];

    // CVVハッシュ化
    $save_cvv = password_hash($cc_cvv, PASSWORD_DEFAULT);

    // データベースに登録する
    $payment_credit = new PaymentCredit;
    $payment_credit->createPaymentCredit($name, $address, $cc_name, $cc_number, $cc_time, $save_cvv, $total_amount, $user_id);

}

// 銀行口座決済だった場合
if ($_POST['rs'] == '2') {
    // 銀行口座決済であることをセッション変数で保持
    $_SESSION['payment'] = 2; 
    // 値を変数へ代入
    $b_name = $_POST['b_name'];
    $b_number = $_POST['b_number'];
    $b_cvv = $_POST['b_cvv'];
    // var_dump($b_name);
    // exit;

    // 口座名義は全角カタカナ、スペース、全角カタカナ
    if (!preg_match("/^[ァ-ヶー]+[ |　]+[ァ-ヶー]/u", $b_name)) {
        $_SESSION['msg'] = '※口座名義は全角カタカナ、姓名の間にスペースを入れてください';
        header('Location: payment.php');
        exit;
    }

    // 口座名義60文字
    if (60 < mb_strlen($b_name, 'UTF-8')) {
        $_SESSION['msg'] = '※口座名義の文字数は60文字以内にしてください';
        header('Location: payment.php');
        exit;
    }
    
    // 銀行口座番号7桁
    if (!preg_match('/^[0-9]{7}\z/', $b_number)) {
        $_SESSION['msg'] = '※正しい口座番号を記入してください';
        header('Location: payment.php');
        exit;
    }

    // 暗証番号は半角4桁
    if (!preg_match('/^[0-9]{4}\z/', $b_cvv)) {
        $_SESSION['msg'] = '※暗証番号は半角数字4桁を記入してください';
        header('Location: payment.php');
        exit;
    }

    // 口座情報のバリデーション通過後
    // 送信された合計金額を変数へ代入
    $total_amount = $_SESSION['total_amount'];
   
    // 暗証番号をハッシュ化
    $save_cvv = password_hash($b_cvv, PASSWORD_DEFAULT);
    // データベースに登録する
    $payment_bank = new PaymentBank;
    $payment_bank->createPaymentBank($name, $address, $b_name, $b_number, $save_cvv, $total_amount, $user_id);
}

// 決済情報登録後
// 以降、使用しないので合計金額セッション破棄
unset($_SESSION['total_amount']);
// done.phpでカート内を空にする
// （決済情報登録の外部キーを持たせて）購入履歴に商品をインサートしていく
header('Location: done.php');
exit;
