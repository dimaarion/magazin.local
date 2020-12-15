//jquery
function menu() {
   function menu_left() {
      $("#izb, #norm, #pmt").css({ "borderBottom": "solid 1px #61687a" });


      $("input").keyup(function () {

         var ves = $("#ves").val();
         var rost = $("#rost").val();
         var prz = rost * rost;
         var mat = ves / prz;
         var rez = Math.floor(mat);

         $("#ravno").click(function () {

            $("#imt").html(rez);

         })
         $("#ravno").click(function () {
            if (rez < 20) {
               $("#pmt").css({ "borderBottom": "solid 1px #fc7202" });
               $("#izb, #norm").css({ "borderBottom": "solid 1px #61687a" });

            }
            else {
               $("#norm").css({ "borderBottom": "solid 1px #fc7202" });
               $("#pmt, #izb").css({ "borderBottom": "solid 1px #61687a" });
            }
            if (rez > 25) {
               $("#izb").css({ "borderBottom": "solid 1px #fc7202" });
               $("#norm, #pmt ").css({ "borderBottom": "solid 1px #61687a" });
            }
         });
      });
   }
   $(document).ready(function () {
      menu_left();
   });
}
menu();