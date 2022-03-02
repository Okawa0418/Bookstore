<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>決済画面</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <style>.container {max-width: 960px;}.lh-condensed { line-height: 1.25; }</style>
</head>

<body class="bg-light">
  <div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="BOOK STORE.jfif" alt="" width="200" height="72">
    </div>

    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">カート</span>
          <span class="badge badge-secondary badge-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">商品名</h6>
            </div>
            <span class="text-muted">￥0</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">商品名</h6>
            </div>
            <span class="text-muted">￥0</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">商品名</h6>
            </div>
            <span class="text-muted">￥0</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>合計 (円)</span>
            <strong>￥0</strong>
          </li>
        </ul>
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">請求先住所</h4>
        <form class="needs-validation" novalidate>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="familyName">姓</label>
              <input type="text" class="form-control" id="familyName" placeholder="" value="" required>
              <div class="invalid-feedback">
                名字を入力してください
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="givenName">名</label>
              <input type="text" class="form-control" id="givenName" placeholder="" value="" required>
              <div class="invalid-feedback">
                名前を入力してください
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="username">ユーザー名</label>
            <div class="input-group has-validation">
              <div class="input-group-prepend">
                <span class="input-group-text">@</span>
              </div>
              <input type="text" class="form-control" id="username" placeholder="ユーザー名" required>
              <div class="invalid-feedback" style="width: 100%;">
                ユーザー名が必要です
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Eメール <span class="text-muted">(任意)</span></label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com">
            <div class="invalid-feedback">
              配送の更新に有効なメールアドレスを入力してください
            </div>
          </div>

          <div class="mb-3">
            <label for="address">住所</label>
            <input type="text" class="form-control" id="address" placeholder="地番" required>
            <div class="invalid-feedback">
              配送先住所を入力してください
            </div>
          </div>

          <div class="mb-3">
            <label for="address2">住所 2 <span class="text-muted">(任意)</span></label>
            <input type="text" class="form-control" id="address2" placeholder="アパート・マンション名">
          </div>

          <div class="row">
            <div class="col-md-5 mb-3">
              <label for="pref">都道府県</label>
              <select class="custom-select d-block w-100" id="pref" required>
                <option>選択...</option>
                <option>北海道</option>
              </select>
              <div class="invalid-feedback">
                都道府県を選択してください
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="city">市町村</label>
              <select class="custom-select d-block w-100" id="city" required>
                <option>選択...</option>
                <option>札幌市</option>
              </select>
              <div class="invalid-feedback">
                市町村を選択してください
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="zip">郵便番号</label>
              <input type="text" class="form-control" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                郵便番号を入力してください
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="addressCheck">
            <label class="custom-control-label" for="addressCheck">配送先住所は、請求先住所と同じです</label>
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="keepCheck">
            <label class="custom-control-label" for="keepCheck">次回のために、この情報を保存する</label>
          </div>
          <hr class="mb-4">

          <h4 class="mb-3">お支払い方法</h4>

          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
              <label class="custom-control-label" for="credit">クレジットカード</label>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cc-name">カードの名義</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">カード上に表示されているフルネーム</small>
              <div class="invalid-feedback">
                カードの名義を入力してください
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-number">クレジットカード番号</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                クレジットカード番号を入力してください
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">有効期限</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                有効期限を入力してください
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="cc-cvv">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                セキュリティコードを入力してください
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">精算を続ける</button>
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
	// 無効なフィールドがある場合にフォーム送信を無効にするスターターJavaScriptの例
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