<!doctype html>
<html lang="ja">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>リクエストページ</title>
</head>

<body>
    <header>
        <h1>BOOK STORE</h1>
    </header>
    <p class="text-center">
        <div class="container">
        <div class="row">
        <div class="col-md-4 col-md-offset-4"></div>
    <h1>本のリクエストはこちらから</h1>
    </p>
<form method="post" action="request_done.php">
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <p class="text-center">メールアドレス</p>
          </div>
          <div class="container">
          <div class="col-md-8">
            <input type="email" name="email" class="form-control" placeholder="必須">
          </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <p class="text-center">名前</p>
          </div>
          <div class="container">
          <div class="col-md-8">
            <input type="text" name="name" class="form-control" placeholder="必須">
          </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <p class="text-center">本のタイトル</p>
          </div>
          <div class="container">
          <div class="col-md-8">
            <textarea rows="4" cols="50" placeholder="必須" name="book" type="text" class="form-control"></textarea>
          </div>
          </div>
        </div>
      </div>
      <div>
      <p class="text-left">入荷時の連絡をご希望される方はご選択ください。</p>
        <select name="receive" id="">
          <option hidden>選択してください</option>
          <option value="1">必要</option>
          <option value="2">不要</option>
        </select>
      </div>
      <div class="row justify-content-center">
      <button type="submit" class="btn btn-outline-primary">送信</button>
      </div>
    </form>
    <form action="index.php">
    <div class="row justify-content-center">
      <button type="submit" class="btn btn-outline-primary">戻る</button>
      </div>
    </form>
</body>

<?php
    session_start();
        if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <!-- エラーメッセージの表示 -->
    <?php if (isset($msg)) : ?>
      <?= $msg; ?>
      <br>
    <?php endif ; ?>
    
    <?php
        if (isset($_SESSION['msg2'])) {
        $msg2 = $_SESSION['msg2'];
        unset($_SESSION['msg2']);
    }
    ?>
    <?php if (isset($msg2)) : ?>
      <?= $msg2; ?>
      <br>
    <?php endif ; ?>
    
    <?php
        if (isset($_SESSION['msg3'])) {
        $msg3 = $_SESSION['msg3'];
        unset($_SESSION['msg3']);
    }
    ?>
    <?php if (isset($msg3)) : ?>
      <?= $msg3; ?>
      <br>
    <?php endif ; ?>
