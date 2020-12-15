function searhArt() {
    let articles = document.getElementById('articles');
    if (articles) {
        let = main_menu_cl = articles.getElementsByClassName('main_menu_cl');
        let searh = document.getElementById('searh');
        function searhEl(params) {
            const regex2 = new RegExp(searh.value, 'i');
            main_menu_cl = Array.from(main_menu_cl);
            let arr = main_menu_cl.filter((x) => x.innerHTML.match(regex2))
                .map((x2) => '<div class = "row">' + x2.innerHTML + '</div>');
            articles.innerHTML = arr.join('');

        }

        searh.addEventListener('keypress', searhEl, false)
    }

}

function menuArtorArt() {
    let menuArt = document.getElementById('menuArt');
    let privArt = document.getElementById('privArt');
    if (menuArt != undefined && privArt != undefined) {
        let update_menu_art = menuArt.getElementsByClassName('update_menu_art');
        update_menu_art = Array.from(update_menu_art);
        let new_menu_art = privArt.getElementsByClassName('new_menu_art');
        new_menu_art = Array.from(new_menu_art);
        for (let i = 0; i < update_menu_art.length; i++) {

            let g = new_menu_art.filter((x) => x.children[0].value == update_menu_art[i].children[0].value);
          g[0].style.display = 'none';
        }
    }


}

$(document).ready(function () {
    searhArt();
    menuArtorArt();
});