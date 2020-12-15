function scrolTop() { 
    $('#scroltop').css({ display: 'none' });
    $(document).scroll(function (e) { 
        if (window.scrollY > 400){
            $('#scroltop').css({display:'block'});
        }else{
            $('#scroltop').css({ display: 'none' });
        }
    });
    $('#scroltop').click(()=>{
        $(window).scrollTop(0);
    })

}
$(document).ready(function () {
    scrolTop();
})


