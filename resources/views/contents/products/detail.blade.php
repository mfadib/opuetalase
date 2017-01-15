@extends('app')

@section('titlebar')
      <div class="row">
        <div class="container">
          <div class="col-md-12 p10">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{URL::action('HomeController@index')}}" class="cb">Home</a></li>
              <li class="breadcrumb-item active"><b>Products</b></li>
            </ol>
          </div>
        </div>
      </div>
@endsection
  
@section('content')
		@foreach($product->get() as $pro)
          <div class="col-md-8 p10">
            <span class="f16"><b>{{$pro->title}}</b></span>
            <div>
              <span>Be the first to review this product</span>
              <!-- <a class="cb2"> -->
                <!-- <span class="ml20 fa fa-envelope-o"></span> -->
                <!-- <span>Email to a Friend</span> -->
              <!-- </a> -->
            </div>
            <center class="mt20">
			<img id="zoom" src="{{url('images/products/'.$pro->cover)}}" class="img img-thumbnail img-resposive" alt="{{$pro->title}}">
			
            <div class="col-md-8 mt20 top-nav pb20" style="height: 120px">
				{{-- @if($images->count() != 0)
					@foreach($images->get() as $item)
	              	<div class="col-sm-4 col-xs-6">
	                	<img id="zoom" src="{{URL::asset($item->image)}}" style="width: 100%;" class="img-thumbnail img-responsive">
	              	</div>
	              	@endforeach
				@endif --}}
            </div>
          </div>

          <div class="col-md-4">
            <div class="p10 bordash">
              
              <div class="row mt20 tc">
                <div class="col-xs-6">
                  <span class="fa fa-star fa-4x cr"></span>
                  <br/>
                  FREE SHIPPING
                </div>

                <div class="col-xs-6">
                  <span class="fa fa-television fa-4x cr"></span>
                  <br/>
                  SAME DAY DISPATCH
                </div>

                <center>
                  <div class="row mt10" style="border-bottom: 1px solid #ddd; width: 90%;">&nbsp;</div>
                </center>

              </div>
                <div class="p20 mt10 tj">
                  <!-- <div class="">
                    SKU: <span><b>Some_one123</b></span>
                  </div>
 -->
                  <div class="">
                    Avaibility: <span class="cr"><b>In Stock</b></span>
                  </div>

                  <div class="f24 tc mt10">
                    <b>{{$query->currency_format($pro->price)}}</b>
                  </div>

                  <div class="mt10">
                    Rating: {!!$query->get_rate($pro->id)!!}
                  </div>
                  
                  <div class="mt20">
                  Quick Overview:
                  </div>
                  <p>{{$query->get_ellipsis($pro->description,200)}}</p>

					<a href="{{url('product/wishlist/'.$pro->slug)}}" title="{{$pro->title}}" class="btn btn-info btn-xs">Wishlist</a>
                  </div>

                  <div class="f12"><b>Share This Item</b></div>
                  <div class="col-xs-12 mt10">
					<a href="{{$shares['email']}}" title="{{$pro->title}}" >
                      <div class="btn btn-default col-xs-3">
                        <span class="fa fa-envelope-o fa-2x"></span>
                      </div>
                    </a>
					<a href="{{$shares['facebook']}}" title="{{$pro->title}}" >
                      <div class="btn btn-default col-xs-3">
                        <span class="fa fa-facebook fa-2x"></span>
                      </div>
                    </a>
					<a href="{{$shares['twitter']}}" title="{{$pro->title}}" >
                      <div class="btn btn-default col-xs-3">
                        <span class="fa fa-twitter fa-2x"></span>
                      </div>
                    </a>
					<a href="{{$shares['gplus']}}" title="{{$pro->title}}" >
                      <div class="btn btn-default col-xs-3">
                        <span class="fa fa-google-plus fa-2x"></span>
                      </div>
                    </a>
						
                  </div>

                  <br><br><br>

              </div>
            </div>
          </div>
        </div>
		
      <div class="row mt20">

        <div class="container">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#home">Detail</a></li>
            <li><a href="#menu1">How to buy?</a></li>
            <li><a href="#menu2">Reviews</a></li>
            <li><a href="#menu3">Send Review</a></li>
          </ul>

          <div class="tab-content p10 tj">
            <div id="home" class="tab-pane fade in active">
              <h3>Detail</h3>
              {!!$pro->description!!}
            </div>
            <div id="menu1" class="tab-pane fade">
              <h3>How to buy?</h3>
              {!! $pro->how_to_buy !!}
            </div>
            <div id="menu2" class="tab-pane fade">
              	<h3>Reviews</h3>
              	@if($reviews->count() == 0)
					<div class="alert alert-info">
						product dont have reviews
					</div>
				@else
					@foreach($reviews->get() as $rev)
					<div class="well">
						<p>{{$query->get_field_data('users',['id'=>$rev->user_id],'name')}}</p>
						<p>Product: {{$rev->quality_product}} Stars</p>
						<p>Service: {{$rev->quality_service}} Stars</p>
						<p>Message: {{$rev->message}}</p>
					</div>
					@endforeach
				@endif
            </div>
            <div id="menu3" class="tab-pane fade">
              	<h3>Send your review for this product</h3>
				{!! Form::open(['action'=>'ProductController@insert_review','method'=>'post','role'=>'form']) !!}
					<div class="form-group">
	                    {!! Form::label('qualityProduct','Quality Product') !!}
	                    {!! Form::hidden('product_id',$pro->id) !!}
	                    {!! Form::hidden('product_slug',$pro->slug) !!}
	                    {!! Form::select('quality_product',['1'=>'Very Bad','2'=>'Bad','3'=>'Netral','4'=>'Good','5'=>'Very Good'],null,['class'=>'form-control','id'=>'qualityProduct','placeholder'=>'Quality Product']) !!}
	                    @if($errors->has())
	                        <p class="text-danger">{{$errors->first('quality_product')}}</p>
	                    @endif
	                </div>
	                <div class="form-group">
	                    {!! Form::label('qualityService','Quality Service') !!}
	                    {!! Form::select('quality_service',['1'=>'Very Bad','2'=>'Bad','3'=>'Netral','4'=>'Good','5'=>'Very Good'],null,['class'=>'form-control','id'=>'qualityService','placeholder'=>'Quality Service']) !!}
	                    @if($errors->has())
	                        <p class="text-danger">{{$errors->first('quality_service')}}</p>
	                    @endif
	                </div>
	                <div class="form-group">
	                    {!! Form::label('message','Message') !!}
	                    {!! Form::textarea('message',null,['class'=>'form-control','id'=>'message','placeholder'=>'Message']) !!}
	                    @if($errors->has())
	                        <p class="text-danger">{{$errors->first('message')}}</p>
	                    @endif
	                </div>
						{!! Form::submit('Send',['class'=>'btn btn-default']) !!}
				{!! Form::close() !!}
            </div>
          </div>

        <script>
        $(document).ready(function(){
            $(".nav-tabs a").click(function(){
                $(this).tab('show');
            });
        });
        </script>

        @endforeach
@endsection

@section('content_else')
  <!-- Recomended -->

      <div class="row mt40" style="border-top: 1px solid #666">
        <center><div class="f16" style="width: 240px; background: #fff; margin-top: -14px;">RELATED PRODUCT</div></center>
      </div>

      <div class="row mt20">
        <div class="container">
        	@foreach($relations->get() as $item)
          	<a href="{{URL::action('ProductController@detail',['slug'=>$item->slug])}}" title="{{$item->title}}">
            <div class="col-md-3 col-sm-3 col-xs-6 p10 bordash">
            	<div class="p10 bg2" style="height: 250px; background: url({{url('images/products/'.$item->cover)}}); background-size: cover; background-position: center;"></div>
            	<div class="tc fprod">{{$query->get_ellipsis($item->title,20)}}</div>
            	{!! $query->get_rate($item->id) !!}
            	<div class="tc fprod mt5"><b>{{$query->currency_format($item->price)}}</b></div>
          	</div>
          	</a>
			@endforeach
        </div>
      </div>
      <br><br>
@endsection