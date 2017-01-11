var width = $(window).width();
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
  $("#" + id).fadeToggle();
}