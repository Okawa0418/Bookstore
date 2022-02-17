<!-- include.phpから送信された値のバリデーション実装 -->
<?php
session_start();

// 空の値が送信されてきた場合
if (empty($_POST['name'])) {
    // エラーメッセージをセッションに格納
    $_SESSION['msg']['name'] = '※名前を入力してください。';
} 

if (empty($_POST['price'])) {
    // エラーメッセージをセッションに格納
    $_SESSION['msg']['price'] = '※値段を入力してください。';
}

if (empty($_POST['category'])) {
    // エラーメッセージをセッションに格納
    $_SESSION['msg']['category'] = '※カテゴリーを選択してください。';
}

if (isset($_SESSION['msg'])) {
    // 登録画面に戻る
    header('Location: include.php');
    exit;
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

// ファイルサイズのバリデーション
if (1048576 < $filesize || $file_err == 2) {
    echo 'ファイルサイズは1MB未満にしてください';
    echo '<br>';
}

// 画像の拡張子をチェック
$allow_ext = array ('jpg', 'jpeg', 'png', 'jfif');
// 送信された画像の拡張子を取得
$file_ext = pathinfo($filename, PATHINFO_EXTENSION);
// 許容される拡張子かどうか判定（小文字にしてから判定する）
if (!in_array(strtolower($file_ext), $allow_ext)) {
    // 許容される拡張子でない場合
    echo '画像ファイルを添付してください';
    echo '<br>';
}

// アップロードされているかどうか
if (!is_uploaded_file($tmp_path)) {
    echo 'ファイルが選択されていません';
    echo '<br>';
    exit;
}

