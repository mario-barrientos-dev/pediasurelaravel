$(document).ready(function() {

  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $("#topmenu").addClass("bg_color");
      $(".navbar-brand").addClass("logo_scroll");
    } else {
      $("#topmenu").removeClass("bg_color");
      $(".navbar-brand").removeClass("logo_scroll");
    }
  });

});