// 一行目即時関数　他のファイル上で上書きするエラー防止
(() => {
    const $btn = document.querySelector('#js-btn');
    const $modal =document.querySelector('#js-modal');
    // closeボタン
    const $modalCloseBtn =document.querySelector('#js-close-btn')
    // contentID
    const $modalContents =document.querySelector('#js-modal-contents');
    // on ボタンクッリク時　modalstyledisplayをblock
    $btn.addEventListener('click', () => {
        $modal.style.display ='block';
    });
    // close時
    $modalCloseBtn.addEventListener('click', () => {
        $modal.style.display ='none';
    }); 
    // 黒いオーバーレイをクリックした時にモーダルが閉じる
    $modal.addEventListener('click', () => {
        $modal.style.display = 'none';
    });
    // クリックした時閉じない　callback関数
    $modalContents.addEventListener('click',(event) => {
        // 下のレイヤーから上のレイヤーに伝達される指示を止める
        event.stopPropagation();
    });

})();
