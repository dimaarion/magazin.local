function discriptReplaceBr() {
    let imagesBlock = document.getElementsByClassName('images_block')[0];
    if (imagesBlock) {
        let descriptImg = imagesBlock.getElementsByClassName('descriptImg'); 
        let titleImg = imagesBlock.getElementsByClassName('titleImg');
        descriptImg = Array.from(descriptImg);
        titleImg = Array.from(titleImg);
        descriptImg.map((x) => x.innerHTML = x.innerHTML.replace(/[_]/g, '_<br>'));
        descriptImg.map((x) => x.innerHTML = x.innerHTML.replace(/[-]/g, '-<br>'));
        titleImg.map((x) => {
        x.innerHTML = '<span>' + x.innerHTML + '</span>';  
        let f = x.appendChild(document.body.appendChild(document.createElement('button')));
        f.setAttribute('class','copyUrl');
        f.setAttribute('type', 'button');
        f.style.cursor = 'pointer';
        f.innerHTML = 'Скопировать';

           f.addEventListener('click',(e)=>{
               var range = document.createRange();
               range.selectNode(x.getElementsByTagName('span')[0]);
               window.getSelection().addRange(range);
               document.execCommand('copy')
            })

        });
        
     
    }

}
$(document).ready(function () {
    discriptReplaceBr();
});