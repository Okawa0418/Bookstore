<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="signon.css">
    <title>signup</title>
</head>
<body>
    <header>
        <a href="index.php" style="color:inherit;text-decoration: none;"><h1>BOOK STORE</h1></a>
    </header> 
    <nav class="navbar navbar-expand navbar-dark bg-dark mt-3 mb-3">
        <a class="navbar-brand" href="#">会員登録</a>
        <div class="collapse navbar-collapse justify-content-center">
        </div>
    </nav>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

    <?php
    session_start();
        if(isset($_SESSION['msg'])) {
            $msg = $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <?php
        if(isset($_SESSION['msg2'])) {
            $msg2 = $_SESSION['msg2'];
            unset($_SESSION['msg2']);
        }
        ?>
        <?php
        if(isset($_SESSION['msg3'])) {
            $msg3 = $_SESSION['msg3'];
            unset($_SESSION['msg3']);
        }
        ?>
        <?php
        if(isset($_SESSION['msg4'])) {
            $msg4 = $_SESSION['msg4'];
            unset($_SESSION['msg4']);
        }
        ?>
        <?php
        if(isset($_SESSION['msg5'])) {
            $msg5 = $_SESSION['msg5'];
            unset($_SESSION['msg5']);
        }
        ?>
        <?php
        if(isset($_SESSION['msg6'])) {
            $msg6 = $_SESSION['msg6'];
            unset($_SESSION['msg6']);
        }
        ?>

<body>
    <form action="register.php" method="post">
        <div class="container">

        <?php if(isset($msg)) : ?>
            <?= $msg; ?><br>
        <?php endif ; ?>

        <?php if(isset($msg)) : ?>
            <?= $msg; ?><br>
        <?php endif ; ?>

        <?php if(isset($msg)) : ?>
            <?= $msg; ?><br>
        <?php endif ; ?>
        
        <?php if(isset($msg)) : ?>
            <?= $msg; ?><br>
        <?php endif ; ?>
        
        <?php if(isset($msg)) : ?>
            <?= $msg; ?><br>
        <?php endif ; ?>

        <?php if(isset($msg)) : ?>
            <?= $msg; ?><br>
        <?php endif ; ?>

        <div>
            <label>ユーザー名：</label>
            <input type="text" name="user_name" maxlength="50" placeholder="例）山田太郎" value="<?php if( !empty($_SESSION['user_name']) ){ echo htmlspecialchars( $_SESSION['user_name'], ENT_QUOTES, 'UTF-8'); } ?>">
        </div>
        <div>
            <label>メールアドレス：</label>
            <input type="email" name="mail_address" placeholder="例）abc@bookstore.co.jp" value="<?php if( !empty($_SESSION['mail_address']) ){ echo htmlspecialchars( $_SESSION['mail_address'], ENT_QUOTES, 'UTF-8'); } ?>">   
        </div>
        <div>
            <label>住所：</label>
            <input type="text" name="post_address" placeholder="例）東京都豊島区" value="<?php if( !empty($_SESSION['post_address']) ){ echo htmlspecialchars( $_SESSION['post_address'], ENT_QUOTES, 'UTF-8'); } ?>">
        </div>
        <div>
            <label>電話番号：</label>
            <input type="number" name="tel" placeholder="例）090-0000-0000" value="<?php if( !empty($_SESSION['tel']) ){ echo htmlspecialchars( $_SESSION['tel'], ENT_QUOTES, 'UTF-8'); } ?>">
        </div>
        <div>
            <label>パスワード：</label>
            <input type="password" name="password" placeholder="例）abcd1234">
        </div><br>

        <div class="row">
            <div class="col-md">
                <input type="submit" class="btn btn-warning" value="登録完了">
            </div>
        <div></br>
    </form>

    <footer>
        <div>
            <div class="px-4 py-5 my-5 text-center">
                <img class="d-block mx-auto mb-4" src="photojp/describetwoguys.jpg" width="800" height="400">
                <h1 class="display-5 fw-bold">BOOKSTORE</h1>
                <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4">BOOKSTOREへようこそ あなたの世界をもっと広げよう。毎日をより豊かに新たな開拓使をBOOKSTOREは応援します。</p>
                </div>
            </div>
    </footer>
    <div class="row">
        <div class="col-8 bg-warning">
            <iframe width="656" height="369" src="https://www.youtube.com/embed/Ye5mGkg8iyw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
        </div>
        <div class="col-4 bg-warning">
            <video controls width="350" height="350" src="https://res.cloudinary.com/code-kitchen/video/upload/v1555082747/movie.mp4"></video>
        </div>
    </div>
</body>   
</html>