@extends('admin')

@section('h3')
	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Edit News</h1>
        </div>
        <!--End Page Header -->
    </div>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		{!! Form::open(['action'=>'AdminController@news_update','method'=>'post','role'=>'form','files'=>true]) !!}
			@foreach($news->get() as $item)
			<div class="form-group">
				{!! Form::label('category_id','Category',['class'=>'control-label col-md-4']) !!}
				<div class="col-md-8">
              		{!! Form::hidden('id',$item->id) !!}
	                {!! Form::select('category_id',$cats,$item->category_id,['class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('category_id')!!}</span>
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
				{!! Form::label('brief','Brief',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::textarea('brief',$item->brief,['placeholder'=>'Brief','rows'=>7,'class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('brief')!!}</span>
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
				{!! Form::label('image','Image',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                <img src="{{URL::asset('images/news/'.$item->image)}}" alt="{{$item->title}}" class="img-thumbnail img-responsive">
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('image','Change Image',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::file('image',['class'=>'form-control col-md-12 col-xs-12']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('image')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				<div class="col-md-8 col-md-offset-4">
	                {!! Form::submit('Save',['class'=>'btn btn-default']) !!}
              	</div>
			</div>
			@endforeach
		{!! Form::close() !!}
			<br><br><br>&nbsp;
		</div>
	</div>			
@endsection