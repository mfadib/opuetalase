@extends('admin')

@section('h3')
	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Sliders</h1>
        </div>
        <!--End Page Header -->
    </div>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-4">
		<h3>New Slide</h3>
		{!! Form::open(['action'=>'AdminController@slider_insert','method'=>'post','role'=>'form','files'=>true]) !!}
			<div class="form-group">
				{!! Form::label('image','Image') !!}
              	<div class="col-md-12">
	                {!! Form::file('image',null,['placeholder'=>'Image','class'=>'form-control col-md-12 col-xs-12','required'=>true]) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('image')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('Status','Status') !!}
              	<div class="col-md-12">
		            <div class="checkbox">
		                <label>
		                  <input name="status" value="1" type="checkbox"> Actived
		                </label>
		            </div>
					@if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('status')!!}</span>
	                @endif
              	</div>
			</div>
			<div class="form-group">
				<div class="col-md-8 col-md-offset-4">
	                {!! Form::submit('Save',['class'=>'btn btn-default']) !!}
              	</div>
			</div>
		{!! Form::close() !!}
		</div>
		<div class="col-md-8">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th style="width:75%;">Image</th>
							<th style="width:15%;">Status</th>
							<th style="width:5%;">Change</th>
							<th style="width:5%;">Delete</th>
						</tr>
					</thead>
					<tbody>
						@foreach($sliders as $item)
						<tr>
							<td>
							<img src="{{URL::asset('images/sliders/'.$item->image)}}" alt="Slider" class="img-thumbnail img-responsive">
							<td>{{$query->get_status($item->status)}}</td>
							<td>
								{!! Form::open(['action'=>'AdminController@slider_status','method'=>'post']) !!}
									{!! Form::hidden('id',$item->id) !!}
									{!! Form::hidden('status',$item->status) !!}
									{!! Form::submit('Change',['class'=>'btn btn-success']) !!}
								{!! Form::close() !!}
							</td>
							<td>
								{!! Form::open(['action'=>'AdminController@slider_delete','method'=>'post']) !!}
									{!! Form::hidden('id',$item->id) !!}
									{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{!! $sliders->links(); !!}
			</div>
		</div>	
		<br><br><br>&nbsp;
	</div>			
@endsection