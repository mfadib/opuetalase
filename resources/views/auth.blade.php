<!DOCTYPE html>
<html>
    <head>
        <title>Etalase Online</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/css/jumbotron-narrow.css')}}">
        <script src="{{url('assets/js/jquery-1.10.2.min.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="https://use.fontawesome.com/dd09f69bca.js"></script>
        <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
        @yield('header')
    </head>
    <body>
        
        <div class="container">
            @include('menus.app')
            <!-- Global Message -->
            @include('messages.main')
            <!-- END Global Message -->
            
            <div class="row">
                @include('menus.member')
                <div class="col-md-9">
                    <!-- This is content of website -->
                    @yield('content')
                    <!-- End content of website -->
                </div>
            </div>  
            <footer class="footer">
                <p>&copy; 2016 Company, Inc. | <a href="{{URL::action('HomeController@page',['slug'=>'about-us'])}}" title="About Us">About Us</a> | <a href="{{URL::action('HomeController@faqs')}}" title="FAQs">FAQs</a></p>
            </footer>

        </div> <!-- /container -->
        @yield('footer')
    </body>
</html>

