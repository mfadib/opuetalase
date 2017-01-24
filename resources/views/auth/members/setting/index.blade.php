@extends('app')

@section('titlebar')
      <div class="row">
        <div class="container">
          <div class="col-md-12 p10">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{URL::action('MemberController@memberarea')}}" class="cb">Member Area</a></li>
              <li class="breadcrumb-item active"><b>Settings</b></li>
            </ol>
          </div>
        </div>
      </div>
@endsection
  
@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h3>Your Profile</h3><hr>
			{!! Form::open(['action'=>'MemberController@change_password','method'=>'post']) !!}
				{!! Form::hidden('id',Auth::user()->id) !!}
					<div class="form-group">
						{!! Form::label('name','Name') !!}
						{!! Form::text('name',Auth::user()->name,['class'=>'form-control','id'=>'name','readonly'=>true]) !!}
				        @if($errors->has())
				            <p class="text-danger">{{$errors->first('name')}}</p>
				        @endif
				    </div>
					<div class="form-group">
						{!! Form::label('email','Email') !!}
						{!! Form::email('old',Auth::user()->email,['class'=>'form-control','id'=>'email','readonly'=>true]) !!}
				        @if($errors->has())
				            <p class="text-danger">{{$errors->first('old')}}</p>
				        @endif
				    </div>
				    <h3>Change Password</h3><hr>
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
				{!! Form::submit('Change',['class'=>'btn btn-default']) !!}
			{!! Form::close() !!}
		</div>
	</div><br>
@endsection