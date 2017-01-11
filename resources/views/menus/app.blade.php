<div class="header clearfix">
    <nav>
        <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="{{URL::action('HomeController@index')}}">Home</a></li>
            <li role="presentation"><a href="{{URL::action('ProductController@index')}}">Products</a></li>
            <li role="presentation"><a href="{{URL::action('NewsController@index')}}">News</a></li>
            @if(Auth::check())
                @if(Auth::user()->status == 0)
                    <li role="presentation"><a href="{{URL::action('MemberController@memberarea')}}">{{Auth::user()->name}}</a></li>
                    <li role="presentation"><a href="{{URL::action('MemberController@signout')}}">Logout</a></li>
                @endif
            @else
            <li role="presentation"><a href="{{URL::action('MemberController@signin')}}">Login</a></li>
            @endif
        </ul>
    </nav>
    <h3 class="text-muted">Etalase Online</h3>
</div>
