@extends('admin')

@section('h3')
	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Profile</h1>
        </div>
        <!--End Page Header -->
    </div>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<h3>Change your website profile</h3>
		{!! Form::open(['action'=>'AdminController@profile_save','method'=>'post','role'=>'form','files'=>true]) !!}
			@foreach($webprofile->get() as $item)
			<div class="form-group">
				{!! Form::label('title','Title website',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::hidden('id',$item->id,['required'=>'required']) !!}
	                {!! Form::text('title',$item->title,['class'=>'form-control col-md-12 col-xs-12','required'=>'required','placeholder'=>'Title']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('title')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('subtitle','Subtitle',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::text('subtitle',$item->subtitle,['class'=>'form-control col-md-12 col-xs-12','required'=>'required','placeholder'=>'Subtitle']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('subtitle')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('author','Author',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::text('author',$item->author,['class'=>'form-control col-md-12 col-xs-12','required'=>'required','placeholder'=>'Author']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('author')!!}</span>
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
				{!! Form::label('about','About',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::textarea('about',$item->about,['placeholder'=>'About','rows'=>7,'class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('about')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('phone','Phone Numbers',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::text('phone',$item->phone,['placeholder'=>'Phone Numbers','class'=>'form-control col-md-12 col-xs-12']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('phone')!!}</span>
	                @endif
              	</div>
			</div>
			
			<div class="form-group">
				{!! Form::label('email','Email',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::text('email',$item->email,['placeholder'=>'Email','class'=>'form-control col-md-12 col-xs-12']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('email')!!}</span>
	                @endif
              	</div>
			</div>
			
			<div class="form-group">
				{!! Form::label('facebook','Facebook',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::text('facebook',$item->facebook,['placeholder'=>'Facebook','class'=>'form-control col-md-12 col-xs-12']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('facebook')!!}</span>
	                @endif
              	</div>
			</div>
			
			<div class="form-group">
				{!! Form::label('googleplus','Google Plus',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::text('googleplus',$item->googleplus,['placeholder'=>'Google Plus','class'=>'form-control col-md-12 col-xs-12']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('googleplus')!!}</span>
	                @endif
              	</div>
			</div>
			
			<div class="form-group">
				{!! Form::label('twitter','Twitter',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::text('twitter',$item->twitter,['placeholder'=>'Twitter','class'=>'form-control col-md-12 col-xs-12']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('twitter')!!}</span>
	                @endif
              	</div>
			</div>
			
			<div class="form-group">
				{!! Form::label('instagram','Instagram',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::text('instagram',$item->instagram,['placeholder'=>'Instagram','class'=>'form-control col-md-12 col-xs-12']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('instagram')!!}</span>
	                @endif
              	</div>
			</div>
			
			<div class="form-group">
				{!! Form::label('linkedin','Linkedin',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::text('linkedin',$item->linkedin,['placeholder'=>'Linkedin','class'=>'form-control col-md-12 col-xs-12']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('linkedin')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('icon','icon',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                <img src="{{URL::asset('images/'.$item->icon)}}" class="img-thumbnail img-responsive" alt="{{$item->title}}">
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('icon','Change icon',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	                {!! Form::file('icon',['placeholder'=>'icon','class'=>'form-control col-md-12 col-xs-12']) !!}
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
			@endforeach
		{!! Form::close() !!}
			<br><br><br>&nbsp;
		</div>
	</div>			
@endsection