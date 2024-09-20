$(document).ready(function(){
    $(".alert").slideUp(8000);
    $("a.delete").click(function(){
      var sure = window.confirm("Are you sure to delete record?");
      if(!sure){
        event.preventDefault();
      }
    });
    $("a.logout").click(function(){
      var sure = window.confirm("Are you sure to sign out?");
      if(!sure){
        event.preventDefault();
      }
    });
    //edit new password
    $("form#user").submit(function() {
      if($("#new_pass").val() != $("#confirm_pass").val()) {
        alert("New password with confirm password is not the same!");
        event.preventDefault();
      }
    });
    $("form#user_register").submit(function() {
      if($("#password").val() != $("#confirm_password").val()) {
        alert("password with confirm password is not the same!");
        event.preventDefault();
      }
    });
});

// alert script

!function ($) {
    "use strict";
    var SweetAlert = function () {
    };
    //examples
    SweetAlert.prototype.init = function () {
        //Basic
        $('#sa-print').click(function () {
          swal({
              title: "اطلاعات برای پرینت وجود ندارد!",
              text: "بعد  از 3 ثانیه بسته میشود.",
              timer: 3000,
              showConfirmButton: false
          });
        });
        //Auto Close Timer
        $('#sa-close').click(function () {
            swal({
                title: "اطلاعات وجود ندارد!",
                text: "بعد  از 3 ثانیه بسته میشود.",
                timer: 3000,
                showConfirmButton: false
            });
        });
    },
        //init
        $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),
//initializing
    function ($) {
        "use strict";
        $.SweetAlert.init()
}(window.jQuery);
