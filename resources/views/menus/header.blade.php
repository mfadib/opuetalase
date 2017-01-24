@foreach($webprofile as $web)
<div class="row sticky-nav" id="sticky-nav">
  <div class="col-md-12">
    <div class="bg5" style="position: fixed; z-index: 999; width: 100%; border-bottom: 1px solid #ff96a0;">
      <img class="left mt15 ml10 bgabu1 rd10 p5 stc-logo" src="{{URL::asset('images/'.$web->icon)}}" style="margin-bottom: 10px">
      <div class="right mt20 mr10">
        {!! Form::open(['action'=>'ProductController@search','method'=>'post']) !!}
          <input type="text" name="search" class="p5 left" placeholder="Search Entire Store" style="width: 120px">
          <div class="cb2 left" style="text-align: center; width: 34px; height: 34px">
            <button type="submit" class="fa fa-search fa-lg" style="padding: 10px;"></button>
          </div>
        <div class="right" style="margin-top: -14px">
          <button type="button" class="navbar-toggle collapsed cb" onclick="show('sticky-hid-768')">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars fa-2x" style="text-align: right;"></span>
          </button>
        </div>
        {!! Form::close() !!}
      </div>

       

        <ul class="cb2 nav navbar-nav ml10 mt10 top-nav">
          <li class="">
            <a href="{{URL::to("/")}}">
              <span class="cb2">HOME</span>
            </a>
          </li>
          
          <li class="mt15" style="font-weight: bold;">
            <div class="dropdown" onmouseover="show4('hover_cat_s')">
              <div data-toggle="">
                <span class="mr15">CATEGORY</span>
                <span class="caret"></span>
              </div>
            </div>
          </li>
          <li class="" onmouseover="show4('hover_product_s')">
            <a href="{{URL::action('ProductController@index')}}">
              <span class="cb2">PRODUCT</span>
            </a>
          </li>
          <li class="" onmouseover="show4('hover_blog_s')">
            <a href="{{URL::action('NewsController@index')}}">
              <span class="cb2">BLOG</span>
            </a>
          </li>
          <li class="">
            <a href="{{URL::action('HomeController@page',['slug'=>'about-us'])}}">
              <span class="cb2">ABOUT US</span>
            </a>
          </li>
          <li class="mt15" style="font-weight: bold;">
            <div class="dropdown" onmouseover="show4('hover_contact_s')">
              <div data-toggle="">
                <span class="mr15">CONTACT</span>
              </div>
            </div>
          </li>
          <li class="">
            <a href="{{URL::action('HomeController@faqs')}}">
              <span class="cb2">FAQs</span>
            </a>
          </li>
        </ul>

        <div class="none col-xs-12 left bg5 pt20" style="width: 100%; height: 400px; z-index: 9996;border: 1px solid #ff96a0; position: absolute; overflow-y: scroll; margin-top: 67px; margin-left: 0" id="w_hover_s">

          <div id="hover_cat_s" class="none hover_x_s">
            @foreach($menu_categories->get() as $cat)
            <div class="col-md-3 col-sm-6">
              <div class="p10" style="border-bottom: 1px solid #ff96a0;">
                <span class="f12">
                  <a href="{{URL::action('ProductController@category',['slug'=>$cat->slug])}}" title="{{$cat->name}}"><b>{{$cat->name}}</b></a>
                </span>
                @foreach($query->get_data('categories',['parent'=>$cat->id])->get() as $sub)
                <div class="p5"><a href="{{URL::action('ProductController@category',['slug'=>$sub->slug])}}" title="{{$sub->name}}">{{$sub->name}}</a></div>
                @endforeach
              </div>
            </div> <!-- Looping -->
            @endforeach
          </div>

          <div id="hover_product_s" class="none hover_x_s">
            @foreach($productlatests->get() as $pro)
            <div class="col-md-2 col-sm-3 p10">
              <div class="p10 bordash">
                <a href="{{URL::action('ProductController@detail',['slug'=>$pro->slug])}}" title="{{$pro->title}}">
                  <div class="bg" style="height: 80px; width: 100%; background: url('{{URL::asset('images/products/'.$pro->cover)}}'); background-size: cover; background-position: center;"></div>
                  <div class="tc fprod">{{$getquery->get_ellipsis($pro->title,20)}}</div>
                  <!-- <center><span class="rate"></span></center> -->
                  <div class="tc fprod"><b>{{$getquery->currency_format($pro->price)}}</b></div>
                </a>
              </div>
            </div>
            @endforeach
          </div>

          <div id="hover_blog_s" class="none hover_x_s">
            @foreach($news_categories->get() as $newscats)
            <div class="col-md-2 col-sm-4">
              <div class="p10">
                <span class="f12">
                  <a href="{{URL::action('NewsController@category',['slug'=>$newscats->slug])}}" title="{{$newscats->name}}"><b>{{$newscats->name}}</b></a>
                </span>
                @foreach($getquery->get_data('news_categories',['parent'=>$newscats->id])->get() as $subnews)
                <div class="p5" style="border-bottom: 1px solid #ff96a0;">
                  <a href="{{URL::action('NewsController@category',['slug'=>$subnews->slug])}}" title="{{$subnews->name}}">
                    {{$subnews->name}}
                  </a>
                </div>
                @endforeach
              </div>
            </div>
            @endforeach
          </div>

          <div id="hover_contact_s" class="none hover_x_s">
            <div class="col-md-6">
              <div class="p20">
                <span class="f16">Contact <b>Information</b></span>
                <div>
                  {!! Form::open(['action'=>'HomeController@contact_send','method'=>'post']) !!}
                    <div class="input-group">Name *
                      <input type="text" name="name" class="form-control">
                    </div>
                    <div class="input-group mt10">Email *
                      <input type="email" name="email" class="form-control">
                    </div>
                    
                    <div class="input-group mt10" style="width: 100%;">Phone
                      <input type="text" name="phone" class="form-control">
                    </div>                  

                    <div class="input-group mt10" style="width: 100%;">Comment *
                      <textarea name="message" style="height: 100px" class="form-control"></textarea>
                    </div><br>
                    <span class="cr"><b>* Required Field</b></span>

                    <button class="btn btn-default right">SUBMIT</button>
                  {!! Form::close(); !!}
                </div>
          
              </div>
            </div>

            <div class="col-md-6">
              <div class="p20">
                <span class="f16"><b>About</b></span>
                <p class="tj">{{$web->about}}</p>
                <div>
                  <div class="mt10">
                    <span class="fa fa-fax mr10 fa-lg"></span>
                    <span>Phone : <b>{{$web->phone}}</b></span>
                  </div>

                  <div class="mt10">
                    <span class="fa fa-envelope-o mr10 fa-lg"></span>
                    <span>Email : <b>{{$web->email}}</b></span>
                  </div>
                </div>
              </div>
            </div>

          </div>
          
        </div>

    </div>
    <div class="none" id="sticky-hid-768" style="position: fixed; z-index: 999; width: 100%; height: 100%; background: rgba(0,0,0,0.4); overflow-y: none;">
        <div class="left cw mt20" style="width: 16%; position: fixed">
          <div class="p10 right bg" onclick="show('sticky-hid-768', 'right')">
            <span class="fa fa-bars fa-lg"></span>
          </div>
        </div>
        <div style="width: 84%; height: 100%; right: 0;" class="right">
          <div class="p10 bg tc"><h4 class="cb2">{{$web->title}}</h4></div>
          <div>
            <center>
            @if(Auth::check())
              @if(Auth::user()->status == 0)
                <div class="bg cw col-xs-4">
                  <a href="{{URL::action('MemberController@memberarea')}}" title="{{Auth::user()->name}}">
                  <div class="p10 radius" style="border: #fff solid 1px; width: 40px">
                    <span class="fa fa-user fa-lg cw">
                      
                    </span>
                  </div>
                  {{Auth::user()->name}}</a>
                </div>

                <div class="bg cw left col-xs-4">
                  <a href="{{URL::action('MemberController@signout')}}" title="Sign Out">
                    <div class="p10 radius" style="border: #fff solid 1px; width: 40px">
                      <span class="fa fa-sign-in fa-lg cw"></span>
                    </div>
                    Sign Out
                  </a>
                </div>
              @endif
            @else
              <div class="bg cw col-xs-4">
                <a href="{{URL::action('MemberController@signin')}}" title="Sign In">
                <div class="p10 radius" style="border: #fff solid 1px; width: 40px">
                  <span class="fa fa-user fa-lg cw">
                    
                  </span>
                </div>
                Sign In</a>
              </div>

              <div class="bg cw left col-xs-4">
                <a href="{{URL::action('MemberController@signup')}}" title="Sign Up">
                  <div class="p10 radius" style="border: #fff solid 1px; width: 40px">
                    <span class="fa fa-sign-in fa-lg cw"></span>
                  </div>
                  Sign Up
                </a>
              </div>
            @endif

              <div class="bg cw left col-xs-4">
                <a href="{{URL::action('MemberController@wishlist')}}" title="Wishlist"><div class="p10 radius" style="border: #fff solid 1px; width: 40px">
                  <span class="fa fa-heart fa-lg cw">
                    
                  </span>
                </div>
                Wishlist
              </div>
              
            </center>
          </div>
          <div class="row pt20" style=""></div>
          <div class="bg4" style="height: 100%;">
            <div class="bg4 pb5" style="width: 100%;">
              <div class="p10">
                <div class="bg5 p10">
                  <a href="{{URL::action('HomeController@index')}}" class="cb"><span class="fa fa-home p5 br1 pr10 left"></span> <b class="ml10">HOME</b></a>
                </div>
              </div>
            </div>

            <div class="bg4 p10" style="margin-top: -15px">
              <div class="p10 bg5">
                <div class="dropdown">
                  <div data-toggle="dropdown">
                    <div onclick="show2('list_cat')">
                      <span class="fa fa-bars p5 br1 pr10"></span>
                      <span class="mr15"> <b class="ml5">CATEGORY</b></span>
                      <span class="caret right mt10"></span>
                    </div>
                  </div>
                  <div class="p5 none" id="list_cat">
                  @foreach($menu_categories->get() as $master)
                  <?php $childs = $getquery->get_data('categories',['parent'=>$master->id]); ?>
                  <div class="p10" style="border-bottom: 1px solid #ddd;">
                    <div>
                        <a href="{{URL::action('ProductController@category',['slug'=>$master->slug])}}" title="{{$master->name}}" class="cb">
                        @if($childs->count() != 0)
                          <span class="fa fa-bars p5 br1 pr10"></span>
                          <span class="fa fa-caret-down right" onclick="show2('sub_category_parent_'{{$master->id}})"></span>
                        @endif
                        <b class="ml5">{{$master->name}}</b></a>
                    </div>
                    @if($childs->count() != 0)
                    <div class="none" id="sub_category_parent_{{$master->id}}" style="display: none;">
                    @foreach($childs->get() as $child)
                        <div class="p10" style="border-bottom: 1px solid #ddd;">
                          <div>
                            <a href="{{URL::action('ProductController@category',['slug'=>$child->slug])}}" title="{{$child->name}}" class="cb"><b class="ml5">{{$child->name}}</b></a>
                          </div>
                        </div>
                    @endforeach
                    </div>
                    @endif
                  </div>
                  @endforeach
                  </div>
                </div>
              </div>

            </div>
<!-- 
            <div class="bg4 p10" style="margin-top: -15px">
              <div class="p10 bg5">
                    <a href="{{URL::action('ProductController@index')}}" title="Product" class="cb"><span class="fa fa-file p5 br1 pr10"></span><b class="ml5">PRODUCST</b></a>
              </div>
            </div>
 -->
            <div class="bg4" style="width: 100%; margin-top: -20px">
              <div class="p10">
                <div class="bg5 p10">
                  <a href="{{URL::action('NewsController@index')}}" title="News" class="cb"><span class="fa fa-rss p5 br1 pr10 left"></span> <b class="ml10">BLOG</b></a>
                </div>
              </div>
            </div>

            <div class="bg4 pb10" style="width: 100%">
              <div class="p10">
                <div class="bg5 p10">
                   <a href="{{URL::action('HomeController@faqs')}}" title="FAQs" class="cb"><span class="fa fa-comment-o p5 br1 pr10 left"></span><b class="ml10">FAQs</b></a>
                </div>
              </div>
            </div>
          </div>
          
        </div>
    </div>
  </div>
</div>

<nav class="navbar top-nav">
  <div class="container-fluid container">

    <div class="navbar-header">
      <span class="navbar-brand active2" href="#">
        <img class="left" src="{{URL::asset('images/'.$web->icon)}}" style="width: 60px">
      </span>
    </div>

    <ul class="nav navbar-nav navbar-right top-nav f12 cb2" style="margin-top: 30px;">
      @if(Auth::check())
        @if(Auth::user()->status == 0)
          <span class="fa fa-user mr10"></span>
          <span class="mr15 br1 pr20"><a href="{{URL::action('MemberController@memberarea')}}" title="{{Auth::user()->name}}">{{Auth::user()->name}}</a></span>
          
          <span class="fa fa-heart mr10"></span>
          <span class="mr15 br1 pr20"><a href="{{URL::action('MemberController@wishlist')}}" title="Wishlist">Wishlist</a></span>
          
          <span class="fa fa-sign-out mr10"></span>
          <span class="mr15 br1 pr20"><a href="{{URL::action('MemberController@signout')}}" title="Log out">Log out</a></span>

        @elseif(Auth::user()->status == 1)
          <span class="fa fa-user mr10"></span>
          <span class="mr15 br1 pr20"><a href="{{URL::action('AdminController@home')}}" title="Admin Area">Admin Area</a></span>
        @endif
      @else
      <span class="fa fa-lock mr10"></span>
      <span class="mr15 br1 pr20"><a href="{{URL::action('MemberController@signin')}}" title="Log In">Log In</a></span>

      <span class="fa fa-key mr10"></span>
      <span class="mr15 br1 pr20"><a href="{{URL::action('MemberController@signup')}}" title="Register">Register</a></span>
      @endif

      <span class="fa fa-heart mr10"></span>
      <span class="mr15 br1 pr20"><a href="{{URL::action('MemberController@wishlist')}}" title="Wishlist">Wishlist</a></span>



      <div class="dropdown right">
        <div data-toggle="dropdown">
          <span class="flag-icon flag-icon-gb mr10"></span>
          <span class="mr15">Language</span>
          <span class="caret"></span>
        </div>
        <ul class="dropdown-menu">
          <li class="ml10 pt10">
            <span class="ml10 flag-icon flag-icon-id mr10"></span>
            <span class="mr15">Indonesia</span>
          </li>
          <li class="ml10 pt10">
            <span class="ml10 flag-icon flag-icon-gb mr10"></span>
            <span class="mr15">English</span>
          </li>
          <li class="ml10 pt10">
            <span class="ml10 flag-icon flag-icon-gr mr10"></span>
            <span class="mr15">Argentina</span>
          </li>
        </ul>
      </div>

      <div class="mr20 dropdown right br1 pr20">
        <div data-toggle="dropdown">
          <span class="mr15">USD</span>
          <span class="caret"></span>
        </div>
        <ul class="dropdown-menu">
          <li class="ml10 pt10"><span class="mr15">IDR</span></li>
          <li class="ml10 pt10"><span class="mr15">USD</span></li>
          <li class="ml10 pt10"><span class="mr15">EUR</span></li>
        </ul>
      </div>

    </ul>
  </div>
</nav>

<div class="row pt20" style="border-bottom: 1px solid #ff96a0"></div>

<div class="row pt20 top-nav bgabu1">
  <nav class="navbar">
      <div class="container-fluid container">
        <div class="navbar-header">
          <div class="dis768 ml20 pl20">
            <img class="left" src="{{URL::asset('images/'.$web->icon)}}" style="width: 60px">
          </div>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars fa-2x"></span>
          </button>
        </div>

        <div class="collapse navbar-collapse nr" id="collapse-1">

          <ul class="nav navbar-nav ml10">
            <li class="">
              <a href="{{URL::action('HomeController@index')}}">HOME</a>
            </li>
            <!-- <li class="">
              <a>FEATURES</a>
            </li> -->
            <li class="mt15" style="font-weight: bold;">
              <div class="dropdown" onmouseover="show3('hover_cat')">
                <div data-toggle="">
                  <span class="mr15">CATEGORY</span>
                  <span class="caret"></span>
                </div>
              </div>
            </li>
            <li class="" onmouseover="show3('hover_product')">
              <a href="{{URL::action('ProductController@index')}}">PRODUCT</a>
            </li>
            <li class="" onmouseover="show3('hover_blog')">
              <a href="{{URL::action('NewsController@index')}}">BLOG</a>
            </li>
            <li class="">
              <a href="{{URL::action('HomeController@page',['slug'=>'about-us'])}}">ABOUT US</a>
            </li>
            <li class="mt15" style="font-weight: bold;">
              <div class="dropdown" onmouseover="show3('hover_contact')">
                <div data-toggle="">
                  <span class="mr15">CONTACT</span>
                </div>
              </div>
            </li>
            <li class="">
              <a href="{{URL::action('HomeController@faqs')}}">FAQs</a>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="right mr20">
              {!! Form::open(['action'=>'ProductController@search','method'=>'post']) !!}
              <input type="text" name="search" class="p5" placeholder="Search Entire Store">
              <div class="bg2 cw w40 right" style="height: 34px; text-align: center">
                <button type="submit" class="fa fa-search fa-lg" style="padding: 10px;"></button>
              </div>
              {!! Form::close() !!}
            </li>
          </ul>

        </div>

        <div class="none top-nav col-xs-12 left bg5 pt20 bgabu1" style="width: 84%; height: 400px; z-index: 9997; border-top: 1px solid #ff96a0; position: absolute; overflow-y: scroll;" id="w_hover">
          
          <!-- FOR CATEGORY -->

          <div id="hover_cat" class="none hover_x">
            @foreach($menu_categories->get() as $cat)
            <div class="col-md-3 col-sm-6">
              <div class="p10" style="border-bottom: 1px solid #ff96a0;">
                <span class="f12">
                  <a href="{{URL::action('ProductController@category',['slug'=>$cat->slug])}}" title="{{$cat->name}}"><b>{{$cat->name}}</b></a>
                </span>
                @foreach($query->get_data('categories',['parent'=>$cat->id])->get() as $sub)
                <div class="p5"><a href="{{URL::action('ProductController@category',['slug'=>$sub->slug])}}" title="{{$sub->name}}">{{$sub->name}}</a></div>
                @endforeach
              </div>
            </div> <!-- Looping -->
            @endforeach
          </div>
        <!-- FOR CATEGORY -->

        <!-- FOR PRODUCT LIST -->
          <div id="hover_product" class="none hover_x">
            @foreach($productlatests->get() as $pro2)
            <div class="col-md-3 col-sm-3 p10">
              <div class="p10 bordash">
                <a href="{{URL::action('ProductController@detail',['slug'=>$pro2->slug])}}" title="{{$pro2->title}}">
                  <div class="bg" style="height: 80px; width: 100%; background: url('{{URL::asset('images/products/'.$pro2->cover)}}'); background-size: cover; background-position: center;"></div>
                  <div class="tc fprod">{{$getquery->get_ellipsis($pro2->title,20)}}</div>
                  <!-- <center><span class="rate"></span></center> -->
                  <div class="tc fprod"><b>{{$getquery->currency_format($pro2->price)}}</b></div>
                </a>
              </div>
            </div>
            @endforeach
          </div>
          <!-- END FOR PRODUCT LIST -->

          <!-- FOR BLOG -->
          <div id="hover_blog" class="none hover_x">
            @foreach($news_categories->get() as $newscats)
            <div class="col-md-2 col-sm-4">
              <div class="p10">
                <span class="f12">
                  <a href="{{URL::action('NewsController@category',['slug'=>$newscats->slug])}}" title="{{$newscats->name}}"><b>{{$newscats->name}}</b></a>
                </span>
                @foreach($getquery->get_data('news_categories',['parent'=>$newscats->id])->get() as $subnews)
                <div class="p5" style="border-bottom: 1px solid #ff96a0;">
                  <a href="{{URL::action('NewsController@category',['slug'=>$subnews->slug])}}" title="{{$subnews->name}}">
                    {{$subnews->name}}
                  </a>
                </div>
                @endforeach
              </div>
            </div>
            @endforeach
          </div>
        <!--  END FOR BLOG -->


        <!--  FOR CONTACT -->

          <div id="hover_contact" class="none hover_x">
            <div class="col-md-6">
              <div class="p20">
                <span class="f16">Contact <b>Information</b></span>
                <div>
                  {!! Form::open(['action'=>'HomeController@contact_send','method'=>'post']) !!}
                  <div class="input-group">Name *
                    <input type="text" name="name" class="form-control">
                    @if($errors->has())
                        <span class="label label-danger">{!!$errors->first('name')!!}</span>
                    @endif
                  </div>
                  <div class="input-group mt10">Email *
                    <input type="email" name="email" class="form-control">
                    @if($errors->has())
                        <span class="label label-danger">{!!$errors->first('email')!!}</span>
                    @endif
                  </div>
                  
                  <div class="input-group mt10" style="width: 100%;">Phone
                    <input type="text" name="phone" class="form-control">
                    @if($errors->has())
                        <span class="label label-danger">{!!$errors->first('phone')!!}</span>
                    @endif
                  </div>                  

                  <div class="input-group mt10" style="width: 100%;">Comment *
                    <textarea style="height: 100px" name="message" class="form-control"></textarea>
                    @if($errors->has())
                        <span class="label label-danger">{!!$errors->first('message')!!}</span>
                    @endif
                  </div><br>
                  <span class="cr"><b>* Required Field</b></span>

                  <button class="btn btn-default right">SUBMIT</button>
                  {!! Form::close() !!}
                </div>
          
              </div>
            </div>

            <div class="col-md-6">
              <div class="p20">
                <span class="f16"><b>About</b></span>
                <p class="tj">{{$web->about}}</p>
                <div class="mt10">
                  <span class="fa fa-fax mr10 fa-lg"></span>
                  <span>Phone : <b>{{$web->phone}}</b></span>
                </div>

                <div class="mt10">
                  <span class="fa fa-envelope-o mr10 fa-lg"></span>
                  <span>Email : <b>{{$web->email}}</b></span>
                </div>
                <!-- </div> -->
              </div>
            </div>
          </div>
        <!--  END FOR CONTACT -->

        </div>

      </div>
  </nav>
</div>
@endforeach