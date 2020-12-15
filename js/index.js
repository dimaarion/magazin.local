//появление и скрытие левого меню
function index() {

  function menuleft() {

    $("#mob_kn").click(function () {
      var menu_left = $("#mob_menu").css("marginLeft")
      if (menu_left == "-10000px") {
        $("#mob_kn").css({
          transform: "rotate(-90deg)",
          transition: "transform 1s"
        })
        $("#mob_menu").animate({ "marginLeft": "10px" }, 800)
      } else if (menu_left == "10px") {
        $("#mob_kn").css({
          transform: "rotate(0deg)",
          transition: "transform 1s"
        })
        $("#mob_menu").animate({ "marginLeft": "-10000px" }, 800)
      }
    })
  }
  // Пагинация
  function parinationColor(clase, back, col) {
    var ul = document.getElementsByClassName(clase)[0];
    if (ul !== undefined) {
      var a = ul.getElementsByTagName('a');
      var c = {
        bcolor: back,
        acolor: col,
        url: document.documentURI,
        a: a,

      }
      for (var i = 0; i < c.a.length; i++) {
        var ahref = c.a[i].href;
        if (ahref == c.url) {
          c.a[i].style.backgroundColor = c.bcolor;
          c.a[i].style.color = c.acolor;
        }
      }
    }
  }
  //Рекламма 
  function reklama_php() {
    $(".reklama").append("<div></div>");
    var div = $(".reklama div");
    var a = $(".reklama a");
    var len = a.length;
    var reklama = $('.reklama');
    if (len == 0) {

      reklama.css({ display: "none" });

    }
    $(".reklama").addClass("text");


  }

  function resizeWindow() {
    let buttonMob = document.getElementById('buttonMob');
    let menuMob = document.getElementById('menuMob');
    if (window.innerWidth < 1000){
      buttonMob.style.display = 'block';
      if (menuMob != undefined){
        menuMob.style.display = 'block';
      }
      
    }else{
      buttonMob.style.display = 'none';
      if (menuMob != undefined) {
        menuMob.style.display = 'none';
      }
    }
  
    function buttonM(e) {
      if (window.innerWidth < 1000){
        buttonMob.style.display = 'block';
        if (menuMob != undefined) {
          menuMob.style.display = 'block';
        }
      }else{
        buttonMob.style.display = 'none';
        if (menuMob != undefined) {
          menuMob.style.display = 'none';
        }
      }
     
    }
    window.addEventListener('resize', buttonM)
  }


  function mobButton(menu) {
    let head = document.getElementsByClassName('head')[0];
    let nomMenu = document.getElementById('menuMob');
    let div = document.body.appendChild(document.createElement('div'));
    div.id = 'buttonMob';
    div.setAttribute('data', '0');
    div.innerHTML = '<svg width="3em"  viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d = "M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" /></svg >'
    div.style.zIndex = 10000;
    div.style.position = 'relative';
    div.style.cursor = 'pointer';
    head.insertBefore(div, nomMenu);
    function buttonRemove(e) {
      let buttonMob = document.getElementById('buttonMob');
      let menuMob = document.getElementById('menuMob');
      let dataB = buttonMob.getAttribute('data');
      if (dataB == '0') {
        buttonMob.setAttribute('data', '1');
        console.log(dataB);
        buttonMob.innerHTML = '<svg width="3em"  viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg >'
        menu()
      }else{
        buttonMob.setAttribute('data', '0');
        console.log(dataB);
        buttonMob.innerHTML = '<svg width="3em"  viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d = "M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" /></svg >'
        menuMob.remove()
      }
    }
 
    div.addEventListener('click', buttonRemove);
  }
  function menuMob() {
    let menu = document.getElementById('menu');
    let nav = document.body.appendChild(document.createElement('nav'));
    let head = document.getElementsByClassName('head')[0];
    head.appendChild(nav);
    nav.id = "menuMob"
    nav.innerHTML = menu.innerHTML;
    let ul = nav.getElementsByTagName('ul')[0];
    ul.setAttribute('class', 'nav flex-column text-left');
    let li = ul.getElementsByTagName('li');
    li = Array.from(li);
    li.map((x) => {
      x.setAttribute('class', 'nav-item'); x.style.listStyle = 'none'; Array.from(x.children)
        .filter((x2) => x2.tagName == "UL")
        .map((x3) => x3.setAttribute('class', 'mobMenuPod'))
    });
    nav.style.position = 'absolute';
    nav.style.marginTop = '0px';
    nav.style.zIndex = 10000;
}

  $(document).ready(function () {
    parinationColor('pages', '#ec7616', '#ffffff');
    parinationColor('menu-top', '', '#EB7123');
    parinationColor('mob_menu', '', '#EB7123');
    mobButton(menuMob);
    //resizeWindow();

    //menuleft();
    $("h1, h2 ").css({
      color: "#0088cc",
      fontWeight: "bold",
      fontFamily: "Noto Serif"
    })
    reklama_php();

  });



}
index();










