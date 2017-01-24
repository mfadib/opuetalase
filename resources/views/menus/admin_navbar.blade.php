
        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-info">
                                <div>{{Auth::user()->name}}</div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="selected">
                        <a href="{{URL::action('AdminController@home')}}"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li><a href="{{URL::to('/')}}" target="_blank"><i class="fa fa-globe fa-fw"></i>View website</a></li>
                    <li>
                        <a href="#"><i class="fa fa-info fa-fw"></i> News<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{URL::action('AdminController@news_categories')}}">Categories</a></li>
                            <li><a href="{{URL::action('AdminController@news_add')}}">Add News</a></li>
                            <li><a href="{{URL::action('AdminController@news')}}">List News</a></li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bars fa-fw"></i> Products<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{URL::action('AdminController@product_add')}}">Add Product</a></li>
                            <li><a href="{{URL::action('AdminController@products')}}">List Products</a></li>
                            <li><a href="{{URL::action('AdminController@product_reviews')}}">Reviews</a></li>
                            <li><a href="{{URL::action('AdminController@brands')}}">Brands</a></li>
                            <li><a href="{{URL::action('AdminController@product_categories')}}">Categories</a></li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{URL::action('AdminController@user_add')}}">Add User</a></li>
                            <li><a href="{{URL::action('AdminController@users')}}">List Users</a></li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-gears fa-fw"></i> Settings<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{URL::action('AdminController@profile')}}">Website</a></li>
                            <li><a href="{{URL::action('AdminController@contents')}}">Contents</a></li>
                            <li><a href="{{URL::action('AdminController@faqs')}}">FAQs</a></li>
                            <li><a href="{{URL::action('AdminController@sliders')}}">Sliders</a></li>
                            <li><a href="{{URL::action('AdminController@subscribes')}}">Subscribes</a></li>
                            <li><a href="{{URL::action('AdminController@testimonials')}}">Testimonials</a></li>
                            <li><a href="{{URL::action('AdminController@contacts')}}">Contacts</a></li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="{{URL::action('AdminController@signout')}}"><i class="fa fa-sign-out fa-fw"></i>Sign Out</a>
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->