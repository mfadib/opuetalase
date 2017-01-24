@extends('app')
@section('content')
            
      <div class="row first-content">
        <center><div class="col-xs-12 col-md-12" style="max-width: 1360px; margin: 0 auto;">

        <style>
            .jssorb05 {
                position: absolute;
            }
            .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
                position: absolute;
                /* size of bullet elment */
                width: 16px;
                height: 16px;
                /*background: url('img/b05.png') no-repeat;*/
                overflow: hidden;
                cursor: pointer;
            }
            .jssorb05 div { background-position: -7px -7px; }
            .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
            .jssorb05 .av { background-position: -67px -7px; }
            .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

            .jssora22l, .jssora22r {
                display: block;
                position: absolute;
                /* size of arrow element */
                width: 40px;
                height: 58px;
                cursor: pointer;
                /*background: url('img/a22.png') center center no-repeat;*/
                overflow: hidden;
            }
            .jssora22l { background-position: -10px -31px; }
            .jssora22r { background-position: -70px -31px; }
            .jssora22l:hover { background-position: -130px -31px; }
            .jssora22r:hover { background-position: -190px -31px; }
            .jssora22l.jssora22ldn { background-position: -250px -31px; }
            .jssora22r.jssora22rdn { background-position: -310px -31px; }
            .jssora22l.jssora22lds { background-position: -10px -31px; opacity: .3; pointer-events: none; }
            .jssora22r.jssora22rds { background-position: -70px -31px; opacity: .3; pointer-events: none; }
        </style>

        <style>
            .jssorb03 {
                position: absolute;
            }
            .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av {
                position: absolute;
                /* size of bullet elment */
                width: 21px;
                height: 21px;
                text-align: center;
                line-height: 21px;
                color: white;
                font-size: 12px;
                background: url('img/b03.png') no-repeat;
                overflow: hidden;
                cursor: pointer;
            }
            .jssorb03 div { background-position: -5px -4px; }
            .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
            .jssorb03 .av { background-position: -65px -4px; }
            .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }

            .jssora03l, .jssora03r {
                display: block;
                position: absolute;
                /* size of arrow element */
                width: 55px;
                height: 55px;
                cursor: pointer;
                background: url('img/a03.png') no-repeat;
                overflow: hidden;
            }
            .jssora03l { background-position: -3px -33px; }
            .jssora03r { background-position: -63px -33px; }
            .jssora03l:hover { background-position: -123px -33px; }
            .jssora03r:hover { background-position: -183px -33px; }
            .jssora03l.jssora03ldn { background-position: -243px -33px; }
            .jssora03r.jssora03rdn { background-position: -303px -33px; }
            .jssora03l.jssora03lds { background-position: -3px -33px; opacity: .3; pointer-events: none; }
            .jssora03r.jssora03rds { background-position: -63px -33px; opacity: .3; pointer-events: none; }
        </style>

        <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden; visibility: hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
            </div>
            <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
                @foreach($sliders->get() as $item)
                <div data-p="225.00" style="display: none;">
                    <img data-u="image" src="{{URL::asset('images/sliders/'.$item->image)}}" />
                </div>
                @endforeach
            </div>
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
                <!-- bullet navigator item prototype -->
                <div data-u="prototype" style="width:16px;height:16px;"></div>
            </div>
            <!-- Arrow Navigator -->
            <span data-u="arrowleft" class="jssora22l" style="top:0px;left:8px;width:40px;height:58px;" data-autocenter="2"></span>
            <span data-u="arrowright" class="jssora22r" style="top:0px;right:8px;width:40px;height:58px;" data-autocenter="2"></span>
        </div>

        </div></center>
      </div>

      <div class="row mt40" style="border-top: 1px solid #666">
        <center><div class="f16" style="width: 240px; background: #fff; margin-top: -14px;">RECOMMENDED PRODUCTS</div></center>
      </div>

      <div class="row">
        <div class="container pt20">
          @foreach($recommendeds->get() as $item)
          <div class="col-md-3 col-sm-6 bdash" style="height: 300px;">
            <div class="tc f16 tc"><a href="{{URL::action('ProductController@category',['slug'=>$query->get_field_data('categories',['id'=>$item->category_id],'slug')])}}" title="Category" class="cb">{{$query->get_field_data('categories',['id'=>$item->category_id],'name')}}</a></div>
            <div class="bg2 open-hidden" style="height: 200px; background: url({{url('images/products/'.$item->cover)}}); background-size: cover; background-position: center;">
              <div class="this-hidden none" style="background: rgba(0,0,0,0.4); height: 100%; width: 100%;">
                <div class="cw">
                  <div class="wicon right">
                    <div class="mr10 mt10" style="margin-left: 40px;">
                      <span class="fa-stack fa-lg open-btn-compare"><a href="{{url('product/detail/'.$item->slug)}}" title="Product detail" class="cw">
                        <i class="fa fa-circle-thin fa-stack-2x"></i>
                        <i class="fa fa-eye fa-stack-1x"></i></a>
                      </span>
                    </div>

                    <div style="margin-top: -36px">
                      <span class="fa-stack fa-lg"><a href="{{url('product/wishlist/'.$item->slug)}}" title="Wishlist" class="cw">
                        <i class="fa fa-circle-thin fa-stack-2x"></i>
                        <i class="fa fa-heart fa-stack-1x"></i></a>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt5">

              <div class="tc fprod">{{$query->get_ellipsis($item->title,30)}}</div>
              <div class="tc fprod mt5"><b>{{$query->currency_format($item->price)}}</b></div>

            </div>
          </div>
          @endforeach
        </div>
      </div>



      <div class="row mt40" style="border-top: 1px solid #666">
        <center><div class="f16" style="width: 240px; background: #fff; margin-top: -14px;">PRODUCT</div></center>
      </div>

      <div class="row">
        <div class="container">

          <div class="col-md-12 p10">
            <div class="p10">
              @foreach($products as $item)
              <div class="col-md-3 col-sm-4 col-xs-6 p10">
                <div class="p10 bordash">
                  <a href="{{url('product/detail/'.$item->slug)}}"><div class="bg" style="height: 140px; width: 100%; background: url({{url('images/products/'.$item->cover)}}); background-size: cover; background-position: center;">
                  </div>
                  <div class="tc fprod">{{$query->get_ellipsis($item->title,25)}}</div>
                  <center><span class="rate"></span></center>
                  <div class="tc fprod"><b>{{$query->currency_format($item->price)}}</b></div>
                </div></a>
              </div>
              @endforeach
              
              <div class="col-xs-12 col-md-4 right p10">
                <div class="tr">
                  {!! $products->links() !!}
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <!-- Recomended -->

      <div class="row mt40" style="border-top: 1px solid #666">
        <center><div class="f16" style="width: 240px; background: #fff; margin-top: -14px;">SPECIAL PRODUCTS</div></center>
      </div>

      <div class="row mt20">
        <div class="container">
        @foreach($specials->get() as $item)
          <div class="col-sm-4 col-xs-12 p10 bordash">
            <div class="p10 bg2" style="height: 200px; background: url({{url('images/products/'.$item->cover)}}); background-size: cover; background-position: center;"></div>
            <div class="f10">
              <div class="tc fprod">{{$query->get_ellipsis($item->title,50)}}</div>
              <div class="tc fprod mt5"><b>{{$query->currency_format($item->price)}}</b></div>
            </div>
          </div>
        @endforeach
        </div>
      </div>


      <div class="row mt40" style="border-top: 1px solid #666">
        <center><div class="f16" style="width: 240px; background: #fff; margin-top: -14px;">SUPORTED BY</div></center>
      </div>

      <div class="row pt20">
        <div class="container">
          <div class="col-md-4 col-sm-4 p10 tc">
            <div class="p10" style="border: 2px solid #666">
              <b class="f12">SOMETHING</b><br>
              <span class="cb2">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 p10 tc">
            <div class="p10" style="border: 2px solid #666">
              <b class="f12">SOMETHING</b><br>
              <span class="cb2">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 p10 tc">
            <div class="p10" style="border: 2px solid #666">
              <b class="f12">SOMETHING</b><br>
              <span class="cb2">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Testimoni -->
      <div class="row mt40" style="border-top: 1px solid #666">
        <center><div class="f16" style="width: 240px; background: #fff; margin-top: -14px;">TESTIMONY</div></center>
      </div>

      <div class="row mt40 pt40">
        <div class="container">

          @foreach($testimonials->get() as $testi)
          <div class="col-md-4 col-sm-4 p10">
            <div class="p10 bordash">
              <center>
                <!-- <div class="round bg" style="margin-top: -50px; background: url('assets/images/testimoni/1.png'); background-size: cover"></div> -->
                <div class="f16 mt5"><b>{!! ucwords($query->get_field_data('users',['id'=>$testi->user_id],'name')) !!}</b></div>
              </center>
              <!-- <center><span class="rate"></span></center> -->
              <div class="tj mt10">{!! $testi->testimony !!}</div>

            </div>
          </div>
          @endforeach

          <div class="row right">
            <div class="mr20 pointer f12">
              <a href="{{URL::action('MemberController@testimony')}}" class="cb"><b>Write Your Comment Here...</b></a>
            </div>
          </div>

        </div>
      </div>
@endsection