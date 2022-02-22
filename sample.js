// 数量選択されたら値を保持したい
// 購入ボタンを押したら保持していた値を確定
// 確定した値をセッション変数に入れる
// 購入確認画面で表示させたい
// 購入完了とともに保持していた値を破棄する

// 表示されている商品の数を取得する
console.log(countElement);
var element = document.getElementById( "select" ) ;

function inputChange(event){
    console.log(event.currentTarget.value);
}

let number = document.getElementById('select_');
text.addEventListener('change', inputChange);