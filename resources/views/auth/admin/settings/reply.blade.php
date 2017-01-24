@extends('admin')

@section('h3')
	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Reply message</h1>
        </div>
        <!--End Page Header -->
    </div>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<h3>Reply</h3>
		{!! Form::open(['action'=>'AdminController@contact_reply_send','method'=>'post','role'=>'form']) !!}
			@foreach($check->get() as $con)
			<div class="form-group">
				{!! Form::hidden('id',$con->id) !!}
				{!! Form::text('name',$con->name,['class'=>'form-control','required'=>'required','readonly'=>true,'placeholder'=>'name']) !!}
                @if($errors->has())
                    <span class="label label-danger">{!!$errors->first('name')!!}</span>
                @endif
			</div>

			<div class="form-group">
				{!! Form::label('email','Email') !!}
              	{!! Form::text('email',$con->email,['class'=>'form-control','required'=>'required','readonly'=>true,'placeholder'=>'Email']) !!}
                @if($errors->has())
                    <span class="label label-danger">{!!$errors->first('email')!!}</span>
                @endif
			</div>

			<div class="form-group">
				{!! Form::label('message','Message') !!}
              	{!! Form::textarea('message',$con->message,['class'=>'form-control','rows'=>'5','required'=>'required','readonly'=>true,'placeholder'=>'Message']) !!}
                @if($errors->has())
                    <span class="label label-danger">{!!$errors->first('message')!!}</span>
                @endif
			</div>

			<div class="form-group">
				{!! Form::label('reply','Reply') !!} -
				{!! Form::label('reply',$query->get_yesno($con->reply)) !!}
			</div>
			@endforeach
			<h3>Reply to this message</h3><hr>
			<div class="form-group">
              	{!! Form::textarea('reply',null,['class'=>'form-control','rows'=>'5','required'=>'required','placeholder'=>'Reply']) !!}
                @if($errors->has())
                    <span class="label label-danger">{!!$errors->first('reply')!!}</span>
                @endif
			</div>
			<div class="form-group">
				<div class="col-md-8 col-md-offset-4">
	                {!! Form::submit('Send',['class'=>'btn btn-default']) !!}
              	</div>
			</div>
		{!! Form::close() !!}
			<br><br><br>&nbsp;
		</div>
	</div>			
@endsection