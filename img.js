(() => {
    const $btn = document.querySelector('#js-btn');
    const $modal =document.querySelector('#js-modal');
    const $modalCloseBtn =document.querySelector('#js-close-btn')
    
    const $modalContents =document.querySelector('#js-modal-contents');
    
    $btn.addEventListener('click', () => {
        $modal.style.display ='block';
    });

    $modalCloseBtn.addEventListener('click', () => {
        $modal.style.display ='none';
    }); 

    $modal.addEventListener('click',(event) => {
        event.stopPropagation();
    });
})();