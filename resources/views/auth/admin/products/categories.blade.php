@extends('admin')

@section('h3')
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product Categories</h1>
        </div>
    </div>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h3>Add new category</h3>	
			{!! Form::open(['action'=>'AdminController@product_category_insert','method'=>'post','role'=>'form','files'=>true]) !!}
			<div class="form-group">
				{!! Form::label('parent','Parent',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
              		{!! Form::select('parent',$cats,null,['class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('parent')!!}</span>
	                @endif
              	</div>
			</div>

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
				{!! Form::label('image','image',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::file('image',['class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('image')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('special','special',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::input('checkbox','special',1) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('special')!!}</span>
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
			<h3>List Category</h3>

			<table class="table">
				<thead>
					<tr>
						<th style="width:20%;">Image</th>
						<th style="width:20%;">Parent</th>
						<th style="width:20%;">Name</th>
						<th style="width:25%;">Change Image</th>
						<th style="width:5%;">Special</th>
						<th style="width:5%;">Edit</th>
						<th style="width:5%;">Delete</th>
					</tr>
				</thead>
				<tbody>
			@foreach($categories->get() as $item)
					<tr>
						{!! Form::open(['action'=>'AdminController@product_category_update','method'=>'post','files'=>true]) !!}
						<td>@if(file_exists('images/categories/'.$item->image))
							<img src="{{URL::asset('images/categories/'.$item->image)}}" alt="{{$item->name}}" class="img-thumbnail img-responsive">
							@endif
						</td>
						<td>
							{!! Form::hidden('id',$item->id) !!}
							{!! Form::select('parent',$cats,$item->parent,['class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
						</td>
						<td>
							{!! Form::text('name',$item->name,['class'=>'form-control col-md-12 col-xs-12','required'=>'required','placeholder'=>'Name']) !!}
						</td>
						<td>
							{!! Form::file('image',['class'=>'form-control col-md-12 col-xs-12']) !!}
						</td>
						<td>
							<input type="checkbox" name="special" value="1" @if($item->special == 1) checked @endif>
						</td>
						<td>
							{!! Form::submit('Edit',['class'=>'btn btn-info']) !!}
						</td>
						{!! Form::close() !!}
						<td>
							{!! Form::open(['action'=>'AdminController@product_category_delete','method'=>'post']) !!}
								{!! Form::hidden('id',$item->id) !!}
								{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
							{!! Form::close() !!}
						</td>
					</tr>
			@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection