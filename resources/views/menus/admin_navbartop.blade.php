
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{URL::action('AdminController@home')}}">
<<<<<<< HEAD
                    <img src="{{URL::asset('images/logo.png')}}" alt="" />
=======
                    <img src="{{URL::asset('assets/images/logo.png')}}" alt="" />
>>>>>>> 6097d6d6c07a192914c3e1c31d69b437057cad9b
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="{{URL::action('AdminController@contacts')}}">
                        @if($contactcount != 0)<span class="top-label label label-danger">{{$contactcount}}</span>@endif<i class="fa fa-envelope fa-3x"></i>
                    </a>
                </li>
<!-- 
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-success">4</span>  <i class="fa fa-tasks fa-3x"></i>
                    </a>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-warning">5</span>  <i class="fa fa-bell fa-3x"></i>
                    </a>
                </li>
 -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user"><!-- 
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li> -->
                        <li><a href="{{URL::action('AdminController@setting')}}"><i class="fa fa-gear fa-fw"></i>Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="{{URL::action('AdminController@signout')}}"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->
