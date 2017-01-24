@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-12 p10">
			@foreach($content->get() as $item)

			@section('titlebar')
			      <div class="row">
			        <div class="container">
			          <div class="col-md-12 p10">
			            <ol class="breadcrumb">
			              <li class="breadcrumb-item"><a href="{{URL::action('HomeController@index')}}" class="cb">Home</a></li>
			              <li class="breadcrumb-item active"><b>{{$item->title}}</b></li>
			            </ol>
			          </div>
			        </div>
			      </div>
			@endsection

				@if($item->image != '')
					<img src="{{url('images/pages/'.$item->image)}}" alt="{{$item->title}}" class="img img-thumbnail img-responsive">
				@endif
				{!! $item->description !!}
			@endforeach
		</div>
	</div>
@endsection