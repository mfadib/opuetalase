@extends('admin')

@section('h3')
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Brands</h1>
        </div>
    </div>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h3>Add new brand</h3>	
			{!! Form::open(['action'=>'AdminController@brand_insert','method'=>'post','role'=>'form','files'=>true]) !!}
			<div class="form-group">
				{!! Form::label('name','name',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::text('name',null,['class'=>'form-control col-md-12 col-xs-12','required'=>'required','placeholder'=>'name']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('name')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('icon','Icon',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::file('icon',['class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('icon')!!}</span>
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
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3>List Brand</h3>

			<table class="table">
				<thead>
					<tr>
						<th style="width:20%;">Icon</th>
						<th style="width:40%;">Name</th>
						<th style="width:30%;">Change Icon</th>
						<th style="width:5%;">Edit</th>
						<th style="width:5%;">Delete</th>
					</tr>
				</thead>
				<tbody>
			@foreach($brands as $item)
					<tr>
						{!! Form::open(['action'=>'AdminController@brand_update','method'=>'post','files'=>true]) !!}
						<td>
							{!! Form::hidden('id',$item->id) !!}
							<img src="{{URL::asset('images/brands/'.$item->icon)}}" alt="{{$item->name}}">
						</td>
						<td>
							{!! Form::text('name',$item->name,['class'=>'form-control col-md-12 col-xs-12','required'=>'required','placeholder'=>'Name']) !!}
						</td>
						<td>
							{!! Form::file('icon',['class'=>'form-control col-md-12 col-xs-12']) !!}
						</td>
						<td>
							{!! Form::submit('Edit',['class'=>'btn btn-info']) !!}
						</td>
						{!! Form::close() !!}
						<td>
							{!! Form::open(['action'=>'AdminController@brand_delete','method'=>'post']) !!}
								{!! Form::hidden('id',$item->id) !!}
								{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
							{!! Form::close() !!}
						</td>
					</tr>
			@endforeach
				</tbody>
			</table>
		</div>
		{!! $brands->links() !!}
	</div>
@endsection