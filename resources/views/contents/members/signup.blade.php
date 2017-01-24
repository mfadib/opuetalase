@extends('app')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <h3>Register</h3>
            {!! Form::open(['method'=>'post','action'=>'MemberController@register','role'=>'form']) !!}
                <div class="form-group">
                    {!! Form::label('inputName','Name') !!}
                    {!! Form::input('text','name',null,['class'=>'form-control','id'=>'inputName','placeholder'=>'Name']) !!}
                    @if($errors->has())
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('inputEmail','Email') !!}
                    {!! Form::email('email',null,['class'=>'form-control','id'=>'inputEmail','placeholder'=>'Email']) !!}
                    @if($errors->has())
                        <p class="text-danger">{{$errors->first('email')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('inputPassword','Password') !!}
                    {!! Form::password('password',['class'=>'form-control','id'=>'inputPassword','placeholder'=>'Password']) !!}
                    @if($errors->has())
                        <p class="text-danger">{{$errors->first('password')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('inputConfirm','Confirm') !!}
                    {!! Form::password('confirm',['class'=>'form-control','id'=>'inputConfirm','placeholder'=>'Confirm']) !!}
                    @if($errors->has())
                        <p class="text-danger">{{$errors->first('confirm')}}</p>
                    @endif
                </div>
                {!! Form::submit('Signup',['class'=>'btn btn-default']) !!}
                <p>a member? <a href="{{URL::action('MemberController@signin')}}" title="Signin">Sign In</a></p>
            {!! Form::close() !!}
            <br>
        </div>
    </div>
@endsection