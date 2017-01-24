@extends('admin')

@section('h3')
	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Add News</h1>
        </div>
        <!--End Page Header -->
    </div>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		{!! Form::open(['action'=>'AdminController@news_insert','method'=>'post','role'=>'form','files'=>true]) !!}
			<div class="form-group">
				{!! Form::label('category_id','Category',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::select('category_id',$cats,null,['class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('category_id')!!}</span>
	                @endif
              	</div>
			</div>
			
			<div class="form-group">
				{!! Form::label('title','Title',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::hidden('id',null,['required'=>'required']) !!}
	                {!! Form::text('title',null,['class'=>'form-control col-md-12 col-xs-12','required'=>'required','placeholder'=>'Title']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('title')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('meta_description','Meta Description',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::textarea('meta_description',null,['placeholder'=>'Meta Description','rows'=>7,'class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('meta_description')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('meta_keywords','Meta Keywords',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::textarea('meta_keywords',null,['placeholder'=>'Meta Keywords','rows'=>7,'class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('meta_keywords')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('brief','Brief',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::textarea('brief',null,['placeholder'=>'Brief','rows'=>7,'class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('brief')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('description','Description',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::textarea('description',null,['placeholder'=>'Description','rows'=>7,'class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('description')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('image','Image',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::file('image',['class'=>'form-control col-md-12 col-xs-12','required'=>true]) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('image')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				<div class="col-md-4">&nbsp;</div>
              	<div class="col-md-4">
		            <div class="checkbox">
		                <label>
		                  <input name="subscribe" value="1" type="checkbox"> Send Subscriber
		                </label>
		            </div>
					@if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('subscribe')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				<div class="col-md-8 col-md-offset-4">
	                {!! Form::submit('Save',['class'=>'btn btn-default']) !!}
              	</div>
			</div>
		{!! Form::close() !!}
			<br><br><br>&nbsp;
		</div>
	</div>			
@endsection