// 数量選択されたら選択された商品名、価格、数量を保持したい
// 購入ボタンを押したら保持していた値を確定
// 確定した値をセッション変数に入れる
// 購入確認画面で表示させたい
// 購入完了とともに保持していた値を破棄する

// // 表示されている商品の数を取得する

function inputChange(event){  
    console.log(productName);
    console.log(event.currentTarget.value);
}


for (let i = 0; i < countElement; i++) {
    let productName = document.getElementById(`productName_${i}`).value;
    // console.log(productName);
    let number = document.getElementById(`select_${i}`);
    number.addEventListener('change', inputChange);

    // let productName = document.getElementById("productName_${i}").value;
    // console.log(productName);
    // let number = document.getElementById('select_${i}');
    // number.addEventListener('change', inputChange);
    // console.log(productName);
    // console.log(number);
}
