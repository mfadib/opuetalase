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
	<div class="row">
            @if(Auth::check())
              @if(Auth::user()->status == 0)
                @section('sidebar_left')

		            <div style="border: 1px solid #ccc">
  						<div class="f16 bg p10 cw">CATEGORY</div>
		            	<div class="p10">
							<div><a href="{{url('products')}}">All Category ({{$query->get_data('products')->count()}})</a></div>
							@foreach($categories as $item)
							<div><a href="{{url('product/category/'.$item->slug)}}">{{$item->name}} ({{$query->get_data('products',['category_id'=>$item->id])->count()}})</a></div>
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
						<div><a href="{{url('products')}}">All Category ({{$query->get_data('products')->count()}})</a></div>
						@foreach($categories as $item)
						<div><a href="{{url('product/category/'.$item->slug)}}">{{$item->name}} ({{$query->get_data('products',['category_id'=>$item->id])->count()}})</a></div>
						@endforeach
	              	</div>
	            </div>
	          </div>
          		<div class="col-md-9 col-xs-12 p10" style="margin-top: -20px">
            @endif
			<div class="row">
				<div class="col-md-12">
					@foreach($product->get() as $pro)
					<h3>{{$pro->title}} <span class="pull-right">{{$query->currency_format($pro->price)}}</span></h3><hr>
					<div class="row">
						<div class="col-md-5">
							<img src="{{url('images/products/'.$pro->cover)}}" class="img img-thumbnail img-resposive" alt="{{$pro->title}}">
							{{-- @if($images->count() != 0)
							<div class="row">
								@foreach($images->get() as $item)
				              	<div class="col-sm-4 col-xs-6">
				                	<img id="zoom" src="{{URL::asset($item->image)}}" style="width: 100%;" class="img-thumbnail img-responsive">
				              	</div>
				              	@endforeach
				            </div>
							@endif --}}
						</div>
						<div class="col-md-7">
							<h4>Description</h4>
							{{$pro->description}}
							<hr>
							<a href="{{url('product/wishlist/'.$pro->slug)}}" title="{{$pro->title}}" class="btn btn-info btn-xs">Wishlist</a>
							<a href="{{$shares['email']}}" title="{{$pro->title}}" class="btn btn-default btn-xs"><i class="fa fa-envelope-o"></i> Email</a>
							<a href="{{$shares['facebook']}}" title="{{$pro->title}}" class="btn btn-default btn-xs"><i class="fa fa-facebook"></i> Facebook</a>
							<a href="{{$shares['twitter']}}" title="{{$pro->title}}" class="btn btn-default btn-xs"><i class="fa fa-twitter"></i> Twitter</a>
							<a href="{{$shares['gplus']}}" title="{{$pro->title}}" class="btn btn-default btn-xs"><i class="fa fa-google-plus"></i> Google Plus</a>
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<br><ul class="nav nav-tabs">
							  	<li><a href="#how_to_buy" data-toggle="tab">How to Buy?</a></li>
							  	<li><a href="#reviews" data-toggle="tab">Reviews</a></li>
							  	<li><a href="#send_review" data-toggle="tab">Send Review</a></li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content"><br>
							  	<div class="tab-pane active" id="how_to_buy">{{$pro->how_to_buy}}</div>
							  	<div class="tab-pane" id="reviews">
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
							  	<div class="tab-pane" id="send_review">
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
							<hr>
						</div>
					</div><br>
					@endforeach
				</div>
			</div>

      <!-- Recomended -->

	      <div class="row mt40" style="border-top: 1px solid #666">
	        <center><div class="f16" style="width: 240px; background: #fff; margin-top: -14px;">RELATED PRODUCT</div></center>
	      </div>

	      <div class="row mt20">
	        <div class="container">
	        	@foreach($relations->get() as $item)
	          	<div class="col-md-3 col-sm-3 col-xs-6 p10 bordash">
	            	<div class="p10 bg2" style="height: 250px; background: url({{url('images/products/'.$item->cover)}}); background-size: cover; background-position: center;"></div>
	            	<div class="tc fprod">{{$item->title}}</div>
	            	<div class="tc fprod mt5"><b>{{$query->currency_format($item->price)}}</b></div>
	          	</div>
				@endforeach
	        </div>
	      </div>
	      <br><br>
		</div>
	</div>	
@endsection