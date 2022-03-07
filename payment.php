<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>決済画面</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <style>.container {max-width: 960px;}.lh-condensed { line-height: 1.25; }</style>
</head>

<?php
  require_once('database1.php');
  $data1=new Database1();
  $dbh = $data1->dbConnect();
  session_start();

  $sql="SELECT*FROM user WHERE user_id = :user_id";
  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(':user_id', $_SESSION['user_id']);
  $stmt->execute();
  $member = $stmt->fetch();
?>

<body class="bg-light">
  <div class="container">
    <div class="py-5 text-center">
    <a href="index.php"><img class="d-block mx-auto mb-4" src="BOOK STORE.jfif" alt="" width="200" height="72"></a>
    </div>
    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">カート</span>
          <span class="badge badge-secondary badge-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
          <!-- <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">商品名</h6>
            </div>
            <span class="text-muted">￥0</span>
          </li>-->
          <li class="list-group-item d-flex justify-content-between">
            <span>合計 (円)</span>
            <strong><?php echo $_SESSION['total_amount']?></strong>
          </li>
        </ul>
      </div>

      <div class="col-md-8 order-md-1">
      <?php
        if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      ?>
      <?php if (isset($msg)) : ?>
        <?= $msg; ?><br>
      <?php endif ; ?>
      </div>
      
        <div class="col-md-8 order-md-1">
        <h4 class="mb-3">請求先住所</h4>
        <form action="validate_pay.php" method="post" class="needs-validation" novalidate>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="familyName">お名前</label>
              <input type="text" class="form-control" id="familyName" name="name" placeholder="" maxlength="60" value="<?php echo htmlspecialchars( $member['user_name'], ENT_QUOTES, 'UTF-8'); ?>" required>
              <div class="invalid-feedback">
                お名前を入力してください
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="address">住所</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="" maxlength="161" value="<?php echo htmlspecialchars( $member['post_address'], ENT_QUOTES, 'UTF-8'); ?>" required>
            <div class="invalid-feedback">
              配送先住所を入力してください
            </div>
          </div>

          <hr class="mb-4">

          <h4 class="mb-3">お支払い方法</h4>
            <form autocomplete=off action="validate_pay.php">
              <label>
                <input class="js-check" type="radio" name="rs" value="1" onclick="formSwitch()" >クレジットカード
              </label>
              <label>
                <input class="js-check" type="radio" name="rs" value="2" onclick="formSwitch()">銀行口座
              </label>
                 <span id="card">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="cc-name">カードの名義</label>
                      <input type="text" class="form-control" id="cc-name" name="cc_name" placeholder="" disabled="disabled" required>
                      <small class="text-muted">カード上に表示されているフルネーム</small>
                      <div class="invalid-feedback">
                        カードの名義を入力してください
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="cc-number">クレジットカード番号</label>
                      <input type="text" class="form-control" id="cc-number" name="cc_number" placeholder="" disabled="disabled" required>
                      <div class="invalid-feedback">
                        クレジットカード番号を入力してください
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label for="cc-expiration">有効期限</label>
                      <input type="text" class="form-control" id="cc-expiration" name="cc_time" placeholder="" disabled="disabled" required>
                      <div class="invalid-feedback">
                        有効期限を入力してください
                      </div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="cc-cvv">CVV</label>
                      <input type="text" class="form-control" id="cc-cvv" name="cc_cvv" disabled="disabled" placeholder="" required>
                      <div class="invalid-feedback">
                        セキュリティコードを入力してください
                      </div>
                    </div>
                  </div>
                </span>
              
              <span id="bank">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="b-name">口座名義</label>
                    <input type="text" class="form-control" id="b-name" name="b_name" disabled="disabled" placeholder="" required>
                    <small class="text-muted">カード上に表示されているフルネーム</small>
                    <div class="invalid-feedback">
                      口座名義を入力してください
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="b-number">口座番号</label>
                    <input type="text" class="form-control" id="b-number" name="b_number" disabled="disabled" placeholder="" required>
                    <div class="invalid-feedback">
                      口座番号を入力してください
                    </div>
                  </div><br>
                  <div class="col-md-3 mb-3">
                    <label for="b-cvv">暗証番号</label>
                    <input type="text" class="form-control" id="b-cvv" name="b_cvv" disabled="disabled" placeholder="" required>
                    <div class="invalid-feedback">
                      暗証番号を入力してください
                    </div>
                  </div>
                </div>
              </span>

              <script type="text/javascript">var selecterBox = document.getElementById('card');
              var selecterBox1 = document.getElementById('bank');

                  function formSwitch() {
                      check = document.getElementsByClassName('js-check')
                      if (check[1].checked) {
                          selecterBox.style.display = "none";  
                          selecterBox1.style.display = "block"; 
                          document.getElementById("cc-name").disabled = true; 
                          document.getElementById("cc-number").disabled = true; 
                          document.getElementById("cc-expiration").disabled = true; 
                          document.getElementById("cc-cvv").disabled = true; 
                          document.getElementById("b-name").disabled = false;              
                          document.getElementById("b-number").disabled = false;              
                          document.getElementById("b-cvv").disabled = false;              
                      } else if (check[0].checked) {
                          selecterBox.style.display = "block";
                          selecterBox1.style.display = "none";
                          document.getElementById("cc-name").disabled = false;
                          document.getElementById("cc-number").disabled = false;
                          document.getElementById("cc-expiration").disabled = false;
                          document.getElementById("cc-cvv").disabled = false;
                          document.getElementById("b-name","b-number","b-cvv").disabled = true;
                          document.getElementById("b-number").disabled = true;
                          document.getElementById("b-cvv").disabled = true;
                      } else {
                          selecterBox.style.display = "none";
                      }
                  }
                  window.addEventListener('load', formSwitch());
                
                  function entryChange2(){
                      if(document.getElementById('changeSelect')){
                      id = document.getElementById('changeSelect').value;
                  }
                  }

              </script>

          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">決済完了</button>
        
        </form>
      </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2004-2022 株式会社くすりの窓口</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">プライバシー</a></li>
        <li class="list-inline-item"><a href="#">条項</a></li>
        <li class="list-inline-item"><a href="#">サポート</a></li>
      </ul>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <script>
	// 以下バリデーション(無効なフィールドがある場合にフォーム送信を無効にする)
    (function() {
    	'use strict';
        window.addEventListener('load', function() {
        		// Bootstrapカスタム検証スタイルを適用してすべてのフォームを取得
        		var forms = document.getElementsByClassName('needs-validation');
        
        		// ループして帰順を防ぐ
        		var validation = Array.prototype.filter.call(forms, function(form) {
        			form.addEventListener('submit', function(event) {
        				if (form.checkValidity() === false) {
        					event.preventDefault();
        					event.stopPropagation();
        				}
        				form.classList.add('was-validated');
        			}, false);
        		});
        	}, false);
        })();

	</script>
</body>

</html>