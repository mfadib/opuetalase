@extends('admin')

@section('h3')
	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Setting</h1>
        </div>
        <!--End Page Header -->
    </div>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<h3>Change your profile</h3>
		{!! Form::open(['action'=>'AdminController@setting_save','method'=>'post','role'=>'form']) !!}
			<div class="form-group">
				{!! Form::label('name','Your name') !!}
          	    {!! Form::hidden('id',Auth::user()->id,['required'=>'required']) !!}
                {!! Form::text('name',Auth::user()->name,['class'=>'form-control','required'=>'required','readonly'=>true,'placeholder'=>'name']) !!}
                @if($errors->has())
                    <span class="label label-danger">{!!$errors->first('name')!!}</span>
                @endif
			</div>

			<div class="form-group">
				{!! Form::label('email','Email') !!}
              	{!! Form::text('email',Auth::user()->email,['class'=>'form-control','required'=>'required','readonly'=>true,'placeholder'=>'Email']) !!}
                @if($errors->has())
                    <span class="label label-danger">{!!$errors->first('email')!!}</span>
                @endif
			</div>
			<h3>Change your password</h3><hr>
			<div class="form-group">
				{!! Form::label('oldpassword','Old Password') !!}
				{!! Form::password('old',['class'=>'form-control','id'=>'oldpassword']) !!}
		        @if($errors->has())
		            <p class="text-danger">{{$errors->first('old')}}</p>
		        @endif
		    </div>
			<div class="form-group">
				{!! Form::label('newpassword','New Password') !!}
				{!! Form::password('new',['class'=>'form-control','id'=>'newpassword']) !!}
		        @if($errors->has())
		            <p class="text-danger">{{$errors->first('new')}}</p>
		        @endif
		    </div>
			<div class="form-group">
				{!! Form::label('confirm','Confirm') !!}
				{!! Form::password('confirm',['class'=>'form-control','id'=>'confirm']) !!}
		        @if($errors->has())
		            <p class="text-danger">{{$errors->first('confirm')}}</p>
		        @endif
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