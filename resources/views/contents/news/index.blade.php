@extends('app')

@section('titlebar')
      <div class="row">
        <div class="container">
          <div class="col-md-12 p10">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{URL::action('HomeController@index')}}" class="cb">Home</a></li>
              <li class="breadcrumb-item active"><b>News</b></li>
            </ol>
          </div>
        </div>
      </div>
@endsection
  
@section('content')
	<div class="row">@if(Auth::check())
              @if(Auth::user()->status == 0)
                @section('sidebar_left')

		            <div style="border: 1px solid #ccc">
  						<div class="f16 bg p10 cw">CATEGORY</div>
		            	<div class="p10">
							<div><a href="{{URL::action('NewsController@index')}}">All</a></div>
							@foreach($categories->get() as $item)
							<div><a href="{{URL::action('NewsController@category',['slug'=>$item->slug])}}">{{$item->name}}</a></div>
							@endforeach
		              	</div>
		            </div>
				@endsection
              @endif
          		<div class="col-md-12 col-xs-12 p10" style="margin-top: -20px">
            @else
	          <div class="col-md-3 top-nav">
	            <div style="border: 1px solid #ccc">
	            	<div class="f16 bg p10 cw">CATEGORY</div>
	            	<div class="p10">
						<div><a href="{{URL::action('NewsController@index')}}">All</a></div>
						@foreach($categories->get() as $item)
						<div><a href="{{URL::action('NewsController@category',['slug'=>$item->slug])}}">{{$item->name}}</a></div>
						@endforeach
	              	</div>
	            </div>
	          </div>
          		<div class="col-md-9 col-xs-12 p10" style="margin-top: -20px">
            @endif
			@foreach($news as $item)<div class="col-xs-12 pb20 mt10" style="border-bottom: 1px solid #ddd">
              	<div class="row">
	                <div class="ml10">
	                  	<div class=""><span class="f14"><b>{{$item->title}}</b></span></div>
	                  	<div class="">
		                    <div class="mt10">
		                      	<div class="left">
			                        <span class="fa fa-calendar fa-lg" style="color: #999"> </span>
			                        <span class="f12"> &nbsp;<?php echo date("d M Y",strtotime($item->created_at));?></span>
		                      	</div>
		                      	<div class="mr10">
		                        	<div class="pull-right">
		                      			<?php $shares = Share::load(URL::action('NewsController@detail',['slug'=>$item->slug]))->services('email','gplus','twitter','facebook');?>
			                        	<a href="{{$shares['email']}}" title="{{$item->title}}" class="btn btn-default btn-xs"><i class="fa fa-envelope-o"></i> Email</a>
										<a href="{{$shares['facebook']}}" title="{{$item->title}}" class="btn btn-default btn-xs"><i class="fa fa-facebook"></i> Facebook</a>
										<a href="{{$shares['twitter']}}" title="{{$item->title}}" class="btn btn-default btn-xs"><i class="fa fa-twitter"></i> Twitter</a>
										<a href="{{$shares['gplus']}}" title="{{$item->title}}" class="btn btn-default btn-xs"><i class="fa fa-google-plus"></i> Google Plus</a>
									</div>
								</div>
		                    </div>
	                  	</div>
	                </div>
              	</div>

              	<div class="row mt20">
	                <div class="col-md-5">
	                  	<div style="height: 200px; background: url({{URL::asset('images/news/'.$item->image)}}) center; background-size: cover"></div>
	                </div>
	                <div class="col-md-7 tj">
	                	{!! $item->brief !!}
	                  	<a href="{{URL::action('NewsController@detail',['slug'=>$item->slug])}}"><div class="mt20 right">Read More <span class="fa fa-angle-double-right"></span></div></a>
	                </div>
              	</div>
            </div>
            @endforeach
			{{ $news->links() }}
		</div>
	</div>	
@endsection