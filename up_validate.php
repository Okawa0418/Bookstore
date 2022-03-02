<!-- include.phpから送信された値のバリデーション実装 -->
<?php
session_start();
require_once('database1.php');

// 送信されてきたトークンが一致する場合にバリデーション処理を実行
if (isset($_POST["token"]) 
    && $_POST["token"] === $_SESSION['token']) {

    // トークンの破棄
    unset($_SESSION['token']);
    // セッションの保存
    session_write_close();
    // セッションの再開
    session_start();


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

    // 価格が空
    if (empty($_POST['price'])) {
        // エラーメッセージをセッションに格納
        $_SESSION['msg']['price'] = '※値段を入力してください。';
    }

    // カテゴリーが空
    if (empty($_POST['category'])) {
        // エラーメッセージをセッションに格納
        $_SESSION['msg']['category'] = '※カテゴリーを選択してください。';
    }

    // up_product_form.phpから送信された値でエラーが出た場合
    if (isset($_SESSION['msg'])) {
        // 値が送信されていればそれぞれセッション変数へ代入
        // up_product_form.phpで初期値が入るようにする
        if (isset($_POST['name'])) {
            $_SESSION['p_name'] = $_POST['name'];
        }
        if (isset($_POST['price'])) {
            $_SESSION['p_price'] = $_POST['price'];
        }
        if (isset($_POST['category'])) {
            $_SESSION['p_category'] = $_POST['category'];
        }
        // hiddenで送信された値をセッションで保持
        $_SESSION['product_id'] = $_POST['product_id'];
        // 登録画面に戻る
        header('Location: up_product_form.php');
        exit;
    }


    // バリデーション通過後
    // 送信された値を変数へ代入
    $product_id = $_POST['product_id'];
    $product_name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];


    // 送信されたファイル情報を変数で取得
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

    // 画像がある場合とない場合でUPDATE方法を分ける

    // 更新したい画像がある(アップロードされた)場合
    if (is_uploaded_file($tmp_path)) {
        // 画像のバリデーション
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

        // 画像バリデーションでエラーが出た場合
        if (isset($_SESSION['msg'])) {
            // up_product_form.phpで初期値が入るようにする
            if (isset($_POST['name'])) {
                $_SESSION['p_name'] = $_POST['name'];
            }
            if (isset($_POST['price'])) {
                $_SESSION['p_price'] = $_POST['price'];
            }
            if (isset($_POST['category'])) {
                $_SESSION['p_category'] = $_POST['category'];
            }
            // hiddenで送信された値をセッションで保持
            $_SESSION['product_id'] = $_POST['product_id'];
            // 編集フォームに戻る
            header('Location: up_product_form.php');
            exit;
        }

        // 画像バリデーション通過
        // 画像を保存
        if (move_uploaded_file($tmp_path, $upload_dir . $save_filename)) {
            $file_path = $upload_dir . $save_filename;
        }
        // productテーブルをUPDATEしていく
        $database = new Database1;
        $database->updateProduct($product_id, $product_name, $price, $file_path, $category);
        // セッション破棄
        unset($_SESSION['product_id']);
        // 更新後は商品リストへリダイレクト
        $_SESSION['msg'] = 'ID番号「' . $product_id . '」を更新しました';
        header('Location: productList.php');
        exit;
    }

    // 画像が送信されていない場合
    // 更新したい画像がない(アップロードされていない)場合
    if (!is_uploaded_file($tmp_path)) {
        // 画像以外をUPDATEする
        // productテーブルをUPDATEしていく
        $database = new Database1;
        $database->updateProductOther($product_id, $product_name, $price, $category);
        // セッション破棄
        unset($_SESSION['product_id']);
        // 更新後は商品リストへリダイレクト
        $_SESSION['msg'] = 'ID番号「' . $product_id . '」を更新しました';
        header('Location: productList.php');
        exit;
    }
}

