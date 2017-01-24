
<!-- Footer -->
@foreach($webprofile as $web)
<div class="row bgbiru p20">

  <div class="container cw2">
    <div class="row">

      <div class="col-md-4">
        <img src="{{URL::asset('images/'.$web->icon)}}" class="p10 bg5 rd10" style="width: 60px;">
      </div>

      <div class="col-md-8">

        <div class="right f12 mt10">
          <span><b>{{$getquery->get_data('users',['status'=>0])->count()}}</b> MEM<b>BER</b></span><br>
          <span><b>{{$getquery->get_data('products')->count()}}</b> PRODUCT <b>FOR SALE</b></span>
        </div>

      </div>

    </div>

    <div class="row mt20" style="height: 10px; border-bottom: 1px #ddd dotted">
    </div>

    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12 p20">

        <div class="p10">
          <div class="row">
            <a href="{{URL::action('HomeController@page',['slug'=>'about-us'])}}"><span class="f12 cb2">ABOUT <b>US</b></span></a>
            <div class="tj sans-serif">
              {{$getquery->get_ellipsis($web->about,400)}}
            </div>
            <div class="tr">
              <a href="{{URL::action('HomeController@page',['slug'=>'about-us'])}}" class="cw">See More...</a>
            </div>
          </div>

          <div class="row mt20">
            <span class="f12 cw2">FOLLOW <b>US</b></span>
          </div>
          <div class="row mt10">
            <div class="row">
              @if(!empty($web->facebook))<a href="{{$web->facebook}}" title="Follow Us"><div class="ml10 left bg4 p10 tc w40 rd10"><span class="fa fa-lg fa-facebook cb2"></span></div></a>@endif
              @if(!empty($web->instagram))<a href="{{$web->instagram}}" title="Follow Us"><div class="ml10 left bg4 p10 tc w40 rd10"><span class="fa fa-lg fa-instagram cb2"></span></div></a>@endif
              @if(!empty($web->twitter))<a href="{{$web->twitter}}" title="Follow Us"><div class="ml10 left bg4 p10 tc w40 rd10"><span class="fa fa-lg fa-twitter cb2"></span></div></a>@endif
              @if(!empty($web->googleplus))<a href="{{$web->googleplus}}" title="Follow Us"><div class="ml10 left bg4 p10 tc w40 rd10"><span class="fa fa-lg fa-google-plus cb2"></span></div></a>@endif
              @if(!empty($web->linkedin))<a href="{{$web->linkedin}}" title="Follow Us"><div class="ml10 left bg4 p10 tc w40 rd10"><span class="fa fa-lg fa-linkedin cb2"></span></div></a>@endif
            </div>
          </div>

          <div class="row mt20">
            <!-- <span class="f12 cb2">CAREER</span> -->
            <a href="{{URL::action('HomeController@faqs')}}"><span class="f12 cb2 ml10">FAQ</span></a>
          </div>

        </div>

      </div>

      <div class="col-md-3 col-sm-6 col-xs-12 p20">
        <div class="p10">

          <div class="row">
            <span class="f12 cw2">EMAIL NEWS<b>LETTER</b></span>
              {!! Form::open(['action'=>'MemberController@subscribe','method'=>'post']) !!}
                <input type="email" name="email" placeholder="Your Email" required=true class="form-control">
              {!! Form::close() !!}
          </div>

          <div class="row mt20">
            <span class="f12 cb2">CONTACT <b>US</b></span>
            {!! Form::open(['action'=>'HomeController@contact_send','method'=>'post']) !!}
              <input type="email" name="email" placeholder="Your Email" class="form-control" />
              @if($errors->has())
                <span class="label label-danger">{!!$errors->first('email')!!}</span>
              @endif
              <input type="text" name="name" placeholder="Your Name" class="form-control mt5" />
              @if($errors->has())
                <span class="label label-danger">{!!$errors->first('name')!!}</span>
              @endif
              <input type="number" name="phone" placeholder="Phone Number" class="form-control mt5" />
              @if($errors->has())
                <span class="label label-danger">{!!$errors->first('phone')!!}</span>
              @endif
              <textarea class="form-control mt5" name="message" placeholder="Your Message" style="min-height: 100px"></textarea>
              @if($errors->has())
                <span class="label label-danger">{!!$errors->first('message')!!}</span>
              @endif
              <input type="submit" value="Send" class="mt5 btn btn-success right">
            {!! Form::close() !!}
          </div>
        </div>
      </div>

      <div class="col-md-6 col-sm-12 top-nav">
        <div class="p10">

          <div class="row mt20">
            <span class="f12 cw2 ml20"><b>BLOG LATEST</b></span>
          </div>

          @foreach($query->get_data('news',null,['take'=>2,'orderBy'=>['created_at'=>'asc']])->get() as $item)
            <div class="row mt10">
              <div class="col-sm-4" style="max-height: 100px;">
                <div style="height: 100px; background: url({{url('images/news/'.$item->image)}}) center; background-size: cover"></div>
              </div>
              <div class="bg5 col-sm-8 p5" style="max-height: 110px;">
                <div class="p10 bordash" style="max-height: 100px;">
                  <span class="f10 cb2"><b>{{$item->title}}</b></span>
                  <p class="cb2 tj">{!! $item->brief !!}</p>
                </div>
              </div>
            </div>
            <div class="row mt20" style="border-bottom: 1px dotted #ddd"></div>
          @endforeach

        </div>

        <div class="row right">
          <a href="{{URL::action('NewsController@index')}}" class="cb2"><b>Go to Blog....</b></a>
        </div>
      </div>
    </div>

    <div class="row mt20 pt20 pb40">
      <div class="col-xs-12 tl f10">
        &copy; <a class="cw2" href="https://smarteksistem.com" target="_blank">SMARTEKSISTEM</a> | RESKY ADI NUGRAHA 2016, Alright Reserved.
      </div>
    </div>

  </div>


</div>

@endforeach