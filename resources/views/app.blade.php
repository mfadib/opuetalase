<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
    @foreach($webprofile as $web)
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <title>@yield('title_site',$web->title)</title>
      <link rel="icon" href="{{URL::asset('images/'.$web->icon)}}"/>
      <meta name="author" content="@yield('meta_author',$web->author)"/>
	<meta name="description" content="@yield('meta_description',$web->meta_description)" />
	<meta name="keywords" content="@yield('meta_keywords',$web->meta_keywords)" />
     
      <link rel="icon" href="{{URL::asset('images/'.$web->icon)}}"/>
      <meta name="application-name" content="Benhul Shop"/>
      <meta name="viewport" content="user-scalable=0,width=device-width,initial-scale=1,maximum-scale=1">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


      <!-- Pllugins -->
<!--      <link rel="stylesheet" href="{{URL::asset('assets/css/bs/css/bootstrap.css')}}"> -->
      <link rel="stylesheet" href="{{URL::asset('assets/css/fa/css/font-awesome.css')}}">
      <link rel="stylesheet" href="{{URL::asset('assets/css/flag/css/flag-icon.css')}}">
      <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/jquery.rateyo.css')}}">

      <!-- Custom Css -->
      <link rel="stylesheet" href="{{URL::asset('assets/css/custom.css')}}">
      <link rel="stylesheet" href="{{URL::asset('assets/css/jquery-ui.css')}}">
      <link rel="stylesheet" href="{{URL::asset('assets/css/custom-responsive.css')}}">
      <link rel="stylesheet" href="{{URL::asset('assets/css/fonts.css')}}">

      <!-- Script -->
      <!-- <script src="{{URL::asset('assets/js/jquery.js')}}"></script>
      <script src="{{URL::asset('assets/js/jquery-3.1.1.min.js')}}"></script> -->
      <!-- <script src="{{URL::asset('assets/js/jquery-ui.min.js')}}"></script> -->
      <script src="{{URL::asset('assets/js/jquery-ui.js')}}"></script>
     <script src="{{URL::asset('assets/js/custom.js')}}"></script>
      <script src="{{URL::asset('assets/css/bs/js/bootstrap.js')}}"></script>
      <script src="{{URL::asset('assets/js/jssor.slider-21.1.6.mini.js')}}" type="text/javascript"></script>
      <script src="{{URL::asset('assets/js/jquery.rateyo.js')}}"></script>
      <script src="{{URL::asset('assets/js/zoom/jquery.elevatezoom.js')}}"></script>
    @endforeach
    @yield("header")
    </head>

    <body>

      <div id="bot-fix">
	<div class="container">
		<div class="w-chat">
		<a href="#" class="cb" id="back-to-top" title="Back to top"><span class="fa fa-caret-up" style="margin-top:12px"></span></a>
		</div>
	</div>
	<script type="text/javascript">
  $(".close-compare").click(function(){
    $("#btn-compare").fadeOut();
  });

  if ($('#back-to-top').length) {
    // var width = $(window).width();
    // alert(width);
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
  } </script>
</div>

      <div id="header">
        @include("menus.header")
      </div>

      <!-- BreadCrumb -->
      @yield('titlebar')

        <div class="row first-content">
          @if(! \Request::is('/'))
          <div class="container">
          @endif
            @include('messages.main')
            @if(Request::is('/'))
              <div class="col-md-12 col-xs-12 p10" style="margin-top: -20px">
            @else
              @if(Auth::check() && (!Request::is('product/detail/*')) && (Auth::user()->status == 0))
                  @include('menus.member')
              <div class="col-md-9 col-xs-12 p10" style="margin-top: -20px">
              @else
              <div class="col-md-12 col-xs-12 p10" style="margin-top: -20px">
              @endif
            @endif
                @yield("content")
            </div>


          @if(! \Request::is('/'))
          </div> <!-- Container -->
          @endif
        </div>
        <div class="container">
        @yield("content_else")
        </div>
      <div id="footer" class="fops mt20">
        @include("menus.footer")
      </div>
    </body>
</html>
@yield("footer")

<script type="text/javascript">
    jQuery(document).ready(function ($) {

        var jssor_1_SlideoTransitions = [
          [{b:-1,d:1,o:-1},{b:0,d:1000,o:1}],
          [{b:1900,d:2000,x:-379,e:{x:7}}],
          [{b:1900,d:2000,x:-379,e:{x:7}}],
          [{b:-1,d:1,o:-1,r:288,sX:9,sY:9},{b:1000,d:900,x:-1400,y:-660,o:1,r:-288,sX:-9,sY:-9,e:{r:6}},{b:1900,d:1600,x:-200,o:-1,e:{x:16}}]
        ];

        var jssor_1_options = {
          $AutoPlay: true,
          $SlideDuration: 800,
          $SlideEasing: $Jease$.$OutQuint,
          $CaptionSliderOptions: {
            $Class: $JssorCaptionSlideo$,
            $Transitions: jssor_1_SlideoTransitions
          },
          $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$
          },
          $BulletNavigatorOptions: {
            $Class: $JssorBulletNavigator$
          }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*responsive code begin*/
        /*you can remove responsive code if you don't want the slider scales while window resizing*/
        function ScaleSlider() {
            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            if (refSize) {
                refSize = Math.min(refSize, 1920);
                jssor_1_slider.$ScaleWidth(refSize);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }
        ScaleSlider();
        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        /*responsive code end*/
    });
</script>



<script type="text/javascript">
  $(".rate0").rateYo({
    starWidth: "15px",
    rating: 0,
    readOnly: true,
    // ratedFill: "#d30000"
  });
  $(".rate1").rateYo({
    starWidth: "15px",
    rating: 1,
    readOnly: true,
    // ratedFill: "#d30000"
  });
$(".rate2").rateYo({
    starWidth: "15px",
    rating: 2,
    readOnly: true,
    // ratedFill: "#d30000"
  });
$(".rate3").rateYo({
    starWidth: "15px",
    rating: 3,
    readOnly: true,
    // ratedFill: "#d30000"
  });
$(".rate4").rateYo({
    starWidth: "15px",
    rating: 4,
    readOnly: true,
    // ratedFill: "#d30000"
  });
$(".rate5").rateYo({
    starWidth: "15px",
    rating: 5,
    readOnly: true,
    // ratedFill: "#d30000"
  });

  $(".open-hidden").hover(function(){
    $(this).children(".this-hidden").fadeToggle();
  });

  $(".open-btn-compare").click(function(){
    $("#btn-compare").fadeIn();
  });

  $( "#accordion" ).accordion();

</script>
