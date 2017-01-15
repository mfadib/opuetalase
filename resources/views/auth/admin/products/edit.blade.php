@extends('admin')

@section('h3')
	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Edit Product</h1>
        </div>
        <!--End Page Header -->
    </div>
@endsection

@section('content')
	@foreach($product->get() as $item)
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		{!! Form::open(['action'=>'AdminController@product_update','method'=>'post','role'=>'form','files'=>true]) !!}
			<div class="form-group">
				{!! Form::label('category_id','Category',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::hidden('id',$item->id,['required'=>'required']) !!}
	                {!! Form::select('category_id',$cats,$item->category_id,['class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('category_id')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('brand_id','Brand',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::select('brand_id',$brands,$item->brand_id,['class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('brand_id')!!}</span>
	                @endif
              	</div>
			</div>
			
			<div class="form-group">
				{!! Form::label('title','Title',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::text('title',$item->title,['class'=>'form-control col-md-12 col-xs-12','required'=>'required','placeholder'=>'Title']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('title')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('meta_description','Meta Description',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::textarea('meta_description',$item->meta_description,['placeholder'=>'Meta Description','rows'=>7,'class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('meta_description')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('meta_keywords','Meta Keywords',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::textarea('meta_keywords',$item->meta_keywords,['placeholder'=>'Meta Keywords','rows'=>7,'class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('meta_keywords')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('description','Description',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::textarea('description',$item->description,['placeholder'=>'Description','rows'=>7,'class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('description')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('how_to_buy','How to buy',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::textarea('how_to_buy',$item->how_to_buy,['placeholder'=>'How to buy','rows'=>7,'class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('how_to_buy')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('price','Price',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::number('price',$item->price,['placeholder'=>'Price','rows'=>7,'class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
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
		                  <input name="recommended" value="{{$item->recommended}}" @if($item->recommended == 1) checked @endif type="checkbox"> Top Week
		                </label>
		            </div>
					@if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('recomended')!!}</span>
	                @endif
              	</div>
              	<div class="col-md-3">
		            <div class="checkbox">
		                <label>
		                  <input name="special" value="1" @if($item->special == 1) checked @endif type="checkbox"> Recommended
		                </label>
		            </div>
					@if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('special')!!}</span>
	                @endif
              	</div>
              	<div class="col-md-3">
		            <div class="checkbox">
		                <label>
		                  <input name="top_category" value="1" @if($item->top_category == 1) checked @endif type="checkbox"> Top Category
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
	                <img src="{{URL::asset('images/products/'.$item->cover)}}" alt="{{$item->title}}" class="img-thumbnail img-responsive">
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('cover','Change cover',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::file('cover',['class'=>'form-control col-md-12 col-xs-12']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('cover')!!}</span>
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
	<div class="row">
		<div class="col-md-12">
			<h3>Images</h3>
			{!! Form::open(['action'=>'AdminController@product_image_insert','method'=>'post','files'=>true]) !!}
				<div class="row">
					<div class="col-md-11">
						{!! Form::hidden('product_id',$item->id) !!}
						{!! Form::file('images[]',['required'=>true,'multiple'=>true,'class'=>'form-control']) !!}
					</div>
					<div class="col-md-1">
						{!! Form::submit('Add',['class'=>'btn btn-success']) !!}
					</div>
				</div><br>
			{!! Form::close() !!}
			<div class="row">
				@if($images->count() != 0)
					@foreach($images->get() as $img)
						<div class="col-md-4">
							<img src="{{URL::asset($img->image)}}" alt="{{$item->title}}" class="img-thumbnail img-responsive">
							{!! Form::open(['action'=>'AdminController@product_image_delete','method'=>'post']) !!}
								{!! Form::hidden('id',$img->id) !!}
								{!! Form::submit('delete',['class'=>'btn btn-danger btn-xs']) !!}
							{!! Form::close() !!}
						</div>
					@endforeach
				@endif
			</div>			
		</div>
	</div>
	@endforeach
	<br><br><br><br>
@endsection