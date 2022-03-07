<!-- include.phpから送信された値のバリデーション実装 -->
<?php
session_start();
require_once('database1.php');

// 空の値が送信されてきた場合
if (empty($_POST['name'])) {
    // エラーメッセージをセッションに格納
    $_SESSION['msg']['name'] = '※商品名を入力してください。';
} else {
    // 商品名が71文字以上だった場合
    if (70 < mb_strlen($_POST['name'], 'UTF-8')) {
        $_SESSION['msg']['name'] = '※商品名は70文字以下にしてください';
    }
}

if (empty($_POST['price'])) {
    // エラーメッセージをセッションに格納
    $_SESSION['msg']['price'] = '※値段を入力してください。';
}

if (empty($_POST['category'])) {
    // エラーメッセージをセッションに格納
    $_SESSION['msg']['category'] = '※カテゴリーを選択してください。';
}


// ファイル情報を変数で取得
$file = $_FILES['img'];
// ファイルシステムトラバーサル対策
$filename = basename($file['name']);
$tmp_path = $file['tmp_name'];
// MAX_FILE_SIZEを超えたらerrorに2が入る
$file_err = $file['error'];
$filesize = $file['size'];
// 保存するファイル名
$save_filename = date('YmdHis') . $filename;
// 保存先
$upload_dir = 'images/';


// アップロードされているかどうか
if (!is_uploaded_file($tmp_path)) {
    $_SESSION['msg']['fileupload'] = '※ファイルが選択されていません';
}

// ファイルサイズのバリデーション
if (1048576 < $filesize || $file_err == 2) {
    $_SESSION['msg']['filesize'] = '※ファイルサイズは1MB未満にしてください';
}

// 画像の拡張子をチェック
$allow_ext = array ('jpg', 'jpeg', 'png', 'jfif');
// 送信された画像の拡張子を取得
$file_ext = pathinfo($filename, PATHINFO_EXTENSION);
// 許容される拡張子かどうか判定（小文字にしてから判定する）
if (!in_array(strtolower($file_ext), $allow_ext)) {
    // 許容される拡張子でない場合
    $_SESSION['msg']['fileext'] = '※画像ファイルを添付してください';
}

// include.phpから送信された値でエラーが出た場合
if (isset($_SESSION['msg'])) {
    // 値が送信されていればそれぞれセッション変数へ代入
    // include.phpで初期値が入るようにする
    if (isset($_POST['name'])) {
        $_SESSION['p_name'] = $_POST['name'];
    }
    if (isset($_POST['price'])) {
        $_SESSION['p_price'] = $_POST['price'];
    }
    
    // 登録画面に戻る
    header('Location: include.php');
    exit;
}


// バリデーション通過後
// 送信された値を変数へ代入
$name = $_POST['name'];
$price = $_POST['price'];
$category = $_POST['category'];
// 画像の保存
if (move_uploaded_file($tmp_path, $upload_dir . $save_filename)) {
    $file_path = $upload_dir . $save_filename;
}

$database = new Database1;
// productテーブルにデータを挿入
$database->createProduct($name, $price, $file_path, $category);

// セッション変数に追加メッセージを代入
$_SESSION['msg'] = '「' . $name . '」を追加しました。';

// 商品リストへリダイレクト
header('Location: productList.php');
exit;
