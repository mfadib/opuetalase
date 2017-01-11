@extends('app')

@section('titlebar')
      <div class="row">
        <div class="container">
          <div class="col-md-12 p10">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{URL::action('HomeController@index')}}" class="cb">Home</a></li>
              <li class="breadcrumb-item active"><b>FAQs</b></li>
            </ol>
          </div>
        </div>
      </div>
@endsection
  
@section('content')
	<div class="row">
		<div class="col-md-12">
			
			@foreach($faqs->get() as $item)
				<div class="panel panel-default">
					<div class="panel-body">
						<p>{!!$item->question!!}</p>
						<blockquote class="pull-right">{!!$item->answer!!}</blockquote>	
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection