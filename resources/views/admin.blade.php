<!DOCTYPE html>
<html>
<head>
    @foreach($webprofile as $item)
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title_site','Admin area') | {{$item->title}}</title>
    <!-- Core CSS - Include with every page -->
    <link href="{{URL::asset('backend/plugins/bootstrap/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('backend/plugins/pace/pace-theme-big-counter.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('backend/css/style.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('backend/css/main-style.css')}}" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="{{URL::asset('backend/plugins/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
    
    <link rel="icon" href="{{URL::asset('assets/images/'.$item->icon)}}"/>
    @yield('header')
   </head>
    @endforeach

<body>
    <!--  wrapper -->
    <div id="wrapper">
        @include('menus.admin_navbartop')
        @include('menus.admin_navbar')
        <!--  page-wrapper -->
        <div id="page-wrapper">
            
            @yield('h3')

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    @include('messages.main')
                </div>
                <!--end  Welcome -->
            </div>
                
            @yield('content')

        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="{{URL::asset('backend/plugins/jquery-1.10.2.js')}}"></script>
    <script src="{{URL::asset('backend/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('backend/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{URL::asset('backend/plugins/pace/pace.js')}}"></script>
    <script src="{{URL::asset('backend/scripts/siminta.js')}}"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="{{URL::asset('backend/plugins/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{URL::asset('backend/plugins/morris/morris.js')}}"></script>
    <script src="{{URL::asset('backend/scripts/dashboard-demo.js')}}"></script>

    @yield('footer')

</body>

</html>
