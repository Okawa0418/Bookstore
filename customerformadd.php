<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form method ="POST" action="customerformdone.php">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">メールアドレス</label>
        <input type="email" name ="email" class="form-control" value="" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">あなたのEmailは第三者にシェアはされません</div>
    </div>
    <div class="mb-3 form-check">
        <label class="form-check-label" for="exampleCheck1">webネーム</label>
        <input type="name" name="name" class="form-label" name="user_name" value="">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">お問い合わせ内容</label>
        <textarea name="content" class="form-control" value=""></textarea> 
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>


<!-- 実装ができない場合こちらを使う -->
<!-- <form method ="POST" action="">
連絡先メールアドレス<br />
<input type="text" name="mail_address" value="" /><br /><br />
webネーム<br />
<input type="text" name="user_name" value="" /><br /><br />
お問い合わせ内容<br />
<textarea name="" ></textarea><br /><br />
<input type="submit" value="問い合わせる" />
</form>
</body>
</html> -->