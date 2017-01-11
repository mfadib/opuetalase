var width = $(window).width();

$(window).resize(function(){
   $("#sticky-hid-768").hide();
   width = $(window).width();
});

if ($('#back-to-top').length) {
  var scrollTrigger = 100, // px
      backToTop = function () {
          var scrollTop = $(window).scrollTop();
          if (scrollTop > scrollTrigger) {
              $('#back-to-top').addClass('show');
          } else {
              $('#back-to-top').removeClass('show');
          }
      };
  backToTop();
  $(window).on('scroll', function () {
      backToTop();
  });
  $('#back-to-top').on('click', function (e) {
      e.preventDefault();
      $('html,body').animate({
          scrollTop: 0
      }, 700);
  });
}

function show(id){
  // $("#" + id).fadeToggle();
  // Set the effect type
    var effect = 'slide';

    // Set the options for the effect type chosen
    // var options = { direction: $('.mySelect').val() };

    // Set the duration (default: 400 milliseconds)
    var duration = 500;

    $('#' + id).toggle(effect, {direction : "right"}, duration);
}

function show2(id){
  $("#" + id).slideToggle();
}

$(".open-btn-compare").click(function(){
  $("#btn-compare").fadeIn();
})

$(".close-compare").click(function(){
  $("#btn-compare").fadeOut();
});

function show3(id){
  $("#w_hover").hide();
  $(".hover_x").hide(); 

  $("#w_hover").slideDown();
  $("#" + id).slideDown();
}
// function hide3(){
//   $("#w_hover").slideUp(); 
//   $(".hover_x").hide();
//   // $("#hover_cat").slideUp(); 
// }
function show4(id){
  $("#w_hover_s").hide();
  $(".hover_x_s").hide(); 

  $("#w_hover_s").fadeIn();
  $("#" + id).fadeIn();
}
// function hide4(){
//   $("#w_hover_s").hide();
//   $(".hover_x_s").hide(); 
// }

window.onscroll = function() {
  $("#w_hover").slideUp(); 
  $(".hover_x").hide();
  $("#w_hover_s").fadeOut();
  $(".hover_x_s").hide();   
};

function sld(x){
  $("#" + x).slideToggle();
}

$(document).ready(function(){
  $("#bot-fix").load("bot-fix.html");
  $("#header").load("header.html");
  $("#footer").load("footer.html");

  $(window).scroll(function () {
      if (width > 768) {
        if( $(window).scrollTop() > $('.nr').offset().top){
          $(".nr").fadeOut();
          $(".sticky-nav").slideDown();
        }else if ($(window).scrollTop() == 0){
          $(".sticky-nav").fadeOut();
          $(".nr").fadeIn();
        }
      }
      else if(width < 768) {
        if( $(window).scrollTop() > $('.nr').offset().top){
          $(".nr").fadeOut();
          $(".sticky-nav").slideDown();
        }else if ($(window).scrollTop() == 0){
          // $(".sticky-nav").fadeOut();
          $(".nr").fadeIn();
        }
      }
  });
});