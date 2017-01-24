@extends('admin')

@section('h3')
	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Add Product</h1>
        </div>
        <!--End Page Header -->
    </div>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		{!! Form::open(['action'=>'AdminController@product_insert','method'=>'post','role'=>'form','files'=>true]) !!}
			<div class="form-group">
                {!! Form::hidden('id',null,['required'=>'required']) !!}
				{!! Form::label('category_id','Category',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::select('category_id',$cats,null,['class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('category_id')!!}</span>
	                @endif
              	</div>
			</div>
			
			<div class="form-group">
				{!! Form::label('brand_id','Brand',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::select('brand_id',$brands,null,['class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('brand_id')!!}</span>
	                @endif
              	</div>
			</div>
			
			<div class="form-group">
				{!! Form::label('title','Title',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
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
				{!! Form::label('description','Description',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::textarea('description',null,['placeholder'=>'Description','rows'=>7,'class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('description')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('how_to_buy','How to buy',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::textarea('how_to_buy',null,['placeholder'=>'How to buy','rows'=>7,'class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('how_to_buy')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('price','Price',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::number('price',null,['placeholder'=>'Price','rows'=>7,'class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('price')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				<div class="col-md-4">&nbsp;</div>
              	<div class="col-md-2">
		            <div class="checkbox">
		                <label>
		                  <input name="recommended" value="1" type="checkbox"> Top Week
		                </label>
		            </div>
					@if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('recommended')!!}</span>
	                @endif
              	</div>
              	<div class="col-md-3">
		            <div class="checkbox">
		                <label>
		                  <input name="special" value="1" type="checkbox"> Recommended
		                </label>
		            </div>
					@if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('special')!!}</span>
	                @endif
              	</div>
              	<div class="col-md-3">
		            <div class="checkbox">
		                <label>
		                  <input name="top_category" value="1" type="checkbox"> Top Category
		                </label>
		            </div>
					@if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('top_category')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('cover','Cover',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::file('cover',['class'=>'form-control col-md-12 col-xs-12','required'=>true]) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('cover')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('images','Images',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::file('images[]',['multiple'=>true,'class'=>'form-control col-md-12 col-xs-12','required'=>true]) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('images')!!}</span>
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