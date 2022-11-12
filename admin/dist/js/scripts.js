/*!
    * Start Bootstrap - SB Admin v6.0.0 (https://startbootstrap.com/templates/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-sb-admin/blob/master/LICENSE)
    */

//
//    (function($) {
//    "use strict";
//
//    // Add active state to sidbar nav links
//    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
//        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
//            if (this.href === path) {
//                $(this).addClass("active");
//            }
//        });
//
//    // Toggle the side navigation
//    $("#sidebarToggle").on("click", function(e) {
//        e.preventDefault();
//        $("body").toggleClass("sb-sidenav-toggled");
//    });
//})(jQuery);
$(document).ready(function(){
                  $('#selectAll').click(function(event){
                      if(this.checked){
                         $('.checkBoxArray').each(function(){
                             this.checked=true;
                         });
                      }else{
                         $('.checkBoxArray').each(function(){
                             this.checked=false;
                         }); 
                      }
                  });
    
                
               
});

//
//function loadUsersOnline(){
//    $.get("../../../functions.php?onlineusers=result",function(data){
//        $(".onlineusers").text(data);
//        
//    });
//}
//setInterval(function(){
//    loadUsersOnline();
//},500);
