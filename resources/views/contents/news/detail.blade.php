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
	<div class="row">
            @if(Auth::check())
              @if(Auth::user()->status == 0)
                @section('sidebar_left')

		            <div style="border: 1px solid #ccc">
  						<div class="f16 bg p10 cw">CATEGORY</div>
		            	<div class="p10">
							<div><a href="{{url('news')}}">All</a></div>
							@foreach($categories->get() as $item)
							<div><a href="{{url('news/category/'.$item->slug)}}">{{$item->name}}</a></div>
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
						<div><a href="{{url('news')}}">All</a></div>
						@foreach($categories->get() as $item)
						<div><a href="{{url('news/category/'.$item->slug)}}">{{$item->name}}</a></div>
						@endforeach
	              	</div>
	            </div>
	          </div>
          		<div class="col-md-9 col-xs-12 p10" style="margin-top: -20px">
            @endif
			<div class="row">
				<div class="col-md-12">
					@foreach($news->get() as $pro)
					<h3>{{$pro->title}}</h3><hr>
					<div class="row">
						<div class="row">
							<div class="col-md-12">
								<img src="{{url('images/news/'.$pro->image)}}" class="img img-thumbnail img-resposive" alt="{{$pro->title}}">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h4>Description</h4>
								{!! $pro->description !!}
								<hr>
								<a href="{{$shares['email']}}" title="{{$pro->title}}" class="btn btn-default btn-xs"><i class="fa fa-envelope-o"></i> Email</a>
								<a href="{{$shares['facebook']}}" title="{{$pro->title}}" class="btn btn-default btn-xs"><i class="fa fa-facebook"></i> Facebook</a>
								<a href="{{$shares['twitter']}}" title="{{$pro->title}}" class="btn btn-default btn-xs"><i class="fa fa-twitter"></i> Twitter</a>
								<a href="{{$shares['gplus']}}" title="{{$pro->title}}" class="btn btn-default btn-xs"><i class="fa fa-google-plus"></i> Google Plus</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			{{-- <div class="row">
				<div class="col-md-12">
					<h3>Related News</h3><hr>
					<div class="row">
						@foreach($relations->get() as $item)
							<div class="col-md-3">
								<img src="{{url('images/news/'.$item->image)}}" class="img img-thumbnail img-resposive" alt="{{$item->title}}">
								<a href="{{url('news/detail/'.$item->slug)}}" title="{{$item->title}}">{{$item->title}}</a>
							</div>
						@endforeach
					</div>
				</div>
			</div>--}}
		</div>
	</div>	
@endsection