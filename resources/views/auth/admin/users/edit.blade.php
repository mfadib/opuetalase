@extends('admin')

@section('h3')
	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Edit User</h1>
        </div>
        <!--End Page Header -->
    </div>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		{!! Form::open(['action'=>'AdminController@user_update','method'=>'post','role'=>'form']) !!}
			@foreach($user->get() as $item)
			<div class="form-group">
				{!! Form::label('name','name',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
              		{!! Form::hidden('id',$item->id) !!}
	               	{!! Form::text('name',$item->name,['placeholder'=>'name','class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('name')!!}</span>
	                @endif
              	</div>
			</div>
			
			<div class="form-group">
				{!! Form::label('email','Email',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	               	{!! Form::email('email',$item->email,['placeholder'=>'Email','readonly'=>true,'class'=>'form-control col-md-12 col-xs-12','required'=>'required']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('email')!!}</span>
	                @endif
              	</div>
			</div>
			<h4>Change password</h4>
            <span class="label label-info">(Empty if not change)</span>
			<div class="form-group">
				{!! Form::label('old_password','Old Password',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	               	{!! Form::password('old_password',['placeholder'=>'Old Password','class'=>'form-control col-md-12 col-xs-12']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('old_password')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('new_password','New Password',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	               	{!! Form::password('new_password',['placeholder'=>'New Password','class'=>'form-control col-md-12 col-xs-12']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('new_password')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('confirm','Confrimation',['class'=>'control-label col-md-4']) !!}
              	<div class="col-md-8">
	               	{!! Form::password('confirm',['placeholder'=>'Confrimation','class'=>'form-control col-md-12 col-xs-12']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('confirm')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				<div class="col-md-4">&nbsp;</div>
              	<div class="col-md-8">
		            <div class="checkbox">
		                <label>
		                  <input name="status" required="true" @if($item->status == 0) checked @endif value="0" type="radio"> User
		                </label>
		                <label>
		                  <input name="status" required="true" @if($item->status == 1) checked @endif value="1" type="radio"> Admin
		                </label>
		            </div>
					@if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('status')!!}</span>
	                @endif
              	</div>
          	</div>

			<div class="form-group">
				<div class="col-md-4">&nbsp;</div>
              	<div class="col-md-8">
		            <div class="checkbox">
		                <label>
		                  <input name="actived" required="true" @if($item->actived == 0) checked @endif value="0" type="radio"> Not Actived
		                </label>
		                <label>
		                  <input name="actived" required="true" @if($item->actived == 1) checked @endif value="1" type="radio"> Actived
		                </label>
		            </div>
					@if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('actived')!!}</span>
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