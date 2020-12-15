function imgZum() {
    $('article img').click((e) => {
        $('body').append('<div class = "closeImg" title = "Закрыть"><svg width="4em"  viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d = "M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" /></svg ></div>');
        $('body').append('<div class = "fonImg"></div>');
        $('body').append('<img class = "imageZum" src = "' + e.target.src + '">');
        $('.imageZum').css({
            height: '0px',
            padding: '0px',
            border: 'solid 0px #ffffff',
            borderRadius: '20px',
            transition: '1s'
        });
        setTimeout(() => {
            $('.imageZum').css({
                height: '90%',
                padding: '1px',
                border: 'solid 15px #ffffff',
                borderRadius: '20px',
                transition: '1s'
            });
        }, 20)

        $('.closeImg svg').mouseover(() => {
            $('.closeImg svg').css({
                transform: 'rotate(180deg)', transition: '1s'
            })
        });
        $('.closeImg svg').mouseout(() => {
            $('.closeImg svg').css({
                transform: 'rotate(0deg)', transition: '1s'
            })
        });
        $('.closeImg svg').click(() => {
            $('.fonImg').remove();
            $('.imageZum').css({
                height: '0px',
                padding: '0px',
                border: 'solid 0px #ffffff',
                borderRadius: '20px',
                transition: '1s'
            }); 
            $('.closeImg').remove();
            setTimeout(() => {
                $('.imageZum').remove();
               
            }, 1000)
            
        })
    })
}
$(document).ready(() => {
    imgZum();

});