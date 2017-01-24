@extends('admin')

@section('h3')
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">News Categories</h1>
        </div>
    </div>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-5">
			<h3>Add new category</h3>	
			{!! Form::open(['action'=>'AdminController@news_category_add','method'=>'post','role'=>'form']) !!}
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
				<div class="col-md-8 col-md-offset-4">
	                {!! Form::submit('Save',['class'=>'btn btn-default']) !!}
              	</div>
			</div>
		{!! Form::close() !!}
		</div>
		<div class="col-md-7">
			<h3>List Category</h3>

			<table class="table">
				<thead>
					<tr>
						<th style="width:40%;">Parent</th>
						<th style="width:40%;">Name</th>
						<th style="width:10%;">Edit</th>
						<th style="width:10%;">Delete</th>
					</tr>
				</thead>
				<tbody>
			@foreach($categories as $item)
					<tr>
						{!! Form::open(['action'=>'AdminController@news_category_update','method'=>'post']) !!}
						<td>
							{!! Form::hidden('id',$item->id) !!}
							{!! Form::select('parent',$cats,$item->parent,['class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
						</td>
						<td>
							{!! Form::text('name',$item->name,['class'=>'form-control col-md-12 col-xs-12','required'=>'required','placeholder'=>'Name']) !!}
						</td>
						<td>
							{!! Form::submit('Edit',['class'=>'btn btn-info']) !!}
						</td>
						{!! Form::close() !!}
						<td>
							{!! Form::open(['action'=>'AdminController@news_category_delete','method'=>'post']) !!}
								{!! Form::hidden('id',$item->id) !!}
								{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
							{!! Form::close() !!}
						</td>
					</tr>
			@endforeach
				</tbody>
			</table>
		</div>
		{!! $categories->links() !!}
	</div>
@endsection